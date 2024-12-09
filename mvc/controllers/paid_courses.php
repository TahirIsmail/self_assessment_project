<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paid_courses extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Offercourses_m");
    }

    public function index()
    {
       
        $user_role = $this->session->userdata('usertypeID');

        if ($user_role == '3') { 
            
            $student_id = $this->session->userdata('loginuserID');
            $this->data['transaction_data'] = $this->Offercourses_m->get_transaction_stu_data_by_id($student_id);

            
            $this->data["subview"] = "paid_courses/stud_index"; 
        } else if ($user_role == '1') { 
            $this->data['transaction_data'] = $this->Offercourses_m->get_transaction_data();

           
            $this->data["subview"] = "paid_courses/index"; 
        } else {
           
            show_error('Unauthorized access.');
        }

        
        $this->load->view('_layout_main', $this->data);
    }
}
