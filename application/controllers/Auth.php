<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
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
                  'role_id' => $bumil['role_id']
               ];
               $this->session->set_userdata($data);
               redirect('user/home');
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
                  'role_id' => $user['role_id']
               ];
               $this->session->set_userdata($data);
               if ($user['role_id'] == 1 || $user['role_id'] == 7) {
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
