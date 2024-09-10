<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Center_m extends MY_Model
{
    protected $_table_name = 'center';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = "id asc";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_center()
    {
        $query = $this->db->get($this->_table_name);
        return $query->result();
    }

    public function get_center($id)
    {
        $this->db->where($this->_primary_key, $id);
        $query = $this->db->get($this->_table_name);
        if (!$query) {
            log_message('error', 'Unable to retrieve course with ID: ' . $id);
            return NULL;
        }
        return $query->row();
    }

    public function get_center_courses($center_id)
    {
        $this->db->select('*');
        $this->db->where('center_id', $center_id);
        $query = $this->db->get('center_courses');

        return $query->result();
    }
    public function get_all_courses()
    {
        $query = $this->db->get('courses');
        return $query->result();
    }

    public function delete_center_courses($center_id)
    {
        $this->db->where('center_id', $center_id);
        $this->db->delete('center_courses');
    }

    public function insert_center($data)
    {
        try {

            $this->db->trans_begin();

            if ($this->db->insert($this->_table_name, $data)) {
                $this->db->trans_commit();
                return $this->db->insert_id();
            } else {
                $this->db->trans_rollback();
                log_message('error', 'Failed to insert center information: ' . json_encode($data));
                return FALSE;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            log_message('error', 'Exception occurred while inserting center: ' . $e->getMessage());
            return FALSE;
        }
    }

    public function update_center($data, $id)
    {
        $this->db->where($this->_primary_key, $id);
        if (!$this->db->update($this->_table_name, $data)) {
            log_message('error', 'Failed to update course with ID: ' . $id . ' Data: ' . json_encode($data));
            return FALSE;
        }
        return TRUE;
    }
    public function update_center_course($center_id, $course_id, $price)
    {

        $this->db->trans_start();

        try {

            $this->db->where('center_id', $center_id);
            $this->db->where('course_id', $course_id);
            $query = $this->db->get('center_courses');

            if ($query->num_rows() > 0) {

                $this->db->where('center_id', $center_id);
                $this->db->where('course_id', $course_id);
                $update_result = $this->db->update('center_courses', ['price' => $price]);

                if (!$update_result) {
                    throw new Exception('Failed to update the course price for center with ID: ' . $center_id);
                }
            } else {

                $insert_result = $this->db->insert('center_courses', [
                    'center_id' => $center_id,
                    'course_id' => $course_id,
                    'price' => $price,
                ]);

                if (!$insert_result) {
                    throw new Exception('Failed to insert the course for center with ID: ' . $center_id);
                }
            }
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                throw new Exception('Transaction failed while updating or inserting course for center with ID: ' . $center_id);
            }
            return TRUE;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            log_message('error', $e->getMessage());

            return FALSE;
        }
    }



    public function delete_center($id)
    {
        $this->db->trans_start();

        try {
            $this->db->where('center_id', $id);
            if (!$this->db->delete('center_courses')) {
                throw new Exception('Failed to delete courses for center with ID: ' . $id);
            }

            $this->db->where($this->_primary_key, $id);
            if (!$this->db->delete($this->_table_name)) {
                throw new Exception('Failed to delete center with ID: ' . $id);
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                throw new Exception('Transaction failed while deleting center and its courses.');
            }
            return TRUE;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            log_message('error', $e->getMessage());

            return FALSE;
        }
    }
}
