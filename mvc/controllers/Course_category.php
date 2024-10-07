<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Course_category extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Offercourses_m");
        $this->load->model('classes_m');
        $this->load->model('studentrelation_m');
        $this->load->model('teacher_m');
        $this->load->model('subject_m');
		
        $language = $this->session->userdata('lang');
        $this->lang->load('course', $language);
    }


    public function index() {
        $categories = $this->Offercourses_m->get_categories();
        $this->data['categories'] = $categories;
		$this->data["subview"] = "Category/index";
		$this->load->view('_layout_main', $this->data);
	}
    protected function rules() {
		return array(
			array(
				'field' => 'category_name', 
				'label' => $this->lang->line("category_name"), 
				'rules' => 'trim|required|xss_clean|max_length[60]'
			), 
			
		);
	}
    public function add() {
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/select2/select2.js'
			)
		);

		
		if($_POST !== []) {
			$rules = $this->rules();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) { 
				$this->data["subview"] = "category/add";
				$this->load->view('_layout_main', $this->data);			
			} else {
				$array = array(
					"category_name" => $this->input->post("category_name"),
					"create_userID" => $this->session->userdata('loginuserID'),
					"create_username" => $this->session->userdata('username'),
				);

				$this->Offercourses_m->insert_category($array);
				$this->session->set_flashdata('success', $this->lang->line('menu_success'));
				redirect(base_url("course_category/index"));
			}
		} else {
			$this->data["subview"] = "category/add";
			$this->load->view('_layout_main', $this->data);
		}
	}




    public function edit() {
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/select2/select2.js'
			)
		);
		$id = htmlentities((string) escapeString($this->uri->segment(3)));
		if((int)$id !== 0) {			
			$this->data['category'] = $this->Offercourses_m->get_category($id);            
			if($this->data['category']) {				
				if($_POST !== []) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data["subview"] = "category/edit";
						$this->load->view('_layout_main', $this->data);			
					} else {
						$array = array(
							"category_name" => $this->input->post("category_name"),
						);
						$this->Offercourses_m->update_category($array, $id);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("course_category/index"));
					}
				} else {
					$this->data["subview"] = "category/edit";
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


    public function delete() {
		$id = htmlentities((string) escapeString($this->uri->segment(3)));
		if((int)$id !== 0) {
			$this->Offercourses_m->delete_category($id);
			$this->session->set_flashdata('success', $this->lang->line('menu_success'));
			redirect(base_url("course_category/index"));
		} else {
			redirect(base_url("course_category/index"));
		}
	}



}
