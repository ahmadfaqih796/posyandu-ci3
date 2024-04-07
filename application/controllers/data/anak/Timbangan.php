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
      $result = $this->bm->add('timbangan_anak', $this->_payload());
      if ($result) {
         $this->notification->notify_success('data/anak/timbangan', 'Berhasil menambahkan timbangan');
      } else {
         $this->notification->notify_error('data/anak/timbangan', 'Gagal menambahkan timbangan');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update('timbangan_anak', $id, $this->_payload());
      if ($result) {
         $this->notification->notify_success('data/anak/timbangan', 'Berhasil memperbarui timbangan');
      } else {
         $this->notification->notify_error('data/anak/timbangan', 'Gagal memperbarui timbangan');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete("timbangan_anak", $id - 1);
      if ($result) {
         $this->notification->notify_success('data/anak/timbangan', 'Berhasil menghapus timbangan');
      } else {
         $this->notification->notify_error('data/anak/timbangan', 'Gagal menghapus timbangan');
      }
   }

   private function _payload()
   {
      $anak_id = htmlspecialchars($this->input->post('anak_id', true));
      $tgl_ukur = htmlspecialchars($this->input->post('tgl_ukur', true));
      $umur = htmlspecialchars($this->input->post('umur', true));
      $lingkar_kepala = htmlspecialchars($this->input->post('lingkar_kepala', true));
      $berat_badan = htmlspecialchars($this->input->post('berat_badan', true));
      $tinggi_badan = htmlspecialchars($this->input->post('tinggi_badan', true));

      $payload = [
         'anak_id' => $anak_id,
         'tgl_ukur' => $tgl_ukur,
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
