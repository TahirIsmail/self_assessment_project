<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Offercourses extends Admin_Controller
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
	

    
    protected function create_slug($string) {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }

    
    protected function ensure_unique_slug($slug, $table) {
        $this->db->like('course_id', $slug, 'after');
        $existing_slugs = $this->db->get($table)->result_array();
        if (!empty($existing_slugs)) {
           
            $slug .= '-' . (count($existing_slugs) + 1);
        }
        return $slug;
    }

    protected function rules($ispaid = 0)
    {
        return array(
            array(
                'field' => 'course_name',
                'label' => $this->lang->line("course_name"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
            ),
            array(
                'field' => 'photo',
                'label' => $this->lang->line("course_photo"),
                'rules' => 'trim|max_length[200]|xss_clean|callback_photoupload'
            ),
            array(
                'field' => 'note',
                'label' => $this->lang->line("course_note"),
                'rules' => 'trim|max_length[200]|xss_clean'
            )
        );
       
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
        if (!$id) {
			
            
            $this->data['classes'] = $this->classes_m->get_classes();
            $this->data['courses'] = $this->Offercourses_m->get_course_record();
			// dd($this->data['courses']);
            $this->data["subview"] = "offercourses/index";
            $this->load->view('_layout_main', $this->data);
        } else {
			$this->data['set'] = $id;
            $this->data['classes'] = $this->classes_m->get_classes();
			$this->data['courses'] = $this->Offercourses_m->get_course_record($id);
            $this->data["subview"] = "offercourses/search";
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
            $rules = $this->rules();
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == FALSE) {
                $this->data["subview"] = "offercourses/add";  
                $this->load->view('_layout_main', $this->data);

            } else {
                

				// dd($this->upload_data['file']['file_name']);
                $slug = $this->create_slug($this->input->post("course_name"));
                $slug = $this->ensure_unique_slug($slug, 'courses');
				$image = $this->upload_data['file']['file_name'];
				// dd($image);
                $array = array(
                    "course_id" => $slug, 
					"photo" => $image,
                    "course_name" => $this->input->post("course_name"),
                    "course_description" => $this->input->post("course_description"),
                    "validDays" => $this->input->post("validDays") != null ? $this->input->post('validDays') : '0',
                    "cost" => $this->input->post("cost"),
                );

				// dd($array);

               
                $this->Offercourses_m->insert_course($array);
                $this->session->set_flashdata('success', 'Course added successfully');
                redirect(base_url("offercourses/index"));
            }
        } else {
            $this->data["subview"] = "offercourses/add";
            $this->load->view('_layout_main', $this->data);
        }
    }

    public function delete($id) {
        if (!$id) {
            
            $this->session->set_flashdata('error', 'Invalid operation. No ID provided.');
            redirect('offercourses/index');
            return;
        }
    
        if ($this->Offercourses_m->delete_course_info($id)) {
            
            $this->session->set_flashdata('success', 'Course deleted successfully.');
        } else {
            
            $this->session->set_flashdata('error', 'Failed to delete the course.');
        }
    
       
        redirect('offercourses/index');
    }
    

	public function edit($course_id = null)
    {
        if ($course_id === null || !is_numeric($course_id)) {
            $this->session->set_flashdata('error', 'Invalid course ID');
            redirect(base_url("offercourses/index"));
        }

        $this->data['course'] = $this->Offercourses_m->get_course_by_id($course_id);

        if (empty($this->data['course'])) {
            $this->session->set_flashdata('error', 'Course not found');
            redirect(base_url("offercourses/index"));
        }

        $this->data['classes'] = $this->classes_m->get_classes();
        $this->data['teachers'] = $this->teacher_m->get_teacher();


        $this->data["subview"] = "offercourses/edit";
        $this->load->view('_layout_main', $this->data);
    }

	public function update($course_id = null)
    {
		$array = array(
			"course_name" => $this->input->post("course_name"),
			"course_description" => $this->input->post("course_description"),			
		);

		
		$this->Offercourses_m->update_course_by_id($array, $this->input->post('id'));
		$this->session->set_flashdata('success', 'Course has been Updated!');
		redirect(base_url("offercourses/index"));
    }
    
}
