<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imunisasi_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
   }

   public function get_all_imunisasi()
   {
      $this->db->select('i.*, u.name, u.email, u.is_active, t.n_imunisasi');
      $this->db->from('imunisasi i');
      $this->db->join('users u', 'i.anak_id = u.id', 'left');
      $this->db->join('tipe_imunisasi t', 'i.tipe_imunisasi_id = t.id', 'left');
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
