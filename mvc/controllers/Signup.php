<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends Admin_Controller
{
    public $load;
    public $session;
    public $data;
    public $lang;
    public $signup_m;
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
        $this->load->model('signup_m');
    }

    public function page()
    {
        $this->signup_m->signup();
        redirect(base_url("signup/index"));
    }

    public function index()
    {


        if ($this->data['siteinfos']->captcha_status == 0) {
            $this->load->library('recaptcha');
            $this->data['recaptcha'] = [
                'widget' => $this->recaptcha->getWidget(),
                'script' => $this->recaptcha->getScriptTag(),
            ];
        }

        if ($this->signin_m->loggedin() != FALSE) {
            redirect(base_url('dashboard/index'));
        }
        $this->data['form_validation'] = 'No';
        if ($_POST !== []) {
            $this->_setCookie();
            $rules = $this->rules();
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->data['form_validation'] = validation_errors();
                $this->data["subview"]         = "signup/index";
                $this->load->view('_layout_signin', $this->data);
            } else {
                $signinManager = $this->_signInManager();
                if ($signinManager['return']) {
                    redirect(base_url('dashboard/index'));
                } else {
                    $this->data['form_validation'] = $signinManager['message'];
                    $this->data["subview"]         = "signup/index";
                    $this->load->view('_layout_signin', $this->data);
                }
            }
        } else {
            $this->data["subview"]         = "signup/index";
            $this->load->view('_layout_signin', $this->data);
            $this->session->sess_destroy();
        }

        // $this->load->view('signup/index'); 
    }
}
