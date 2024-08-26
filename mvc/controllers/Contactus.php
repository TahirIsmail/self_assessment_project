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
}
