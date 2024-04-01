<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibu_Hamil extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
   }

   public function index()
   {
      $this->_validation();
      $data['title'] = 'Ibu Hamil';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->bm->get_all("ibu_hamil");

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('data/ibu_hamil/ibu_hamil/index', $data);
         $this->load->view('data/ibu_hamil/ibu_hamil/add');
         $this->load->view('data/ibu_hamil/ibu_hamil/edit');
         $this->load->view('data/ibu_hamil/ibu_hamil/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('data/ibu_hamil/ibu_hamil', 'Method initidak ditemukan');
         }
      }
   }

   public function pdf()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Data Ibu Hamil';
      $data['no'] = 1;
      $data['users'] = $this->bm->get_all("ibu_hamil");

      $html = $this->load->view('data/ibu_hamil/ibu_hamil/printPDF', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('data_ibu_hamil.pdf', 'D');
   }

   private function add()
   {
      $result = $this->bm->add('ibu_hamil', $this->_payload("post"));
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/ibu_hamil', 'Berhasil menambahkan ibu hamil');
      } else {
         $this->notification->notify_error('data/ibu_hamil/ibu_hamil', 'Gagal menambahkan ibu hamil');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update('ibu_hamil', $id, $this->_payload("update"));
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/ibu_hamil', 'Berhasil memperbarui ibu hamil');
      } else {
         $this->notification->notify_error('data/ibu_hamil/ibu_hamil', 'Gagal memperbarui ibu hamil');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete("ibu_hamil", $id);
      if ($result) {
         $this->notification->notify_success('data/ibu_hamil/ibu_hamil', 'Berhasil menghapus ibu hamil');
      } else {
         $this->notification->notify_error('data/ibu_hamil/ibu_hamil', 'Gagal menghapus ibu hamil');
      }
   }

   private function _payload($type = null)
   {
      $n_ibu = htmlspecialchars($this->input->post('n_ibu', true));
      $no_medis = htmlspecialchars($this->input->post('no_medis', true));
      $nik = htmlspecialchars($this->input->post('nik', true));
      $password = htmlspecialchars($this->input->post('password', true));
      $n_suami = htmlspecialchars($this->input->post('n_suami', true));
      $alamat = htmlspecialchars($this->input->post('alamat', true));
      $telepon = htmlspecialchars($this->input->post('telepon', true));
      $tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', true));
      $golongan_darah = htmlspecialchars($this->input->post('golongan_darah', true));
      $pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));
      $agama = htmlspecialchars($this->input->post('agama', true));
      $pendidikan_terakhir = htmlspecialchars($this->input->post('pendidikan_terakhir', true));
      $riwayat_penyakit = htmlspecialchars($this->input->post('riwayat_penyakit', true));

      if ($type == "update") {
         $payload = [
            'n_ibu' => $n_ibu,
            'no_medis' => $no_medis,
            'nik' => $nik,
            'n_suami' => $n_suami,
            'alamat' => $alamat,
            'telepon' => '08' . $telepon,
            'tgl_lahir' => $tgl_lahir,
            'golongan_darah' => $golongan_darah,
            'pekerjaan' => $pekerjaan,
            'agama' => $agama,
            'pendidikan_terakhir' => $pendidikan_terakhir,
            'riwayat_penyakit' => $riwayat_penyakit
         ];
         return $payload;
      }

      $config['upload_path'] = './assets/img/ibu_hamil/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size'] = 1024;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('photo')) {
         return $this->notification->notify_error('data/ibu_hamil/ibu_hamil', 'Ukuran gambar terlalu besar atau gambar tidak valid');
      } else {
         $data = $this->upload->data();
         $payload = [
            'n_ibu' => $n_ibu,
            'no_medis' => $no_medis,
            'nik' => $nik,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'n_suami' => $n_suami,
            'alamat' => $alamat,
            'telepon' => '08' . $telepon,
            'tgl_lahir' => $tgl_lahir,
            'golongan_darah' => $golongan_darah,
            'pekerjaan' => $pekerjaan,
            'agama' => $agama,
            'pendidikan_terakhir' => $pendidikan_terakhir,
            'riwayat_penyakit' => $riwayat_penyakit,
            'photo' => $data['file_name']
         ];
         return $payload;
      }
   }


   private function _validation()
   {
      $this->form_validation->set_rules('n_ibu', 'Nama Ibu', 'required|trim');
      $this->form_validation->set_rules('n_suami', 'Nama Suami', 'required|trim');
   }
}
