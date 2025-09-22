<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Admin_model', 'User_model']);
        $this->load->helper(['url', 'form']);
        $this->load->library(['session']);


    }

    public function index() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }
        $this->load->view('admin/login');
    }

    public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->Admin_model->validate_admin($username, $password);
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
    $this->_check_login(); // ✅ Reuse your login check function
   
    $data['logged_in_users'] = $this->User_model->count_logged_in_users();//asssss
    $data['total_users'] = $this->User_model->count_users();  // ✅ Pull user count
    $this->load->view('admin/dashboard', $data);  // ✅ Pass to view
     
}
   

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }

    private function _check_login() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
    }

    // -------------------------
    // USER MANAGEMENT
    // -------------------------

    public function users() {
        $this->_check_login();
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('admin/users/index', $data);
    }

    public function user_create() {
        $this->_check_login();
        $this->load->view('admin/users/create');
    }

    public function user_store() {
        $this->_check_login();
        $data = [
            'firstname' => $this->input->post('firstname'),
            'lastname'  => $this->input->post('lastname'),
            'email'     => $this->input->post('email'),
            'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'phone'     => $this->input->post('phone'),
            'date'      => $this->input->post('date'),
            'city'      => $this->input->post('city')
        ];
        $this->User_model->insert_user($data);
        redirect('admin/users');
    }

    public function user_edit($id) {
        $this->_check_login();
        $data['user'] = $this->User_model->get_user($id);
        $this->load->view('admin/users/edit', $data);
    }

    public function user_update($id) {
        $this->_check_login();
        $data = [
            'firstname' => $this->input->post('firstname'),
            'lastname'  => $this->input->post('lastname'),
            'email'     => $this->input->post('email'),
            'phone'     => $this->input->post('phone'),
            'date'      => $this->input->post('date'),
            'city'      => $this->input->post('city')
        ];
        $this->User_model->update_user($id, $data);
        redirect('admin/users');
    }

    public function user_delete($id) {
        $this->_check_login();
        $this->User_model->delete_user($id);
        redirect('admin/users');
    }
}
