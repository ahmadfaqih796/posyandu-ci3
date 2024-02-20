<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibu extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Ibu_model', 'im');
      $this->load->model('Anak_model', 'am');
   }

   public function index()
   {
      $this->_validation_ibu();
      $data['title'] = 'Ibu';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['users'] = $this->im->get_all_ibu();
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/ibu/index', $data);
         $this->load->view('management/ibu/add');
         $this->load->view('management/ibu/edit');
         $this->load->view('management/ibu/delete');
         $this->load->view('templates/footer');
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('management/anak', 'Method initidak ditemukan');
         }
      }
   }

   public function detail($user_id)
   {
      $data['title'] = 'Detail Ibu';
      $data['no'] = 1;
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['detail'] = $this->im->get_ibu_by_id($user_id);
      $data['d_anak'] = $this->am->get_all_anak_by_ibu($user_id);
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('management/ibu/detail', $data);
      $this->load->view('templates/footer');
   }

   public function print()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Ibu';
      $data['no'] = 1;
      $data['users'] = $this->im->get_all_ibu();

      $html = $this->load->view('management/ibu/print', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_ibu.pdf', 'D');
   }

   private function add()
   {
      $result = $this->im->add_ibu($this->_payload());
      if ($result) {
         $this->notification->notify_success('management/ibu', 'Berhasil menambahkan ibu');
      } else {
         $this->notification->notify_error('management/ibu', 'Gagal menambahkan ibu');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->im->update_ibu($id, $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/ibu', 'Berhasil memperbarui ibu');
      } else {
         $this->notification->notify_error('management/ibu', 'Gagal memperbarui ibu');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $t_anak = htmlspecialchars($this->input->post('t_anak', true));
      if ($t_anak > 0) {
         return $this->notification->notify_error('management/ibu', 'Data ini tidak dapat di hapus karena terdapat anggota');
      }
      $result = $this->im->delete_ibu($id);
      if ($result) {
         $this->notification->notify_success('management/ibu', 'Berhasil menghapus ibu');
      } else {
         $this->notification->notify_error('management/ibu', 'Gagal menghapus ibu');
      }
   }

   private function _payload()
   {
      $n_ibu = htmlspecialchars($this->input->post('n_ibu', true));
      $nik = htmlspecialchars($this->input->post('nik', true));
      $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir', true));
      $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir', true));
      $alamat = htmlspecialchars($this->input->post('alamat', true));
      $golongan_darah = htmlspecialchars($this->input->post('golongan_darah', true));
      $telepon = htmlspecialchars($this->input->post('telepon', true));

      $payload = [
         'n_ibu' => $n_ibu,
         'nik' => $nik,
         'tempat_lahir' => $tempat_lahir,
         'tanggal_lahir' => $tanggal_lahir,
         'alamat' => $alamat,
         'golongan_darah' => $golongan_darah,
         'telepon' => $telepon
      ];

      return $payload;
   }

   private function _validation_ibu()
   {
      $this->form_validation->set_rules('n_ibu', 'Nama', 'required|trim');
      $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
      $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
      $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
      $this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'required|trim');
      $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
   }
}
