<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Users_model', 'um');
   }

   public function index()
   {
      $this->_validation_user();
      $data['title'] = 'Users';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['users'] = $this->um->get_users();
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/users/index', $data);
         $this->load->view('management/users/add');
         $this->load->view('templates/footer', $data);
      } else {
         $this->add();
      }
   }

   private function add()
   {
      $name = htmlspecialchars($this->input->post('name', true));
      $email = htmlspecialchars($this->input->post('email', true));
      $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $role_id = htmlspecialchars($this->input->post('role_id'));
      $payload = [
         'name' => $name,
         'email' => $email,
         'password' => $password,
         'role_id' => $role_id
      ];
      $result = $this->um->insert_user($payload);
      if ($result) {
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil menambahkan user </div>');
         redirect('management/users');
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Gagal menambahkan user </div>');
         redirect('management/users');
      }
   }

   private function _validation_user()
   {
      $this->form_validation->set_rules('name', 'Name', 'required|trim');
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
         'is_unique' => 'This email has already registered!'
      ]);
      $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
         'matches' => 'Password dont match!',
         'min_length' => 'Password too short!'
      ]);
   }
}
