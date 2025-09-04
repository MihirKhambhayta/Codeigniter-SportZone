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
}
?>