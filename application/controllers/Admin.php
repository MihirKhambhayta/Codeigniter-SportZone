<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session']);
        

    }

    public function index() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }
        $this->load->view('admin/login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->Admin_model->check_login($username, $password);
        if ($admin) {
            $this->session->set_userdata([
                'admin_logged_in' => true,
                'admin_id' => $admin->id,
                'admin_username' => $admin->username
            ]);
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('admin');
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
        $this->load->view('admin/dashboard');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }
}
