<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posyandu extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Posyandu_model', 'pm');
   }

   public function index()
   {
      $this->_validation_posyandu();
      $data['title'] = 'Posyandu';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->pm->get_posyandu();
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/posyandu/index', $data);
         $this->load->view('management/posyandu/add');
         $this->load->view('management/posyandu/edit');
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
            $this->notification->notify_error('management/posyandu', 'Method initidak ditemukan');
         }
      }
   }

   private function add()
   {
      $user_id = htmlspecialchars($this->input->post('user_id'));
      $n_posyandu = htmlspecialchars($this->input->post('n_posyandu', true));
      $alamat = htmlspecialchars($this->input->post('alamat', true));
      $keterangan = htmlspecialchars($this->input->post('keterangan', true));
      $payload = [
         'user_id' => $user_id,
         'n_posyandu' => $n_posyandu,
         'alamat' => $alamat,
         'keterangan' => $keterangan
      ];

      $result = $this->pm->add_posyandu($payload);
      if ($result) {
         $this->notification->notify_success('management/posyandu', 'Berhasil menambahkan posyandu');
      } else {
         $this->notification->notify_error('management/posyandu', 'Gagal menambahkan posyandu');
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
      $result = $this->pm->update_user($id, $payload);
      if ($result) {
         $this->notification->notify_success('management/posyandu', 'Berhasil memperbarui user');
      } else {
         $this->notification->notify_error('management/posyandu', 'Gagal memperbarui user');
      }
   }

   private function delete()
   {
   }

   private function _validation_posyandu()
   {
      $this->form_validation->set_rules('n_posyandu', 'Nama Posyandu', 'required|trim');
      $this->form_validation->set_rules('alamat', 'Alamat Posyandu', 'required|trim');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
   }
}
