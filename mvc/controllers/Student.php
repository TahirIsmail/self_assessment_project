<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Student extends Admin_Controller {
    public $load;
    public $session;
    public $lang;
    public $form_validation;
    public $uri;
    public $student_m;
    public $input;
    public $upload;
    public $upload_data;
    public $data;
    public $section_m;
    public $parents_m;
    public $db;
    public $classes_m;
    public $studentextend_m;
    public $studentrelation_m;
    public $subject_m;
    public $document_m;

    function __construct () {
        parent::__construct();
        $this->load->model("student_m");
        $this->load->model("parents_m");
        $this->load->model("teacher_m");
        $this->load->model("section_m");
        $this->load->model("classes_m");
        $this->load->model('studentrelation_m');
        $this->load->model('studentgroup_m');
        $this->load->model('studentextend_m');
        $this->load->model('document_m');
        $this->load->model('subject_m');
        $this->load->model('online_exam_user_status_m');
        $this->load->model('online_exam_m');
        $language = $this->session->userdata('lang');
        $this->lang->load('student', $language);
    }

    protected function rules() {
        return array(
            array(
                'field' => 'Fname',
                'label' => $this->lang->line("student_Fname"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
            ),
            array(
                'field' => 'lname',
                'label' => $this->lang->line("student_lname"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
            ),
            array(
                'field' => 'agent_id',
                'label' => $this->lang->line("student_agent_id"),
                'rules' => 'trim|required|numeric|max_length[11]|xss_clean'
            ),
            array(
                'field' => 'contact',
                'label' => $this->lang->line("student_contact"),
                'rules' => 'trim|required|xss_clean|max_length[15]'
            ),
            array(
                'field' => 'address',
                'label' => $this->lang->line("student_address"),
                'rules' => 'trim|required|xss_clean|max_length[200]'
            ),
            array(
                'field' => 'email',
                'label' => $this->lang->line("student_email"),
                'rules' => 'trim|required|valid_email|max_length[100]|xss_clean|callback_unique_email'
            ),
            array(
                'field' => 'remark',
                'label' => $this->lang->line("student_remark"),
                'rules' => 'trim|max_length[128]|xss_clean'
            )
        );
    }

	public function add() {
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/datepicker/datepicker.css',
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/datepicker/datepicker.js',
				'assets/select2/select2.js'
			)
		);
	
		$this->data['classes'] = $this->classes_m->get_classes();
		$this->data['sections'] = $this->section_m->get_section();
		$this->data['parents'] = $this->parents_m->get_parents();
		$this->data['studentgroups'] = $this->studentgroup_m->get_studentgroup();
	
		$classesID = $this->input->post("classesID");
	
		if($classesID != 0) {
			$this->data['sections'] = $this->section_m->get_order_by_section(array("classesID" =>$classesID));
			$this->data['optionalSubjects'] = $this->subject_m->get_order_by_subject(array("classesID" =>$classesID, 'type' => 0));
		} else {
			$this->data['sections'] = "empty";
			$this->data['optionalSubjects'] = 'empty';
		}
	
		$this->data['sectionID'] = $this->input->post("sectionID");
		$this->data['optionalSubjectID'] = 0;
	
		if($_POST !== []) {
			$rules = $this->rules();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$this->data["subview"] = "student/add";
				$this->load->view('_layout_main', $this->data);
			} else {
				$array = array();
				$array["agent_id"] = $this->input->post("agent_id");
				$array["Fname"] = $this->input->post("Fname");
				$array["lname"] = $this->input->post("lname");
				$array["contact"] = $this->input->post("contact");
				$array["email"] = $this->input->post("email");
				$array["address"] = $this->input->post("address");
				$array["remarks"] = $this->input->post("remarks");
				$array["photo"] = $this->upload_data['file']['file_name'];
				$array["create_date"] = date("Y-m-d h:i:s");
				$array["create_userID"] = $this->session->userdata('loginuserID');
				$array["create_username"] = $this->session->userdata('username');
				$array["create_usertype"] = $this->session->userdata('usertype');
				$array["active"] = 1;
	
				$this->student_m->insert_student($array);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("student/index"));
			}
		} else {
			$this->data["subview"] = "student/add";
			$this->load->view('_layout_main', $this->data);
		}
	}
	

    public function edit() {
        $this->data['headerassets'] = array(
            'css' => array(
                'assets/datepicker/datepicker.css',
                'assets/select2/css/select2.css',
                'assets/select2/css/select2-bootstrap.css'
            ),
            'js' => array(
                'assets/datepicker/datepicker.js',
                'assets/select2/select2.js'
            )
        );
        $usertype = $this->session->userdata("usertype");
        $schoolyearID = $this->session->userdata('defaultschoolyearID');
        $studentID = htmlentities((string)escapeString($this->uri->segment(3)));

        if ((int)$studentID) {
            $this->data['classes'] = $this->classes_m->get_classes();
            $this->data['student'] = $this->student_m->get_single_student(array('studentID' => $studentID, 'schoolyearID' => $schoolyearID));

            $this->data['parents'] = $this->parents_m->get_parents();
            $this->data['studentgroups'] = $this->studentgroup_m->get_studentgroup();

            if ($this->data['student']) {
                $classesID = $this->data['student']->classesID;
                $this->data['sections'] = $this->section_m->get_order_by_section(array('classesID' => $classesID));
                $this->data['optionalSubjects'] = $this->subject_m->get_order_by_subject(array("classesID" => $classesID, 'type' => 0));
                $this->data['optionalSubjectID'] = $this->input->post('optionalSubjectID') ? $this->input->post('optionalSubjectID') : 0;
            }

            if ($this->data['student']) {
                if ($_POST !== []) {
                    $rules = $this->rules();
                    unset($rules[21]);
                    $this->form_validation->set_rules($rules);
                    if ($this->form_validation->run() == FALSE) {
                        $this->data["subview"] = "student/edit";
                        $this->load->view('_layout_main', $this->data);
                    } else {
                        $array = array();
                        $array["Fname"] = $this->input->post("Fname");
                        $array["lname"] = $this->input->post("lname");
                        $array["agent_id"] = $this->input->post("agent_id");
                        $array["contact"] = $this->input->post("contact");
                        $array["email"] = $this->input->post("email");
                        $array["address"] = $this->input->post("address");
                        $array["remark"] = $this->input->post("remark");

                        $array['photo'] = $this->upload_data['file']['file_name'];

                        $array["dob"] = $this->input->post('dob') ? date("Y-m-d", strtotime((string)$this->input->post("dob"))) : NULL;

                        $this->student_m->update_student($array, $studentID);
                        $this->session->set_flashdata('success', $this->lang->line('menu_success'));
                        redirect(base_url("student/index/"));
                    }
                } else {
                    $this->data["subview"] = "student/edit";
                    $this->load->view('_layout_main', $this->data);
                }
            } else {
                $this->data["subview"] = "error";
                $this->load->view('_layout_main', $this->data);
            }
        } else {
            $this->data["subview"] = "error";
            $this->load->view('_layout_main', $this->data);
        }
    }

    public function index() {
        $usertypeID   = $this->session->userdata('usertypeID');
        $loginuserID  = $this->session->userdata("loginuserID");
        $schoolyearID = $this->session->userdata('defaultschoolyearID');

        if ($usertypeID == 3) {
            if (permissionChecker('student_view')) {
                $singleStudent = $this->student_m->get_single_student(array("studentID" => $loginuserID, 'schoolyearID' => $schoolyearID));
                if (inicompute($singleStudent)) {
                    $this->data['students'] = $this->student_m->get_order_by_student(array('classesID' => $singleStudent->classesID, 'schoolyearID' => $schoolyearID));
                    if (inicompute($this->data['students'])) {
                        $sections = $this->section_m->get_order_by_section(array("classesID" => $singleStudent->classesID));
                        if (inicompute($sections)) {
                            foreach ($sections as $section) {
                                $this->data['allsection'][$section->sectionID] = $this->student_m->get_order_by_student(array('classesID' => $singleStudent->classesID, "sectionID" => $section->sectionID, 'schoolyearID' => $schoolyearID));
                            }
                        }
                    } else {
                        $this->data['students'] = NULL;
                    }
                    $this->data['sections'] = $sections;

                    $this->data["subview"] = "student/index_parents";
                    $this->load->view('_layout_main', $this->data);
                } else {
                    $this->data["subview"] = "error";
                    $this->load->view('_layout_main', $this->data);
                }
            } else {
                $loginuserID = $this->session->userdata("loginuserID");
                $student = $this->student_m->get_single_student(array('studentID' => $loginuserID, 'schoolyearID' => $schoolyearID));
                if (inicompute($student)) {
                    $this->data['classesID'] = $student->classesID;
                    $this->data['studentID'] = $student->studentID;
                    $this->getView($student->studentID, $student->classesID);
                } else {
                    $this->data["subview"] = "error";
                    $this->load->view('_layout_main', $this->data);
                }
            }
        } elseif ($usertypeID == 4) {
            $parents = $this->parents_m->get_single_parents(array('parentsID' => $loginuserID));
            if (inicompute($parents)) {
                $this->data['students'] = $this->student_m->get_order_by_student(array('parentID' => $loginuserID, 'schoolyearID' => $schoolyearID));
                $this->data["subview"] = "student/index_parents";
                $this->load->view('_layout_main', $this->data);
            } else {
                $this->data["subview"] = "error";
                $this->load->view('_layout_main', $this->data);
            }
        } else {
            $this->data['headerassets'] = array(
                'css' => array(
                    'assets/select2/css/select2.css',
                    'assets/select2/css/select2-bootstrap.css'
                ),
                'js' => array(
                    'assets/select2/select2.js'
                )
            );

            $classesID = htmlentities((string)escapeString($this->uri->segment(3)));
            $this->data['students'] = $this->student_m->get_order_by_student();
            if (inicompute($this->data['students'])) {
                $sections = $this->section_m->get_order_by_section(array("classesID" => $classesID));
                if (inicompute($sections)) {
                    foreach ($sections as $section) {
                        $this->data['allsection'][$section->sectionID] = $this->student_m->get_order_by_student(array('classesID' => $classesID, "sectionID" => $section->sectionID, 'schoolyearID' => $schoolyearID));
                    }
                }
                $this->data['sections'] = $sections;
            } else {
                $this->data['students'] = [];
            }
            $this->data['set'] = $classesID;
            $this->data['classes'] = $this->classes_m->get_classes();

            $this->data["subview"] = "student/index";
            $this->load->view('_layout_main', $this->data);
        }
    }

    public function delete() {
        $studentID = htmlentities((string)escapeString($this->uri->segment(3)));
        $classesID = htmlentities((string)escapeString($this->uri->segment(4)));
        $usertype = $this->session->userdata("usertype");
        $schoolyearID = $this->session->userdata('defaultschoolyearID');
        if ((int)$studentID && (int)$classesID) {
            $this->data['student'] = $this->student_m->get_single_student(array('studentID' => $studentID, 'schoolyearID' => $schoolyearID));
            if (inicompute($this->data['student'])) {
                if (config_item('demo') == FALSE && ($this->data['student']->photo != 'default.png' && $this->data['student']->photo != 'defualt.png')) {
                    if (file_exists(FCPATH . 'uploads/images/' . $this->data['student']->photo)) {
                        unlink(FCPATH . 'uploads/images/' . $this->data['student']->photo);
                    }
                }
                $this->student_m->delete_student($studentID);
                $this->studentextend_m->delete_studentextend_by_studentID($studentID);
                $this->session->set_flashdata('success', $this->lang->line('menu_success'));
                redirect(base_url("student/index/$classesID"));
            } else {
                redirect(base_url("student/index"));
            }
        } else {
            redirect(base_url("student/index/$classesID"));
        }
    }
}
