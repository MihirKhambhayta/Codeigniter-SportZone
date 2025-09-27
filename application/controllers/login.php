<?php 
class Login extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model(['Login_model', 'User_model']);
        $this->load->helper(['form', 'url']);
        $this->load->library(['session']);

    }

    public function index() {
        $this->load->view('login');
    }

    public function process() {
        $firstname = $this->input->post('firstname');
        $password = md5($this->input->post('password'));

        $user = $this->Login_model->get_user_by_firstname($firstname);

        if (!$user) {
            $this->session->set_flashdata('error', 'User not found.');
            redirect('login');
        }

        if ($user['password'] === $password) {
            $this->User_model->set_logged_in($user['id'], 1);

            $this->session->set_userdata('user', [
                'id' => $user['id'],
                'firstname' => $user['firstname']
            ]);

            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Password incorrect.');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function forgot_password() {
        $this->load->view('forgot_password');
    }

    // STEP 1: Send OTP to Email
   public function send_otp() {
    $email = $this->input->post('email');

    // Check if email exists
    $user = $this->Login_model->get_user_by_email($email);
    if (!$user) {
        $this->session->set_flashdata('error', 'Email address not found.');
        redirect('login/forgot_password');
        return;
    }

    // Generate OTP
    $otp = rand(100000, 999999);

    // Store OTP, email, and timestamp in session (for 10 minutes validity)
    $this->session->set_userdata('reset_email', $email);
    $this->session->set_userdata('reset_otp', $otp);
    $this->session->set_userdata('reset_otp_time', time());  // <-- Add this line
   

    // SMTP Email Config
    $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 587,
        'smtp_user' => 'm@gmail.com',      // 🔁 Change this
        'smtp_pass' => '',              // 🔁 Use App Password, not real one
        'mailtype'  => 'text',
        'charset'   => 'utf-8',
        'newline'   => "\r\n",
        'smtp_crypto' => 'tls'
    ];

    // Load and initialize email library
    $this->load->library('email');
    $this->email->initialize($config);

    // Compose email
    $this->email->from('m@gmail.com', 'Sport Zone');
    $this->email->to($email);
    $this->email->subject('Password Reset OTP - ' . $otp);
    $this->email->message("
    Dear Customer,
    $otp is your OTP for password reset. Please do not share 
    the OTP with others.
    Regards,
    Team Sport Zone");

    if ($this->email->send()) {
        $data['email'] = $email;
        $data['show_otp_form'] = true;
        $this->session->set_flashdata('success', 'OTP sent to your email address.');
        $this->load->view('forgot_password', $data);
    } else {
        $this->session->set_flashdata('error', 'Failed to send OTP. Please try again.');
        redirect('login/forgot_password');
    }
   }

    public function verify_otp() {
    $input_otp = $this->input->post('otp');
    $session_otp = $this->session->userdata('reset_otp');
    $otp_time = $this->session->userdata('reset_otp_time');

    // Check if OTP timestamp exists & expired (1 minutes = 60 seconds)
    if (!$otp_time || (time() - $otp_time > 120)) {
        $this->session->set_flashdata('error', 'OTP has expired. Please request a new one.');
        redirect('login/forgot_password');
        return;
    }

    // Check if OTP matches
    if ($input_otp == $session_otp) {
        // Clear OTP data after success
        $this->session->unset_userdata(['reset_otp', 'reset_otp_time']);
        
        // Proceed to password reset or next step
        $this->session->set_flashdata('success', 'OTP verified successfully. You can reset your password now.');
        redirect('login/reset_password'); // Or your password reset page
    } else {
        $this->session->set_flashdata('error', 'Invalid OTP. Please try again.');
        redirect('login/forgot_password');
    }
}


    // STEP 2: Verify OTP and reset password
    public function reset_password() {
        $email = $this->input->post('email');
        $input_otp = $this->input->post('otp');
        $new_password = md5($this->input->post('new_password'));

        $session_email = $this->session->userdata('reset_email');
        $session_otp = $this->session->userdata('reset_otp');

        if ($session_email !== $email || $session_otp != $input_otp) {
            $this->session->set_flashdata('error', 'Invalid OTP or email mismatch.');
            redirect('login/forgot_password');
        }

        // Reset password
        $this->Login_model->update_password($email, $new_password);

        // Clear session OTP
        $this->session->unset_userdata('reset_email');
        $this->session->unset_userdata('reset_otp');

        $this->session->set_flashdata('success', 'Password reset successfully. Please login.');
        redirect('login');
    }
}
