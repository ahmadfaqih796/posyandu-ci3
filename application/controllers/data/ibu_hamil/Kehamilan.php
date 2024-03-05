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
      $data['bidan'] = $this->bm->get_all("bidan");

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('data/ibu_hamil/kehamilan/index', $data);
         $this->load->view('data/ibu_hamil/kehamilan/add');
         // $this->load->view('data/ibu_hamil/kehamilan/edit');
         // $this->load->view('data/ibu_hamil/kehamilan/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            // return $this->add();
         } else if ($update) {
            // return $this->update();
         } else {
            $this->notification->notify_error('data/ibu_hamil/kehamilan', 'Method initidak ditemukan');
         }
      }
   }


   private function _validation()
   {
      $this->form_validation->set_rules('n_ibu', 'Nama Ibu', 'required|trim');
      $this->form_validation->set_rules('n_suami', 'Nama Suami', 'required|trim');
   }
}
