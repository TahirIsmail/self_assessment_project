<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Course extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_m'); 
    }

    public function index($slug = null) 
    {
        $this->data['course'] = $this->course_m->get_course_by_slug($slug);
        $this->load->view('course/index', $this->data);
    }
}
?>
