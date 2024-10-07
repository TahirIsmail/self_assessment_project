<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends Admin_Controller
{
    public $load;
    public $session;
    public $data;
    public $lang;
    public $Contactus_m;
    public $form_validation;
    public $input;
    public $recaptcha;
    public $usertype_m;
    public $user_m;
    public $loginlog_m;
    public $updatechecker;
    public $db;

    function __construct()
    {
        parent::__construct();
        $this->session->set_userdata($this->data["siteinfos"]->language);
        $language = $this->session->userdata('lang');
        $this->load->model('contactus_m');
        $this->load->helper('email');
    }

    public function page()
    {
        $this->signup_m->signup();
        redirect(base_url("contactus/index"));
    }

    public function index()
    {
        $this->load->view('contactus/index');
        $this->session->sess_destroy();
    }

    public function send()
    {
        
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        
        $email_message = "Name: $name\n";
        $email_message .= "Email: $email\n";
        $email_message .= "Subject: $subject\n";
        $email_message .= "Message: $message\n";

        $recipient = 'qazikashif745@gmail.com';
        if (send_email($recipient, $subject, $email_message)) {
            echo 'send';exit;
            $this->session->set_flashdata('message', 'Email sent successfully.');
        } else {
            echo 'fail';exit;
            $this->session->set_flashdata('message', 'Failed to send email.');
        }
        redirect('contactus/index');
    }

}
