<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Section extends Admin_Controller
{
	public $load;
	public $session;
	public $lang;
	public $data;
	public $uri;
	public $form_validation;
	public $input;
	public $section_m;
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
		$this->load->model("section_m");
		$this->load->model('classes_m');
		$this->load->model('studentrelation_m');
		$this->load->model('teacher_m');
		$this->load->model('subject_m');
		$language = $this->session->userdata('lang');
		$this->lang->load('section', $language);
	}

	protected function rules($ispaid = 0)
	{
		return array(
			array(
				'field' => 'section',
				'label' => $this->lang->line("section_name"),
				'rules' => 'trim|required|xss_clean|max_length[60]|callback_unique_section'
			),
			array(
				'field' => 'subject_name',
				'label' => $this->lang->line("subject_name"),
				'rules' => 'trim|required|xss_clean'
			),

			// array(
			// 	'field' => 'category',
			// 	'label' => $this->lang->line("section_category"),
			// 	'rules' => 'trim|required|max_length[128]|xss_clean'
			// ),
			// array(
			// 	'field' => 'capacity',
			// 	'label' => $this->lang->line("section_capacity"),
			// 	'rules' => 'trim|required|max_length[11]|xss_clean|numeric|callback_valid_number'
			// ),

			array(
				'field' => 'classesID',
				'label' => $this->lang->line("section_classes"),
				'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_allclasses'
			),

			// array(
			// 	'field' => 'teacherID',
			// 	'label' => $this->lang->line("section_teacher_name"),
			// 	'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_allteacher'
			// ),

			array(
				'field' => 'photo',
				'label' => $this->lang->line("section_photo"),
				'rules' => 'trim|max_length[200]|xss_clean|callback_photoupload'
			),   
			array(
				'field' => 'note',
				'label' => $this->lang->line("section_note"),
				'rules' => 'trim|max_length[200]|xss_clean'
			)
		);
		if ($ispaid == 1) {
			$rules[] = array(
				'field' => 'cost',
				'label' => $this->lang->line("online_exam_cost"),
				'rules' => 'trim|xss_clean|required|numeric|callback_unique_cost'
			);
		}
	}

	public function photoupload()
	{
		$id = htmlentities((string) escapeString($this->uri->segment(3)));
		$student = array();
		if ((int)$id !== 0) {
			$student = $this->student_m->get_student($id);
		}
		$new_file = "default.png";

		if ($_FILES["photo"]['name'] != "") {
			$file_name = $_FILES["photo"]['name'];
			$random = rand(1, 10000000000000000);
			$makeRandom = hash('sha512', $random . $this->input->post('section') . config_item("encryption_key"));
			$file_name_rename = $makeRandom;
			$explode = explode('.', (string) $file_name);
			if (inicompute($explode) >= 2) {
				$new_file = $file_name_rename . '.' . end($explode);
				$config['upload_path'] = "./uploads/images";
				$config['allowed_types'] = "gif|jpg|png";
				$config['file_name'] = $new_file;
				$config['max_size'] = '1024';
				$config['max_width'] = '3000';
				$config['max_height'] = '3000';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload("photo")) {
					$this->form_validation->set_message("photoupload", $this->upload->display_errors());
					return FALSE;
				} else {
					$this->upload_data['file'] =  $this->upload->data();
					return TRUE;
				}
			} else {
				$this->form_validation->set_message("photoupload", "Invalid file.");
				return FALSE;
			}
		} elseif (inicompute($student)) {
			$this->upload_data['file'] = array('file_name' => $student->photo);
			return TRUE;
		} else {
			$this->upload_data['file'] = array('file_name' => $new_file);
			return TRUE;
		}
	}

	public function index()
	{

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

		if ((int)$id !== 0) {
			$this->data['set'] = $id;
			$this->data['classes'] = $this->classes_m->get_classes();
			// $this->data['sections'] = $this->section_m->get_join_section($id);
			$this->data['sections'] = $this->section_m->get_join_section_units($id);
			$this->data["subview"] = "section/index";
			// dd($this->data['sections']);
			$this->load->view('_layout_main', $this->data);
		} else {

			$this->data['classes'] = $this->classes_m->get_classes();
			$this->data["subview"] = "section/search";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function add()
	{
		$this->data['headerassets'] = array(
			'css' => array(
				'assets/select2/css/select2.css',
				'assets/select2/css/select2-bootstrap.css'
			),
			'js' => array(
				'assets/select2/select2.js'
			)
		);

		$this->data['classes'] = $this->classes_m->get_classes();
		$this->data['teachers'] = $this->teacher_m->get_teacher();

		if ($_POST !== []) {
			// echo $this->input->post('photo');exit;
			$rules = $this->rules($this->input->post('ispaid'));
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() == FALSE) {
				$this->data["subview"] = "section/add";
				$this->load->view('_layout_main', $this->data);
			} else {


				$slug = create_slug($this->input->post("section"));
				$slug = ensure_unique_slug($slug, 'section');
				$image = $this->upload_data['file']['file_name'];

				$array = array(
					"section" => $this->input->post("section"),
					"slug" => $slug,
					"image" => $image,
					"category" => $this->input->post("category"),
					"classesID" => $this->input->post("classesID"),
					"note" => $this->input->post("note"),
					"create_date" => date("Y-m-d h:i:s"),
					"modify_date" => date("Y-m-d h:i:s"),
					"create_userID" => $this->session->userdata('loginuserID'),
					"create_username" => $this->session->userdata('username'),
					"create_usertype" => $this->session->userdata('usertype'),
					'paid' => $this->input->post('ispaid'),
					'validDays' => $this->input->post('validDays') != null ? $this->input->post('validDays') : '0',
					'cost' => $this->input->post('cost'),
					'judge' => $this->input->post('judge')
				);

				if ($this->input->post('ispaid') == 0) {
					$array['cost'] = 0;
				}

				$subjectNamesString = $this->input->post('subject_name');
				$subjectNamesArray = explode(',', $subjectNamesString);
				$units = [];

				// Begin transaction
				$this->db->trans_begin();

				$course_id = $this->section_m->insert_section_return_record($array);

				if ($course_id) {
					foreach ($subjectNamesArray as $unit) {
						$units[] = array(
							'subject' => $unit,
							'course_id' => $course_id,
							"create_date" => date("Y-m-d h:i:s"),
							"type"         => 1,
							"create_userID" => $this->session->userdata('loginuserID'),
							"create_username" => $this->session->userdata('username'),
							"create_usertype" => $this->session->userdata('usertype')
						);
					}
					$u = $this->subject_m->insert_subject($units);

					// Check if the insert_subject was successful
					if ($this->db->trans_status() === FALSE) {
						// Rollback transaction
						$this->db->trans_rollback();
						$this->session->set_flashdata('error', $this->lang->line('menu_failure'));
					} else {
						// Commit transaction
						$this->db->trans_commit();
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("section/index/" . $this->input->post('classesID')));
					}
				} else {
					// Rollback transaction if course insertion fails
					$this->db->trans_rollback();
					$this->session->set_flashdata('error', $this->lang->line('menu_failure'));
				}
			}
		} else {
			$this->data["subview"] = "section/add";
			$this->load->view('_layout_main', $this->data);
		}
	}


	public function edit()
	{
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
		$url = htmlentities((string) escapeString($this->uri->segment(4)));
		if ((int)$id && (int)$url) {
			$this->data['teachers'] = $this->teacher_m->get_teacher();
			$this->data['classes'] = $this->classes_m->get_classes();
			$this->data['section'] = $this->section_m->get_section($id);
			if ($this->data['section']) {
				$this->data['set'] = $url;
				if ($_POST !== []) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data["subview"] = "section/edit";
						$this->load->view('_layout_main', $this->data);
					} else {
						$array = array(
							"section" => $this->input->post("section"),
							"category" => $this->input->post("category"),
							"capacity" => $this->input->post("capacity"),
							"classesID" => $this->input->post("classesID"),
							"teacherID" => $this->input->post("teacherID"),
							"note" => $this->input->post("note"),
							"modify_date" => date("Y-m-d h:i:s")
						);

						$this->studentrelation_m->update_studentrelation_with_multicondition(array('srsection' => $this->input->post("section")), array('srsectionID' => $id));

						$this->section_m->update_section($array, $id);
						$this->session->set_flashdata('success', $this->lang->line('menu_success'));
						redirect(base_url("section/index/$url"));
					}
				} else {
					$this->data["subview"] = "section/edit";
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

	public function delete()
	{
		$id = htmlentities((string) escapeString($this->uri->segment(3)));
		$url = htmlentities((string) escapeString($this->uri->segment(4)));
		if ((int)$id && (int)$url) {
			$this->section_m->delete_section($id);
			$this->session->set_flashdata('success', $this->lang->line('menu_success'));
			redirect(base_url("section/index/$url"));
		} else {
			redirect(base_url("section/index"));
		}
	}

	function valid_number()
	{
		if ($this->input->post('capacity') < 0) {
			$this->form_validation->set_message("valid_number", "%s is invalid number.");
			return FALSE;
		}
		return TRUE;
	}


	function allclasses()
	{
		if ($this->input->post('classesID') == 0) {
			$this->form_validation->set_message("allclasses", "The %s field is required.");
			return FALSE;
		}
		return TRUE;
	}

	function allteacher()
	{
		if ($this->input->post('teacherID') == 0) {
			$this->form_validation->set_message("allteacher", "The %s field is required.");
			return FALSE;
		}
		return TRUE;
	}

	public function section_list()
	{
		$classID = $this->input->post('id');
		if ((int)$classID !== 0) {
			$string = base_url("section/index/$classID");
			echo $string;
		} else {
			redirect(base_url("section/index"));
		}
	}

	public function unique_section()
	{
		$id = htmlentities((string) escapeString($this->uri->segment(3)));
		if ((int)$id !== 0) {
			$section = $this->section_m->get_order_by_section(array("classesID" => $this->input->post("classesID"), "section" => $this->input->post('section'), "sectionID !=" => $id));
			if (inicompute($section)) {
				$this->form_validation->set_message("unique_section", "%s already exists.");
				return FALSE;
			}
			return TRUE;
		} else {
			$section = $this->section_m->get_order_by_section(array("classesID" => $this->input->post("classesID"), "section" => $this->input->post('section')));

			if (inicompute($section)) {
				$this->form_validation->set_message("unique_section", "%s already exists.");
				return FALSE;
			}
			return TRUE;
		}
	}
}

/* End of file class.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/class.php */
