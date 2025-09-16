<?php
    class Login extends CI_Controller 
    {

        public function __construct() {
            parent::__construct();
            $this->load->model('Login_model');
            $this->load->helper(['form', 'url']);
            $this->load->library('session');
        }

        public function index() {
            $this->load->view('login');
        }

        public function process() 
        {
            $firstname = $this->input->post('firstname');
            $password = md5($this->input->post('password'));
            $user = $this->Login_model->get_user_by_firstname($firstname);

                if (!$user) {
                    $this->session->set_flashdata('error', 'User not found.');
                    redirect('login');
                }

             
                if ($user['password'] === $password) {
                    // Store user session data
                    $this->session->set_userdata('user', ['firstname'=> $user['firstname']]);
                    redirect('dashboard'); // Next page
                }
                else {
                    
                    $this->session->set_flashdata('error', 'Password incorrect.');
                    redirect('login');
                }
        }

        public function logout() 
        {
            $this->session->unset_userdata('user');
            redirect('login');
        }
        

        //forgate password

        public function forgot_password() 
        {
            $this->load->view('forgot_password');
        }

        public function reset_password() 
        {
            $firstname = $this->input->post('firstname');
            $new_password = $this->input->post('new_password');
            $user = $this->Login_model->get_user_by_firstname($firstname);

            if (!$user) {
                 $this->session->set_flashdata('error', 'Firstname not found.');
                redirect('login/forgot_password');
            }

            $hashed_password = md5($new_password);
            $this->Login_model->update_password($firstname, $hashed_password);

            $this->session->set_flashdata('success', 'Password reset successfully. Please login.');
            redirect('login');
       }
    }  
?>
