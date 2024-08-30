<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Admin_Controller {
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
        $this->load->model("section_m");
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
     
            $this->data['mockTests']        = $this->section_m->get_all_courses_details();
            // dd($this->data['mockTests']);
            $this->data["subview"]         = "signin/index";
            $this->load->view('landingPage/index', $this->data);
	}

    public function course() {
    //    dd('course');
        $this->load->library('session');
    
        // Check if the user is logged in
        if ($this->session->userdata('logged_in')) {
            // Redirect to the online exam page
            redirect('online_exam/index');
        } else {
            // Redirect to the sign-in page
            redirect('signin/index');
        }
    }

	
}



