<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Center extends Admin_Controller
{
	public $load;
	public $session;
	public $lang;
	public $data;
	public $uri;
	public $form_validation;
	public $input;
	public $Center_m;
	public $studentrelation_m;
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
	function __construct()
	{
		parent::__construct();
		$this->load->model("Center_m");
		$this->load->model('classes_m');
		$this->load->model('studentrelation_m');
		$this->load->model('teacher_m');
		$this->load->model('subject_m');
		$language = $this->session->userdata('lang');
		$this->lang->load('section', $language);
	}




}

