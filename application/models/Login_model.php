<?php
class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load database here
        $this->load->database();
    }

    public function get_user_by_firstname($firstname) {
        return $this->db->get_where('users', ['firstname' => $firstname])->row_array();
    }

     //Update password
        
        public function update_password($firstname, $new_password) {
        return $this->db->update('users', ['password' => $new_password], ['firstname' => $firstname]);
         }



}
?>
