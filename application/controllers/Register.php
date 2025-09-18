<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Register extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library(array('form_validation', 'session'));
            $this->load->model('User_model');
        }

        public function index() {
            $this->load->view('register');
        }

        public function process() {
            // Validation rules
            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
            $this->form_validation->set_rules('city', 'City', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('register');
            } else {
                $data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname'  => $this->input->post('lastname'),
                    'email'     => $this->input->post('email'),
                    'password'  => md5($this->input->post('password')),
                    'phone'     => $this->input->post('phone'),
                    'city'      => $this->input->post('city'),
                );

                $this->User_model->insert_user($data);
                $this->session->set_flashdata('success', 'Registration successful!');
                redirect('login');
            }
        }
    }
?>