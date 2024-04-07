<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_Gizi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Anak_model', 'am');
      $this->load->model('Ibu_model', 'im');
      $this->load->model('Posyandu_model', 'pm');
      $this->load->model('Imunisasi_model', 'imm');
      $this->load->model('Base_model', 'bm');
   }

   public function index()
   {
      $this->_validation_anak();
      $data['title'] = 'Status Gizi';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['users'] = $this->bm->get_all('gizi_status');
      $data['ibu'] = $this->im->get_all_ibu();
      $data['posyandu'] = $this->pm->get_posyandu();
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/status_gizi/index', $data);
         $this->load->view('management/status_gizi/add');
         $this->load->view('management/status_gizi/edit');
         $this->load->view('management/status_gizi/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('management/status_gizi', 'Method initidak ditemukan');
         }
      }
   }

   public function detail($user_id)
   {
      $data['title'] = 'Detail Anak';
      $data['no'] = 1;
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['detail'] = $this->am->get_anak_by_id($user_id);
      $data['imunisasi'] = $this->imm->get_all_imunisasi_by_id($user_id);
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('management/status_gizi/detail', $data);
      $this->load->view('templates/footer');
   }

   private function add()
   {
      $result = $this->bm->add("gizi_status", $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/status_gizi', 'Berhasil menambahkan status gizi');
      } else {
         $this->notification->notify_error('management/status_gizi', 'Gagal menambahkan status gizi');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update("gizi_status", $id, $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/status_gizi', 'Berhasil memperbarui status gizi');
      } else {
         $this->notification->notify_error('management/status_gizi', 'Gagal memperbarui status gizi');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete("gizi_status", $id);
      if ($result) {
         $this->notification->notify_success('management/status_gizi', 'Berhasil menghapus status gizi');
      } else {
         $this->notification->notify_error('management/status_gizi', 'Gagal menghapus status gizi');
      }
   }

   public function print()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Anak';
      $data['no'] = 1;
      $data['users'] = $this->am->get_all_anak();

      $html = $this->load->view('management/status_gizi/print', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_anak.pdf', 'D');
   }

   private function _payload()
   {
      $umur = htmlspecialchars($this->input->post('umur', true));
      $jk = htmlspecialchars($this->input->post('jk', true));
      $g_min = htmlspecialchars($this->input->post('g_min', true));
      $g_middle = htmlspecialchars($this->input->post('g_middle', true));
      $g_max = htmlspecialchars($this->input->post('g_max', true));

      $payload = [
         'umur' => $umur,
         'jk' => $jk,
         'g_min' => $g_min,
         'g_middle' => $g_middle,
         'g_max' => $g_max
      ];

      return $payload;
   }

   private function _validation_anak()
   {
      $this->form_validation->set_rules('umur', 'Umur', 'required|trim');
   }
}
