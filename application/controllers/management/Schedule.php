<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Schedule_model', 'sm');
      $this->load->model('Posyandu_model', 'pm');
   }

   public function index()
   {
      $this->_validation_schedule();
      $data['title'] = 'Jadwal Posyandu';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->sm->get_schedule();
      $data['posyandu'] = $this->pm->get_posyandu();
      $data['role'] = $this->session->userdata('role_id');
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/schedule/index', $data);
         $this->load->view('management/schedule/add', $data);
         $this->load->view('management/schedule/edit', $data);
         $this->load->view('management/schedule/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('management/schedule', 'Method initidak ditemukan');
         }
      }
   }

   private function add()
   {
      $result = $this->sm->add_schedule($this->_payload());
      if ($result) {
         $this->notification->notify_success('management/schedule', 'Berhasil menambahkan jadwal posyandu');
      } else {
         $this->notification->notify_error('management/schedule', 'Gagal menambahkan jadwal posyandu');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->sm->update_schedule($id, $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/schedule', 'Berhasil memperbarui jadwal posyandu');
      } else {
         $this->notification->notify_error('management/schedule', 'Gagal memperbarui jadwal posyandu');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->sm->delete_schedule($id);
      if ($result) {
         $this->notification->notify_success('management/schedule', 'Berhasil menghapus jadwal posyandu');
      } else {
         $this->notification->notify_error('management/schedule', 'Gagal menghapus jadwal posyandu');
      }
   }

   private function _payload()
   {
      $posyandu_id = htmlspecialchars($this->input->post('posyandu_id', true));
      $tanggal = htmlspecialchars($this->input->post('tanggal', true));
      $jam_buka = htmlspecialchars($this->input->post('jam_buka', true));
      $jam_tutup = htmlspecialchars($this->input->post('jam_tutup', true));
      $payload = [
         'posyandu_id' => $posyandu_id,
         'tanggal' => $tanggal,
         'jam_buka' => $jam_buka,
         'jam_tutup' => $jam_tutup
      ];
      return $payload;
   }

   private function _validation_schedule()
   {
      $this->form_validation->set_rules('posyandu_id', 'Nama Posyandu', 'required|trim');
      $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
      $this->form_validation->set_rules('jam_buka', 'Jam Buka', 'required|trim');
      $this->form_validation->set_rules('jam_tutup', 'Jam Tutup', 'required|trim');
   }
}
