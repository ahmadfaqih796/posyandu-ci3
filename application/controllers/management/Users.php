<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Users_model', 'um');
   }

   public function index()
   {
      $data['title'] = 'Dashboard';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['users'] = $this->um->get_users();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('management/users/index', $data);
      $this->load->view('management/users/add');
      $this->load->view('templates/footer', $data);
   }
}
