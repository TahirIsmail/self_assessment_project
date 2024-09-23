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
        $this->data['headerassets'] = array(
            'css' => array(
                'assets/select2/css/select2.css',
                'assets/select2/css/select2-bootstrap.css'
            ),
            'js' => array(
                'assets/select2/select2.js'
            )
        );

        // Check user role and set student ID for student users
        if ($this->session->userdata('role') === 'student') {
            $student_id = $this->session->userdata('id'); // Assuming session stores user ID
            $this->data['transaction_data'] = $this->Offercourses_m->get_transaction_stu_data($student_id);
        } else {
            $this->data['transaction_data'] = $this->Offercourses_m->get_transaction_data();
        }

        $this->data["subview"] = "paid_courses/index"; 
        $this->load->view('_layout_main', $this->data); 
    }
}
