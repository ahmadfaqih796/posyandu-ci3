<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bumil extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Anak_model', 'am');
      $this->load->model('Perkembangan_Anak_model', 'pm');
      $this->load->model('Schedule_model', 'sm');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Ibu_model', 'im');
      // $role = $this->session->userdata('role_id');
      // if ($role != 5) {
      //    redirect('badrequest/error/403');
      // }
   }

   public function index()
   {

      $data['title'] = 'Home';
      // $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/home', $data);
      // $this->load->view('user/home2', $data);

      $this->load->view('templates/bumil/footer', $data);
   }

   public function kehamilan()
   {
      $data['title'] = 'Kehamilan';
      $data['data'] = $this->im->get_all_kehamilan_by_bumil($this->session->userdata('user_id'));
      $data['no'] = 1;
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/kehamilan', $data);
      $this->load->view('templates/bumil/footer', $data);
   }

   public function monitoring()
   {
      $data['title'] = 'Monitoring';
      $data['data'] = $this->im->get_all_ibu_hamil_by_id('monitoring_ibu_hamil', $this->session->userdata('user_id'));
      $data['no'] = 1;
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/monitoring', $data);
      $this->load->view('templates/bumil/footer', $data);
   }

   public function status_gizi()
   {
      $data['title'] = 'Status Gizi';
      $data['data'] = $this->im->get_all_ibu_hamil_by_id('monitoring_ibu_hamil', $this->session->userdata('user_id'));
      $data['no'] = 1;
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/status_gizi', $data);
      $this->load->view('templates/bumil/footer', $data);
   }

   public function profil()
   {
      $data['title'] = 'Profil';
      $data['detail'] = $this->im->get_ibu_hamil_by_id($this->session->userdata('user_id'));
      $this->load->view('templates/bumil/header', $data);
      $this->load->view('templates/bumil/topbar', $data);
      $this->load->view('bumil/profil', $data);
      $this->load->view('templates/bumil/footer', $data);
   }
}
