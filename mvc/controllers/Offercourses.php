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

    protected function rules($ispaid = 0)
    {
        return array(
            array(
                'field' => 'course',
                'label' => $this->lang->line("course_name"),
                'rules' => 'trim|required|xss_clean|max_length[60]|callback_unique_course'
            ),
            array(
                'field' => 'subject_name',
                'label' => $this->lang->line("subject_name"),
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'classesID',
                'label' => $this->lang->line("course_classes"),
                'rules' => 'trim|required|numeric|max_length[11]|xss_clean|callback_allclasses'
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
        if ($ispaid == 1) {
            $rules[] = array(
                'field' => 'cost',
                'label' => $this->lang->line("course_cost"),
                'rules' => 'trim|xss_clean|required|numeric|callback_unique_cost'
            );
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
        
        // Fetching courses for the selected class ID
        $id = htmlentities((string) escapeString($this->uri->segment(3)));
        if ((int)$id !== 0) {
            $this->data['set'] = $id;
            $this->data['classes'] = $this->classes_m->get_classes();
            $this->data['courses'] = $this->Offercourses_m->get_join_course_units($id);  // Corrected to use courses
            $this->data["subview"] = "offercourses/index";  // Ensure correct view
            $this->load->view('_layout_main', $this->data);
        } else {
            $this->data['classes'] = $this->classes_m->get_classes();
            $this->data["subview"] = "offercourses/search";  // Ensure view path is correct
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
            $rules = $this->rules($this->input->post('ispaid'));
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == FALSE) {
                $this->data["subview"] = "offercourses/add";  // Ensure correct view path
                $this->load->view('_layout_main', $this->data);
            } else {
                $slug = create_slug($this->input->post("course"));
                $slug = ensure_unique_slug($slug, 'courses');
                $image = $this->upload_data['file']['file_name'];

                $array = array(
                    "course" => $this->input->post("course"),
                    "slug" => $slug,
                    "image" => $image,
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
                );

                if ($this->input->post('ispaid') == 0) {
                    $array['cost'] = 0;
                }

                $subjectNamesString = $this->input->post('subject_name');
                $subjectNamesArray = explode(',', $subjectNamesString);
                $units = [];

                $this->db->trans_begin();

                $course_id = $this->Offercourses_m->insert_course_return_record($array);

                if ($course_id) {
                    foreach ($subjectNamesArray as $unit) {
                        $units[] = array(
                            'subject' => $unit,
                            'course_id' => $course_id,
                            "create_date" => date("Y-m-d h:i:s"),
                            "create_userID" => $this->session->userdata('loginuserID'),
                            "create_username" => $this->session->userdata('username'),
                            "create_usertype" => $this->session->userdata('usertype')
                        );
                    }
                    $u = $this->subject_m->insert_subject($units);

                    if ($this->db->trans_status() === FALSE) {
                        $this->db->trans_rollback();
                        $this->session->set_flashdata('error', $this->lang->line('menu_failure'));
                    } else {
                        $this->db->trans_commit();
                        $this->session->set_flashdata('success', $this->lang->line('menu_success'));
                        redirect(base_url("offercourses/index/" . $this->input->post('classesID')));
                    }
                } else {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('error', $this->lang->line('menu_failure'));
                }
            }
        } else {
            $this->data["subview"] = "offercourses/add";
            $this->load->view('_layout_main', $this->data);
        }
    }

    public function delete()
    {
        $id = htmlentities((string) escapeString($this->uri->segment(3)));
        $url = htmlentities((string) escapeString($this->uri->segment(4)));
        if ((int)$id && (int)$url) {
            $this->Offercourses_m->delete_course($id);
            $this->session->set_flashdata('success', $this->lang->line('menu_success'));
            redirect(base_url("offercourses/index/$url"));
        } else {
            redirect(base_url("offercourses/index"));
        }
    }
}
