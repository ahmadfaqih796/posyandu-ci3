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

   public function home()
   {
      $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $data['title'] = 'Home';
      $this->load->view('templates/user/header', $data);
      $this->load->view('templates/user/topbar', $data);
      $this->load->view('user/home', $data);
      $this->load->view('templates/user/footer', $data);
   }

   public function perkembangan_anak()
   {
      $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $data['title'] = 'Perkembangan Anak';
      $data['no'] = 1;
      $data['users'] = $this->pm->get_pa_by_id($this->session->userdata('user_id'));
      $this->load->view('templates/user/header', $data);
      $this->load->view('templates/user/topbar', $data);
      $this->load->view('user/perkembangan_anak', $data);
      $this->load->view('templates/user/footer', $data);
   }
}
