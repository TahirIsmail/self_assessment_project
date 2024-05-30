<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeController extends Admin_Controller {
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
	function __construct() {
		parent::__construct();
        // $this->load->model("signin_m");
        // $this->load->model("user_m");
        // $this->load->model("usertype_m");
        // $this->load->model("loginlog_m");
        // $this->load->helper('cookie');
        // $this->load->library('updatechecker');

        $this->session->set_userdata($this->data["siteinfos"]->language);
        $language = $this->session->userdata('lang');
        // $this->lang->load('signin', $language);
        // if ( !isset($this->data["siteinfos"]->captcha_status) ) {
        //     $this->data["siteinfos"]->captcha_status = 1;
        // }

	}

	public function index() {
     
     

     
            $this->data["subview"]         = "signin/index";
            $this->load->view('landingPage/index', $this->data);
            $this->session->sess_destroy();
	}

	
}



