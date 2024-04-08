<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
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
      $data['title'] = 'Artikel Anak';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->bm->get_all('kegiatan');
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/kegiatan/index', $data);
         $this->load->view('management/kegiatan/add');
         $this->load->view('management/kegiatan/edit');
         $this->load->view('management/kegiatan/view');
         $this->load->view('management/kegiatan/delete');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');

         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('management/kegiatan', 'Method tidak ditemukan');
         }
      }
   }

   private function add()
   {
      $result = $this->bm->add('kegiatan', $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/kegiatan', 'Berhasil menambahkan kegiatan');
      } else {
         $this->notification->notify_error('management/kegiatan', 'Gagal menambahkan kegiatan');
      }
   }

   private function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update('kegiatan', $id, $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/kegiatan', 'Berhasil memperbarui kegiatan');
      } else {
         $this->notification->notify_error('management/kegiatan', 'Gagal memperbarui kegiatan');
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $image = htmlspecialchars($this->input->post('image', true));
      $path_to_file = './assets/img/kegiatan/' . $image;
      if (file_exists($path_to_file)) {
         unlink($path_to_file);
      }
      $result = $this->bm->delete("kegiatan", $id);
      if ($result) {
         $this->notification->notify_success('management/kegiatan', 'Berhasil menghapus kegiatan');
      } else {
         $this->notification->notify_error('management/kegiatan', 'Gagal menghapus kegiatan');
      }
   }

   private function _payload($method = null)
   {
      $judul = htmlspecialchars($this->input->post('judul', true));
      $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
      $waktu = htmlspecialchars($this->input->post('waktu', true));
      $old_image = htmlspecialchars($this->input->post('old_image', true));

      $config['upload_path'] = './assets/img/kegiatan/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size'] = 1024;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
         return $this->notification->notify_error('management/kegiatan', 'Ukuran gambar terlalu besar atau gambar tidak valid');
      } else {
         $data = $this->upload->data();
         $payload = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'image' => $data['file_name'],
            'waktu' => $waktu
         ];
         return $payload;
      }
   }

   private function _validation()
   {
      $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
   }
}
