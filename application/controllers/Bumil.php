<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bumil extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Anak_model', 'am');
      $this->load->model('Perkembangan_Anak_model', 'pm');
      $this->load->model('Schedule_model', 'sm');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Ibu_model', 'im');
      // $role = $this->session->userdata('role_id');
      // if ($role != 5) {
      //    redirect('badrequest/error/403');
      // }
   }

   public function index()
   {

      $data['title'] = 'Home';
      // $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/home', $data);
      // $this->load->view('user/home2', $data);

      $this->load->view('templates/bumil/footer', $data);
   }

   public function artikel()
   {
      // $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $data['title'] = 'Artikel';
      $data['no'] = 1;
      $data['data'] = $this->bm->get_all('kegiatan', 'bumil');
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/artikel', $data);
      $this->load->view('templates/bumil/footer', $data);
   }

   public function detail_kegiatan($id)
   {
      // $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $data['title'] = 'Artikel';
      $data['no'] = 1;
      $data['detail'] = $this->bm->get_by_id('kegiatan', $id);
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/detail_kegiatan', $data);
      $this->load->view('templates/bumil/footer', $data);
   }

   public function kehamilan()
   {
      $data['title'] = 'Kehamilan';
      $data['data'] = $this->im->get_all_kehamilan_by_bumil($this->session->userdata('user_id'));
      $data['no'] = 1;
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/kehamilan', $data);
      $this->load->view('templates/bumil/footer', $data);
   }

   public function monitoring()
   {
      $data['title'] = 'Monitoring';
      $data['data'] = $this->im->get_all_ibu_hamil_by_id('monitoring_ibu_hamil', $this->session->userdata('user_id'));
      $data['no'] = 1;
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/monitoring', $data);
      $this->load->view('templates/bumil/footer', $data);
   }

   public function detail_monitoring($id)
   {
      $data['title'] = 'Detail Monitoring';
      $data['detail'] = $this->im->get_all_ibu_hamil_by_id_with_bumil('monitoring_ibu_hamil', $id, $this->session->userdata('user_id'));
      $data['no'] = 1;
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/monitoring_detail', $data);
      $this->load->view('templates/bumil/footer', $data);
   }

   public function status_gizi()
   {
      $data['title'] = 'Status Gizi';
      $data['data'] = $this->im->get_all_ibu_hamil_by_id('monitoring_ibu_hamil', $this->session->userdata('user_id'));
      $data['no'] = 1;
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/status_gizi', $data);
      $this->load->view('templates/bumil/footer', $data);
   }

   public function notifikasi()
   {
      $data['title'] = 'Notifikasi';
      $data['data'] = $this->im->get_all_ibu_hamil_by_id('monitoring_ibu_hamil', $this->session->userdata('user_id'));
      $data['no'] = 1;
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/notifikasi', $data);
      $this->load->view('templates/bumil/footer', $data);
   }


   public function profil()
   {
      $data['title'] = 'Profil';
      $data['detail'] = $this->im->get_ibu_hamil_by_id($this->session->userdata('user_id'));
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/profil', $data);
      $this->load->view('templates/bumil/footer', $data);
   }

   public function edit($id)
   {
      $this->_validation();
      $data['title'] = ' Edit Profil';
      $data['detail'] = $this->im->get_ibu_hamil_by_id($this->session->userdata('user_id'));
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/bumil/header', $data);
         $this->load->view('templates/bumil/topbar', $data);
         $this->load->view('bumil/editProfil', $data);
         $this->load->view('templates/bumil/footer', $data);
      } else {
         $result = $this->bm->update('ibu_hamil', $id, $this->_payload());
         if ($result) {
            $this->notification->notify_success('bumil/profil', 'Berhasil memperbarui ibu hamil');
         } else {
            $this->notification->notify_error('bumil/profil', 'Gagal memperbarui ibu hamil');
         }
      }
   }

   private function _payload()
   {
      $n_ibu = htmlspecialchars($this->input->post('n_ibu', true));
      $no_medis = htmlspecialchars($this->input->post('no_medis', true));
      $nik = htmlspecialchars($this->input->post('nik', true));
      $n_suami = htmlspecialchars($this->input->post('n_suami', true));
      $alamat = htmlspecialchars($this->input->post('alamat', true));
      $telepon = htmlspecialchars($this->input->post('telepon', true));
      $golongan_darah = htmlspecialchars($this->input->post('golongan_darah', true));

      // $payload = [
      //    'n_ibu' => $n_ibu,
      //    'no_medis' => $no_medis,
      //    'nik' => $nik,
      //    'n_suami' => $n_suami,
      //    'alamat' => $alamat,
      //    'telepon' => '08' . $telepon,
      //    'golongan_darah' => $golongan_darah,
      // ];
      // return $payload;

      $config['upload_path'] = './assets/img/ibu_hamil/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size'] = 1024;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('photo')) {
         $payload = [
            'n_ibu' => $n_ibu,
            'no_medis' => $no_medis,
            'nik' => $nik,
            'n_suami' => $n_suami,
            'alamat' => $alamat,
            'telepon' => '08' . $telepon,
            'golongan_darah' => $golongan_darah,
         ];
         return $payload;
         // return $this->notification->notify_error('bumil/profil', 'Ukuran gambar terlalu besar atau gambar tidak valid');
      } else {
         $data = $this->upload->data();
         $payload = [
            'n_ibu' => $n_ibu,
            'no_medis' => $no_medis,
            'nik' => $nik,
            'n_suami' => $n_suami,
            'alamat' => $alamat,
            'telepon' => '08' . $telepon,
            'golongan_darah' => $golongan_darah,
            'photo' => $data['file_name']
         ];
         return $payload;
      }
   }

   private function _validation()
   {
      $this->form_validation->set_rules('n_ibu', 'Nama Ibu', 'required|trim');
   }
}
