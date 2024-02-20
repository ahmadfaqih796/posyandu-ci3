<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Anak_model', 'am');
      $this->load->model('Ibu_model', 'im');
      $this->load->model('Posyandu_model', 'pm');
      $this->load->model('Imunisasi_model', 'imm');
   }

   public function index()
   {
      $this->_validation_anak();
      $data['title'] = 'Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['users'] = $this->am->get_all_anak();
      $data['ibu'] = $this->im->get_all_ibu();
      $data['posyandu'] = $this->pm->get_posyandu();
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/anak/index', $data);
         $this->load->view('management/anak/edit');
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
      $this->load->view('management/anak/detail', $data);
      $this->load->view('templates/footer');
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $nik = htmlspecialchars($this->input->post('nik'));
      $id_kms = htmlspecialchars($this->input->post('id_kms'));
      $orang_tua_id = htmlspecialchars($this->input->post('orang_tua_id'));
      $posyandu_id = htmlspecialchars($this->input->post('posyandu_id'));
      $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir'));
      $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir'));
      $jk = htmlspecialchars($this->input->post('jk'));
      $alamat = htmlspecialchars($this->input->post('alamat'));
      $golongan_darah = htmlspecialchars($this->input->post('golongan_darah'));
      $anak_ke = htmlspecialchars($this->input->post('anak_ke'));

      $payload = [
         'id_kms' => $id_kms,
         'nik' => $nik,
         'orang_tua_id' => $orang_tua_id,
         'posyandu_id' => $posyandu_id,
         'tempat_lahir' => $tempat_lahir,
         'tanggal_lahir' => $tanggal_lahir,
         'jk' => $jk,
         'alamat' => $alamat,
         'golongan_darah' => $golongan_darah,
         'anak_ke' => $anak_ke
      ];
      $result = $this->am->update_anak($id, $payload);
      if ($result) {
         $this->notification->notify_success('management/anak', 'Berhasil memperbarui anak');
      } else {
         $this->notification->notify_error('management/anak', 'Gagal memperbarui anak');
      }
   }

   public function print()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Anak';
      $data['no'] = 1;
      $data['users'] = $this->am->get_all_anak();

      $html = $this->load->view('management/anak/print', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_anak.pdf', 'D');
   }

   private function _validation_anak()
   {
      $this->form_validation->set_rules('id_kms', 'KMS', 'required|trim');
      $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
      $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
      $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
      $this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'required|trim');
      $this->form_validation->set_rules('anak_ke', 'Anak ke', 'required|trim');
   }
}
