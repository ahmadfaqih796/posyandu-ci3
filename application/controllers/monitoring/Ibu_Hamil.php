<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Ibu_Hamil extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
      $this->load->model('Base_model', 'bm');
      $this->load->model('Ibu_model', 'im');
   }

   public function index()
   {
      $this->_validation();
      $data['title'] = 'Ibu Hamil';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->im->get_all_ibu_hamil("monitoring_ibu_hamil");
      $data['bidan'] = $this->bm->get_all("ibu_hamil");
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/ibu_hamil/index', $data);
         $this->load->view('monitoring/ibu_hamil/addModal');
         // $this->load->view('monitoring/ibu_hamil/edit');
         $this->load->view('monitoring/ibu_hamil/delete');
         $this->load->view('templates/footer', $data);
      } else {
         // $add = $this->input->post('addData');
         // $update = $this->input->post('updateData');
         // if ($add) {
         //    return $this->add();
         // } else if ($update) {
         //    return $this->update();
         // } else {
         //    $this->notification->notify_error('data/ibu_hamil/bidan', 'Method initidak ditemukan');
         // }
      }
   }

   public function pdf()
   {
      require_once FCPATH . 'vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf();

      $data['title'] = 'Monitoring Ibu Hamil';
      $data['no'] = 1;
      $data['users'] = $this->im->get_all_ibu_hamil("monitoring_ibu_hamil");

      $html = $this->load->view('monitoring/ibu_hamil/printPDF', $data, true);

      $mpdf->WriteHTML($html);
      $mpdf->Output('monitoring_ibu_hamil.pdf', 'D');
   }

   public function excel()
   {
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'No');
      $sheet->setCellValue('B1', 'Nama');
      $sheet->setCellValue('C1', 'Hamil Ke');
      $sheet->setCellValue('D1', 'Tanggal periksa');
      $sheet->setCellValue('E1', 'Keluhan');
      $sheet->setCellValue('F1', 'Kunjungan');
      $sheet->setCellValue('G1', 'Sesi');
      $sheet->setCellValue('H1', 'Tekanan Darah');
      $sheet->setCellValue('I1', 'Berat Badan');
      $sheet->setCellValue('J1', 'Tinggi Badan');
      $sheet->setCellValue('K1', 'Umur Kehamilan');
      $sheet->setCellValue('L1', 'Tinggi Fundus');
      $sheet->setCellValue('M1', 'Umur Ibu');
      $sheet->setCellValue('N1', 'HIV');
      $sheet->setCellValue('O1', 'Sifilis');
      $sheet->setCellValue('P1', 'HibSAg');
      $sheet->setCellValue('Q1', 'LILA');
      $sheet->setCellValue('R1', 'Kunjungan Berikutnya');
      $sheet->setCellValue('S1', 'Keterangan');
      $data = $this->im->get_all_ibu_hamil("monitoring_ibu_hamil");
      $no = 1;
      $x = 2;
      foreach ($data as $row) {
         $sheet->setCellValue('A' . $x, $no++);
         $sheet->setCellValue('B' . $x, $row['n_ibu']);
         $sheet->setCellValue('C' . $x, $row['hamil_ke']);
         $sheet->setCellValue('D' . $x, $row['tanggal_periksa']);
         $sheet->setCellValue('E' . $x, $row['keluhan']);
         $sheet->setCellValue('F' . $x, $row['kunjungan']);
         $sheet->setCellValue('G' . $x, $row['sesi']);
         $sheet->setCellValue('H' . $x, $row['tekanan_darah']);
         $sheet->setCellValue('I' . $x, $row['berat_badan']);
         $sheet->setCellValue('J' . $x, $row['tinggi_badan']);
         $sheet->setCellValue('K' . $x, $row['umur_kehamilan']);
         $sheet->setCellValue('L' . $x, $row['tinggi_fundus']);
         $sheet->setCellValue('M' . $x, $row['umur_ibu']);
         $sheet->setCellValue('N' . $x, $row['hiv']);
         $sheet->setCellValue('O' . $x, $row['sifilis']);
         $sheet->setCellValue('P' . $x, $row['hibsag']);
         $sheet->setCellValue('Q' . $x, $row['lila']);
         $sheet->setCellValue('R' . $x, $row['kunjungan_berikutnya']);
         $sheet->setCellValue('S' . $x, $row['keterangan']);
         $x++;
      }

      $highestRow = $sheet->getHighestRow();
      $range = 'A1:S' . $highestRow;
      $style = $sheet->getStyle($range);
      $style->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

      foreach (range('A', 'S') as $columnID) {
         $sheet->getColumnDimension($columnID)->setAutoSize(true);
      }
      $sheet->getColumnDimension('A')->setWidth(5);
      $sheet->getColumnDimension('B')->setWidth(20);

      $writer = new Xlsx($spreadsheet);
      $filename = 'monitoring-ibu-hamil';

      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
      header('Cache-Control: max-age=0');

      $writer->save('php://output');
   }

   public function add($id)
   {
      $this->_validation();
      $data['title'] = 'Ibu Hamil';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->bm->get_all("monitoring_ibu_hamil");
      $data['kehamilan'] =  $this->im->get_kehamilan_by_bumil_id($id);
      $data['bidan'] = $this->bm->get_all("ibu_hamil");
      $data['id_ibu_hamil'] = $id;
      $data['no'] = 1;
      if ($data['kehamilan'] == null) {
         $this->notification->notify_error('monitoring/ibu_hamil', 'Maaf anda harus menambahkan data kehamilan terlebih dahulu');
      }
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/ibu_hamil/add', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->add('monitoring_ibu_hamil', $this->_payload());
         $this->bm->add("notification", $this->_payload_notification());
         if ($result) {
            $this->notification->notify_success('monitoring/ibu_hamil', 'Berhasil menambahkan data');
         } else {
            $this->notification->notify_error('monitoring/ibu_hamil', 'Gagal menambahkan data');
         }
      }
   }

   public function edit($id_data)
   {
      $this->_validation();
      $data['title'] = 'Ibu Hamil';
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $data['data'] = $this->bm->get_all("monitoring_ibu_hamil");
      $data['bidan'] = $this->bm->get_all("ibu_hamil");
      $data['detail'] = $this->bm->get_by_id("monitoring_ibu_hamil", $id_data);
      $data['id_ibu_hamil'] = $id_data;
      $data['no'] = 1;
      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('monitoring/ibu_hamil/edit', $data);
         $this->load->view('templates/footer', $data);
      } else {
         $result = $this->bm->update('monitoring_ibu_hamil', $id_data, $this->_payload());
         if ($result) {
            $this->notification->notify_success('monitoring/ibu_hamil', 'Berhasil mengubah data');
         } else {
            $this->notification->notify_error('monitoring/ibu_hamil', 'Gagal mengubah data');
         }
      }
   }

   public function delete()
   {
      $id = $this->input->post('id');
      $result = $this->bm->delete("monitoring_ibu_hamil", $id);
      if ($result) {
         $this->notification->notify_success('monitoring/ibu_hamil', 'Berhasil menghapus bidan');
      } else {
         $this->notification->notify_error('monitoring/ibu_hamil', 'Gagal menghapus bidan');
      }
   }

   private function _payload_notification()
   {
      $bumil_id = htmlspecialchars($this->input->post('bumil_id', true));
      $kunjungan_berikutnya = htmlspecialchars($this->input->post('kunjungan_berikutnya', true));

      $payload = [
         'bumil_id' => $bumil_id,
         'message' => 'Jangan Lupa Datang Ya Bunda ' . $kunjungan_berikutnya,
         'date' => $kunjungan_berikutnya
      ];

      return $payload;
   }

   private function _payload()
   {
      $payload = [];
      $form_fields = array(
         'bumil_id',
         'kehamilan_id',
         'hamil_ke',
         'tanggal_periksa',
         'keluhan',
         'kunjungan',
         'sesi',
         'tekanan_darah',
         'berat_badan',
         'umur_kehamilan',
         'tinggi_fundus',
         'umur_ibu',
         'tinggi_badan',
         'sifilis',
         'hiv',
         'hibsag',
         'lila',
         'kunjungan_berikutnya',
         'keterangan',
         's_timbang_berat_badan',
         's_tekanan_darah',
         's_tinggi_puncak_rahim',
         's_vaksinasi_tetanus',
         's_tablet_zat_besi',
         's_tes_laboratorium',
         's_temu_wicara'
      );
      foreach ($form_fields as $field) {
         $value = htmlspecialchars($this->input->post($field, true));
         $payload[$field] = $value;
      }
      return $payload;
   }


   private function _validation()
   {
      $this->form_validation->set_rules('bumil_id', 'Nama Ibu', 'required|trim');
   }
}
