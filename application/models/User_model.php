<?php
class User_model extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();  
    }

    public function get_all_users() 
    {
        return $this->db->get('users')->result();
    }
    
    public function get_user($id) 
    {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function insert_user($data) 
    {
        return $this->db->insert('users', $data);
    }
    
    public function update_user($id, $data) 
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }   

    public function count_users() {
    return $this->db->count_all('users');
    }

    // Count all users (optional)
    public function set_logged_in($id, $status) {
    return $this->db
        ->where('id', $id)
        ->update('users', ['is_logged_in' => $status]);
    }

    public function count_logged_in_users() {
        return $this->db
            ->where('is_logged_in', 1)
            ->count_all_results('users');
    }

    // Fetch user by username (used in login)
    public function get_user_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }
    

    public function delete_user($id) 
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
?>