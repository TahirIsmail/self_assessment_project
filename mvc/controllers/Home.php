<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PaymentGateway/PaymentGateway.php');

class home extends Admin_Controller
{
    public $load;
    public $session;
    public $data;
    public $lang;
    public $signin_m;
    public $form_validation;
    public $input;
    public $recaptcha;
    public $usertype_m;
    public $user_m;
    public $loginlog_m;
    public $updatechecker;
    public $db;
    /*
| -----------------------------------------------------
| PRODUCT NAME: 	INILABS SCHOOL MANAGEMENT SYSTEM
| -----------------------------------------------------
| AUTHOR:			INILABS TEAM
| -----------------------------------------------------
| EMAIL:			info@inilabs.net
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY INILABS IT
| -----------------------------------------------------
| WEBSITE:			http://inilabs.net
| -----------------------------------------------------
*/
    public $payment_gateway;
    public $payment_gateway_array;
    function __construct()
    {
        parent::__construct();
        $this->load->model("online_exam_m");
        $this->load->model("classes_m");
        $this->load->model("section_m");
        $this->load->model("subject_m");
        $this->load->model("studentgroup_m");
        $this->load->model('online_exam_payment_m');
        $this->load->model("usertype_m");
        $this->load->model("exam_type_m");
        $this->load->model("question_bank_m");
        $this->load->model("question_level_m");
        $this->load->model("question_group_m");
        $this->load->model("question_type_m");
        $this->load->model("question_option_m");
        $this->load->model("question_answer_m");
        $this->load->model("online_exam_question_m");
        $this->load->model("exam_type_m");
        $this->load->model("instruction_m");
        $this->load->model("student_m");
        $this->load->model('payment_gateway_m');
        $this->load->model('payment_gateway_option_m');
        $this->load->model('online_exam_user_answer_m');
        $this->load->model('online_exam_user_status_m');
        $this->load->model('online_exam_user_answer_option_m');
        $language = $this->session->userdata('lang');
        $this->lang->load('online_exam', $language);
        $this->payment_gateway       = new PaymentGateway();
        $this->payment_gateway_array = pluck($this->payment_gateway_m->get_order_by_payment_gateway(['status' => 1]), 'status', 'slug');
    }

    public function index()
    {

        
        // dd($this->session->userdata());
        $loginuserID = $this->session->userdata('loginuserID');

        $this->data['course_names'] = $this->Offercourses_m->get_course_names();
        // dd($this->data['course_names']);

        $this->data['payment_settings'] = $this->payment_gateway_m->get_order_by_payment_gateway(['status' => 1]);
        $this->data['payment_options']  = pluck($this->payment_gateway_option_m->get_payment_gateway_option(), 'payment_value', 'payment_option');


        $this->data['payments']         = pluck_multi_array($this->online_exam_payment_m->get_order_by_online_exam_payment([
            'usertypeID' => $this->session->userdata('usertypeID'),
            'userID'     => $this->session->userdata('loginuserID')
        ]), 'obj', 'online_examID');

        $this->data['paindingpayments'] = pluck($this->online_exam_payment_m->get_order_by_online_exam_payment([
            'usertypeID' => $this->session->userdata('usertypeID'),
            'userID'     => $this->session->userdata('loginuserID'),
            'status'     => 0
        ]), 'obj', 'online_examID');


       
        $this->data['mockTests']        = $this->section_m->get_all_courses_details();
        // $this->data["subview"]         = "signin/index";
        $this->load->view('landingPage/index', $this->data);
       
    }

    public function course()
    {
        $this->load->library('session');
        if ($this->session->userdata()) {
            redirect('online_exam/index');
        } else {
            redirect('signin/index');
        }
    }


    public function check_payment()
    {
    
        $studentID = $this->session->userdata('loginuserID');
        $sectionID = $this->input->post('sectionID');

        $is_already_paid = $this->section_m->is_student_enrolled($sectionID, $studentID);
        echo json_encode($is_already_paid);
        exit;
    }


    protected function payment_rules($method): array //done
    {
        return $this->payment_gateway->gateway($method)->payment_rules([
            [
                'field' => 'payment_method',
                'label' => $this->lang->line("take_exam_payment_method"),
                'rules' => 'trim|required|xss_clean|max_length[11]'
            ],
            [
                'field' => 'paymentAmount',
                'label' => $this->lang->line("take_exam_payment_amount"),
                'rules' => 'trim|required|xss_clean|max_length[16]'
            ]
        ]);
    }


    public function payment(){
       
        $rules = $this->payment_rules($this->input->post('payment_method'));
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
            // dd($this->input->post('course_slug'));
            $this->data['validationOnlineExamID'] = $this->input->post('course_slug');
            $this->data['validationErrors']       = $this->form_validation->error_array();
            $this->index();

        } elseif ($this->input->post('course_slug')) {
            $invoice_data = $this->online_exam_m->get_single_course_detail(['slug' => $this->input->post('course_slug')]);
           
            if (($invoice_data->paid == 1) && ((float)$invoice_data->cost == 0)) {
                $this->session->set_flashdata('error', 'Mock Test amount can not be zero');
                redirect(base_url('home/index'));
            }

            
            $course_payment_details = $this->online_exam_m->payment_details(['studentID' => $this->session->userdata('loginuserID'), 'section_id' => $invoice_data->sectionID]);
            
            if ($course_payment_details) {
                $this->session->set_flashdata('error', 'This mock test price already paid');
                redirect(base_url('home/index'));
            }

         

            $this->payment_gateway->gateway($this->input->post('payment_method'))->payment($this->input->post(), $invoice_data);

        } else {
            $this->session->set_flashdata('error', 'Mock Test does not found');
            redirect(base_url('home/index'));
        }
    }
}
