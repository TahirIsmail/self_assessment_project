<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Course_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_course_by_slug($slug = null)
    {
       
        $this->db->select('
            courses.*, 
            center.city, 
            center.address, 
            center.date, 
            center.created_at as center_created_at, 
            center.updated_at as center_updated_at, 
            center_courses.id as center_course_id, 
            center_courses.center_id, 
            center_courses.course_id, 
            center_courses.price, 
            center_courses.created_at as center_course_created_at, 
            center_courses.updated_at as center_course_updated_at
        ');
    
        $this->db->from('courses');
        $this->db->join('center_courses', 'center_courses.course_id = courses.id', 'left');
        $this->db->join('center', 'center.id = center_courses.center_id', 'left');
    
        if ($slug) {
            $this->db->where('courses.slug', $slug);
        }
    
        $query = $this->db->get();
        $result = $query->result_array();
    
        $courses = [];
        foreach ($result as $row) {
            $course_id = $row['id'];
    
            if (!isset($courses[$course_id])) {
                $courses[$course_id] = [
                    'id' => $row['id'],
                    'slug' => $row['slug'],
                    'name' => $row['course_name'],
                    'description' => $row['course_description'],
                    'photo' => $row['photo'],
                    'created_at' => $row['created_at'], 
                    'updated_at' => $row['updated_at'],  
                    'centers' => []
                ];
            }
    
            $courses[$course_id]['centers'][] = [
                'center_course_id' => $row['center_course_id'],
                'center_id' => $row['center_id'],
                'city' => $row['city'],
                'address' => $row['address'],
                'date' => $row['date'],
                'price' => $row['price'],
                'center_created_at' => $row['center_created_at'],
                'center_updated_at' => $row['center_updated_at'],
                'center_course_created_at' => $row['center_course_created_at'],
                'center_course_updated_at' => $row['center_course_updated_at']
            ];
        }
    
        return $courses;
    }
    
}
?>
