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
      // $this->_validation_ibu_hamil/bidan();
      $data['title'] = 'Bidan';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->bm->get_all("bidan");

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/ibu_hamil/bidan/index', $data);
         $this->load->view('management/ibu_hamil/bidan/add');
         // $this->load->view('management/ibu_hamil/bidan/edit');
         // $this->load->view('management/ibu_hamil/bidan/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            // return $this->add();
         } else if ($update) {
            // return $this->update();
         } else {
            $this->notification->notify_error('management/ibu_hamil/bidan', 'Method initidak ditemukan');
         }
      }
   }
}
