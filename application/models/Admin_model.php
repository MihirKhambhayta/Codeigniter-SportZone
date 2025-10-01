<?php
class Admin_model extends CI_Model {

    public function validate_admin($username, $password) {
        // If using md5 (not recommended in real apps, use password_hash)
        $this->load->database(); 
        $this->db->where('username', $username);
        $this->db->where('password', $password);
          
       

        $query = $this->db->get('admins');

        return $query->row(); // returns user or null
    }

    public function get_all_admin_user() {
    return $this->db->get('admins')->result();  // Use objects
    }

     public function get_user($id) 
    {
        return $this->db->get_where('admins', ['id' => $id])->row();
    }

     public function insert_user($data) 
    {
        return $this->db->insert('admins', $data);
    }
    
    public function update_user($id, $data) 
    {
        $this->db->where('id', $id);
        return $this->db->update('admins', $data);
    }   

    public function count_admins() {
    return $this->db->count_all('admins');
    }
   
    
    public function delete_user($id) 
    {
        $this->db->where('id', $id);
        return $this->db->delete('admins');
    }


        // ✅ Set admin as logged in or logged out
    public function set_logged_in($id, $status) {
        return $this->db
            ->where('id', $id)
            ->update('admins', ['is_logged_in' => $status]);  // changed to 'admins'
    }

    // ✅ Count all currently logged in admins
    public function count_logged_in_admins() {
        return $this->db
            ->where('is_logged_in', 1)
            ->count_all_results('admins');  // changed to 'admins'
    }

    // ✅ Fetch admin by username (used for admin login)
    public function get_admin_by_username($username) {
        return $this->db->get_where('admins', ['username' => $username])->row();  // changed to 'admins'
    } 




}
