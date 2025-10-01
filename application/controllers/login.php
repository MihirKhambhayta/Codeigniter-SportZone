<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Login_model', 'User_model']);
        $this->load->helper(['form', 'url']);
        $this->load->library(['session']);
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index()
    {
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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function forgot_password()
    {
        $this->load->view('forgot_password');
    }

    // ✅ STEP 1: Send OTP
    public function send_otp()
    {
        $email = $this->input->post('email');

        // 1. Check if email exists
        $user = $this->Login_model->get_user_by_email($email);
        if (!$user) {
            $this->session->set_flashdata('error', 'Email address not found.');
            redirect('login/forgot_password');
            return;
        }

        // 2. OTP attempt limit check (DB-based)
        $now = time();
        $limit = $this->Login_model->get_otp_limit($email);

        if ($limit) {
            $first_time = $limit['first_request_time'];
            $attempts = $limit['attempts'];
            $elapsed = $now - $first_time;

            if ($elapsed <= 86400) {
                if ($attempts >= 3) {
                    $this->session->set_flashdata('error', 'You have reached the maximum number of OTP requests. Try again after 24 hours.');
                    redirect('login/forgot_password');
                    return;
                } else {
                      $attempts++;
                    $this->Login_model->set_otp_limit($email, $attempts, $first_time);
                }
            } else {
                  $attempts = 1;
                $this->Login_model->set_otp_limit($email, $attempts, $now);
            }
        } else {
            $attempts = 1;
            $this->Login_model->set_otp_limit($email, $attempts, $now);
            }

        // 3. Generate and store OTP
        $otp = rand(100000, 999999);
        $this->session->set_userdata('reset_email', $email);
        $this->session->set_userdata('reset_otp', $otp);
        $this->session->set_userdata('reset_otp_time', $now);

        // 4. Send OTP via Email
        $config = [
            'protocol'     => 'smtp',
            'smtp_host'    => 'smtp.gmail.com',
            'smtp_port'    => 587,
            'smtp_user'    => 'l.com',
            'smtp_pass'    => '',
            'mailtype'     => 'text',
            'charset'      => 'utf-8',
            'newline'      => "\r\n",
            'smtp_crypto'  => 'tls'
        ];

        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from('l.com', 'Sport Zone');
        $this->email->to($email);
        $this->email->subject('Password Reset OTP - ' . $otp);
        $this->email->message("Dear Customer,\n\nYour OTP is: $otp\nDo not share this OTP with anyone.\n\nRegards,\nTeam Sport Zone");

        if ($this->email->send()) {
            $data['email'] = $email;
            $data['show_otp_form'] = true;
            $data['otp_attempts'] = $attempts ?? 1;

            $this->session->set_flashdata('success', 'OTP sent to your email address.');
            $this->load->view('forgot_password', $data);
        } else {
            $this->session->set_flashdata('error', 'Failed to send OTP. Please try again.');
            redirect('login/forgot_password');
        }
    }

    // ✅ STEP 2: Reset Password
    public function reset_password()
    {
        $email = $this->input->post('email');
        $input_otp = $this->input->post('otp');
        $new_password = md5($this->input->post('new_password'));

        $session_email = $this->session->userdata('reset_email');
        $session_otp = $this->session->userdata('reset_otp');
        $otp_time = $this->session->userdata('reset_otp_time');

        if (!$otp_time || (time() - $otp_time > 60)) {
            $this->session->set_flashdata('error', 'OTP has expired. Please request a new one.');
            redirect('login/forgot_password');
            return;
        }

        if ($session_email !== $email || $session_otp != $input_otp) {
            $this->session->set_flashdata('error', 'Invalid OTP or email mismatch.');
            redirect('login/forgot_password');
            return;
        }

        $this->Login_model->update_password($email, $new_password);

        $this->session->unset_userdata(['reset_email', 'reset_otp', 'reset_otp_time']);
        $this->Login_model->clear_otp_limit($email);

        $this->session->set_flashdata('success', 'Password reset successfully. Please login.');
        redirect('login');
    }
}
