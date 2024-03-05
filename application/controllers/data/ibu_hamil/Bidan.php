<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
   }

   public function index()
   {
      $this->_validation();
      $data['title'] = 'Bidan';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->bm->get_all("bidan");

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('data/ibu_hamil/bidan/index', $data);
         $this->load->view('data/ibu_hamil/bidan/add');
         $this->load->view('data/ibu_hamil/bidan/edit');
         // $this->load->view('data/ibu_hamil/bidan/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('data/ibu_hamil/bidan', 'Method initidak ditemukan');
         }
      }
   }

   private function add()
   {
      $result = $this->bm->add('bidan', $this->_payload());
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/bidan', 'Berhasil menambahkan bidan');
      } else {
         $this->notification->notify_error('data/ibu_hamil/bidan', 'Gagal menambahkan bidan');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update('bidan', $id, $this->_payload());
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/bidan', 'Berhasil memperbarui bidan');
      } else {
         $this->notification->notify_error('data/ibu_hamil/bidan', 'Gagal memperbarui bidan');
      }
   }

   private function _payload()
   {
      $n_ibu = htmlspecialchars($this->input->post('n_ibu', true));
      $no_medis = htmlspecialchars($this->input->post('no_medis', true));
      $nik = htmlspecialchars($this->input->post('nik', true));
      $password = htmlspecialchars($this->input->post('password', true));
      $n_suami = htmlspecialchars($this->input->post('n_suami', true));
      $alamat = htmlspecialchars($this->input->post('alamat', true));
      $telepon = htmlspecialchars($this->input->post('telepon', true));
      $tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', true));
      $golongan_darah = htmlspecialchars($this->input->post('golongan_darah', true));
      $pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
      $agama = htmlspecialchars($this->input->post('agama', true));
      $pendidikan_terakhir = htmlspecialchars($this->input->post('pendidikan_terakhir', true));
      $riwayat_penyakit = htmlspecialchars($this->input->post('riwayat_penyakit', true));
      $photo = htmlspecialchars($this->input->post('photo', true));

      $payload = [
         'n_ibu' => $n_ibu,
         'no_medis' => $no_medis,
         'nik' => $nik,
         'password' => $password,
         'n_suami' => $n_suami,
         'alamat' => $alamat,
         'telepon' => $telepon,
         'tgl_lahir' => $tgl_lahir,
         'golongan_darah' => $golongan_darah,
         'pekerjaan' => $pekerjaan,
         'agama' => $agama,
         'pendidikan_terakhir' => $pendidikan_terakhir,
         'riwayat_penyakit' => $riwayat_penyakit,
         'photo' => $photo
      ];

      return $payload;
   }


   private function _validation()
   {
      $this->form_validation->set_rules('n_ibu', 'Nama Ibu', 'required|trim');
      $this->form_validation->set_rules('n_suami', 'Nama Suami', 'required|trim');
   }
}
