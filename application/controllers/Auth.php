<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation', 'email');
   }
   public function index()
   {
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == false) {
         $data['title'] = 'Login';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/login');
         $this->load->view('templates/auth_footer');
      } else {
         $this->_login();
      }
   }

   public function forgot_password()
   {
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Forgot Password';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/forgot_password');
         $this->load->view('templates/auth_footer');
      } else {
         $this->_send_reset_link();
      }
   }

   public function forgot_password_bumil()
   {
      $this->form_validation->set_rules('nik', 'NIK', 'required');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Forgot Password';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/forgot_password_nik');
         $this->load->view('templates/auth_footer');
      } else {
         $this->_send_reset_link_bumil();
      }
   }

   public function reset_password($token = null)
   {
      if (!$token) {
         redirect('auth/forgot_password');
      }

      $data['token'] = $token;
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[password2]');
      $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Reset Password';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/reset_password', $data);
         $this->load->view('templates/auth_footer');
      } else {
         $this->_update_password($token);
      }
   }

   public function reset_password_bumil($token = null)
   {
      if (!$token) {
         redirect('auth/forgot_password_bumil');
      }

      $data['token'] = $token;
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[password2]');
      $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

      if ($this->form_validation->run() == false) {
         $data['title'] = 'Reset Password';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/reset_password_bumil', $data);
         $this->load->view('templates/auth_footer');
      } else {
         $this->_update_password_bumil($token);
      }
   }

   private function _update_password($token)
   {
      $new_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $email = $this->db->get_where('password_reset', ['token' => $token])->row_array()['email'];

      if ($email) {
         $this->db->update('users', ['password' => $new_password], ['email' => $email]);
         $this->db->delete('password_reset', ['token' => $token]);

         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password has been updated. </div>');
         redirect('auth');
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Invalid or expired token. </div>');
         redirect('auth/forgot_password');
      }
   }

   private function _update_password_bumil($token)
   {
      $new_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $nik = $this->db->get_where('password_reset_bumil', ['token' => $token])->row_array()['nik'];

      if ($nik) {
         $this->db->update('ibu_hamil', ['password' => $new_password], ['nik' => $nik]);
         $this->db->delete('password_reset', ['token' => $token]);

         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password has been updated. </div>');
         redirect('auth/bumil');
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Invalid or expired token. </div>');
         redirect('auth/forgot_password_bumil');
      }
   }

   private function _send_reset_link()
   {
      $email = $this->input->post('email');
      $user = $this->db->get_where('users', ['email' => $email])->row_array();

      if ($user) {
         $token = bin2hex(random_bytes(50)); // Generate a random token
         $this->db->insert('password_reset', [
            'email' => $email,
            'token' => $token,
            'created_at' => time()
         ]);

         $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'live.smtp.mailtrap.io',
            'smtp_port' => 587,
            'smtp_user' => 'api',
            'smtp_pass' => 'd5d1d235c1996a58415d11c567d6dcac',
            'crlf' => "\r\n",
            'newline' => "\r\n"
         );


         $this->email->initialize($config);

         // Send email with reset link
         $reset_link = base_url('auth/reset_password/' . $token);
         $message = "Click this link to reset your password: " . $reset_link;

         // Use your email sending library
         $this->email->from('mailtrap@demomailtrap.com', 'Your App');
         $this->email->to($email);
         $this->email->subject('Password Reset Request');
         $this->email->message($message);
         $this->email->send();

         // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Check your email for a link to reset your password. </div>');
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Change Password. </div>');
         redirect('auth/reset_password/' . $token);
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email not registered! </div>');
         redirect('auth/forgot_password');
      }
   }

   private function _send_reset_link_bumil()
   {
      $nik = $this->input->post('nik');
      $user = $this->db->get_where('ibu_hamil', ['nik' => $nik])->row_array();

      if ($user) {
         $token = bin2hex(random_bytes(50)); // Generate a random token
         $this->db->insert('password_reset_bumil', [
            'nik' => $nik,
            'token' => $token,
            'created_at' => time()
         ]);

         $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'live.smtp.mailtrap.io',
            'smtp_port' => 587,
            'smtp_user' => 'api',
            'smtp_pass' => 'd5d1d235c1996a58415d11c567d6dcac',
            'crlf' => "\r\n",
            'newline' => "\r\n"
         );


         $this->email->initialize($config);

         // Send email with reset link
         $reset_link = base_url('auth/reset_password_bumil/' . $token);
         $message = "Click this link to reset your password: " . $reset_link;

         // Use your email sending library
         $this->email->from('mailtrap@demomailtrap.com', 'Your App');
         $this->email->to($nik);
         $this->email->subject('Password Reset Request');
         $this->email->message($message);
         $this->email->send();

         // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Check your email for a link to reset your password. </div>');
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Change Password. </div>');
         redirect('auth/reset_password_bumil/' . $token);
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Nik not registered! </div>');
         redirect('auth/forgot_password_bumil');
      }
   }

   public function bumil()
   {
      $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == false) {
         $data['title'] = 'Login';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/login_bumil');
         $this->load->view('templates/auth_footer');
      } else {
         $this->_login("bumil");
      }
   }

   public function bunda()
   {
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == false) {
         $data['title'] = 'Login Bunda';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/login_bunda');
         $this->load->view('templates/auth_footer');
      } else {
         $this->_login_bunda();
      }
   }

   private function _login_bunda()
   {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $bunda = $this->db->get_where('ibu', ['email' => $email])->row_array();
      // return print_r($bunda);
      if ($bunda) {
         if (password_verify($password, $bunda['password'])) {
            $data = [
               'user_id' => $bunda['id'],
               'nik' => $bunda['nik'],
               'fullname' => $bunda['n_ibu'],
               'posyandu_id' => $bunda['posyandu_id'],
            ];
            $this->session->set_userdata($data);
            return redirect('bunda');
         } else {
            $this->notification->notify_error('auth/bunda', 'Password ini tidak sesuai');
         }
      } else {
         $this->notification->notify_error('auth/bunda', 'Email ini tidak terdaftar');
      }
   }

   private function _login($type = null)
   {
      $email = $this->input->post('email');
      $nik = $this->input->post('nik');
      $password = $this->input->post('password');
      if ($type === "bumil") {
         $bumil = $this->db->get_where('ibu_hamil', ['nik' => $nik])->row_array();

         if ($bumil) {
            if (password_verify($password, $bumil['password'])) {
               $data = [
                  'user_id' => $bumil['id'],
                  'nik' => $bumil['nik'],
                  'fullname' => $bumil['n_ibu'],
               ];
               $this->session->set_userdata($data);
               redirect('bumil');
            } else {
               $this->notification->notify_error('auth/bumil', 'Password ini tidak sesuai');
            }
         } else {
            $this->notification->notify_error('auth/bumil', 'NIK ini tidak terdaftar');
         }
      }
      $user = $this->db->get_where('users', ['email' => $email])->row_array();
      // cek usernya ada
      if ($user) {
         // jika user aktif
         if ($user['is_active'] == 1) {
            // cek password
            if (password_verify($password, $user['password'])) {
               $data = [
                  'user_id' => $user['id'],
                  'email' => $user['email'],
                  'role_id' => $user['role_id'],
                  'fullname' => $user['name'],
               ];
               $this->session->set_userdata($data);
               if ($user['role_id'] == 1 || $user['role_id'] == 7 || $user['role_id'] == 8 || $user['role_id'] == 4) {
                  redirect('dashboard');
               } elseif ($user['role_id'] == 2) {
                  redirect('dashboard');
               } elseif ($user['role_id'] == 3) {
                  redirect('user/home');
               }
               // ibu hamil
               elseif ($user['role_id'] == 5) {
                  redirect('user/home');
               } elseif ($user['role_id'] == 6) {
                  redirect('dashboard');
               } else {
                  $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> You are not allowed to access </div>');
                  redirect('auth');
               }
            } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! </div>');
               redirect('auth');
            }
         } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This email has not been activated! </div>');
            redirect('auth');
         }
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not registered! </div>');
         redirect('auth');
      }
   }

   public function registration()
   {
      $this->form_validation->set_rules('name', 'Name', 'required|trim');
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
         'is_unique' => 'This email has already registered!'
      ]);
      $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
         'matches' => 'Password dont match!',
         'min_length' => 'Password too short!'
      ]);
      $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]', [
         'matches' => 'Password dont match!',
         'min_length' => 'Password too short!'
      ]);
      if ($this->form_validation->run() == false) {
         $data['title'] = 'Registrasi';
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/registration');
         $this->load->view('templates/auth_footer');
      } else {
         $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 3,
            'is_active' => 1,
         ];
         $this->db->insert('users', $data);
         $user_id = $this->db->insert_id();
         $this->db->insert('anak', [
            'user_id' => $user_id
         ]);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! your account has been created. Please Login </div>');
         redirect('auth');
      }
   }

   public function logout()
   {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('role_id');
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> You have been logged out! </div>');
      redirect('auth');
   }
}
