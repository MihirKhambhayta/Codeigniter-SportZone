<?php
class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // User lookup
    public function get_user_by_firstname($firstname) {
        return $this->db->get_where('users', ['firstname' => $firstname])->row_array();
    }

    public function get_user_by_email($email) {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function update_password($email, $new_password) {
        return $this->db->update('users', ['password' => $new_password], ['email' => $email]);
    }

    // OTP limit tracking using separate table
    public function get_otp_limit($email)
    {
        return $this->db
            ->where('email', $email)
            ->get('users')
            ->row_array();
    }

    public function set_otp_limit($email, $attempts, $first_time)
    {
        $data = [
            'email' => $email,
            'attempts' => $attempts,
            'first_request_time' => $first_time
        ];

        $exists = $this->db
            ->where('email', $email)
            ->get('users')
            ->num_rows();

        if ($exists) {
            return $this->db
                ->where('email', $email)
                ->update('users', $data);
        } else {
            return $this->db->insert('users', $data);
        }
    }
    public function clear_otp_limit($email)
    {
        return $this->db
            ->where('email', $email)
            ->delete('users');
    }
}
?>
