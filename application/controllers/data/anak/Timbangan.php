<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Timbangan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Anak_model', 'am');
   }

   public function index()
   {
      $this->_validation();
      $data['title'] = 'Penimbangan & Pengukuran Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->am->get_all_anak_table('timbangan_anak');
      $data['anak'] = $this->am->get_all_anak_no_dead();

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('data/anak/timbangan/index', $data);
         $this->load->view('data/anak/timbangan/add');
         $this->load->view('data/anak/timbangan/edit');
         $this->load->view('data/anak/timbangan/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('data/anak/timbangan', 'Method initidak ditemukan');
         }
      }
   }

   private function add()
   {
      $result = $this->bm->add('kematian_anak', $this->_payload());
      $this->am->update_anak_by_user_id($this->input->post('anak_id'), ['is_death' => 1]);
      if ($result) {
         $this->notification->notify_success('data/anak/timbangan', 'Berhasil menambahkan kematian');
      } else {
         $this->notification->notify_error('data/anak/timbangan', 'Gagal menambahkan kematian');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update('kematian_anak', $id, $this->_payload("update"));
      if ($result) {
         $this->notification->notify_success('data/anak/timbangan', 'Berhasil memperbarui kematian');
      } else {
         $this->notification->notify_error('data/anak/timbangan', 'Gagal memperbarui kematian');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete("kematian_anak", $id);
      $this->am->update_anak_by_user_id($this->input->post('anak_id'), ['is_death' => 0]);
      if ($result) {
         $this->notification->notify_success('data/anak/timbangan', 'Berhasil menghapus kematian');
      } else {
         $this->notification->notify_error('data/anak/timbangan', 'Gagal menghapus kematian');
      }
   }

   private function _payload()
   {
      $anak_id = htmlspecialchars($this->input->post('anak_id', true));
      $umur = htmlspecialchars($this->input->post('umur', true));
      $lingkar_kepala = htmlspecialchars($this->input->post('lingkar_kepala', true));
      $berat_badan = htmlspecialchars($this->input->post('berat_badan', true));
      $tinggi_badan = htmlspecialchars($this->input->post('tinggi_badan', true));

      $payload = [
         'anak_id' => $anak_id,
         'umur' => $umur,
         'lingkar_kepala' => $lingkar_kepala,
         'berat_badan' => $berat_badan,
         'tinggi_badan' => $tinggi_badan
      ];

      return $payload;
   }


   private function _validation()
   {
      $this->form_validation->set_rules('anak_id', 'Nama Anak', 'required|trim');
      $this->form_validation->set_rules('umur', 'Umur', 'required|trim');
   }
}
