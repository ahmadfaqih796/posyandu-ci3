<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_Posyandu extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Ibu_model', 'im');
      $this->load->model('Kaders_model', 'km');
      $this->load->model('Posyandu_model', 'pm');
   }

   public function index()
   {
      $this->_validation();
      $data['title'] = 'Kegiatan Posyandu';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['bidan'] = $this->bm->get_all("ibu_hamil");
      $data['role'] = $this->session->userdata('role_id');

      if ($data['role'] == 2) {
         $data['kader'] = $this->km->get_kader_by_id($this->session->userdata('user_id'));
         $data['data'] = $this->pm->get_kegiatan_posyandu($data['kader']['posyandu_id']);
      } else {
         $data['data'] = $this->pm->get_kegiatan_posyandu();
      }
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/kegiatan_posyandu/index', $data);
         if ($data['role'] == 2) {
            $this->load->view('monitoring/kegiatan_posyandu/add');
         }
         $this->load->view('monitoring/kegiatan_posyandu/edit');
         $this->load->view('monitoring/kegiatan_posyandu/delete');
         $this->load->view('monitoring/kegiatan_posyandu/proses');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('monitoring/kegiatan_posyandu', 'Method initidak ditemukan');
         }
      }
   }

   public function pdf()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Kegiatan Posyandu';
      $data['no'] = 1;
      $data['kader'] = $this->km->get_kader_by_id($this->session->userdata('user_id'));
      $data['role'] = $this->session->userdata('role_id');

      if ($data['role'] == 2) {
         $data['data'] = $this->pm->get_kegiatan_posyandu($data['kader']['posyandu_id']);
      } else {
         $data['data'] = $this->pm->get_kegiatan_posyandu();
      }

      $html = $this->load->view('monitoring/kegiatan_posyandu/printPDF', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_kegiatan_posyandu.pdf', 'D');
   }

   private function add()
   {

      $result = $this->bm->add('monitoring_kegiatan_posyandu', $this->_payload());
      if ($result) {
         $this->notification->notify_success('monitoring/kegiatan_posyandu', 'Berhasil menambahkan Kegiatan Posyandu');
      } else {
         $this->notification->notify_error('monitoring/kegiatan_posyandu', 'Gagal menambahkan Kegiatan Posyandu');
      }
   }

   private function update()
   {
      $result = $this->bm->update('monitoring_kegiatan_posyandu', $this->input->post('id'), $this->_payload());
      if ($result) {
         $this->notification->notify_success('monitoring/kegiatan_posyandu', 'Berhasil memperbarui Kegiatan Posyandu');
      } else {
         $this->notification->notify_error('monitoring/kegiatan_posyandu', 'Gagal memperbarui Kegiatan Posyandu');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete('monitoring_kegiatan_posyandu', $id);
      if ($result) {
         $this->notification->notify_success('monitoring/kegiatan_posyandu', 'Berhasil menghapus Kegiatan Posyandu');
      } else {
         $this->notification->notify_error('monitoring/kegiatan_posyandu', 'Gagal menghapus Kegiatan Posyandu');
      }
   }

   public function proses()
   {
      $id = $this->input->post('id');
      $payload = [
         'is_verified' => 1,
         'updated_at' => date('Y-m-d H:i:s'),
      ];
      $result = $this->bm->update('monitoring_kegiatan_posyandu', $id, $payload);
      if ($result) {
         $this->notification->notify_success('monitoring/kegiatan_posyandu', 'Berhasil mengsetujui Kegiatan Posyandu');
      } else {
         $this->notification->notify_error('monitoring/kegiatan_posyandu', 'Gagal mengsetujui Kegiatan Posyandu');
      }
   }

   public function print($id)
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Monitoring Kegiatan Posyandu';
      $data['no'] = 1;
      $data['detail'] = $this->pm->get_kegiatan_posyandu_by_id($id);

      $html = $this->load->view('monitoring/kegiatan_posyandu/printDetail', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_monitoring_kegiatan_posyandu.pdf', 'D');
   }

   private function _payload()
   {
      $kader_id = htmlspecialchars($this->input->post('kader_id', true));
      $posyandu_id = htmlspecialchars($this->input->post('posyandu_id', true));
      $n_kegiatan = htmlspecialchars($this->input->post('n_kegiatan', true));
      $tujuan = htmlspecialchars($this->input->post('tujuan', true));
      $sasaran = htmlspecialchars($this->input->post('sasaran', true));
      $parameter_keberhasilan = htmlspecialchars($this->input->post('parameter_keberhasilan', true));
      $photo_data_url = $this->input->post('photo');

      $j1 = htmlspecialchars($this->input->post('j1', true));
      $j2 = htmlspecialchars($this->input->post('j2', true));
      $j3 = htmlspecialchars($this->input->post('j3', true));
      $j4 = htmlspecialchars($this->input->post('j4', true));
      $j5 = htmlspecialchars($this->input->post('j5', true));
      $j6 = htmlspecialchars($this->input->post('j6', true));
      $j7 = htmlspecialchars($this->input->post('j7', true));
      $j8 = htmlspecialchars($this->input->post('j8', true));
      $j9 = htmlspecialchars($this->input->post('j9', true));
      $j10 = htmlspecialchars($this->input->post('j10', true));

      if (preg_match('/^data:image\/(\w+);base64,/', $photo_data_url, $matches)) {
         $image_type = $matches[1];
         $photo_data = substr($photo_data_url, strpos($photo_data_url, ',') + 1);
         $photo_data = base64_decode($photo_data);
         $photo_name = 'photo_' . time() . '.' . $image_type;
         $photo_path = './assets/img/kegiatan_posyandu/' . $photo_name;
         file_put_contents($photo_path, $photo_data);
         $photo = $photo_name;
      } else {
         $photo = $photo_data_url;
      }

      $payload = [
         'kader_id' => $kader_id,
         'posyandu_id' => $posyandu_id,
         'n_kegiatan' => $n_kegiatan,
         'tujuan' => $tujuan,
         'sasaran' => $sasaran,
         'parameter_keberhasilan' => $parameter_keberhasilan,
         'j1' => $j1,
         'j2' => $j2,
         'j3' => $j3,
         'j4' => $j4,
         'j5' => $j5,
         'j6' => $j6,
         'j7' => $j7,
         'j8' => $j8,
         'j9' => $j9,
         'j10' => $j10,
         'photo' => $photo
      ];
      return $payload;
   }

   private function _validation()
   {
      $this->form_validation->set_rules('kader_id', 'Kader', 'required|trim');
   }
}
