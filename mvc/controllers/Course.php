<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . 'libraries/PaymentGateway/PaymentGateway.php');
class Course extends Admin_Controller
{
    public $load;
    public $session;
    public $data;
    public $lang;
    public $course_m;
    public $form_validation;
    public $input;
    public $recaptcha;
    public $usertype_m;
    public $user_m;
    public $loginlog_m;
    public $updatechecker;
    public $db;
    public $payment_gateway;
    public $payment_gateway_array;
    function __construct()
    {
        parent::__construct();
        $this->session->set_userdata($this->data["siteinfos"]->language);
        $language = $this->session->userdata('lang');
        $this->load->model('course_m');
        $this->load->model('offercourses_m');
        $this->load->model('payment_gateway_m');
        $this->load->model('payment_gateway_option_m');
        $language = $this->session->userdata('lang');
        $this->lang->load('online_exam', $language);
        $this->payment_gateway       = new PaymentGateway();
        $this->payment_gateway_array = pluck($this->payment_gateway_m->get_order_by_payment_gateway(['status' => 1]), 'status', 'slug');
    }

    public function page()
    {
        $this->signup_m->signup();
        redirect(base_url("course/index"));
    }

    public function index($slug = null) 
    {
        $loginuserID = $this->session->userdata('loginuserID');
        $this->data['payment_settings'] = $this->payment_gateway_m->get_order_by_payment_gateway(['status' => 1]);
        $this->data['payment_options']  = pluck($this->payment_gateway_option_m->get_payment_gateway_option(), 'payment_value', 'payment_option');

        $this->data['course_names'] = $this->Offercourses_m->get_course_names();
        $this->data['course_data'] = $this->offercourses_m->get_course_by_slug($slug);

        $this->data['is_logged_in'] = $loginuserID;
        
        // dd($this->data['course_data']);
        $this->data['slug'] = $slug;
        $this->data['all_courses'] = $this->offercourses_m->get_all_courses();
        // dd($this->data['all_courses']);
        $this->load->view('course/index', $this->data);
    }



    public function payment()
    {
        $course_slug = $this->input->post('course_slug');
        $center_course_id = $this->input->post('center_course_id');

        $this->form_validation->set_rules('payment_method', $this->lang->line("take_exam_payment_method"), 'trim|required|xss_clean|max_length[11]');
        $this->form_validation->set_rules('paymentAmount', $this->lang->line("take_exam_payment_amount"), 'trim|required|xss_clean|max_length[16]');

        if ($this->form_validation->run() == FALSE) {
            
            $this->data['validationOnlineExamID'] = $course_slug;
            $this->data['validationErrors'] = $this->form_validation->error_array();
            redirect(base_url('course/index/' . $course_slug));


        } elseif ($course_slug) {

            $course_details = $this->offercourses_m->get_course_details($course_slug);
            $course_payment_details = $this->offercourses_m->get_course_payment_details($center_course_id);

        //   dd($course_payment_details[0]['course_price'] > '0.00');

            if ($course_payment_details && $course_payment_details[0]['course_price'] <= '0.00') {
                $this->session->set_flashdata('error', 'Course amount can not be zero');
                redirect(base_url('course/index/' . $course_slug));
            }

            // dd($course_payment_details);
            $array = [
                'student_id' => $this->input->post('student_id'),
                'course_id'  => $course_payment_details[0]['course_pid'],
                'center_id'  => $course_payment_details[0]['center_id']
            ];
            $already_exist = $this->offercourses_m->check_already_paid($array);

            if ($already_exist) {
                $this->session->set_flashdata('error', 'Course price already paid');
                redirect(base_url('course/index/' . $course_slug));
            }


            $this->payment_gateway->gateway($this->input->post('payment_method'))->course_payment($this->input->post(), $course_payment_details);
        } else {
            
            $this->session->set_flashdata('error', 'Course does not found');
            redirect(base_url('course/index/' . $course_slug));
        }
    }
}
