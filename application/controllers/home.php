
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }


    public function index() {
    $data['logout_by_admin'] = $this->session->flashdata('logout_by_admin');
    $this->load->view('home', $data);
}
}
?>
