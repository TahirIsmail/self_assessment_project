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

    public function insert_center($data)
{
    if ($this->db->insert($this->_table_name, $data)) {
        return $this->db->insert_id();
    } else {
        log_message('error', 'Failed to insert course information: ' . json_encode($data));
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

    public function delete_center($id)
    {
        $this->db->where($this->_primary_key, $id);
        if (!$this->db->delete($this->_table_name)) {
            log_message('error', 'Failed to delete course with ID: ' . $id);
            return FALSE;
        }
        return TRUE;
    }
}
