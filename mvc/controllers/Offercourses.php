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



    protected function create_slug($string)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }


    protected function ensure_unique_slug($slug, $table)
    {
        $this->db->like('course_id', $slug, 'after');
        $existing_slugs = $this->db->get($table)->result_array();
        if (!empty($existing_slugs)) {

            $slug .= '-' . (count($existing_slugs) + 1);
        }
        return $slug;
    }

    protected function rules()
    {
        return array(
            array(
                'field' => 'course_id',
                'label' => $this->lang->line("course_id"),
                'rules' => 'trim|required|xss_clean|is_unique[courses.course_id]',
                'errors' => array(
                    'is_unique' => 'The %s already exists.'
                )
            ),
            array(
                'field' => 'category_name',
                'label' => $this->lang->line("category_name"),
                'rules' => 'trim|required|xss_clean',                
            ),
            array(
                'field' => 'course_name',
                'label' => $this->lang->line("course_name"),
                'rules' => 'trim|required|xss_clean|max_length[60]'
            ),
            array(
                'field' => 'course_description',
                'label' => $this->lang->line("course_description"),
                'rules' => 'trim|xss_clean'
            ),
            array(
                'field' => 'photo',
                'label' => $this->lang->line("photo"),
                'rules' => 'callback_photoupload'
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

        $categories = $this->Offercourses_m->get_categories();
        $this->data['categories'] = $categories;

        $this->data['classes'] = $this->classes_m->get_classes();
        $this->data['teachers'] = $this->teacher_m->get_teacher();

        if ($_POST !== []) {
            $rules = $this->rules();
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == FALSE) {
                $this->data["subview"] = "offercourses/add";
                $this->load->view('_layout_main', $this->data);
            } else {
                $this->db->trans_begin();
                try {
                    $slug = $this->create_slug($this->input->post("course_id"));
                    $slug = $this->ensure_unique_slug($slug, 'courses');

                    // Upload Image (assuming this is done in a helper or before the method)
                    $image = isset($this->upload_data['file']['file_name']) ? $this->upload_data['file']['file_name'] : '';

                    $array = array(
                        "course_id" => $this->input->post('course_id'),
                        "category_id" => $this->input->post('category_name'),
                        "slug" => $slug,
                        "photo" => $image,
                        "course_name" => $this->input->post("course_name"),
                        "course_description" => $this->input->post("course_description"),
                    );

                    $this->Offercourses_m->insert_course($array);

                    if ($this->db->trans_status() === FALSE) {
                        $this->db->trans_rollback();
                        $this->session->set_flashdata('error', 'Failed to add the course. Please try again.');
                    } else {
                        $this->db->trans_commit();
                        $this->session->set_flashdata('success', 'Course added successfully');
                    }
                    redirect(base_url("offercourses/index"));
                } catch (Exception $e) {
                    $this->db->trans_rollback();
                    log_message('error', $e->getMessage());
                    $this->session->set_flashdata('error', 'An unexpected error occurred: ' . $e->getMessage());
                    redirect(base_url("offercourses/add"));
                }
            }
        } else {
            // Initial page load, load the form view
            $this->data["subview"] = "offercourses/add";
            $this->load->view('_layout_main', $this->data);
        }
    }


    public function delete($id = null)
    {
        if (empty($id) || !is_numeric($id)) {
            $this->session->set_flashdata('error', 'Invalid operation. No valid ID provided.');
            redirect('offercourses/index');
            return;
        }

        $is_deleted = $this->Offercourses_m->delete_course_info($id);

        if ($is_deleted) {
            $this->session->set_flashdata('success', 'Course deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete the course. The course may not exist.');
        }

        redirect('offercourses/index');
    }



    public function edit($course_id = null)
    {
        if (is_null($course_id) || !is_numeric($course_id)) {
            $this->session->set_flashdata('error', 'Invalid course ID provided.');
            redirect(base_url("offercourses/index"));
            return;
        }

        $course = $this->Offercourses_m->get_course_by_id($course_id);
        $categories = $this->Offercourses_m->get_categories();
        $this->data['categories'] = $categories;


        if (empty($course)) {
            $this->session->set_flashdata('error', 'Course not found or does not exist.');
            redirect(base_url("offercourses/index"));
            return;
        }

        $this->data['course'] = $course;
        $this->data['classes'] = $this->classes_m->get_classes();
        $this->data['teachers'] = $this->teacher_m->get_teacher();

        $this->data["subview"] = "offercourses/edit";
        $this->load->view('_layout_main', $this->data);
    }


    public function update($course_id = null)
    {
        $this->form_validation->set_rules('course_name', 'Course Name', 'required|trim');
        $this->form_validation->set_rules('course_description', 'Course Description', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url("offercourses/edit/" . $this->input->post('id')));
        } else {

            $delete_image = $this->input->post('delete_image') == 1;
            $image = $this->input->post('current_image');

           

            if ($delete_image) {                
                if (!empty($image) && file_exists(FCPATH . 'uploads/images/' . $image)) {
                    unlink(FCPATH . 'uploads/images/' . $image);
                }
                $image = '';
            }
            if (!empty($_FILES['photo']['name'])) {
                
                $uploaded_image = $this->upload_new_image();
                if ($uploaded_image) {
                    $image = $uploaded_image;
                }
            }


            $data = array(
                "course_name" => $this->input->post("course_name", TRUE),
                "course_description" => $this->input->post("course_description", TRUE),
                "photo" => $image,
                "course_id" => $this->input->post('course_id'),
                "category_id" => $this->input->post('category_name'),
            );

            if ($this->Offercourses_m->update_course_by_id($data, $this->input->post('id'))) {
                $this->session->set_flashdata('success', 'Course has been updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update the course. Please try again.');
            }
            redirect(base_url("offercourses/index"));
        }
    }

    private function upload_new_image()
{
    $config['upload_path'] = FCPATH . 'uploads/images/';
    $config['allowed_types'] = 'jpeg|jpg|png|gif';
    $config['max_size'] = 2048;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('photo')) {
        return $this->upload->data('file_name');
    }
    return false;
}
}
