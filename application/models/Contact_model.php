<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->database(); 
    }

    public function save_contact($data) 
    {
        return $this->db->insert('contact_messages', $data);
    }

    public function get_all_message() {
    return $this->db->get('contact_messages')->result();  // Use objects
    }

     public function get_message($id) 
    {
        return $this->db->get_where('contact_messages', ['id' => $id])->row();
    }

        public function delete_user($id) 
    {
        $this->db->where('id', $id);
        return $this->db->delete('contact_messages');
    }

     public function count_message() {
    return $this->db->count_all('contact_messages');
    }


}
?>