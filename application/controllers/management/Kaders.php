<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaders extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Kaders_model', 'km');
   }

   public function index()
   {
      // $this->_validation_user();
      $data['title'] = 'Kader';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['users'] = $this->km->get_kaders();
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/kaders/index', $data);
         // $this->load->view('management/kaders/add');
         // $this->load->view('management/kaders/edit');
         $this->load->view('templates/footer', $data);
      } else {
         // $add = $this->input->post('addData');
         // $update = $this->input->post('updateData');
         // $delete = $this->input->post('deleteData');
         // if ($add) {
         //    return $this->add();
         // } else if ($update) {
         //    return $this->update();
         // } else if ($delete) {
         //    return $this->delete();
         // } else {
         //    $this->notification->notify_error('management/users', 'Method initidak ditemukan');
         // }
      }
   }

   public function print()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Kader';
      $data['no'] = 1;
      $data['users'] = $this->km->get_kaders();

      $html = $this->load->view('management/kaders/print', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_kader.pdf', 'D');
   }
}
