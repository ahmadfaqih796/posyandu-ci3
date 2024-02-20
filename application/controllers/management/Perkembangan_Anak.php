<?php
defined('BASEPATH') or exit('No direct script access allowed');

class perkembangan_Anak extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Perkembangan_Anak_model', 'pm');
      $this->load->model('Anak_model', 'am');
   }

   public function index()
   {
      $this->_validation_pa();
      $data['title'] = 'Perkembangan Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['users'] = $this->pm->get_all_pa();
      $data['anak'] = $this->am->get_all_anak();
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/perkembangan_anak/index', $data);
         $this->load->view('management/perkembangan_anak/add');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            // return $this->update();
         } else {
            $this->notification->notify_error('management/perkembangan_anak', 'Method ini tidak ditemukan');
         }
      }
   }

   private function add()
   {
      $anak_id = htmlspecialchars($this->input->post('anak_id', true));
      $usia = htmlspecialchars($this->input->post('usia', true));
      $tanggal_periksa = htmlspecialchars($this->input->post('tanggal_periksa', true));
      $berat_badan = htmlspecialchars($this->input->post('berat_badan', true));
      $tinggi_badan = htmlspecialchars($this->input->post('tinggi_badan', true));
      $nilai_gizi = $berat_badan / (($tinggi_badan / 100) * ($tinggi_badan / 100));

      $payload = [
         'anak_id' => $anak_id,
         'usia' => $usia,
         'tanggal_periksa' => $tanggal_periksa,
         'berat_badan' => $berat_badan,
         'tinggi_badan' => $tinggi_badan,
         'nilai_gizi' => $nilai_gizi
      ];

      $result = $this->pm->add_pa($payload);
      if ($result) {
         $this->notification->notify_success('management/perkembangan_anak', 'Berhasil menambahkan perkembangan anak');
      } else {
         $this->notification->notify_error('management/perkembangan_anak', 'Gagal menambahkan perkembangan anak');
      }
   }

   private function _validation_pa()
   {
      $this->form_validation->set_rules('usia', 'Usia', 'required|trim');
   }
}
