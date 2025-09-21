<?php
class Admin_model extends CI_Model {

    public function validate_admin($username, $password) {
        // If using md5 (not recommended in real apps, use password_hash)
        $this->load->database(); 
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); 
       

        $query = $this->db->get('admins');

        return $query->row(); // returns user or null
    }
   


    
}
