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
             $admin_id = $admin->id;
             $this->Admin_model->set_logged_in($admin_id, 1);
           
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
    $data['total_admins'] = $this->Admin_model->count_admins();
    $data['logged_in_admins']  = $this->Admin_model->count_logged_in_admins();
    $this->load->view('admin/dashboard', $data);  // ✅ Pass to view
    
    }
 
    public function logout() {
    $admin_id = $this->session->userdata('admin_id');
    if ($admin_id) {
        $this->Admin_model->set_logged_in($admin_id, 0);  // <-- Add this line to mark logged out
    }

    $this->session->unset_userdata('admin_logged_in');
    $this->session->unset_userdata('admin_id');
    $this->session->unset_userdata('admin_username');
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
            'password'  => md5($this->input->post('password')),
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

    // -------------------------
    // Admin USER MANAGEMENT
    // -------------------------


    public function admin_user() {

    $this->_check_login();
        $data['users'] = $this->Admin_model->get_all_admin_user();
    $this->load->view('admin/admin_user/admin_index', $data);  
     }
        public function admin_create() {
        $this->_check_login(); // optional
        $this->load->view('admin/admin_user/admin_create');
    }
       
    public function admin_store() {
        $this->_check_login();
        $data = [
            'username' => $this->input->post('username'),
            'password'  => $this->input->post('password'),
        
        ];
        $this->Admin_model->insert_user($data);
        redirect('admin/admin_user');
    }

    public function admin_edit($id) {
        $this->_check_login();
        $data['user'] = $this->Admin_model->get_user($id);
        $this->load->view('admin/admin_user/admin_edit', $data);
    }

    public function admin_update($id) {
        $this->_check_login();
        $data = [
            'username' => $this->input->post('username'),
            'password'  => $this->input->post('password'),
            
        ];
        $this->Admin_model->update_user($id, $data);
        redirect('admin/admin_user');
    }

    public function admin_delete($id) {
        $this->_check_login();
        $this->Admin_model->delete_user($id);
        redirect('admin/admin_user');
    }

     // -------------------------
        // Message MANAGEMENT
    // -------------------------

    
    public function message() {
        $this->_check_login();
         $this->load->model('Contact_model');
        $data['message'] = $this->Contact_model->get_all_message();

        // ✅ Make sure to pass $data to the view
        $this->load->view('admin/message/admin_message', $data);
    }
  
}



