<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibu_Hamil extends CI_Controller
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
      $data['title'] = 'Ibu Hamil';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->im->get_all_bidan("monitoring_ibu_hamil");
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/ibu_hamil/index', $data);
         // $this->load->view('monitoring/ibu_hamil/add');
         // $this->load->view('monitoring/ibu_hamil/edit');
         $this->load->view('monitoring/ibu_hamil/delete');
         $this->load->view('templates/footer', $data);
      } else {
         // $add = $this->input->post('addData');
         // $update = $this->input->post('updateData');
         // if ($add) {
         //    return $this->add();
         // } else if ($update) {
         //    return $this->update();
         // } else {
         //    $this->notification->notify_error('data/ibu_hamil/bidan', 'Method initidak ditemukan');
         // }
      }
   }

   public function add()
   {
      $this->_validation();
      $data['title'] = 'Ibu Hamil';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->bm->get_all("monitoring_ibu_hamil");
      $data['bidan'] = $this->bm->get_all("ibu_hamil");
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/ibu_hamil/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('monitoring_ibu_hamil', $this->_payload());
         if ($result) {
            $this->notification->notify_success('monitoring/ibu_hamil', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('monitoring/ibu_hamil', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id_data)
   {
      $this->_validation();
      $data['title'] = 'Ibu Hamil';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->bm->get_all("monitoring_ibu_hamil");
      $data['bidan'] = $this->bm->get_all("ibu_hamil");
      $data['detail'] = $this->bm->get_by_id("monitoring_ibu_hamil", $id_data);
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/ibu_hamil/edit', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->update('monitoring_ibu_hamil', $id_data, $this->_payload());
         if ($result) {
            $this->notification->notify_success('monitoring/ibu_hamil', 'Berhasil mengubah data');
         } else {
            $this->notification->notify_error('monitoring/ibu_hamil', 'Gagal mengubah data');
         }
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete("monitoring_ibu_hamil", $id);
      if ($result) {
         $this->notification->notify_success('monitoring/ibu_hamil', 'Berhasil menghapus bidan');
      } else {
         $this->notification->notify_error('monitoring/ibu_hamil', 'Gagal menghapus bidan');
      }
   }

   private function _payload()
   {
      $payload = [];
      $form_fields = array(
         'bumil_id',
         'tanggal_periksa',
         'keluhan',
         'kunjungan',
         'sesi',
         'tekanan_darah',
         'berat_badan',
         'umur_kehamilan',
         'tinggi_fundus',
         'umur_ibu',
         'tinggi_badan',
         'lila',
         'kunjungan_berikutnya',
         'keterangan',
         's_timbang_berat_badan',
         's_tekanan_darah',
         's_tinggi_puncak_rahim',
         's_vaksinasi_tetanus',
         's_tablet_zat_besi',
         's_tes_laboratorium',
         's_temu_wicara'
      );
      foreach ($form_fields as $field) {
         $value = htmlspecialchars($this->input->post($field, true));
         $payload[$field] = $value;
      }
      return $payload;
   }


   private function _validation()
   {
      $this->form_validation->set_rules('bumil_id', 'Nama Ibu', 'required|trim');
   }
}
