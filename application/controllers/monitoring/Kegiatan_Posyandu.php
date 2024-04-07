<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_Posyandu extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Ibu_model', 'im');
      $this->load->model('Kaders_model', 'km');
   }

   public function index()
   {
      $this->_validation();
      $data['title'] = 'Kegiatan Posyandu';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['bidan'] = $this->bm->get_all("ibu_hamil");
      $data['kader'] = $this->km->get_kader_by_id($this->session->userdata('user_id'));
      // $data['data'] = $this->bm->get_all("gizi_ibu_hamil");
      // $data['data'] = $this->im->get_all_ibu_hamil("gizi_ibu_hamil");
      $data['data'] = $this->bm->get_all("monitoring_kegiatan_posyandu");
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/kegiatan_posyandu/index', $data);
         $this->load->view('monitoring/kegiatan_posyandu/add');
         // $this->load->view('monitoring/kegiatan_posyandu/edit');
         // $this->load->view('monitoring/kegiatan_posyandu/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('monitoring/kegiatan_posyandu', 'Method initidak ditemukan');
         }
      }
   }

   public function pdf()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Gizi Ibu Hamil';
      $data['no'] = 1;
      $data['users'] = $this->im->get_all_ibu_hamil("monitoring_ibu_hamil");

      $html = $this->load->view('monitoring/kegiatan_posyandu/printPDF', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_gizi_ibu_hamil.pdf', 'D');
   }

   private function add()
   {

      $result = $this->bm->add('monitoring_kegiatan_posyandu', $this->_payload());
      if ($result) {
         $this->notification->notify_success('monitoring/kegiatan_posyandu', 'Berhasil menambahkan Kegiatan Posyandu');
      } else {
         $this->notification->notify_error('monitoring/kegiatan_posyandu', 'Gagal menambahkan Kegiatan Posyandu');
      }
   }

   private function update()
   {
      $result = $this->bm->update('gizi_ibu_hamil', $this->input->post('id'), $this->_payload());
      if ($result) {
         $this->notification->notify_success('monitoring/kegiatan_posyandu', 'Berhasil memperbarui Kegiatan Posyandu');
      } else {
         $this->notification->notify_error('monitoring/kegiatan_posyandu', 'Gagal memperbarui Kegiatan Posyandu');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete('gizi_ibu_hamil', $id);
      if ($result) {
         $this->notification->notify_success('monitoring/kegiatan_posyandu', 'Berhasil menghapus Kegiatan Posyandu');
      } else {
         $this->notification->notify_error('monitoring/kegiatan_posyandu', 'Gagal menghapus Kegiatan Posyandu');
      }
   }

   private function _payload()
   {
      $kader_id = htmlspecialchars($this->input->post('kader_id', true));
      $n_posyandu = htmlspecialchars($this->input->post('n_posyandu', true));
      $n_kegiatan = htmlspecialchars($this->input->post('n_kegiatan', true));
      $tujuan = htmlspecialchars($this->input->post('tujuan', true));
      $sasaran = htmlspecialchars($this->input->post('sasaran', true));
      $parameter_keberhasilan = htmlspecialchars($this->input->post('parameter_keberhasilan', true));

      $j1 = htmlspecialchars($this->input->post('j1', true));
      $j2 = htmlspecialchars($this->input->post('j2', true));
      $j3 = htmlspecialchars($this->input->post('j3', true));
      $j4 = htmlspecialchars($this->input->post('j4', true));
      $j5 = htmlspecialchars($this->input->post('j5', true));
      $j6 = htmlspecialchars($this->input->post('j6', true));
      $j7 = htmlspecialchars($this->input->post('j7', true));
      $j8 = htmlspecialchars($this->input->post('j8', true));
      $j9 = htmlspecialchars($this->input->post('j9', true));
      $j10 = htmlspecialchars($this->input->post('j10', true));

      $payload = [
         'kader_id' => $kader_id,
         'n_posyandu' => $n_posyandu,
         'n_kegiatan' => $n_kegiatan,
         'tujuan' => $tujuan,
         'sasaran' => $sasaran,
         'parameter_keberhasilan' => $parameter_keberhasilan,
         'j1' => $j1,
         'j2' => $j2,
         'j3' => $j3,
         'j4' => $j4,
         'j5' => $j5,
         'j6' => $j6,
         'j7' => $j7,
         'j8' => $j8,
         'j9' => $j9,
         'j10' => $j10,
      ];
      return $payload;
   }

   private function _validation()
   {
      $this->form_validation->set_rules('kader_id', 'Kader', 'required|trim');
   }
}
