<?php
class Logout extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model');
    }

    public function index() 
    {
        $user = $this->session->userdata('user');
        if (!empty($user['id'])) {
            $this->User_model->set_logged_in($user['id'], 0);
        }

        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('home');
    }
}
