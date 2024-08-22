<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imunisasi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Imunisasi_model', 'im');
      $this->load->model('Anak_model', 'am');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Posyandu_model', 'pm');
   }

   public function index()
   {
      $this->_validation_imunisasi();
      $data['title'] = 'Imunisasi';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->im->get_all_imunisasi();
      $data['anak'] = $this->am->get_all_anak();
      $data['posyandu'] = $this->pm->get_posyandu();
      $data['imunisasi'] = $this->bm->get_all('tipe_imunisasi');
      $data['role'] = $this->session->userdata('role_id');
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('laporan/imunisasi/index', $data);
         $this->load->view('laporan/imunisasi/filter', $data);
         $this->load->view('laporan/imunisasi/add', $data);
         $this->load->view('laporan/imunisasi/edit', $data);
         $this->load->view('laporan/imunisasi/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('laporan/imunisasi', 'Method initidak ditemukan');
         }
      }
   }

   public function data($id_posyandu = null, $tanggal = null, $anak_id = null)
   {
      $data['title'] = 'Imunisasi';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['posyandu'] = $this->pm->get_posyandu();
      $data['role'] = $this->session->userdata('role_id');
      $data['id_posyandu'] = $id_posyandu;
      $data['date'] = $tanggal;
      $data['anak_id'] = $anak_id;

      if ($tanggal == "null" && $id_posyandu == "null") {
         # code...
         $data['data'] = $this->im->get_all_imunisasi(null, null, null, $anak_id);
      } else {
         $data['data'] = $this->im->get_all_imunisasi($id_posyandu, $tanggal);
      }
      $data['no'] = 1;

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('laporan/imunisasi/filterData', $data);
      $this->load->view('templates/footer', $data);
   }

   public function pdf($id_posyandu = null, $tanggal = null, $anak_id = null)
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Laporan Imunisasi';
      $data['no'] = 1;
      if ($tanggal == "null") {
         $data['data'] = $this->im->get_all_imunisasi(null, null, null, $anak_id);
      } else {

         $data['data'] = $this->im->get_all_imunisasi($id_posyandu, $tanggal);
      }

      $html = $this->load->view('laporan/imunisasi/printPDF', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('laporan_imunisasi.pdf', 'D');
   }


   private function add()
   {
      $result = $this->im->add_imunisasi($this->_payload());
      if ($result) {
         $this->notification->notify_success('laporan/imunisasi', 'Berhasil menambahkan imunisasi');
      } else {
         $this->notification->notify_error('laporan/imunisasi', 'Gagal menambahkan imunisasi');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->im->update_imunisasi($id, $this->_payload());
      if ($result) {
         $this->notification->notify_success('laporan/imunisasi', 'Berhasil memperbarui imunisasi');
      } else {
         $this->notification->notify_error('laporan/imunisasi', 'Gagal memperbarui imunisasi');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->im->delete_imunisasi($id);
      if ($result) {
         $this->notification->notify_success('laporan/imunisasi', 'Berhasil menghapus imunisasi');
      } else {
         $this->notification->notify_error('laporan/imunisasi', 'Gagal menghapus imunisasi');
      }
   }

   private function _payload()
   {
      $anak_id = htmlspecialchars($this->input->post('anak_id', true));
      $tipe_imunisasi_id = htmlspecialchars($this->input->post('tipe_imunisasi_id', true));
      $tanggal_imunisasi = htmlspecialchars($this->input->post('tanggal_imunisasi', true));
      $status = htmlspecialchars($this->input->post('status', true));
      $payload = [
         'anak_id' => $anak_id,
         'tipe_imunisasi_id' => $tipe_imunisasi_id,
         'tanggal_imunisasi' => $tanggal_imunisasi,
         'status' => $status
      ];
      return $payload;
   }

   private function _validation_imunisasi()
   {
      $this->form_validation->set_rules('anak_id', 'Nama Anak', 'required|trim');
      $this->form_validation->set_rules('tipe_imunisasi_id', 'Tipe Imunisasi', 'required|trim');
      $this->form_validation->set_rules('tanggal_imunisasi', 'Tanggal Imunisasi', 'required|trim');
      $this->form_validation->set_rules('status', 'Status', 'required|trim');
   }
}
