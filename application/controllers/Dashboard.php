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
      $posyandu_id = htmlspecialchars($this->input->get('posyandu_id'));
      $year = htmlspecialchars($this->input->get('year'));
      $role = $this->session->userdata('role_id');
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = 'Dashboard';
      $data['role'] = $role;
      $data['posyandu'] = $this->bm->get_all("posyandu");
      $data['tanggal'] = $year;
      $data['total'] = array(
         'user' => $this->bm->get_count('users'),
         'posyandu' => $this->bm->get_count('posyandu'),
         'kader' => $this->bm->get_count('kaders'),
         'anak' => $this->bm->get_count('anak'),
         'ibu' => $this->bm->get_count('ibu_hamil'),
         'ibu_anak' => $this->bm->get_count('ibu'),
         'imunisasi' => $this->bm->get_count('imunisasi'),
         'b_imunisasi' => array(
            'januari' => $this->bm->get_count_imunisasi_per_month(1, $year, $posyandu_id),
            'februari' => $this->bm->get_count_imunisasi_per_month(2, $year, $posyandu_id),
            'maret' => $this->bm->get_count_imunisasi_per_month(3, $year, $posyandu_id),
            'april' => $this->bm->get_count_imunisasi_per_month(4, $year, $posyandu_id),
            'mei' => $this->bm->get_count_imunisasi_per_month(5, $year, $posyandu_id),
            'juni' => $this->bm->get_count_imunisasi_per_month(6, $year, $posyandu_id),
            'juli' => $this->bm->get_count_imunisasi_per_month(7, $year, $posyandu_id),
            'agustus' => $this->bm->get_count_imunisasi_per_month(8, $year, $posyandu_id),
            'september' => $this->bm->get_count_imunisasi_per_month(9, $year, $posyandu_id),
            'oktober' => $this->bm->get_count_imunisasi_per_month(10, $year, $posyandu_id),
            'november' => $this->bm->get_count_imunisasi_per_month(11, $year, $posyandu_id),
            'desember' => $this->bm->get_count_imunisasi_per_month(12, $year, $posyandu_id),
         ),
         'b_k_posyandu' => array(
            'januari' => $this->bm->get_count_k_posyandu_per_month(1, $year, $posyandu_id),
            'februari' => $this->bm->get_count_k_posyandu_per_month(2, $year, $posyandu_id),
            'maret' => $this->bm->get_count_k_posyandu_per_month(3, $year, $posyandu_id),
            'april' => $this->bm->get_count_k_posyandu_per_month(4, $year, $posyandu_id),
            'mei' => $this->bm->get_count_k_posyandu_per_month(5, $year, $posyandu_id),
            'juni' => $this->bm->get_count_k_posyandu_per_month(6, $year, $posyandu_id),
            'juli' => $this->bm->get_count_k_posyandu_per_month(7, $year, $posyandu_id),
            'agustus' => $this->bm->get_count_k_posyandu_per_month(8, $year, $posyandu_id),
            'september' => $this->bm->get_count_k_posyandu_per_month(9, $year, $posyandu_id),
            'oktober' => $this->bm->get_count_k_posyandu_per_month(10, $year, $posyandu_id),
            'november' => $this->bm->get_count_k_posyandu_per_month(11, $year, $posyandu_id),
            'desember' => $this->bm->get_count_k_posyandu_per_month(12, $year, $posyandu_id),
         ),
         'b_g_anak' => array(
            'buruk' => array(
               'januari' => $this->bm->get_count_gizi_anak(1, $year, $posyandu_id, "Gizi Buruk"),
               'februari' => $this->bm->get_count_gizi_anak(2, $year, $posyandu_id, "Gizi Buruk"),
               'maret' => $this->bm->get_count_gizi_anak(3, $year, $posyandu_id, "Gizi Buruk"),
               'april' => $this->bm->get_count_gizi_anak(4, $year, $posyandu_id, "Gizi Buruk"),
               'mei' => $this->bm->get_count_gizi_anak(5, $year, $posyandu_id, "Gizi Buruk"),
               'juni' => $this->bm->get_count_gizi_anak(6, $year, $posyandu_id, "Gizi Buruk"),
               'juli' => $this->bm->get_count_gizi_anak(7, $year, $posyandu_id, "Gizi Buruk"),
               'agustus' => $this->bm->get_count_gizi_anak(8, $year, $posyandu_id, "Gizi Buruk"),
               'september' => $this->bm->get_count_gizi_anak(9, $year, $posyandu_id, "Gizi Buruk"),
               'oktober' => $this->bm->get_count_gizi_anak(10, $year, $posyandu_id, "Gizi Buruk"),
               'november' => $this->bm->get_count_gizi_anak(11, $year, $posyandu_id, "Gizi Buruk"),
               'desember' => $this->bm->get_count_gizi_anak(12, $year, $posyandu_id, "Gizi Buruk"),
            ),
            'kurang' => array(
               'januari' => $this->bm->get_count_gizi_anak(1, $year, $posyandu_id, "Gizi Kurang"),
               'februari' => $this->bm->get_count_gizi_anak(2, $year, $posyandu_id, "Gizi Kurang"),
               'maret' => $this->bm->get_count_gizi_anak(3, $year, $posyandu_id, "Gizi Kurang"),
               'april' => $this->bm->get_count_gizi_anak(4, $year, $posyandu_id, "Gizi Kurang"),
               'mei' => $this->bm->get_count_gizi_anak(5, $year, $posyandu_id, "Gizi Kurang"),
               'juni' => $this->bm->get_count_gizi_anak(6, $year, $posyandu_id, "Gizi Kurang"),
               'juli' => $this->bm->get_count_gizi_anak(7, $year, $posyandu_id, "Gizi Kurang"),
               'agustus' => $this->bm->get_count_gizi_anak(8, $year, $posyandu_id, "Gizi Kurang"),
               'september' => $this->bm->get_count_gizi_anak(9, $year, $posyandu_id, "Gizi Kurang"),
               'oktober' => $this->bm->get_count_gizi_anak(10, $year, $posyandu_id, "Gizi Kurang"),
               'november' => $this->bm->get_count_gizi_anak(11, $year, $posyandu_id, "Gizi Kurang"),
               'desember' => $this->bm->get_count_gizi_anak(12, $year, $posyandu_id, "Gizi Kurang"),
            ),
            "baik" => array(
               'januari' => $this->bm->get_count_gizi_anak(1, $year, $posyandu_id, "Gizi Baik"),
               'februari' => $this->bm->get_count_gizi_anak(2, $year, $posyandu_id, "Gizi Baik"),
               'maret' => $this->bm->get_count_gizi_anak(3, $year, $posyandu_id, "Gizi Baik"),
               'april' => $this->bm->get_count_gizi_anak(4, $year, $posyandu_id, "Gizi Baik"),
               'mei' => $this->bm->get_count_gizi_anak(5, $year, $posyandu_id, "Gizi Baik"),
               'juni' => $this->bm->get_count_gizi_anak(6, $year, $posyandu_id, "Gizi Baik"),
               'juli' => $this->bm->get_count_gizi_anak(7, $year, $posyandu_id, "Gizi Baik"),
               'agustus' => $this->bm->get_count_gizi_anak(8, $year, $posyandu_id, "Gizi Baik"),
               'september' => $this->bm->get_count_gizi_anak(9, $year, $posyandu_id, "Gizi Baik"),
               'oktober' => $this->bm->get_count_gizi_anak(10, $year, $posyandu_id, "Gizi Baik"),
               'november' => $this->bm->get_count_gizi_anak(11, $year, $posyandu_id, "Gizi Baik"),
               'desember' => $this->bm->get_count_gizi_anak(12, $year, $posyandu_id, "Gizi Baik"),
            ),
            "lebih" => array(
               'januari' => $this->bm->get_count_gizi_anak(1, $year, $posyandu_id, "Gizi Lebih"),
               'februari' => $this->bm->get_count_gizi_anak(2, $year, $posyandu_id, "Gizi Lebih"),
               'maret' => $this->bm->get_count_gizi_anak(3, $year, $posyandu_id, "Gizi Lebih"),
               'april' => $this->bm->get_count_gizi_anak(4, $year, $posyandu_id, "Gizi Lebih"),
               'mei' => $this->bm->get_count_gizi_anak(5, $year, $posyandu_id, "Gizi Lebih"),
               'juni' => $this->bm->get_count_gizi_anak(6, $year, $posyandu_id, "Gizi Lebih"),
               'juli' => $this->bm->get_count_gizi_anak(7, $year, $posyandu_id, "Gizi Lebih"),
               'agustus' => $this->bm->get_count_gizi_anak(8, $year, $posyandu_id, "Gizi Lebih"),
               'september' => $this->bm->get_count_gizi_anak(9, $year, $posyandu_id, "Gizi Lebih"),
               'oktober' => $this->bm->get_count_gizi_anak(10, $year, $posyandu_id, "Gizi Lebih"),
               'november' => $this->bm->get_count_gizi_anak(11, $year, $posyandu_id, "Gizi Lebih"),
               'desember' => $this->bm->get_count_gizi_anak(12, $year, $posyandu_id, "Gizi Lebih"),
            ),
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
      // - admin = 1
      // - kader = 2
      // - anak = 3
      // - Poli Gizi = 4
      // - ibu hamil = 5
      // - Koordinator Imunisasi = 6
      // - Bidan = 7
      // - Poli Kia = 8
      if ($role == 8) {
         $this->load->view('home/dashboards/poli_kia', $data);
      } else if ($role == 4) {
         $this->load->view('home/dashboards/poli_gizi', $data);
      } else {
         $this->load->view('home/dashboard', $data);
      }
      $this->load->view('templates/footer', $data);
   }
}
