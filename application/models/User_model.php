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

    public function delete_user($id) 
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
?>