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
    
    if ($_POST) {
        $rules = $this->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->data["subview"] = "center/add";
            $this->load->view('_layout_main', $this->data);
        } else {
          

            
            $data = array(
                "city" => $this->input->post("city"),
                "date" => $this->input->post("date"),
                "address" => $this->input->post("address"),
                
            );

            
            $center_id = $this->Center_m->insert_center($data);

            if($center_id){
                if ($this->input->post('selected_courses')) {
                    $selected_courses = $this->input->post('selected_courses');
            
                    foreach ($selected_courses as $course_id) {
                        $price_key = 'course_price_' . $course_id;
            
                       
                        if ($this->input->post($price_key)) {
                            $price = $this->input->post($price_key);
            
                            
                            $data = array(
                                'center_id'   => $center_id,
                                'course_name' => $course_id,  
                                'price'       => $price
                            );
            
                            
                            if ($this->Coursecenter_m->add_course_to_center($data)) {
                                echo "Course $course_id saved with price $price<br>";
                            } else {
                                echo "Error saving course $course_id<br>";
                            }
                        }
                    }
                }
            }
          


           
           

            $this->session->set_flashdata('success', 'Center added successfully!');
            redirect(base_url("center/index"));
        }
    } else {
        $this->data["subview"] = "center/add";
        $this->load->view('_layout_main', $this->data);
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

        if ($_POST) {
            $rules = $this->edit_rules();
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run()) {
              
                $update_array = array(
                    'city' => $this->input->post('city'),
                    'date' => $this->input->post('date'),
                    'price' => $this->input->post('price'),
                   
                );

                $this->Center_m->update_ceneter($update_array, $id);
                $this->session->set_flashdata('success', 'Center updated successfully');
                redirect(base_url('center/index'));
            }
        }

        
        $this->data["subview"] = "center/edit";
        $this->load->view('_layout_main', $this->data);
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
