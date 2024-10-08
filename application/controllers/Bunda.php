<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bunda extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Imunisasi_model', 'im');
      $this->load->model('Anak_model', 'am');
      $this->load->model('Ibu_model', 'ibm');
      $this->load->model('Perkembangan_Anak_model', 'pm');
      $this->load->model('Schedule_model', 'sm');
      $this->load->model('Base_model', 'bm');
      $role = $this->session->userdata('role_id');
   }

   public function index()
   {
      $data['title'] = 'Home';
      $data['user'] = $this->ibm->get_ibu_by_id($this->session->userdata('user_id'));
      $data['anak'] = $this->am->get_all_anak_by_ibu($this->session->userdata('user_id'));
      $data['no'] = 1;
      // return print_r($data['user']);
      $this->load->view('templates/bunda/header', $data);
      $this->load->view('templates/bunda/topbar', $data);
      $this->load->view('bunda/home', $data);
      $this->load->view('templates/bunda/footer', $data);
   }

   public function home()
   {
      $data['title'] = 'Home';
      $data['user'] = $this->ibm->get_ibu_by_id($this->session->userdata('user_id'));
      $data['anak'] = $this->am->get_all_anak_by_ibu($this->session->userdata('user_id'));
      $data['no'] = 1;
      // return print_r($data['user']);
      $this->load->view('templates/bunda/header', $data);
      $this->load->view('templates/bunda/topbar', $data);
      $this->load->view('bunda/home', $data);
      $this->load->view('templates/bunda/footer', $data);
   }

   public function perkembangan_anak()
   {
      $data['title'] = 'Perkembangan Anak';
      $data['no'] = 1;
      $data['user'] = $this->ibm->get_ibu_by_id($this->session->userdata('user_id'));
      $data['users'] = $this->pm->get_pa_by_id($this->session->userdata('user_id'));
      $this->load->view('templates/bunda/header', $data);
      $this->load->view('templates/bunda/topbar', $data);
      $this->load->view('bunda/perkembangan_anak', $data);
      $this->load->view('templates/bunda/footer', $data);
   }

   public function imunisasi($anak_id = null)
   {
      $data['title'] = 'Imunisasi';
      $data['no'] = 1;
      $data['user'] = $this->ibm->get_ibu_by_id($this->session->userdata('user_id'));
      $data['users'] = $this->im->get_all_imunisasi_by_ibu($this->session->userdata('user_id'), $anak_id);
      // $data['users'] = $this->pm->get_pa_by_id($this->session->userdata('user_id'));
      $this->load->view('templates/bunda/header', $data);
      $this->load->view('templates/bunda/topbar', $data);
      $this->load->view('user/imunisasi', $data);
      $this->load->view('templates/bunda/footer', $data);
   }

   public function status_gizi($anak_id = null)
   {
      $data['title'] = 'Status Gizi';
      $data['no'] = 1;
      $data['user'] = $this->ibm->get_ibu_by_id($this->session->userdata('user_id'));
      $data['data'] = $this->am->get_all_anak_table_by_id_v2("timbangan_anak", $anak_id, $this->session->userdata('user_id'));
      // $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      // $data['data'] = $this->am->get_all_anak_table('timbangan_anak', null, null, $this->session->userdata('user_id'));
      $this->load->view('templates/bunda/header', $data);
      $this->load->view('templates/bunda/topbar', $data);
      $this->load->view('user/status_gizi', $data);
      $this->load->view('templates/bunda/footer', $data);
   }

   public function timbangan($anak_id = null)
   {
      $data['title'] = 'Timbangan & Perkembangan';
      // $data['user'] = $this->am->get_anak_by_id($this->session->userdata('user_id'));
      // $data['users'] = $this->am->get_all_anak_table_by_id("timbangan_anak", $this->session->userdata('user_id'));
      $data['user'] = $this->ibm->get_ibu_by_id($this->session->userdata('user_id'));
      $data['users'] = $this->am->get_all_anak_table_by_id_v2("timbangan_anak", $anak_id, $this->session->userdata('user_id'));
      $data['no'] = 1;
      $this->load->view('templates/bunda/header', $data);
      $this->load->view('templates/bunda/topbar', $data);
      $this->load->view('user/timbangan', $data);
      $this->load->view('templates/bunda/footer', $data);
   }

   public function jadwal_posyandu()
   {
      $data['title'] = 'Jadwal Posyandu';
      $data['user'] = $this->ibm->get_ibu_by_id($this->session->userdata('user_id'));
      $data['no'] = 1;
      $data['posyandu'] = $this->sm->get_schedule_by_id($data['user']['posyandu_id']);
      $this->load->view('templates/bunda/header', $data);
      $this->load->view('templates/bunda/topbar', $data);
      $this->load->view('user/jadwal_posyandu', $data);
      $this->load->view('templates/bunda/footer', $data);
   }

   public function kegiatan()
   {
      $data['title'] = 'Artikel';
      $data['user'] = $this->ibm->get_ibu_by_id($this->session->userdata('user_id'));
      $data['no'] = 1;
      $data['data'] = $this->bm->get_all('kegiatan', 'anak');
      $this->load->view('templates/bunda/header', $data);
      $this->load->view('templates/bunda/topbar', $data);
      $this->load->view('bunda/kegiatan', $data);
      $this->load->view('templates/bunda/footer', $data);
   }

   public function detail_kegiatan($id)
   {
      $data['user'] = $this->ibm->get_ibu_by_id($this->session->userdata('user_id'));
      $data['title'] = 'Artikel';
      $data['no'] = 1;
      $data['detail'] = $this->bm->get_by_id('kegiatan', $id);
      $this->load->view('templates/bunda/header', $data);
      $this->load->view('templates/bunda/topbar', $data);
      $this->load->view('user/detail_kegiatan', $data);
      $this->load->view('templates/bunda/footer', $data);
   }
}
