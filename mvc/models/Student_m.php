<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class student_m extends MY_Model {

    protected $_table_name = 'student';
    protected $_primary_key = 'student.studentID';
    protected $_primary_filter = 'intval';
    protected $_order_by = "roll asc";

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_username($table, $data=NULL) 
    {
        $query = $this->db->get_where($table, $data);
        return $query->result();
    }

    public function get_single_username($table, $data=NULL) 
    {
        $query = $this->db->get_where($table, $data);
        return $query->row();
    }

    public function get_student($array=NULL, $signal=FALSE) 
    {
        // $this->db->join('studentextend', 'studentextend.studentID = student.studentID', 'LEFT');
        $query = parent::get($array, $signal);
        return $query;
    }

    public function get_single_student($array) 
    {
        $array = $this->makeArrayWithTableName($array);
        // $this->db->join('studentextend', 'studentextend.studentID = student.studentID', 'LEFT');
        $query = parent::get_single($array);
        return $query;
    }

    public function get_order_by_student($array=[]) 
    {
        $array = $this->makeArrayWithTableName($array);
        // $this->db->join('studentextend', 'studentextend.studentID = student.studentID', 'LEFT');
        $query = parent::get_order_by($array);
        return $query;
    }

    public function general_get_student($array=NULL, $signal=FALSE) 
    {
        $array = $this->makeArrayWithTableName($array);
        // $this->db->join('studentextend', 'studentextend.studentID = student.studentID', 'LEFT');
        $query = parent::get($array, $signal);
        return $query;
    }

    public function general_get_order_by_student($array=NULL) 
    {
        $array = $this->makeArrayWithTableName($array);
        // $this->db->join('studentextend', 'studentextend.studentID = student.studentID', 'LEFT');
        $query = parent::get_order_by($array);
        return $query;
    }

    public function general_get_single_student($array) 
    {
        $array = $this->makeArrayWithTableName($array);
        // $this->db->join('studentextend', 'studentextend.studentID = student.studentID', 'LEFT');
        $query = parent::get_single($array);
        return $query;
    }

    public function insert_student($array) 
    {
        $id = parent::insert($array);
        return $id;
    }

    public function update_student($data, $id = NULL) 
    {
        parent::update($data, $id);
        return $id;
    }

    public function delete_student($id)
    {
        parent::delete($id);
    }

    public function hash($string) 
    {
        return parent::hash($string);
    }

    public function profileUpdate($table, $data, $username) 
    {
        $this->db->update($table, $data, "username = '".$username."'");
        return TRUE;
    }

    public function profileRelationUpdate($table, $data, $studentID) 
    {
        $this->db->update($table, $data, "srstudentID = '".$studentID."'");
        return TRUE;
    }
}

?>

<style>
/* Custom styles for form */
/* Custom styles for form */
.form-horizontal .control-label {
    text-align: left;
    font-weight: bold;
    font-size: 1.1em;
    color: #b30000; /* Updated to match the red theme */
}
.form-horizontal .form-control {
    border-radius: 5px;
    box-shadow: none;
    border: 1px solid #ccc;
    transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}
.form-horizontal .form-control:focus {
    border-color: #b30000; /* Updated to match the red theme */
    box-shadow: 0 0 8px rgba(179, 0, 0, 0.6); /* Updated to match the red theme */
}
.form-horizontal .has-error .form-control {
    border-color: #a94442;
    box-shadow: 0 0 8px rgba(169, 68, 66, 0.6);
}
.form-horizontal .has-error .control-label,
.form-horizontal .has-error .help-block,
.form-horizontal .has-error .form-control-feedback {
    color: #a94442;
}
.form-group {
    margin-bottom: 25px;
}
.form-horizontal .form-group .col-sm-6 {
    padding-left: 0;
    padding-right: 0;
}
.form-horizontal .form-group .col-sm-4 {
    padding-top: 7px;
    padding-left: 0;
    padding-right: 0;
}
.input-group .form-control {
    z-index: 2;
}
.input-group .input-group-btn .btn {
    border-radius: 0 5px 5px 0;
    background-color: #b30000; /* Updated to match the red theme */
    color: #fff;
    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}
