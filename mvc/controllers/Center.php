<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Center extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Center_m");
        $this->load->model('Coursecenter_m');
        $this->load->library('form_validation');
        $language = $this->session->userdata('lang');
        $this->lang->load('center_lang', $language);
    }

    protected function rules()
    {
        return array(
            array(
                'field' => 'city',
                'label' => 'City',
                'rules' => 'required|xss_clean|callback_trim_check|max_length[255]'
            ),
            array(
                'field' => 'date',
                'label' => 'Date',
                'rules' => 'required|xss_clean|callback_trim_check'
            ),
            array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'required|xss_clean|callback_trim_check|max_length[255]'
            ),

        );
    }

    protected function edit_rules()
    {
        return array(
            array(
                'field' => 'city',
                'label' => 'City',
                'rules' => 'required|callback_custom_trim|max_length[255]'
            ),
            array(
                'field' => 'date',
                'label' => 'Date',
                'rules' => 'required|callback_custom_trim'
            ),
            array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'required|max_length[255]|callback_custom_trim'
            ),

        );
    }

    public function trim_check($input)
    {
        $input = $input ?? '';
        $trimmed = trim($input);
        if ($trimmed === '') {
            $this->form_validation->set_message('trim_check', 'The {field} field cannot be empty or just space.');
            return FALSE;
        }
        return TRUE;
    }

    public function custom_trim($input)
    {
        $input = $input ?? '';
        $trimmed = trim($input);
        if ($trimmed === '') {
            $this->form_validation->set_message('custom_trim', 'The {field} field cannot be empty or just space.');
            return FALSE;
        }
        return TRUE;
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

        $this->data['centers'] = $this->Center_m->get_all_center();
        $this->data["subview"] = "center/index";
        $this->load->view('_layout_main', $this->data);
    }
    public function add()
    {
        $this->data['courses'] = $this->db->get('courses')->result();

        try {
            if ($this->input->post()) {
                $rules = $this->rules();
                $this->form_validation->set_rules($rules);

                if ($this->form_validation->run() == FALSE) {
                    $this->data['selected_courses'] = $this->input->post('selected_courses');
                    $this->data['course_prices'] = $this->get_course_prices($this->input->post('selected_courses'));

                    $this->data["subview"] = "center/add";
                    $this->load->view('_layout_main', $this->data);
                } else {
                    $this->db->trans_begin();

                    $data = array(
                        "city" => $this->input->post("city"),
                        "date" => $this->input->post("date"),
                        "address" => $this->input->post("address"),
                    );

                    $center_id = $this->Center_m->insert_center($data);

                    if ($center_id) {
                        $this->save_courses($center_id);
                    } else {
                        throw new Exception('Error saving the center. Please try again.');
                    }

                    if ($this->db->trans_status() === FALSE) {

                        $this->db->trans_rollback();
                        throw new Exception('Transaction failed. Changes rolled back.');
                    } else {
                        $this->db->trans_commit();
                        $this->session->set_flashdata('success', 'Center added successfully!');
                        redirect(base_url("center/index"));
                    }
                }
            } else {
                $this->data["subview"] = "center/add";
                $this->load->view('_layout_main', $this->data);
            }
        } catch (Exception $e) {

            $this->db->trans_rollback();
            log_message('error', $e->getMessage());
            $this->session->set_flashdata('error', $e->getMessage());
            redirect(base_url('center/add'));
        }
    }
    private function get_course_prices($selected_courses)
    {
        $course_prices = [];
        if ($selected_courses) {
            foreach ($selected_courses as $course_id) {
                $price_key = 'course_price_' . $course_id;
                $course_prices[$course_id] = $this->input->post($price_key) ?? '';
            }
        }
        return $course_prices;
    }

    private function save_courses($center_id)
    {
        $selected_courses = $this->input->post('selected_courses');

        if ($selected_courses) {
            foreach ($selected_courses as $course_id) {
                $price_key = 'course_price_' . $course_id;
                $price = $this->input->post($price_key);

                if ($price && is_numeric($price)) {
                    $data = array(
                        'center_id' => $center_id,
                        'course_id' => $course_id,
                        'price' => $price
                    );

                    if (!$this->Coursecenter_m->add_course_to_center($data)) {
                        throw new Exception("Error adding course $course_id to center.");
                    }
                } else {
                    throw new Exception("Price for course ID $course_id is missing or invalid.");
                }
            }
        }
    }


    public function edit($id)
    {
        if (!$id || !is_numeric($id)) {
            redirect(base_url('center/index'));
            return;
        }

        $this->data['center'] = $this->Center_m->get_center($id);
        if (!$this->data['center']) {
            $this->session->set_flashdata('error', 'No center found with that ID.');
            redirect(base_url('center/index'));
            return;
        }
        
        $this->data['courses'] = $this->Center_m->get_all_courses();
        $this->data['selected_courses'] = $this->Center_m->get_center_courses($id);
        // dd($this->data['selected_courses']);
     

        if ($this->input->post()) {
           
            $rules = $this->edit_rules();
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run()) {
            
                $update_array = array(
                    'city' => $this->input->post('city'),
                    'date' => $this->input->post('date'),
                    'address' => $this->input->post('address'),
                );

                $this->db->trans_start();
                $this->Center_m->update_center($update_array, $id);
                $this->update_courses($id);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata('error', 'Failed to update the center and its courses.');
                } else {
                    $this->session->set_flashdata('success', 'Center updated successfully.');
                }

                redirect(base_url('center/index'));
            }
        }

        
        $this->data["subview"] = "center/edit";
        $this->load->view('_layout_main', $this->data);
    }


    private function update_courses($center_id)
    {
        $selected_courses = $this->input->post('selected_courses');
        if ($selected_courses) {
            foreach ($selected_courses as $course_id) {
                $course_price = $this->input->post('course_price_' . $course_id);
                if (!empty($course_price)) {
                    $this->Center_m->update_center_course($center_id, $course_id, $course_price);
                }
            }
        } else {
        }
    }


    public function delete($id = NULL)
    {
        if (!$id || !is_numeric($id)) {
            $this->session->set_flashdata('error', 'Invalid delete operation.');
            redirect('center/index');
            return;
        }

        $deleted = $this->Center_m->delete_center($id);
        if ($deleted) {
            $this->session->set_flashdata('success', 'Center successfully deleted.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete the center. It may not exist.');
        }

        redirect('center/index');
    }
}
