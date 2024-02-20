<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posyandu extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Posyandu_model', 'pm');
      $this->load->model('Base_model', 'bm');
   }

   public function index()
   {
      $this->_validation_imunisasi();
      $data['title'] = 'Imunisasi';
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
         $this->load->view('management/posyandu/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
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
      $n_posyandu = htmlspecialchars($this->input->post('n_posyandu', true));
      $alamat = htmlspecialchars($this->input->post('alamat', true));
      $keterangan = htmlspecialchars($this->input->post('keterangan', true));
      $payload = [
         'n_posyandu' => $n_posyandu,
         'alamat' => $alamat,
         'keterangan' => $keterangan
      ];
      $result = $this->pm->update_posyandu($id, $payload);
      if ($result) {
         $this->notification->notify_success('management/posyandu', 'Berhasil memperbarui posyandu');
      } else {
         $this->notification->notify_error('management/posyandu', 'Gagal memperbarui posyandu');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $t_kader = htmlspecialchars($this->input->post('t_kader', true));
      $t_anak = htmlspecialchars($this->input->post('t_anak', true));
      if ($t_kader > 0 || $t_anak > 0) {
         return $this->notification->notify_error('management/posyandu', 'Posyandu ini tidak dapat di hapus karena terdapat anggota');
      }
      $result = $this->pm->delete_posyandu($id);
      if ($result) {
         $this->notification->notify_success('management/posyandu', 'Berhasil menghapus posyandu');
      } else {
         $this->notification->notify_error('management/posyandu', 'Gagal menghapus posyandu');
      }
   }

   private function _validation_imunisasi()
   {
      $this->form_validation->set_rules('n_posyandu', 'Nama Posyandu', 'required|trim');
      $this->form_validation->set_rules('alamat', 'Alamat Posyandu', 'required|trim');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
   }
}
