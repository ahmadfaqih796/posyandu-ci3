<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Ibu_model', 'im');
      $this->load->model("Anak_model", "am");
   }

   public function index()
   {
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'Dashboard';
      $data['role'] = $this->session->userdata('role_id');
      $data['total'] = array(
         'user' => $this->bm->get_count('users'),
         'posyandu' => $this->bm->get_count('posyandu'),
         'kader' => $this->bm->get_count('kaders'),
         'anak' => $this->bm->get_count('anak'),
         'ibu' => $this->bm->get_count('ibu_hamil'),
         'ibu_anak' => $this->bm->get_count('ibu'),
         'imunisasi' => $this->bm->get_count('imunisasi'),
         'b_imunisasi' => array(
            'januari' => $this->bm->get_count_per_month('imunisasi', 1, date('Y')),
            'februari' => $this->bm->get_count_per_month('imunisasi', 2, date('Y')),
            'maret' => $this->bm->get_count_per_month('imunisasi', 3, date('Y')),
            'april' => $this->bm->get_count_per_month('imunisasi', 4, date('Y')),
            'mei' => $this->bm->get_count_per_month('imunisasi', 5, date('Y')),
            'juni' => $this->bm->get_count_per_month('imunisasi', 6, date('Y')),
            'juli' => $this->bm->get_count_per_month('imunisasi', 7, date('Y')),
            'agustus' => $this->bm->get_count_per_month('imunisasi', 8, date('Y')),
            'september' => $this->bm->get_count_per_month('imunisasi', 9, date('Y')),
            'oktober' => $this->bm->get_count_per_month('imunisasi', 10, date('Y')),
            'november' => $this->bm->get_count_per_month('imunisasi', 11, date('Y')),
            'desember' => $this->bm->get_count_per_month('imunisasi', 12, date('Y')),
         ),
         'status_gizi_bumil' => array(
            'Kurus' => $this->im->get_count_ibu_hamil("monitoring_ibu_hamil", null, 'Kurus'),
            'Normal' => $this->im->get_count_ibu_hamil("monitoring_ibu_hamil", null, 'Normal'),
            'Gemuk' => $this->im->get_count_ibu_hamil("monitoring_ibu_hamil", null, 'Gemuk'),
            'Obesitas' => $this->im->get_count_ibu_hamil("monitoring_ibu_hamil", null, 'Obesitas'),
         ),
         'status_gizi_anak' => array(
            'buruk' => $this->am->get_count_status_gizi('Gizi Buruk'),
            'kurang' => $this->am->get_count_status_gizi('Gizi Kurang'),
            'baik' => $this->am->get_count_status_gizi('Gizi Baik'),
            'lebih' => $this->am->get_count_status_gizi('Gizi Lebih'),
         )
      );
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('home/dashboard', $data);
      $this->load->view('templates/footer', $data);
   }
}
