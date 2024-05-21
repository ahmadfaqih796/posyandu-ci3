<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poli_Kia extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Kaders_model', 'km');
      $this->load->model('Posyandu_model', 'pm');
      $this->load->model('Users_model', 'um');
   }

   public function index()
   {
      $data['title'] = 'Petugas Poli KIA';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['users'] = $this->um->get_users(8);
      $data['url'] = base_url('petugas/poli_kia/print');
      $data['no'] = 1;
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('petugas/index', $data);
      $this->load->view('templates/footer', $data);
   }

   public function print()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Petugas Poli KIA';
      $data['no'] = 1;
      $data['users'] = $this->um->get_users(8);

      $html = $this->load->view('petugas/print', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_petugas.pdf', 'D');
   }
}
