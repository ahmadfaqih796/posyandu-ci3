<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kematian extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Ibu_model', 'im');
   }

   public function index()
   {
      $this->_validation();
      $data['title'] = 'Kematian Ibu Hamil';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->im->get_all_kematian();
      $data['bidan'] = $this->im->get_all_ibu_hamil_no_dead();
      $data['role'] = $this->session->userdata('role_id');

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('data/ibu_hamil/kematian/index', $data);
         $this->load->view('data/ibu_hamil/kematian/add');
         $this->load->view('data/ibu_hamil/kematian/edit');
         $this->load->view('data/ibu_hamil/kematian/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('data/ibu_hamil/kematian', 'Method initidak ditemukan');
         }
      }
   }

   private function add()
   {
      $result = $this->bm->add('kematian_ibu_hamil', $this->_payload());
      $this->bm->update('bidan', $this->input->post('bumil_id'), ['is_death' => 1]);
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/kematian', 'Berhasil menambahkan kematian');
      } else {
         $this->notification->notify_error('data/ibu_hamil/kematian', 'Gagal menambahkan kematian');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update('kematian_ibu_hamil', $id, $this->_payload("update"));
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/kematian', 'Berhasil memperbarui kematian');
      } else {
         $this->notification->notify_error('data/ibu_hamil/kematian', 'Gagal memperbarui kematian');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete("kematian_ibu_hamil", $id);
      $this->bm->update('bidan', $this->input->post('bumil_id'), ['is_death' => 0]);
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/kematian', 'Berhasil menghapus kematian');
      } else {
         $this->notification->notify_error('data/ibu_hamil/kematian', 'Gagal menghapus kematian');
      }
   }

   private function _payload()
   {
      $bumil_id = htmlspecialchars($this->input->post('bumil_id', true));
      $tgl_kematian = htmlspecialchars($this->input->post('tgl_kematian', true));
      $usia = htmlspecialchars($this->input->post('usia', true));
      $penyebab = htmlspecialchars($this->input->post('penyebab', true));
      $jenis = htmlspecialchars($this->input->post('jenis', true));
      $meninggal_di = htmlspecialchars($this->input->post('meninggal_di', true));
      $keterangan = htmlspecialchars($this->input->post('keterangan', true));


      $payload = [
         'bumil_id' => $bumil_id,
         'tgl_kematian' => $tgl_kematian,
         'usia' => $usia,
         'penyebab' => $penyebab,
         'jenis' => $jenis,
         'meninggal_di' => $meninggal_di,
         'keterangan' => $keterangan
      ];
      return $payload;
   }


   private function _validation()
   {
      $this->form_validation->set_rules('bumil_id', 'Nama Ibu', 'required|trim');
      $this->form_validation->set_rules('tgl_kematian', 'Tanggal Kematian', 'required|trim');
   }
}
