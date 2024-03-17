<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehamilan extends CI_Controller
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
      $data['title'] = 'Kehamilan';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->im->get_all_kehamilan();
      $data['bidan'] = $this->im->get_all_bidan_no_dead();

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('data/ibu_hamil/kehamilan/index', $data);
         $this->load->view('data/ibu_hamil/kehamilan/add');
         $this->load->view('data/ibu_hamil/kehamilan/edit');
         $this->load->view('data/ibu_hamil/kehamilan/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('data/ibu_hamil/kehamilan', 'Method initidak ditemukan');
         }
      }
   }

   private function add()
   {
      $result = $this->bm->add('kehamilan', $this->_payload());
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/kehamilan', 'Berhasil menambahkan kehamilan');
      } else {
         $this->notification->notify_error('data/ibu_hamil/kehamilan', 'Gagal menambahkan kehamilan');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update('kehamilan', $id, $this->_payload("update"));
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/kehamilan', 'Berhasil memperbarui kehamilan');
      } else {
         $this->notification->notify_error('data/ibu_hamil/kehamilan', 'Gagal memperbarui kehamilan');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete("kehamilan", $id);
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/kehamilan', 'Berhasil menghapus kehamilan');
      } else {
         $this->notification->notify_error('data/ibu_hamil/kehamilan', 'Gagal menghapus kehamilan');
      }
   }

   private function _payload()
   {
      $bumil_id = htmlspecialchars($this->input->post('bumil_id', true));
      $hamil_ke = htmlspecialchars($this->input->post('hamil_ke', true));
      $hpht = htmlspecialchars($this->input->post('hpht', true));
      $htp = htmlspecialchars($this->input->post('htp', true));
      $jml_kehamilan = htmlspecialchars($this->input->post('jml_kehamilan', true));
      $jml_keguguran = htmlspecialchars($this->input->post('jml_keguguran', true));
      $jml_lahir_hidup = htmlspecialchars($this->input->post('jml_lahir_hidup', true));
      $jml_lahir_mati = htmlspecialchars($this->input->post('jml_lahir_mati', true));
      $jarak_persalinan_terakhir = htmlspecialchars($this->input->post('jarak_persalinan_terakhir', true));

      $payload = [
         'bumil_id' => $bumil_id,
         'hamil_ke' => $hamil_ke,
         'hpht' => $hpht,
         'htp' => $htp,
         'jml_kehamilan' => $jml_kehamilan,
         'jml_keguguran' => $jml_keguguran,
         'jml_lahir_hidup' => $jml_lahir_hidup,
         'jml_lahir_mati' => $jml_lahir_mati,
         'jarak_persalinan_terakhir' => $jarak_persalinan_terakhir
      ];
      return $payload;
   }


   private function _validation()
   {
      $this->form_validation->set_rules('bumil_id', 'Nama Ibu', 'required|trim');
      $this->form_validation->set_rules('hamil_ke', 'Hamil Ke', 'required|trim');
   }
}
