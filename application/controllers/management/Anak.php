<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Anak_model', 'am');
   }

   public function index()
   {
      $this->_validation_anak();
      $data['title'] = 'Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['users'] = $this->am->get_all_anak();
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/anak/index', $data);
         // $this->load->view('management/anak/edit');
         $this->load->view('templates/footer', $data);
      } else {
         $update = $this->input->post('updateData');
         if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('management/anak', 'Method initidak ditemukan');
         }
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $nik = htmlspecialchars($this->input->post('nik'));
      $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir'));
      $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir'));
      $jabatan = htmlspecialchars($this->input->post('jabatan'));
      $alamat = htmlspecialchars($this->input->post('alamat'));
      $pendidikan_terakhir = htmlspecialchars($this->input->post('pendidikan_terakhir'));
      $telepon = htmlspecialchars($this->input->post('telepon'));

      $payload = [
         'nik' => $nik,
         'tempat_lahir' => $tempat_lahir,
         'tanggal_lahir' => $tanggal_lahir,
         'jabatan' => $jabatan,
         'alamat' => $alamat,
         'pendidikan_terakhir' => $pendidikan_terakhir,
         'telepon' => $telepon
      ];
      $result = $this->am->update_kader($id, $payload);
      if ($result) {
         $this->notification->notify_success('management/anak', 'Berhasil memperbarui kader');
      } else {
         $this->notification->notify_error('management/anak', 'Gagal memperbarui kader');
      }
   }

   public function print()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Anak';
      $data['no'] = 1;
      $data['users'] = $this->am->get_kaders();

      $html = $this->load->view('management/anak/print', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_kader.pdf', 'D');
   }

   private function _validation_anak()
   {
      $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
   }
}
