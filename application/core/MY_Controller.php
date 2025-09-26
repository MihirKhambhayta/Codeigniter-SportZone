<?php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');

        // Check for user session
        $user = $this->session->userdata('user');

        if (!$user || !isset($user['id'])) {
            // Not logged in
            redirect('login');
        }

        $user_data = $this->User_model->get_user_by_id($user['id']);

        if (!$user_data) {
            // User deleted
            $this->session->sess_destroy();
            redirect('home');
        }

      
        if ($user_data->is_logged_in == 0) {
         // Admin forced logout
        $this->session->set_flashdata('logout_by_admin', true);
             $this->session->unset_userdata('user'); // remove user data
             redirect('home');
         }
    
    }
}