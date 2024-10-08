<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imunisasi_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
   }

   public function get_all_imunisasi($id_posyandu = null, $tanggal = null, $anak_id = null, $user_id = null)
   {
      $this->db->select('i.*, u.name, u.email, u.is_active, t.n_imunisasi, a.nik, p.n_posyandu');
      $this->db->from('imunisasi i');
      $this->db->join('users u', 'i.anak_id = u.id', 'left');
      $this->db->join('tipe_imunisasi t', 'i.tipe_imunisasi_id = t.id', 'left');
      $this->db->join('anak a', 'i.anak_id = a.user_id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      if ($id_posyandu != null) {
         $this->db->where('a.posyandu_id', $id_posyandu);
      }
      if ($tanggal != null) {
         $this->db->like('i.tanggal_imunisasi', $tanggal);
      }
      if ($anak_id != null) {
         $this->db->where('i.anak_id', $anak_id);
      }
      if ($user_id != null) {
         $this->db->where('a.id', $user_id);
      }
      return $this->db->get()->result_array();
   }

   public function get_all_imunisasi_by_ibu($ibu_id = null, $anak_id = null)
   {
      $this->db->select('i.*, u.name, u.email, u.is_active, t.n_imunisasi, a.nik, p.n_posyandu, ib.n_ibu');
      $this->db->from('imunisasi i');
      $this->db->join('users u', 'i.anak_id = u.id', 'left');
      $this->db->join('tipe_imunisasi t', 'i.tipe_imunisasi_id = t.id', 'left');
      $this->db->join('anak a', 'i.anak_id = a.user_id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->join('ibu ib', 'a.orang_tua_id = ib.id', 'left');
      if ($ibu_id != null) {
         $this->db->where('ib.id', $ibu_id);
      }
      if ($anak_id != null) {
         $this->db->where('i.anak_id', $anak_id);
      }
      return $this->db->get()->result_array();
   }

   public function get_all_imunisasi_by_id($id)
   {
      $this->db->select('i.*, u.name, u.email, u.is_active, t.n_imunisasi, a.nik');
      $this->db->from('imunisasi i');
      $this->db->join('users u', 'i.anak_id = u.id', 'left');
      $this->db->join('tipe_imunisasi t', 'i.tipe_imunisasi_id = t.id', 'left');
      $this->db->join('anak a', 'i.anak_id = a.user_id', 'left');
      $this->db->where('i.anak_id', $id);
      return $this->db->get()->result_array();
   }

   public function get_all_type_imunisasi()
   {
      $this->db->select('t.*, 
      ( SELECT COUNT( id ) FROM imunisasi WHERE tipe_imunisasi_id = t.id ) AS total_imunisasi
      ');
      $this->db->from('tipe_imunisasi t');
      return $this->db->get()->result_array();
   }

   public function get_imunisasi_by_id($id)
   {
      return $this->db->get_where('imunisasi', ['id' => $id])->row_array();
   }

   public function add_imunisasi($data)
   {
      $this->db->insert('imunisasi', $data);
      return $this->db->insert_id();
   }

   public function update_imunisasi($id, $data)
   {
      $this->db->where('id', $id);
      return $this->db->update('imunisasi', $data);
   }

   public function delete_imunisasi($id)
   {
      $this->db->where('id', $id);
      return $this->db->delete('imunisasi');
   }
}
