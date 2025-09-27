<?php
class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_by_firstname($firstname) {
        return $this->db->get_where('users', ['firstname' => $firstname])->row_array();
    }

    public function get_user_by_email($email) {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function update_password($email, $new_password) {
        return $this->db->update('users', ['password' => $new_password], ['email' => $email]);
    }
}
?>
