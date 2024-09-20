<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paid_courses extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Offercourses_m"); // Assuming transactions are related to Offercourses model
    }

    public function index()
    {
        // Include necessary assets for the page
        $this->data['headerassets'] = array(
            'css' => array(
                'assets/select2/css/select2.css',
                'assets/select2/css/select2-bootstrap.css'
            ),
            'js' => array(
                'assets/select2/select2.js'
            )
        );

        // Fetch the transaction data
        $this->data['transaction_data'] = $this->Offercourses_m->get_transaction_data();

        
        // Load the paid_courses/index view and pass data to it
        $this->data["subview"] = "paid_courses/index"; 
        $this->load->view('_layout_main', $this->data); 
    }
}
