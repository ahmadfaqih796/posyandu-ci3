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

   public function imunisasi()
   {
      $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $data['title'] = 'Imunisasi';
      $data['no'] = 1;
      $data['users'] = $this->pm->get_pa_by_id($this->session->userdata('user_id'));
      $this->load->view('templates/user/header', $data);
      $this->load->view('templates/user/topbar', $data);
      $this->load->view('user/imunisasi', $data);
      $this->load->view('templates/user/footer', $data);
   }

   public function timbangan()
   {
      $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $data['title'] = 'Timbangan & Perkembangan';
      $data['no'] = 1;
      $data['users'] = $this->am->get_all_anak_table_by_id("timbangan_anak", $this->session->userdata('user_id'));
      $this->load->view('templates/user/header', $data);
      $this->load->view('templates/user/topbar', $data);
      $this->load->view('user/timbangan', $data);
      $this->load->view('templates/user/footer', $data);
   }

   public function jadwal_posyandu()
   {
      $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $data['title'] = 'Jadwal Posyandu';
      $data['no'] = 1;
      $data['posyandu'] = $this->sm->get_schedule_by_id($data['user']['posyandu_id']);
      $this->load->view('templates/user/header', $data);
      $this->load->view('templates/user/topbar', $data);
      $this->load->view('user/jadwal_posyandu', $data);
      $this->load->view('templates/user/footer', $data);
   }

   public function kegiatan()
   {
      $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      $data['title'] = 'Kegiatan';
      $data['no'] = 1;
      $data['data'] = $this->bm->get_all('kegiatan');
      $this->load->view('templates/user/header', $data);
      $this->load->view('templates/user/topbar', $data);
      $this->load->view('user/kegiatan', $data);
      $this->load->view('templates/user/footer', $data);
   }
}
