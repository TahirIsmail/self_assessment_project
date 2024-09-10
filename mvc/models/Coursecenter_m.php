<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Coursecenter_m extends CI_Model {

    public function add_course_to_center($data) {
      
        return $this->db->insert('center_courses', $data);  
    }

    
}
