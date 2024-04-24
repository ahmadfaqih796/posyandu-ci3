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

   public function get_count_bumil_id($table, $bumil_id)
   {
      return $this->db->get_where($table, ['bumil_id' => $bumil_id])->num_rows();
   }
}
