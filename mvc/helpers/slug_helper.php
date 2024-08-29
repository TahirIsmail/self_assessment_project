<?php

if (!function_exists('create_slug')) {
    function create_slug($string, $length = 6) {
        // Convert to lowercase
        $string = strtolower($string);
        
        // Replace spaces and special characters
        $string = preg_replace('/[^a-z0-9-]+/', '-', $string);
        
        // Trim hyphens
        $string = trim($string, '-');
        
        // Append random string of characters and numbers
        $random_string = generate_random_string($length);
        $slug = $string . '_' . $random_string;
        
        return $slug;
    }
}

if (!function_exists('generate_random_string')) {
    function generate_random_string($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $random_string;
    }
}


if (!function_exists('ensure_unique_slug')) {
    function ensure_unique_slug($slug, $table) {
        $CI =& get_instance();        
        $CI->db->like('slug', $slug);
        $query = $CI->db->get($table);        
        if ($query->num_rows() > 0) {           
            $suffix = 1;
            while ($CI->db->where('slug', $slug . '-' . $suffix)->count_all_results($table) > 0) {
                $suffix++;
            }
            $slug = $slug . '-' . $suffix;
        }
        
        return $slug;
    }
}


?>