<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paid_courses extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Offercourses_m");
        $language = $this->session->userdata('lang');
        $this->lang->load('course', $language);
    }
    
    public function index()
    {
        $user_role = $this->session->userdata('usertypeID');

        if ($user_role == '3') {

            $student_id = $this->session->userdata('loginuserID');
            $this->data['transaction_data'] = $this->Offercourses_m->get_transaction_stu_data_by_id($student_id);
            // dd($this->data['transaction_data']);
            $this->data["subview"] = "paid_courses/stud_index";
        } else {
            $this->data['transaction_data'] = $this->Offercourses_m->get_transaction_data();
            // dd($this->data['transaction_data']);
            $this->data["subview"] = "paid_courses/index";
        }


        $this->load->view('_layout_main', $this->data);
    }
}