.input-group .input-group-btn .btn:hover {
    background-color: #990000; /* Darker red for hover effect */
    box-shadow: 0 0 8px rgba(153, 0, 0, 0.6); /* Shadow effect */
}
.input-group .input-group-btn .btn .fa {
    margin-right: 5px;
}
.image-preview-filename {
    width: calc(100% - 150px);
    float: left;
}
.image-preview-clear {
    float: left;
    margin-left: 5px;
    background-color: #b30000; /* Updated to match the red theme */
    color: #fff;
    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}
.image-preview-clear:hover {
    background-color: #990000; /* Darker red for hover effect */
    box-shadow: 0 0 8px rgba(153, 0, 0, 0.6); /* Shadow effect */
}
.image-preview-input {
    float: left;
    margin-left: 5px;
    background-color: #b30000; /* Updated to match the red theme */
    color: #fff;
    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}
.image-preview-input:hover {
    background-color: #990000 !important; /* Darker red for hover effect */
    box-shadow: 0 0 8px rgba(153, 0, 0, 0.6); /* Shadow effect */
}
.image-preview {
    margin-bottom: 20px;
}
.image-preview img {
    width: 100%;
    border-radius: 5px; /* Rounded corners for the preview image */
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); /* Shadow effect for the preview image */
}

.form-horizontal .control-label {
    text-align: left;
    font-weight: bold;
    font-size: 1.1em;
    color: #b30000; /* Updated to match the red theme */
}
.form-horizontal .form-control {
    border-radius: 5px;
    box-shadow: none;
    border: 1px solid #ccc;
    transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}
.form-horizontal .form-control:focus {
    border-color: #b30000; /* Updated to match the red theme */
    box-shadow: 0 0 8px rgba(179, 0, 0, 0.6); /* Updated to match the red theme */
}
.form-horizontal .has-error .form-control {
    border-color: #a94442;
    box-shadow: 0 0 8px rgba(169, 68, 66, 0.6);
}
.form-horizontal .has-error .control-label,
.form-horizontal .has-error .help-block,
.form-horizontal .has-error .form-control-feedback {
    color: #a94442;
}
.form-group {
    margin-bottom: 25px;
}
.form-horizontal .form-group .col-sm-6 {
    padding-left: 0;
    padding-right: 0;
}
.form-horizontal .form-group .col-sm-4 {
    padding-top: 7px;
    padding-left: 0;
    padding-right: 0;
}
.input-group .form-control {
    z-index: 2;
}
.input-group .input-group-btn .btn {
    border-radius: 0 5px 5px 0;
    background-color: #b30000; /* Updated to match the red theme */
    color: #fff;
    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}
.input-group .input-group-btn .btn:hover {
    background-color: #990000; /* Darker red for hover effect */
    box-shadow: 0 0 8px rgba(153, 0, 0, 0.6); /* Shadow effect */
}
.input-group .input-group-btn .btn .fa {
    margin-right: 5px;
}
.image-preview-filename {
    width: calc(100% - 150px);
    float: left;
}
.image-preview-clear {
    float: left;
    margin-left: 5px;
    background-color: #b30000; /* Updated to match the red theme */
    color: #fff;
    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}
.image-preview-clear:hover {
    background-color: #990000; /* Darker red for hover effect */
    box-shadow: 0 0 8px rgba(153, 0, 0, 0.6); /* Shadow effect */
}
.image-preview-input {
    float: left;
    margin-left: 5px;
    background-color: #b30000; /* Updated to match the red theme */
    color: #fff;
    transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}
.image-preview-input:hover {
    background-color: #990000; /* Darker red for hover effect */
    box-shadow: 0 0 8px rgba(153, 0, 0, 0.6); /* Shadow effect */
}
.image-preview {
    margin-bottom: 20px;
}
.image-preview img {
    width: 100%;
    border-radius: 5px; /* Rounded corners for the preview image */
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); /* Shadow effect for the preview image */
}
</style>
