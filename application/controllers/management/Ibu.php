<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibu extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Ibu_model', 'im');
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
         // $this->load->view('management/anak/edit');
         $this->load->view('templates/footer');
      } else {
         $update = $this->input->post('updateData');
         if ($update) {
            // return $this->update();
         } else {
            $this->notification->notify_error('management/anak', 'Method initidak ditemukan');
         }
      }
   }

   private function _validation_ibu()
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
