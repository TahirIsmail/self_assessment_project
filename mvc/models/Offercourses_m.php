<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Offercourses_m extends MY_Model
{
    protected $_table_name = 'courses';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id asc";

    public function __construct()
    {
        parent::__construct();
    }


    public function insert_course($data)
    {
        try {
            $this->db->insert('courses', $data);

            if ($this->db->affected_rows() > 0) {
                return $this->db->insert_id();
            } else {
                log_message('error', 'Failed to insert data into courses table.');
                throw new Exception('Database insert failed.');
            }
        } catch (Exception $e) {
            log_message('error', 'Error inserting course: ' . $e->getMessage());
            throw $e;
        }
    }


    public function get_all_courses()
    {
        $query = $this->db->get('courses');
        return $query->result_array();
    }

    public function get_join_course($id)
    {
        $this->db->select('*');
        $this->db->from('courses');
        $this->db->join('teacher', 'courses.teacherID = teacher.teacherID', 'LEFT');
        $this->db->where('courses.id', $id);
        $query = $this->db->get();
        return $query->result();
    }


    public function get_enrolled_courses($student_id)
    {
        $this->db->select('courses.id as id, courses.course_name as name, courses.course_id, courses.photo, courses.cost');
        $this->db->from('courses');
        $this->db->join('student_enrollment_mock_test', 'courses.id = student_enrollment_mock_test.course_id');
        $this->db->where('student_enrollment_mock_test.studentID', $student_id);
        $this->db->where('student_enrollment_mock_test.is_expired', 0);
        $query = $this->db->get();
        return $query->result();
    }


    public function get_unenrolled_courses($student_id)
    {
        $this->db->select('courses.id as id, courses.course_name as name, courses.course_id, courses.photo, courses.cost');
        $this->db->from('courses');
        $this->db->join('student_enrollment_mock_test', 'courses.id = student_enrollment_mock_test.course_id AND student_enrollment_mock_test.studentID = ' . $student_id, 'left');
        $this->db->group_start();
        $this->db->where('student_enrollment_mock_test.course_id IS NULL');
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result();
    }


    public function is_student_enrolled_in_course($course_id, $student_id)
    {
        $this->db->where('course_id', $course_id);
        $this->db->where('studentID', $student_id);
        $this->db->where('is_expired', 0);
        $query = $this->db->get('student_enrollment_mock_test');
        return $query->num_rows() > 0;
    }


    public function get_join_course_units($id)
    {
        $this->db->select('courses.*, subject.*');
        $this->db->from('courses');
        $this->db->join('subject', 'subject.course_id = courses.id', 'LEFT');
        $this->db->where('courses.id', $id);
        $query = $this->db->get();
        $result = $query->result_array();

        $courseData = [];

        foreach ($result as $row) {
            if (!isset($courseData[$row['id']])) {
                $courseData[$row['id']] = [
                    'courseID' => $row['id'],
                    'course_name' => $row['course_name'],
                    'course_description' => $row['course_description'],
                    'validDays' => $row['validDays'],
                    'cost' => $row['cost'],
                    'photo' => $row['photo'],
                    'subjects' => []
                ];
            }

            $courseData[$row['id']]['subjects'][] = [
                'subjectID' => $row['subjectID'],
                'subject' => $row['subject'],
                'course_id' => $row['course_id']
            ];
        }

        return array_values($courseData);
    }


    public function get_all_course_details()
    {
        $query = $this->db->get('courses');
        return $query->result_array();
    }


    public function general_get_course($array = NULL, $signal = FALSE)
    {
        return parent::get($array, $signal);
    }


    public function general_get_order_by_course($array = NULL)
    {
        return parent::get_order_by($array);
    }


    public function get_single_course($array)
    {
        return parent::get_single($array);
    }


    public function get_course_record($slug = NULL)
    {
        if ($slug) {
            $this->db->where('course_id', $slug);
        }
        $query = $this->db->get('courses');
        return $query->result();
    }
    public function get_order_by_course($array = NULL)
    {
        return parent::get_order_by($array);
    }


    public function insert_course_return_record($array)
    {
        $id = parent::insert($array);
        return $id;
    }

    public function delete_course_info($id)
    {
        if (empty($id) || !is_numeric($id)) {
            log_message('error', 'Attempted to delete course with an invalid ID: ' . var_export($id, true));
            return FALSE;
        }

        $this->db->where('id', $id);
        $result = $this->db->delete('courses');
        if (!$result) {
            log_message('error', 'Failed to delete course with ID: ' . $id);
            return FALSE;
        }

        return TRUE;
    }


    public function get_course_by_id($course_id)
    {
        $this->db->where('id', $course_id);
        $query = $this->db->get('courses');
        if ($query === false) {

            return false;
        }

        return $query->row();
    }
    public function get_course_names()
    {
        $query = $this->db
            ->select('*')
            ->order_by('created_at', 'DESC')
            ->limit(5)
            ->get('courses');
        return $query->result_array();
    }

    public function get_course_by_slug($slug = null)
    {

        $this->db->select('courses.*, center.city, center.address, center_courses.price, center_courses.id AS center_course_id, center.date');
        $this->db->from('courses');

        $this->db->join('center_courses', 'center_courses.course_id = courses.id', 'left');
        $this->db->join('center', 'center.id = center_courses.center_id', 'left');

        if ($slug) {
            $this->db->where('courses.slug', $slug);
        }
        $query = $this->db->get();

        $result = $query->result_array();

        $courses = [];
        $centers = [];

        if (!empty($result)) {
            foreach ($result as $row) {
                if (empty($courses)) {
                    $courses = [
                        'id' => $row['id'],
                        'slug' => $row['slug'],
                        'name' => $row['course_name'],
                        'image' => $row['photo'],
                        'center_course_id' => $row['center_course_id'],
                        'description' => $row['course_description'],
                    ];
                }

                if (!empty($row['city'])) {
                    $centers[] = [
                        'city' => $row['city'],
                        'address' => $row['address'],
                        'price' => $row['price'],
                        'date' => $row['date']
                    ];
                }
            }
        }

        $courses['centers'] = !empty($centers) ? $centers : [];


        if (empty($courses)) {
            return null;
        }

        return $courses;
    }



    public function get_course_details($slug = null)
    {
        $this->db->select('*');
        $this->db->from('courses');
        if ($slug) {
            $this->db->where('slug', $slug);
        }
        $query = $this->db->get();

        $result = $query->result_array();
        return $result;
    }

    public function get_course_payment_details($center_course_id)
    {
        $this->db->select('cc.id as center_course_id, cc.center_id as center_id, cc.course_id as course_pid, cc.price as course_price, c.*, cn.*');
        $this->db->from('center_courses AS cc');
        $this->db->join('courses AS c', 'c.id = cc.course_id', 'left');
        $this->db->join('center AS cn', 'cn.id = cc.center_id', 'left');
        $this->db->where('cc.id', $center_course_id);

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function update_course_by_id($data, $course_id)
    {
        if (empty($data) || empty($course_id)) {
            log_message('error', 'Update failed: Missing data or course ID.');
            return false;
        }
        try {
            $this->db->where('id', $course_id);
            $this->db->update('courses', $data);

            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                log_message('error', 'Update failed: No rows affected for course ID ' . $course_id);
                return false;
            }
        } catch (Exception $e) {
            log_message('error', 'Exception occurred while updating course: ' . $e->getMessage());
            return false;
        }
    }
    // course transaction functions
    public function get_course_transaction($conditions = [])
    {
        if (!empty($conditions)) {
            $this->db->where($conditions);
        }

        $query = $this->db->get('course_transaction');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function course_transaction($data)
    {
        if ($this->db->insert('course_transaction', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }


    public function check_already_paid($conditions = [])
    {
        if (!empty($conditions['student_id']) && !empty($conditions['course_id']) && !empty($conditions['center_id'])) {

            $this->db->order_by('center_id', 'ASC');

            $this->db->where('student_id', $conditions['student_id']);
            $this->db->where('course_id', $conditions['course_id']);
            $this->db->where('center_id', $conditions['center_id']);
            $this->db->where('status', 0);
            $query = $this->db->get('course_transaction');

            if ($query->num_rows() > 0) {
                return true;
            }
        }

        return false;
    }
    public function get_transaction_data()
    {
        $this->db->select('
            course_transaction.*, 
            student.name as student_name, 
            center.city as center_city, 
            courses.course_name, 
            courses.photo
        ');
        $this->db->from('course_transaction');
        $this->db->join('student', 'student.studentID = course_transaction.student_id', 'inner');
        $this->db->join('center', 'center.id = course_transaction.center_id', 'inner');
        $this->db->join('courses', 'courses.id = course_transaction.course_id', 'inner'); 
        $this->db->order_by('course_transaction.center_id', 'ASC');
    
        $query = $this->db->get();
    
        return $query->result_array();
    }
    public function get_transaction_stu_data_by_id($student_id = null)
{
    $this->db->select('
        course_transaction.*, 
        student.name as student_name, 
        center.city as center_city, 
        courses.course_name, 
        courses.photo
    ');
    $this->db->from('course_transaction');
    $this->db->join('student', 'student.studentID = course_transaction.student_id', 'inner');
    $this->db->join('center', 'center.id = course_transaction.center_id', 'inner');
    $this->db->join('courses', 'courses.id = course_transaction.course_id', 'inner'); 
    $this->db->where('course_transaction.student_id', $student_id);

    $this->db->order_by('course_transaction.center_id', 'ASC');

    $query = $this->db->get();

    if ($query->num_rows() == 0) {
        return [];
    }

    return $query->result_array();
}

}
