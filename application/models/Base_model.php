<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function get_all($table, $kategori = null)
   {
      if ($kategori != null) {
         $this->db->where('kategori', $kategori);
      }
      return $this->db->get($table)->result_array();
   }

   public function get_all_by_bumil_id($table, $bumil_id)
   {
      return $this->db->get_where($table, ['bumil_id' => $bumil_id])->result_array();
   }

   public function get_by_id($table, $id)
   {
      return $this->db->get_where($table, ['id' => $id])->row_array();
   }

   public function get_by_user_id($table, $id)
   {
      return $this->db->get_where($table, ['user_id' => $id])->row_array();
   }

   public function add($table, $data)
   {
      $this->db->insert($table, $data);
      return $this->db->insert_id();
   }

   public function update($table, $id, $data)
   {
      $this->db->where('id', $id);
      return $this->db->update($table, $data);
   }

   public function delete($table, $id)
   {
      $this->db->where('id', $id);
      return $this->db->delete($table);
   }

   public function get_count($table)
   {
      return $this->db->get($table)->num_rows();
   }

   public function get_count_per_month($table, $month = null, $year = null)
   {
      if ($month != null && $year != null) {
         $this->db->where('MONTH(tanggal_imunisasi)', $month);
         $this->db->where('YEAR(tanggal_imunisasi)', $year);
      }
      return $this->db->get($table)->num_rows();
   }

   public function get_count_imunisasi_per_month($month = null, $year = null, $id_posyandu = null)
   {
      $this->db->select('i.*, u.name, u.email, u.is_active, t.n_imunisasi, a.nik, p.n_posyandu');
      $this->db->from('imunisasi i');
      $this->db->join('users u', 'i.anak_id = u.id', 'left');
      $this->db->join('tipe_imunisasi t', 'i.tipe_imunisasi_id = t.id', 'left');
      $this->db->join('anak a', 'i.anak_id = a.user_id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->where('status', 1);
      if ($month != null) {
         $this->db->where('MONTH(tanggal_imunisasi)', $month);
      }
      if ($year != null) {
         $this->db->where('YEAR(tanggal_imunisasi)', $year);
      }
      if ($id_posyandu != null) {
         $this->db->where('a.posyandu_id', $id_posyandu);
      }
      return $this->db->get()->num_rows();
   }

   public function get_count_monitoring_bumil($month = null, $year = null, $status = null)
   {
      $this->db->select('m.*, b.n_ibu, b.nik, 
        CASE 
            WHEN (
                m.s_timbang_berat_badan LIKE "%belum%" OR
                m.s_tekanan_darah LIKE "%belum%" OR
                m.s_tinggi_puncak_rahim LIKE "%belum%" OR
                m.s_vaksinasi_tetanus LIKE "%belum%" OR
                m.s_tablet_zat_besi LIKE "%belum%" OR
                m.s_tes_laboratorium LIKE "%belum%" OR
                m.s_temu_wicara LIKE "%belum%"
            ) THEN "belum"
            ELSE "sudah"
        END AS status');
      $this->db->from('monitoring_ibu_hamil m');
      $this->db->join('ibu_hamil b', 'm.bumil_id = b.id', 'left');
      if ($month != null) {
         $this->db->where('MONTH(m.tanggal_periksa)', $month);
      }
      if ($year != null) {
         $this->db->where('YEAR(m.tanggal_periksa)', $year);
      }
      if ($status != null) {
         $this->db->having('status', $status);
      }
      return $this->db->get()->num_rows();
   }

   public function get_count_k_posyandu_per_month($month = null, $year = null, $id_posyandu = null)
   {
      $this->db->select('t.*');
      $this->db->from('timbangan_anak t');
      $this->db->join('anak a', 't.anak_id = a.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->where('t.kehadiran = 1');
      if ($month != null) {
         $this->db->where('MONTH(t.tgl_ukur)', $month);
      }
      if ($year != null) {
         $this->db->where('YEAR(t.tgl_ukur)', $year);
      }
      if ($id_posyandu != null) {
         $this->db->where('a.posyandu_id', $id_posyandu);
      }
      return $this->db->get()->num_rows();
   }

   // public function get_count_k_posyandu_per_month($month = null, $year = null, $id_posyandu = null)
   // {
   //    $this->db->select('m.*, p.n_posyandu, u.name');
   //    $this->db->from('monitoring_kegiatan_posyandu m');
   //    $this->db->join('posyandu p', 'm.posyandu_id = p.id', 'left');
   //    $this->db->join('users u', 'm.kader_id = u.id', 'left');
   //    $this->db->where('m.kehadiran = 1');
   //    if ($month != null) {
   //       $this->db->where('MONTH(m.created_at)', $month);
   //    }
   //    if ($year != null) {
   //       $this->db->where('YEAR(m.created_at)', $year);
   //    }
   //    if ($id_posyandu != null) {
   //       $this->db->where('m.posyandu_id', $id_posyandu);
   //    }
   //    return $this->db->get()->num_rows();
   // }

   public function get_count_gizi_anak($month = null, $year = null, $id_posyandu = null, $status = null)
   {
      $this->db->select('t.*, t.id AS table_id, u.name, a.*, p.n_posyandu');
      $this->db->from('timbangan_anak t');
      $this->db->join('users u', 't.anak_id = u.id', 'left');
      $this->db->join('anak a', 't.anak_id = a.user_id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      if ($id_posyandu != null) {
         $this->db->where('a.posyandu_id', $id_posyandu);
      }
      if ($month != null) {
         $this->db->where('MONTH(t.tgl_ukur)', $month);
      }
      if ($year != null) {
         $this->db->where('YEAR(t.tgl_ukur)', $year);
      }
      if ($status != null) {
         $this->db->where('t.status_gizi', $status);
      }
      return $this->db->get()->num_rows();
   }

   public function get_count_gizi_bumil($month = null, $year = null, $status = null)
   {
      $this->db->select('m.*, b.n_ibu, b.nik,
        (m.berat_badan / ((m.tinggi_badan * m.tinggi_badan) / 10000)) AS nilai_gizi,
        CASE 
            WHEN (m.berat_badan / ((m.tinggi_badan * m.tinggi_badan) / 10000)) <= 18.5 THEN "Kurus"
            WHEN (m.berat_badan / ((m.tinggi_badan * m.tinggi_badan) / 10000)) <= 24.9 THEN "Normal"
            WHEN (m.berat_badan / ((m.tinggi_badan * m.tinggi_badan) / 10000)) <= 29.9 THEN "Gemuk"
            ELSE "Obesitas"
        END AS status_gizi');
      $this->db->from('monitoring_ibu_hamil m');
      $this->db->join('ibu_hamil b', 'm.bumil_id = b.id', 'left');

      if ($month != null) {
         $this->db->where('MONTH(m.tanggal_periksa)', $month);
      }
      if ($year != null) {
         $this->db->where('YEAR(m.tanggal_periksa)', $year);
      }
      if ($status != null) {
         $this->db->having('status_gizi', $status);
      }
      return $this->db->get()->num_rows();
   }


   public function get_count_bumil_id($table, $bumil_id)
   {
      return $this->db->get_where($table, ['bumil_id' => $bumil_id])->num_rows();
   }
}
