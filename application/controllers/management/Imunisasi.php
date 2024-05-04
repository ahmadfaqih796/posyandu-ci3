<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imunisasi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Imunisasi_model', 'im');
   }

   public function index()
   {
      $this->_validation_imunisasi();
      $data['title'] = 'Imunisasi';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->im->get_all_type_imunisasi();

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/imunisasi/index', $data);
         $this->load->view('management/imunisasi/add');
         $this->load->view('management/imunisasi/edit');
         $this->load->view('management/imunisasi/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('management/imunisasi', 'Method initidak ditemukan');
         }
      }
   }

   private function add()
   {
      $result = $this->bm->add('tipe_imunisasi', $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/imunisasi', 'Berhasil menambahkan imunisasi');
      } else {
         $this->notification->notify_error('management/imunisasi', 'Gagal menambahkan imunisasi');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update('tipe_imunisasi', $id, $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/imunisasi', 'Berhasil memperbarui imunisasi');
      } else {
         $this->notification->notify_error('management/imunisasi', 'Gagal memperbarui imunisasi');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $t_imunisasi = htmlspecialchars($this->input->post('t_imunisasi', true));
      if ($t_imunisasi > 0) {
         return $this->notification->notify_error('management/imunisasi', 'Imunisasi ini tidak dapat di hapus karena terdapat anggota');
      }
      $result = $this->bm->delete('tipe_imunisasi', $id);
      if ($result) {
         $this->notification->notify_success('management/imunisasi', 'Berhasil menghapus imunisasi');
      } else {
         $this->notification->notify_error('management/imunisasi', 'Gagal menghapus imunisasi');
      }
   }

   private function _payload()
   {
      $n_imunisasi = htmlspecialchars($this->input->post('n_imunisasi', true));
      $payload = [
         'n_imunisasi' => $n_imunisasi
      ];
      return $payload;
   }

   private function _validation_imunisasi()
   {
      $this->form_validation->set_rules('n_imunisasi', 'Nama Imunisasi', 'required|trim');
   }
}
