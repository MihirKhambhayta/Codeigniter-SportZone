<?php
class Users extends CI_Controller 
{

   public function __construct() 
   {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->helper('url');  
   }
    

    public function index() 
    {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('users/index', $data);
    }

   public function create() 
    {
        $this->load->view('users/create');
    }

     public function store() 
    {
        $data = [
            'firstname' => $this->input->post('firstname'),
            'lastname'  => $this->input->post('lastname'),
            'email'     => $this->input->post('email'),
            'password'  => $this->input->post('password'),
            'phone'     => $this->input->post('phone'),
            'date'     => $this->input->post('date'),
            'city'      => $this->input->post('city')
        ];
        $this->User_model->insert_user($data);
        redirect('users');
    }

      public function edit($id) 
    {
        $data['user'] = $this->User_model->get_user($id);
        $this->load->view('users/edit', $data);
    }

    
    public function update($id)
    {
        $data = [
            'firstname' => $this->input->post('firstname'),
            'lastname'  => $this->input->post('lastname'),
            'email'     => $this->input->post('email'),
            'phone'     => $this->input->post('phone'),
            'date'      => $this->input->post('date'),
            'city'      => $this->input->post('city'),
        ];
        $this->User_model->update_user($id, $data);
        redirect('users');
    }

    
    public function delete($id) 
    {
        $this->User_model->delete_user($id);
        redirect('users');
    }
}

?>

