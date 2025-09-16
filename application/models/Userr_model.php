<?php
class Userr_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }
}
