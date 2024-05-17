<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kematian extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Anak_model', 'am');
      $this->load->model('Kaders_model', 'km');
   }

   public function index()
   {
      $this->_validation();
      $data['title'] = 'Kematian Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->am->get_all_anak_table('kematian_anak');
      $data['anak'] = $this->am->get_all_anak_no_dead();
      $data['role'] = $this->session->userdata('role_id');

      $data['posyandu'] = $this->bm->get_all("posyandu");

      if ($data['role'] == 2) {
         $data['kader'] = $this->bm->get_by_id('kaders', $this->session->userdata('user_id'));
      }

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('data/anak/kematian/index', $data);
         $this->load->view('data/anak/kematian/filter');
         $this->load->view('data/anak/kematian/add');
         $this->load->view('data/anak/kematian/edit');
         $this->load->view('data/anak/kematian/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('data/anak/kematian', 'Method initidak ditemukan');
         }
      }
   }

   public function data($id_posyandu = null, $tanggal = null)
   {
      $this->_validation();
      $data['title'] = 'Kematian Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->am->get_all_anak_table('kematian_anak', $id_posyandu, null, null, $tanggal);
      $data['anak'] = $this->am->get_all_anak_no_dead();
      $data['role'] = $this->session->userdata('role_id');

      $data['posyandu'] = $this->bm->get_all("posyandu");
      $data['id_posyandu'] = $id_posyandu;
      $data['date'] = $tanggal;

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('data/anak/kematian/filterData', $data);
         $this->load->view('data/anak/kematian/add');
         $this->load->view('data/anak/kematian/edit');
         $this->load->view('data/anak/kematian/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('data/anak/kematian', 'Method initidak ditemukan');
         }
      }
   }

   public function print($id_posyandu = null, $tanggal = null)
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Kematian Anak';
      $data['no'] = 1;

      $data['kader'] = $this->km->get_kader_by_id($this->session->userdata('user_id'));
      $data['role'] = $this->session->userdata('role_id');

      if ($data['role'] == 2) {
         $data['kader'] = $this->km->get_kader_by_id($this->session->userdata('user_id'));
         $data['data'] = $this->am->get_all_anak_table('kematian_anak', $data['kader']['posyandu_id'], null, null, $tanggal);
      } else {
         $data['data'] = $this->am->get_all_anak_table('kematian_anak', $id_posyandu, null, null, $tanggal);
      }

      $html = $this->load->view('data/anak/kematian/print', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('kematian_anak.pdf', 'D');
   }

   private function add()
   {
      $result = $this->bm->add('kematian_anak', $this->_payload());
      $this->am->update_anak_by_user_id($this->input->post('anak_id'), ['is_death' => 1]);
      if ($result) {
         $this->notification->notify_success('data/anak/kematian', 'Berhasil menambahkan kematian');
      } else {
         $this->notification->notify_error('data/anak/kematian', 'Gagal menambahkan kematian');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update('kematian_anak', $id, $this->_payload("update"));
      if ($result) {
         $this->notification->notify_success('data/anak/kematian', 'Berhasil memperbarui kematian');
      } else {
         $this->notification->notify_error('data/anak/kematian', 'Gagal memperbarui kematian');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete("kematian_anak", $id);
      $this->am->update_anak_by_user_id($this->input->post('anak_id'), ['is_death' => 0]);
      if ($result) {
         $this->notification->notify_success('data/anak/kematian', 'Berhasil menghapus kematian');
      } else {
         $this->notification->notify_error('data/anak/kematian', 'Gagal menghapus kematian');
      }
   }

   private function _payload()
   {
      $anak_id = htmlspecialchars($this->input->post('anak_id', true));
      $tgl_kematian = htmlspecialchars($this->input->post('tgl_kematian', true));
      $penyebab = htmlspecialchars($this->input->post('penyebab', true));

      $payload = [
         'anak_id' => $anak_id,
         'tgl_kematian' => $tgl_kematian,
         'penyebab' => $penyebab,
      ];

      return $payload;
   }


   private function _validation()
   {
      $this->form_validation->set_rules('anak_id', 'Nama Ibu', 'required|trim');
      $this->form_validation->set_rules('tgl_kematian', 'Tanggal Kematian', 'required|trim');
   }
}
