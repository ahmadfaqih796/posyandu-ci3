<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gizi_Ibu_Hamil extends CI_Controller
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
      $data['title'] = 'Status Gizi Ibu Hamil';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['bidan'] = $this->bm->get_all("bidan");
      // $data['data'] = $this->bm->get_all("gizi_ibu_hamil");
      $data['data'] = $this->im->get_all_bidan("gizi_ibu_hamil");
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/gizi_ibu_hamil/index', $data);
         $this->load->view('monitoring/gizi_ibu_hamil/add');
         // $this->load->view('monitoring/gizi_ibu_hamil/edit');
         // $this->load->view('monitoring/gizi_ibu_hamil/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('monitoring/gizi_ibu_hamil', 'Method initidak ditemukan');
         }
      }
   }

   private function add()
   {

      $result = $this->bm->add('gizi_ibu_hamil', $this->_payload());
      if ($result) {
         $this->notification->notify_success('monitoring/gizi_ibu_hamil', 'Berhasil menambahkan posyandu');
      } else {
         $this->notification->notify_error('monitoring/gizi_ibu_hamil', 'Gagal menambahkan posyandu');
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
         $this->notification->notify_success('monitoring/gizi_ibu_hamil', 'Berhasil memperbarui posyandu');
      } else {
         $this->notification->notify_error('monitoring/gizi_ibu_hamil', 'Gagal memperbarui posyandu');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $t_kader = htmlspecialchars($this->input->post('t_kader', true));
      $t_anak = htmlspecialchars($this->input->post('t_anak', true));
      if ($t_kader > 0 || $t_anak > 0) {
         return $this->notification->notify_error('monitoring/gizi_ibu_hamil', 'Posyandu ini tidak dapat di hapus karena terdapat anggota');
      }
      $result = $this->pm->delete_posyandu($id);
      if ($result) {
         $this->notification->notify_success('monitoring/gizi_ibu_hamil', 'Berhasil menghapus posyandu');
      } else {
         $this->notification->notify_error('monitoring/gizi_ibu_hamil', 'Gagal menghapus posyandu');
      }
   }

   private function _payload()
   {
      $bidan_id = htmlspecialchars($this->input->post('bidan_id', true));
      $trimester = htmlspecialchars($this->input->post('trimester', true));
      $sesi = htmlspecialchars($this->input->post('sesi', true));
      $berat_badan = htmlspecialchars($this->input->post('berat_badan', true));
      $tinggi_badan = htmlspecialchars($this->input->post('tinggi_badan', true));
      $nilai_gizi = $berat_badan / (($tinggi_badan * $tinggi_badan) / 10000);

      $payload = [
         'bidan_id' => $bidan_id,
         'trimester' => $trimester,
         'sesi' => $sesi,
         'berat_badan' => $berat_badan,
         'tinggi_badan' => $tinggi_badan,
         'nilai_gizi' => $nilai_gizi
      ];
      return $payload;
   }

   private function _validation()
   {
      $this->form_validation->set_rules('bidan_id', 'Nama Posyandu', 'required|trim');
   }
}
