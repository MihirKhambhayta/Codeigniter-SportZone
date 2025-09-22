<?php 
class Login extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model(['Login_model', 'User_model']); // Added User_model
        $this->load->helper(['form', 'url']);
        $this->load->library('session');
    }
    
    // Login form
    public function index() {
        $this->load->view('login');
    }

    // Process user login
    public function process() {
        $firstname = $this->input->post('firstname');
        $password = md5($this->input->post('password'));

        $user = $this->Login_model->get_user_by_firstname($firstname);

        if (!$user) {
            $this->session->set_flashdata('error', 'User not found.');
            redirect('login');
        }

        if ($user['password'] === $password) {
            // ✅ Mark user as logged in
            $this->User_model->set_logged_in($user['id'], 1);

            // ✅ Set session
            $this->session->set_userdata('user', [
                'id' => $user['id'],
                'firstname' => $user['firstname']
            ]);

            redirect('dashboard'); // User dashboard
        } else {
            $this->session->set_flashdata('error', 'Password incorrect.');
            redirect('login');
        }
    }

    // Logout user
    public function logout() {
        $user = $this->session->userdata('user');
        if (!empty($user['id'])) {
            // ✅ Mark user as logged out
            $this->User_model->set_logged_in($user['id'], 0);
        }

        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('login');
    }

    // Forgot password view
    public function forgot_password() {
        $this->load->view('forgot_password');
    }

    // Reset password logic
    public function reset_password() {
        $firstname = $this->input->post('firstname');
        $new_password = md5($this->input->post('new_password'));

        $user = $this->Login_model->get_user_by_firstname($firstname);
        if (!$user) {
            $this->session->set_flashdata('error', 'Firstname not found.');
            redirect('login/forgot_password');
        }

        $this->Login_model->update_password($firstname, $new_password);

        $this->session->set_flashdata('success', 'Password reset successfully. Please login.');
        redirect('login');
    }
}
?>
