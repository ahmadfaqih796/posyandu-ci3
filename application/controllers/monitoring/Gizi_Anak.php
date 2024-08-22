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
      $data['posyandu'] = $this->bm->get_all("posyandu");
      $data['role'] = $this->session->userdata('role_id');
      $data['anak'] = $this->am->get_all_anak();

      if ($data['role'] == 2) {
         $data['kader'] = $this->bm->get_by_user_id('kaders', $this->session->userdata('user_id'));
         $data['data'] = $this->am->get_all_timbangan_anak('timbangan_anak', $data['kader']['posyandu_id']);
      } else {
         $data['data'] = $this->am->get_all_timbangan_anak('timbangan_anak');
      }

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

   public function anak($id_posyandu = null, $tgl_ukur = null, $anak_id = null)
   {
      $this->_validation();
      $data['title'] = 'Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['posyandu'] = $this->bm->get_all("posyandu");
      if ($anak_id != null) {
         $data['data'] = $this->am->get_all_anak_table_by_posyandu('timbangan_anak', null, null, $anak_id);
      } else {
         $data['data'] = $this->am->get_all_anak_table_by_posyandu('timbangan_anak', $id_posyandu, $tgl_ukur);
      }
      // $data['total'] = $this->am->get_all_anak_table_by_count('timbangan_anak', $id_posyandu, $tgl_ukur);
      // if ($data['total'] == 0) {
      //    $this->notification->notify_error('monitoring/gizi_anak', 'Tidak ada data');
      // }
      $data['id_posyandu'] = $id_posyandu;
      $data['date'] = $tgl_ukur;
      $data['anak_id'] = $anak_id;
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

   public function pdf($id_posyandu = null, $tanggal = null, $anak_id = null)
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Gizi Anak';
      $data['no'] = 1;
      if ($anak_id != null) {
         $data['users'] = $this->am->get_all_timbangan_anak('timbangan_anak', null, null, $anak_id);
      } else {
         $data['users'] = $this->am->get_all_timbangan_anak('timbangan_anak', $id_posyandu, $tanggal);
      }
      $data['role'] = $this->session->userdata('role_id');

      // print_r($data['users']);

      $html = $this->load->view('monitoring/gizi_anak/printPDF', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_gizi_anak.pdf', 'D');
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
      $data['detail'] = $this->am->get_timbangan_anak_by_id("timbangan_anak", $id_data);
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
