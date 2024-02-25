<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $role = $this->session->userdata('role_id');
      if ($role != 3) {
         redirect('badrequest/error/403');
      }
   }

   public function index()
   {
      $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'My Profile';
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/index', $data);
      $this->load->view('templates/footer', $data);
   }

   public function home()
   {
      $data['title'] = 'My Profile';
      $this->load->view('templates/user/header', $data);
      $this->load->view('templates/user/topbar', $data);
      $this->load->view('user/home', $data);
      $this->load->view('templates/user/footer', $data);
   }
}
