<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Section_m extends MY_Model
{

	protected $_table_name = 'section';
	protected $_primary_key = 'sectionID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "sectionID asc";

	public function __construct()
	{
		parent::__construct();
	}

	public function get_join_section($id)
	{
		$this->db->select('*');
		$this->db->from('section');
		$this->db->join('teacher', 'section.teacherID = teacher.teacherID', 'LEFT');
		$this->db->where('section.classesID', $id);
		$query = $this->db->get();
		return $query->result();
	}


	public function get_enrolled_sections($student_id) {
        $this->db->select('section.sectionID as id, section.section as name, section.slug, section.image, section.cost, section.paid');
        $this->db->from('section');
        $this->db->join('student_enrollment_mock_test', 'section.sectionID = student_enrollment_mock_test.section_id');
        $this->db->where('student_enrollment_mock_test.studentID', $student_id);        
        $this->db->or_where('student_enrollment_mock_test.is_expired', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_unenrolled_sections($student_id) {
        $this->db->select('section.sectionID as id, section.section as name, section.slug, section.image, section.cost, section.paid');
        $this->db->from('section');
        $this->db->join('student_enrollment_mock_test', 'section.sectionID = student_enrollment_mock_test.section_id AND student_enrollment_mock_test.studentID = ' . $student_id, 'left');

        // Fixing the SQL syntax issue
        $this->db->group_start(); // Start grouping
        $this->db->where('student_enrollment_mock_test.section_id IS NULL');
        $this->db->group_end();

        $query = $this->db->get();
        return $query->result();
    }

	public function is_student_enrolled($section_id, $student_id) {
		$this->db->where('section_id', $section_id);
		$this->db->where('studentID', $student_id);
		$this->db->where('is_expired', 0); // Check if the enrollment is not expired
		$query = $this->db->get('student_enrollment_mock_test');
	
		return $query->num_rows() > 0;
	}


	public function get_join_section_units($id)
	{
		// Select fields you need from section and subject tables
		$this->db->select('section.*, subject.*, classes.*');
		$this->db->from('section');
		$this->db->join('classes', 'classes.classesID = section.classesID', 'LEFT');
		$this->db->join('subject', 'subject.course_id = section.sectionID', 'LEFT');
		$this->db->where('section.classesID', $id);
		$query = $this->db->get();

		// Get the results as an array
		$result = $query->result_array();

		// Initialize an empty array to hold the final structured data
		$sectionData = [];

		// Loop through the results and structure the data
		foreach ($result as $row) {
			// Check if the section already exists in the array
			if (!isset($sectionData[$row['sectionID']])) {
				// If not, add the section with an empty subjects array
				$sectionData[$row['sectionID']] = [
					'sectionID' => $row['sectionID'],
					'section' => $row['section'],
					'category' => $row['classes'],
					'note' => $row['note'],
					'subjects' => []
				];
			}

			// Add the subject to the section's subjects array
			$sectionData[$row['sectionID']]['subjects'][] = [
				'subjectID' => $row['subjectID'],
				'subject' => $row['subject'], // replace with your actual field names
				'course_id' => $row['course_id']
			];
		}

		// Since sectionData is indexed by sectionID, we might want to reset the keys
		// to return it as a simple array
		$sectionData = array_values($sectionData);
		return $sectionData;
	}

	public function get_all_courses_details() {
		$query = $this->db->get('section');
		return $query->result_array();
	}


	public function general_get_section($array = NULL, $signal = FALSE)
	{
		$query = parent::get($array, $signal);
		return $query;
	}

	public function general_get_order_by_section($array = NULL)
	{
		$query = parent::get_order_by($array);
		return $query;
	}

	public function get_single_section($array)
	{
		$query = parent::get_single($array);
		return $query;
	}

	public function get_section($array = NULL, $signal = FALSE)
	{
		$query = parent::get($array, $signal);
		return $query;
	}

	public function get_section_record($slug = NULL)
	{
		$this->db->where($slug);
		$query = $this->db->get('section');
		$result = $query->result();

		return $result;
	}



	public function get_order_by_section($array = NULL)
	{
		$query = parent::get_order_by($array);
		return $query;
	}

	public function insert_section($array)
	{
		$error = parent::insert($array);
		return TRUE;
	}

	public function insert_section_return_record($array)
	{
		// $error = parent::insert($array);
		// return TRUE;
		$id = parent::insert($array); // Call the insert method and get the ID
		return $id;
	}





	public function update_section($data, $id = NULL)
	{
		parent::update($data, $id);
		return $id;
	}

	public function delete_section($id)
	{
		parent::delete($id);
	}
}
