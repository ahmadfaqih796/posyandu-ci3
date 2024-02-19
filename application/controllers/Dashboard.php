<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Kaders_model', 'km');
      $this->load->model('Anak_model', 'am');
   }

   public function index()
   {
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'Dashboard';
      $data['total'] = array(
         'kader' => $this->km->get_count_kaders(),
      );

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('home/dashboard', $data);
      $this->load->view('templates/footer');
   }
}
