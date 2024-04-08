<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gizi_Anak extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Ibu_model', 'im');
      $this->load->model('Anak_model', 'am');
   }

   public function index()
   {
      $this->_validation();
      $data['title'] = 'Status Gizi Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      // $data['kader'] = $this->db->get_where('kaders', ['user_id' => $this->session->userdata('user_id')])->row_array();
      $data['posyandu'] = $this->bm->get_all("posyandu");
      // $data['data'] = $this->bm->get_all("gizi_ibu_hamil");
      // $data['data'] = $this->im->get_all_ibu_hamil("gizi_ibu_hamil");
      // $data['data'] = $this->im->get_all_ibu_hamil("monitoring_ibu_hamil");
      $data['data'] = $this->am->get_all_anak_table('timbangan_anak');
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/gizi_anak/filterTable', $data);
         $this->load->view('monitoring/gizi_anak/addModal');
         $this->load->view('monitoring/gizi_ibu_hamil/edit');
         $this->load->view('monitoring/gizi_ibu_hamil/delete');
         $this->load->view('templates/footer', $data);
      }
   }

   public function anak($id_posyandu, $tgl_ukur = null)
   {
      $this->_validation();
      $data['title'] = 'Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['posyandu'] = $this->bm->get_all("posyandu");
      $data['data'] = $this->am->get_all_anak_table_by_posyandu('timbangan_anak', $id_posyandu, $tgl_ukur);
      $data['total'] = $this->am->get_all_anak_table_by_count('timbangan_anak', $id_posyandu, $tgl_ukur);
      if ($data['total'] == 0) {
         $this->notification->notify_error('monitoring/gizi_anak', 'Tidak ada data');
      }
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/gizi_anak/index', $data);
         $this->load->view('monitoring/gizi_anak/addModal');
         $this->load->view('monitoring/gizi_ibu_hamil/edit');
         $this->load->view('monitoring/gizi_ibu_hamil/delete');
         $this->load->view('templates/footer', $data);
      }
   }

   public function pdf()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Gizi Gizi Anak';
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
         $this->notification->notify_success('monitoring/gizi_ibu_hamil', 'Berhasil menambahkan status gizi Anak');
      } else {
         $this->notification->notify_error('monitoring/gizi_ibu_hamil', 'Gagal menambahkan status gizi Anak');
      }
   }

   public function edit($id_data)
   {
      $this->_validation();
      $data['title'] = 'Gizi Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['detail'] = $this->am->get_anak_table_by_id("timbangan_anak", $id_data);
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/gizi_anak/edit', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->update('timbangan_anak', $id_data, $this->_payload());
         if ($result) {
            $this->notification->notify_success('monitoring/gizi_anak', 'Berhasil dinilai');
         } else {
            $this->notification->notify_error('monitoring/gizi_anak', 'Gagal dinilai');
         }
      }
   }

   private function _payload()
   {
      $status_gizi = htmlspecialchars($this->input->post('status_gizi', true));

      $payload = [
         'status_gizi' => $status_gizi,

      ];
      return $payload;
   }

   private function _validation()
   {
      $this->form_validation->set_rules('status_gizi', 'Status Gizi', 'required|trim');
   }
}
