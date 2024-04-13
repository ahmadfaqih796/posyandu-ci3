<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'Dashboard';
      $data['total'] = array(
         'user' => $this->bm->get_count('users'),
         'posyandu' => $this->bm->get_count('posyandu'),
         'kader' => $this->bm->get_count('kaders'),
         'anak' => $this->bm->get_count('anak'),
         'ibu' => $this->bm->get_count('ibu'),
         'imunisasi' => $this->bm->get_count('imunisasi'),
         'status_gizi_bumil' => array(
            'Kurus' => $this->im->get_count_ibu_hamil("monitoring_ibu_hamil", null, 'Kurus'),
            'Normal' => $this->im->get_count_ibu_hamil("monitoring_ibu_hamil", null, 'Normal'),
            'Gemuk' => $this->im->get_count_ibu_hamil("monitoring_ibu_hamil", null, 'Gemuk'),
            'Obesitas' => $this->im->get_count_ibu_hamil("monitoring_ibu_hamil", null, 'Obesitas'),
         )
      );

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('home/dashboard', $data);
      $this->load->view('templates/footer', $data);
   }
}
