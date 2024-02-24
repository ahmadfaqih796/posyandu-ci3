<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      // $this->load->library('session');
      // $role = $this->session->userdata('role_id');
      // if ($role != 2) {
      //    redirect('badrequest/error/403');
      // }
   }

   public function index()
   {
      // $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'My Profile';
      $this->load->view('user/home', $data);
   }
}
