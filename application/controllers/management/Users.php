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
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/users/index', $data);
         $this->load->view('management/users/add');
         $this->load->view('management/users/edit');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         $delete = $this->input->post('deleteData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else if ($delete) {
            return $this->delete();
         } else {
            $this->notification->notify_error('management/users', 'Method initidak ditemukan');
         }
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
         'role_id' => $role_id,
         'image' => "default.jpg",
      ];

      $result = $this->um->insert_user($payload);
      if ($result) {
         $this->notification->notify_success('management/users', 'Berhasil menambahkan user');
      } else {
         $this->notification->notify_error('management/users', 'Gagal menambahkan user');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $name = htmlspecialchars($this->input->post('name', true));
      $is_active = htmlspecialchars($this->input->post('is_active'));
      $payload = [
         'name' => $name,
         'image' => "default.jpg",
         'is_active' => $is_active
      ];
      $result = $this->um->update_user($id, $payload);
      if ($result) {
         $this->notification->notify_success('management/users', 'Berhasil memperbarui user');
      } else {
         $this->notification->notify_error('management/users', 'Gagal memperbarui user');
      }
   }

   private function delete()
   {
   }

   private function _validation_user()
   {
      $this->form_validation->set_rules('name', 'Name', 'required|trim');
      // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
      //    'is_unique' => 'This email has already registered!'
      // ]);
      // $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
      //    'matches' => 'Password dont match!',
      //    'min_length' => 'Password too short!'
      // ]);
      // $this->form_validation->set_rules('role_id', 'Role', 'required|trim');
   }
}
