<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function get_all_anak($posyandu_id = null)
   {
      $this->db->select('a.*, u.name, u.email, u.is_active, p.n_posyandu, i.n_ibu');
      $this->db->from('anak a');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->join('ibu i', 'a.orang_tua_id = i.id', 'left');
      if ($posyandu_id != null) {
         $this->db->where('a.posyandu_id', $posyandu_id);
      }
      return $this->db->get()->result_array();
   }

   public function get_all_anak_by_posyandu_id($posyandu_id)
   {
      $this->db->select('a.*, u.name, u.email, u.is_active, p.n_posyandu, i.n_ibu');
      $this->db->from('anak a');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->join('ibu i', 'a.orang_tua_id = i.id', 'left');
      $this->db->where('a.posyandu_id', $posyandu_id);
      return $this->db->get()->result_array();
   }

   public function get_all_anak_no_dead($id_posyandu = null)
   {
      $this->db->select('a.*, u.name, p.n_posyandu');
      $this->db->from('anak a');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->where('a.is_death', 0);
      if ($id_posyandu != null) {
         $this->db->where('a.posyandu_id', $id_posyandu);
      }
      return $this->db->get()->result_array();
   }

   public function get_all_anak_table($table, $id_posyandu = null, $tgl_ukur = null, $id_anak = null, $tgl_kematian = null)
   {
      $this->db->select('t.*, t.id AS table_id, u.name, a.*, p.n_posyandu');
      $this->db->from($table . ' t');
      $this->db->join('users u', 't.anak_id = u.id', 'left');
      $this->db->join('anak a', 't.anak_id = a.user_id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      if ($id_posyandu != null) {
         $this->db->where('a.posyandu_id', $id_posyandu);
      }
      if ($tgl_ukur != null) {
         $this->db->like('t.tgl_ukur', $tgl_ukur);
      }
      if ($id_anak != null) {
         $this->db->where('t.anak_id', $id_anak);
      }
      if ($tgl_kematian != null) {
         $this->db->where('t.tgl_kematian', $tgl_kematian);
      }
      return $this->db->get()->result_array();
   }

   public function get_all_timbangan_anak($table, $id_posyandu = null, $tgl_ukur = null, $id_anak = null, $tgl_kematian = null)
   {
      $this->db->select('t.*, t.id AS table_id, t.created_at AS tgl_buat, u.name, a.*, p.n_posyandu');
      $this->db->from($table . ' t');
      $this->db->join('anak a', 't.anak_id = a.id', 'left');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      if ($id_posyandu != null) {
         $this->db->where('a.posyandu_id', $id_posyandu);
      }
      if ($tgl_ukur != null) {
         $this->db->like('t.tgl_ukur', $tgl_ukur);
      }
      if ($id_anak != null) {
         $this->db->where('t.anak_id', $id_anak);
      }
      if ($tgl_kematian != null) {
         $this->db->where('t.tgl_kematian', $tgl_kematian);
      }
      return $this->db->get()->result_array();
   }

   public function get_timbangan_anak_by_id($table, $id)
   {
      $this->db->select('t.*, t.id AS table_id, u.name, a.*, p.n_posyandu');
      $this->db->from($table . ' t');
      $this->db->join('anak a', 't.anak_id = a.id', 'left');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->where('t.id', $id);
      return $this->db->get()->row_array();
   }

   public function get_all_anak_table_by_posyandu($table, $posyandu_id = null, $tgl_ukur = null, $id_anak = null, $tgl_kematian = null)
   {
      $this->db->select('t.*, t.id AS table_id, u.name, a.*, p.n_posyandu');
      $this->db->from($table . ' t');
      $this->db->join('anak a', 't.anak_id = a.id', 'left');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      if ($id_anak != null) {
         $this->db->where('t.anak_id', $id_anak);
      }
      if ($posyandu_id != null) {
         $this->db->where('a.posyandu_id', $posyandu_id);
      }
      if ($tgl_ukur != null) {
         $this->db->where('t.tgl_ukur', $tgl_ukur);
      }
      return $this->db->get()->result_array();
   }

   public function get_all_anak_table_by_count($table, $posyandu_id, $tgl_ukur = null)
   {
      $this->db->select('t.*, t.id AS table_id, u.name, a.*, p.n_posyandu');
      $this->db->from($table . ' t');
      $this->db->join('anak a', 't.anak_id = a.id', 'left');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->where('a.posyandu_id', $posyandu_id);
      $this->db->where('t.tgl_ukur', $tgl_ukur);
      return $this->db->get()->num_rows();
   }

   public function get_count_status_gizi($status_gizi = null)
   {
      $this->db->select('t.*, t.id AS table_id, u.name, a.*, p.n_posyandu');
      $this->db->from('timbangan_anak t');
      $this->db->join('users u', 't.anak_id = u.id', 'left');
      $this->db->join('anak a', 't.anak_id = a.user_id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      if ($status_gizi != null) {
         $this->db->where('t.status_gizi', $status_gizi);
      }
      return $this->db->count_all_results();
   }

   public function get_all_anak_table_by_id($table, $id)
   {
      $this->db->select('t.*, t.id AS table_id, u.name, a.*');
      $this->db->from($table . ' t');
      $this->db->join('users u', 't.anak_id = u.id', 'left');
      $this->db->join('anak a', 't.anak_id = a.user_id', 'left');
      $this->db->where('t.anak_id', $id);
      return $this->db->get()->result_array();
   }

   public function get_all_anak_table_by_id_v2($table, $id = null, $ibu_id = null)
   {
      $this->db->select('t.*, t.id AS table_id, u.name, a.*, p.n_posyandu, i.n_ibu');
      $this->db->from($table . ' t');
      $this->db->join('users u', 't.anak_id = u.id', 'left');
      $this->db->join('anak a', 't.anak_id = a.user_id', 'left');
      $this->db->join('ibu i', 'a.orang_tua_id = i.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      if ($id != null) {
         $this->db->where('t.anak_id', $id);
      }
      if ($ibu_id != null) {
         $this->db->where('i.id', $ibu_id);
      }
      return $this->db->get()->result_array();
   }

   public function get_all_anak_by_ibu($id)
   {
      $this->db->select('a.*, u.name, u.email, u.is_active, p.n_posyandu, i.n_ibu');
      $this->db->from('anak a');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->join('ibu i', 'a.orang_tua_id = i.id', 'left');
      $this->db->where('a.orang_tua_id', $id);
      return $this->db->get()->result_array();
   }

   public function get_anak_by_id($anak_id)
   {
      $this->db->select('a.*, u.name, u.email, u.image, u.is_active, p.n_posyandu');
      $this->db->from('anak a');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->where('a.user_id', $anak_id);
      return $this->db->get()->row_array();
   }

   public function get_anak_table_by_id($table, $table_id)
   {
      $this->db->select('t.*, t.id AS table_id, u.*, a.*');
      $this->db->from($table . ' t');
      $this->db->join('users u', 't.anak_id = u.id', 'left');
      $this->db->join('anak a', 't.anak_id = a.user_id', 'left');
      $this->db->where('t.id', $table_id);
      return $this->db->get()->row_array();
   }

   public function get_status_gizi_anak($umur, $jk)
   {
      $this->db->select('g.*');
      $this->db->from('gizi_status g');
      $this->db->where('g.umur', $umur);
      $this->db->where('g.jk', $jk);
      return $this->db->get()->row_array();
   }

   public function add_anak($data)
   {
      return $this->db->insert('anak', $data);
   }

   public function update_anak($id, $data)
   {
      $this->db->where('id', $id);
      return $this->db->update('anak', $data);
   }

   public function update_anak_by_user_id($id, $data)
   {
      $this->db->where('user_id', $id);
      return $this->db->update('anak', $data);
   }

   public function delete_anak($id)
   {
      $this->db->where('id', $id);
      return $this->db->delete('anak');
   }
}
