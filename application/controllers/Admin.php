<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
   }

   public function index()
   {
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'Dashboard';
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/footer', $data);
   }
}
