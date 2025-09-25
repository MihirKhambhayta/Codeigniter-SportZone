<?php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');

        $user_session = $this->session->userdata('user');

        if (!$user_session) {
            redirect('login');
        }

        $user = $this->User_model->get_user_by_id($user_session['id']);

        if (!$user) {
            // User deleted, destroy session and redirect
            $this->session->sess_destroy();
            redirect('home');
        }
    }
}
