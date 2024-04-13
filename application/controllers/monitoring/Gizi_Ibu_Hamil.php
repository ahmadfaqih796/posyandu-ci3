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
      $data['bidan'] = $this->bm->get_all("ibu_hamil");
      // $data['data'] = $this->bm->get_all("gizi_ibu_hamil");
      // $data['data'] = $this->im->get_all_ibu_hamil("gizi_ibu_hamil");
      $data['data'] = $this->im->get_all_ibu_hamil("monitoring_ibu_hamil");
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/gizi_ibu_hamil/index', $data);
         $this->load->view('monitoring/gizi_ibu_hamil/add');
         $this->load->view('monitoring/gizi_ibu_hamil/edit');
         $this->load->view('monitoring/gizi_ibu_hamil/delete');
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

   public function pdf()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Gizi Ibu Hamil';
      $data['no'] = 1;
      $data['users'] = $this->im->get_all_ibu_hamil("monitoring_ibu_hamil");

      $html = $this->load->view('monitoring/gizi_ibu_hamil/printPDF', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_gizi_ibu_hamil.pdf', 'D');
   }

   private function add()
   {

      $result = $this->bm->add('gizi_ibu_hamil', $this->_payload());
      if ($result) {
         $this->notification->notify_success('monitoring/gizi_ibu_hamil', 'Berhasil menambahkan status gizi ibu hamil');
      } else {
         $this->notification->notify_error('monitoring/gizi_ibu_hamil', 'Gagal menambahkan status gizi ibu hamil');
      }
   }

   private function update()
   {
      $result = $this->bm->update('gizi_ibu_hamil', $this->input->post('id'), $this->_payload());
      if ($result) {
         $this->notification->notify_success('monitoring/gizi_ibu_hamil', 'Berhasil memperbarui status gizi ibu hamil');
      } else {
         $this->notification->notify_error('monitoring/gizi_ibu_hamil', 'Gagal memperbarui status gizi ibu hamil');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete('gizi_ibu_hamil', $id);
      if ($result) {
         $this->notification->notify_success('monitoring/gizi_ibu_hamil', 'Berhasil menghapus status gizi ibu hamil');
      } else {
         $this->notification->notify_error('monitoring/gizi_ibu_hamil', 'Gagal menghapus status gizi ibu hamil');
      }
   }

   private function _payload()
   {
      $bumil_id = htmlspecialchars($this->input->post('bumil_id', true));
      $trimester = htmlspecialchars($this->input->post('trimester', true));
      $sesi = htmlspecialchars($this->input->post('sesi', true));
      $berat_badan = htmlspecialchars($this->input->post('berat_badan', true));
      $tinggi_badan = htmlspecialchars($this->input->post('tinggi_badan', true));
      $nilai_gizi = $berat_badan / (($tinggi_badan * $tinggi_badan) / 10000);
      $status_gizi = '';
      if ($nilai_gizi <= 18.5) {
         $status_gizi = 'Kurus';
      } elseif ($nilai_gizi <= 24.9) {
         $status_gizi = 'Normal';
      } elseif ($nilai_gizi <= 29.9) {
         $status_gizi = 'Gemuk';
      } else {
         $status_gizi = 'Obesitas';
      }

      $payload = [
         'bumil_id' => $bumil_id,
         'trimester' => $trimester,
         'sesi' => $sesi,
         'berat_badan' => $berat_badan,
         'tinggi_badan' => $tinggi_badan,
         'nilai_gizi' => $nilai_gizi,
         'status_gizi' => $status_gizi
      ];
      return $payload;
   }

   private function _validation()
   {
      $this->form_validation->set_rules('bumil_id', 'Nama Posyandu', 'required|trim');
   }
}
