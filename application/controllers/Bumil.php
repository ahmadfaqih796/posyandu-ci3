<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Anak_model', 'am');
      $this->load->model('Perkembangan_Anak_model', 'pm');
      $this->load->model('Schedule_model', 'sm');
      $this->load->model('Base_model', 'bm');
      $role = $this->session->userdata('role_id');
      if ($role != 3) {
         redirect('badrequest/error/403');
      }
   }

   public function index()
   {

      $data['title'] = 'Home';
      $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $this->load->view('templates/user/header', $data);
      $this->load->view('templates/user/topbar', $data);
      $this->load->view('user/home', $data);
      $this->load->view('templates/user/footer', $data);
   }
}
