<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mock_course extends Admin_Controller
{
    public $load;
    public $session;
    public $data;
    public $lang;
    public $Mock_m;
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
        $this->load->model('Mock_m');
    }

    public function page()
    {
       dd('page');
    }

    public function index()
    {
      
        $this->load->view('mock_course/index');
        
    }
}
