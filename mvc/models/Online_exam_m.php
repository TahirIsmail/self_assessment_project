<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Online_exam_m extends MY_Model {

    protected $_table_name = 'online_exam';
    protected $_primary_key = 'onlineExamID';
    protected $_primary_filter = 'intval';
    protected $_order_by = "onlineExamID desc";

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_online_exam($array=NULL, $signal=FALSE) 
    {
        $query = parent::get($array, $signal);
        return $query;
    }

    public function get_single_online_exam($array) 
    {
        $query = parent::get_single($array);
        return $query;
    }

    public function get_single_course_detail($array){
            $this->db->select()->from('section')->where($array);
			$query = $this->db->get();			
			return $query->row();
    }

    public function payment_details($array){
        $this->db->select()->from('student_enrollment_mock_test')->where($array);
        $query = $this->db->get();			
		return $query->row();
    }

    public function get_order_by_online_exam($array=NULL) 
    {
        $query = parent::get_order_by($array);
        return $query;
    }

    public function insert_online_exam($array) 
    {
        $id = parent::insert($array);
        return $id;
    }

    public function update_online_exam($data, $id = NULL) 
    {
        parent::update($data, $id);
        return $id;
    }

    public function delete_online_exam($id)
    {
        parent::delete($id);
    }

    public function get_online_exam_by_student($array) 
    {
        // $query = "SELECT * FROM online_exam WHERE (classID='".$array['classesID']."' || classID='0') && (sectionID='".$array['sectionID']."' || sectionID='0') && (studentgroupID='".$array['studentgroupID']."' || studentgroupID='0') && published='1' && onlineExamID='".$array['onlineExamID']."'";
        // $result = $this->db->query($query);
        // return $result->row();
        $this->db->from('online_exam');
        $this->db->where('published', '1');
        $this->db->where('onlineExamID', $array['onlineExamID']);

        // Adding conditions for classID, sectionID, and studentgroupID
        // $this->db->group_start(); // Starting a group for classID condition
        // $this->db->where('classID', $array['classesID']);
        // $this->db->or_where('classID', '0');
        // $this->db->group_end();

        // $this->db->group_start(); // Starting a group for sectionID condition
        // $this->db->where('sectionID', $array['sectionID']);
        // $this->db->group_end();

        // $this->db->group_start(); // Starting a group for studentgroupID condition
        // $this->db->where('studentgroupID', $array['studentgroupID']);
        // $this->db->or_where('studentgroupID', '0');
        // $this->db->group_end();

        // Execute the query
        $query = $this->db->get();
        return $query->row();

    }

}
