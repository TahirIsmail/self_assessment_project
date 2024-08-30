<?php

class PaymentService
{
    /**
     * @var array<string, bool>
     */
    public $data;
    public $ci;
    public $transaction_id;

    public function __construct($transaction_id)
    {
        $this->ci =& get_instance();
        $this->transaction_id = $transaction_id;
        $this->ci->load->model('online_exam_payment_m');
    }

    // public function add_transaction( $array)
    // {
    //     $transaction = $this->ci->online_exam_payment_m->get_single_online_exam_payment(['transactionID' => $this->transaction_id]);
    //     if(!inicompute($transaction)) {
    //         $online_exam_payment = [
    //             'online_examID' => $array['online_exam_id'],
    //             'usertypeID'    => $this->ci->session->userdata('usertypeID'),
    //             'userID'        => $this->ci->session->userdata('loginuserID'),
    //             'paymentamount' => $array['amount'],
    //             'paymentmethod' => $array['payment_method'],
    //             'paymentdate'   => date('Y-m-d'),
    //             'paymentday'    => date('d'),
    //             'paymentmonth'  => date('m'),
    //             'paymentyear'   => date('Y'),
    //             'transactionID' => $this->transaction_id,
    //             'status'        => 0,
    //         ];

    //         // dd($online_exam_payment);

    //         $this->ci->online_exam_payment_m->insert_online_exam_payment($online_exam_payment);
    //         $this->ci->session->set_flashdata('success', 'Payment successful');
    //         $this->data['ApiPaymentStatus']=true;
    //     } else {
    //         $this->data['ApiPaymentStatus']=false;
    //         $this->ci->session->set_flashdata('error', 'Transaction ID already exist!');
    //     }
    // }


    public function add_transaction($array)
    {
        // Load the database library if not already loaded
        $this->ci->load->database();
    
        // Start the transaction
        $this->ci->db->trans_start();
    
        $transaction = $this->ci->online_exam_payment_m->get_single_online_exam_payment(['transactionID' => $this->transaction_id]);
        if (!inicompute($transaction)) {
            $online_exam_payment = [
                'sectionID' => $array['sectionID'],
                'usertypeID'    => $this->ci->session->userdata('usertypeID'),
                'userID'        => $this->ci->session->userdata('loginuserID'),
                'paymentamount' => $array['amount'],
                'paymentmethod' => $array['payment_method'],
                'paymentdate'   => date('Y-m-d'),
                'paymentday'    => date('d'),
                'paymentmonth'  => date('m'),
                'paymentyear'   => date('Y'),
                'transactionID' => $this->transaction_id,
                'status'        => 0,
            ];
    
            // Insert the payment data
            $online_exam_payment_id = $this->ci->online_exam_payment_m->insert_online_exam_payment($online_exam_payment);
    
            if ($online_exam_payment_id) {
                $student_enroll_course = [
                    'studentID' => $this->ci->session->userdata('loginuserID'),
                    'online_exam_paymentID' => $online_exam_payment_id,
                    'section_id' => $array['sectionID'],
                ];
    
                // Insert the enrollment data
                $enroll_success = $this->ci->online_exam_payment_m->student_enroll_course($student_enroll_course);
    
                if (!$enroll_success) {
                    // If enrollment fails, rollback the transaction and return an error
                    $this->ci->db->trans_rollback();
                    $this->data['ApiPaymentStatus'] = false;
                    $this->ci->session->set_flashdata('error', 'Enrollment failed!');
                    return;
                }
            } else {
                // If payment insert fails, rollback the transaction and return an error
                $this->ci->db->trans_rollback();
                $this->data['ApiPaymentStatus'] = false;
                $this->ci->session->set_flashdata('error', 'Payment failed!');
                return;
            }
        } else {
            // Transaction ID already exists
            $this->data['ApiPaymentStatus'] = false;
            $this->ci->session->set_flashdata('error', 'Transaction ID already exists!');
            return;
        }
    
        // Complete the transaction
        $this->ci->db->trans_complete();
    
        if ($this->ci->db->trans_status() === FALSE) {
            // If something went wrong, rollback the transaction
            $this->ci->db->trans_rollback();
            $this->data['ApiPaymentStatus'] = false;
            $this->ci->session->set_flashdata('error', 'Transaction failed!');
        } else {
            // Transaction was successful
            $this->data['ApiPaymentStatus'] = true;
            $this->ci->session->set_flashdata('success', 'Payment successful');
        }
    }


    
}