<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller 
{
     public function __construct() 
    {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->library(['session']);
        $this->load->model('Contact_model');
    }

    public function index() {
        $this->load->view('contact');
    }

    public function submit()
     {
        if ($this->input->method() === 'post') 
            {
            $name = $this->input->post('name', TRUE);
            $email = $this->input->post('email', TRUE);
            $message = $this->input->post('message', TRUE);

            if ($name && $email && $message) 
                {
                
                $this->Contact_model->save_contact
                ([
                    'name'    => $name,
                    'email'   => $email,
                    'message' => $message
                ]);
                echo 'success';
            } 
            else 
            {
                echo 'error';
            }
        } 
        else 
            {
            show_404();
        }
    }
}
?>