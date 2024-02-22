<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
   }

   public function index()
   {
      $this->_validation_artikel();
      $data['title'] = 'artikel';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->bm->get_all('artikel');

      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('management/artikel/index', $data);
         $this->load->view('management/artikel/add');
         $this->load->view('management/artikel/edit');
         $this->load->view('templates/footer', $data);
      } else {
         $add = $this->input->post('addData');
         $update = $this->input->post('updateData');
         if ($add) {
            return $this->add();
         } else if ($update) {
            return $this->update();
         } else {
            $this->notification->notify_error('management/artikel', 'Method tidak ditemukan');
         }
      }
   }

   private function add()
   {
      $result = $this->bm->add('artikel', $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/artikel', 'Berhasil menambahkan artikel');
      } else {
         $this->notification->notify_error('management/artikel', 'Gagal menambahkan artikel');
      }
   }

   public function update()
   {
      $id = htmlspecialchars($this->input->post('id'));
      $result = $this->bm->update('artikel', $id, $this->_payload());
      if ($result) {
         $this->notification->notify_success('management/artikel', 'Berhasil memperbarui artikel');
      } else {
         $this->notification->notify_error('management/artikel', 'Gagal memperbarui artikel');
      }
   }

   private function _payload()
   {
      $judul = htmlspecialchars($this->input->post('judul', true));
      $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
      $kategori = htmlspecialchars($this->input->post('kategori', true));

      $config['upload_path'] = './assets/img/artikel/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size'] = 1024;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
         return $this->notification->notify_error('management/artikel', 'Ukuran gambar terlalu besar atau gambar tidak valid');
      } else {
         $data = $this->upload->data();
         $payload = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'image' => $data['file_name'],
            'kategori' => $kategori
         ];
         return $payload;
      }
   }

   private function _validation_artikel()
   {
      $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
      $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
   }
}
