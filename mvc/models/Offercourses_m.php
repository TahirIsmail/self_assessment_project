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
        $this->db->insert('courses', $data);
        return $this->db->insert_id();  
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
        $this->db->select('courses.id as id, courses.course_name as name, courses.slug, courses.image, courses.cost, courses.paid');
        $this->db->from('courses');
        $this->db->join('student_enrollment_mock_test', 'courses.id = student_enrollment_mock_test.course_id');
        $this->db->where('student_enrollment_mock_test.studentID', $student_id);
        $this->db->where('student_enrollment_mock_test.is_expired', 0);
        $query = $this->db->get();
        return $query->result();
    }

   
    public function get_unenrolled_courses($student_id)
    {
        $this->db->select('courses.id as id, courses.course_name as name, courses.slug, courses.image, courses.cost, courses.paid');
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
                    'note' => $row['note'],
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

    // Get all course details
    public function get_all_course_details()
    {
        $query = $this->db->get('courses');
        return $query->result_array();
    }

    // Generic get method for courses
    public function general_get_course($array = NULL, $signal = FALSE)
    {
        return parent::get($array, $signal);
    }

    // Generic get order by method for courses
    public function general_get_order_by_course($array = NULL)
    {
        return parent::get_order_by($array);
    }

    // Get single course by array
    public function get_single_course($array)
    {
        return parent::get_single($array);
    }

    // Get courses by array (for more than one)
    public function get_course($array = NULL, $signal = FALSE)
    {
        return parent::get($array, $signal);
    }

    // Get course by slug
    public function get_course_record($slug = NULL)
    {
        $this->db->where($slug);
        $query = $this->db->get('courses');
        return $query->result();
    }

    // Get courses in order
    public function get_order_by_course($array = NULL)
    {
        return parent::get_order_by($array);
    }

    // Insert course and return the ID
    public function insert_course_return_record($array)
    {
        $id = parent::insert($array);
        return $id;
    }

    // Update course data
    public function update_course($data, $id = NULL)
    {
        parent::update($data, $id);
        return $id;
    }

    // Delete course
    public function delete_course($id)
    {
        parent::delete($id);
    }
}
