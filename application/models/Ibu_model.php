<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibu_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function get_all_ibu()
   {
      $this->db->select('i.*, 
      (SELECT COUNT(orang_tua_id) FROM anak WHERE orang_tua_id = i.id) AS total_anak');
      $this->db->from('ibu i');
      return $this->db->get()->result_array();
   }

   public function get_all_kehamilan()
   {
      $this->db->select('k.*, b.n_ibu');
      $this->db->from('kehamilan k');
      $this->db->join('ibu_hamil b', 'k.bumil_id = b.id', 'left');
      return $this->db->get()->result_array();
   }
   public function get_all_kehamilan_by_bumil($bumil_id)
   {
      $this->db->select('k.*, b.n_ibu');
      $this->db->from('kehamilan k');
      $this->db->join('ibu_hamil b', 'k.bumil_id = b.id', 'left');
      $this->db->where('k.bumil_id', $bumil_id);
      return $this->db->get()->result_array();
   }

   public function get_kehamilan_by_bumil_id($id)
   {
      $this->db->select('k.*, k.id as id_kehamilan, b.*');
      $this->db->from('kehamilan k');
      $this->db->join('ibu_hamil b', 'k.bumil_id = b.id', 'left');
      $this->db->where('k.bumil_id', $id);
      $this->db->order_by('k.id', 'desc');
      return $this->db->get()->row_array();
   }

   public function get_kehamilan_by_id($id)
   {
      $this->db->select('k.*, k.id as id_kehamilan, b.*');
      $this->db->from('kehamilan k');
      $this->db->join('ibu_hamil b', 'k.bumil_id = b.id', 'left');
      $this->db->where('k.id', $id);
      $this->db->order_by('k.id', 'desc');
      return $this->db->get()->row_array();
   }

   public function get_all_kematian()
   {
      $this->db->select('k.*, b.n_ibu');
      $this->db->from('kematian_ibu_hamil k');
      $this->db->join('ibu_hamil b', 'k.bumil_id = b.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_all_ibu_hamil_no_dead()
   {
      $this->db->select('b.*');
      $this->db->from('ibu_hamil b');
      $this->db->where('b.is_death', 0);
      return $this->db->get()->result_array();
   }

   public function get_all_ibu_hamil($table, $date = null)
   {
      $this->db->select('t.*, b.n_ibu, b.nik');
      $this->db->from($table . ' t');
      $this->db->join('ibu_hamil b', 't.bumil_id = b.id', 'left');
      if ($date != null) {
         $this->db->like('tanggal_periksa', $date, 'after');
      }
      return $this->db->get()->result_array();
   }

   public function get_all_ibu_hamil_by_id($table, $bumil_id)
   {
      $this->db->select('t.*, b.n_ibu');
      $this->db->from($table . ' t');
      $this->db->join('ibu_hamil b', 't.bumil_id = b.id', 'left');
      $this->db->where('t.bumil_id', $bumil_id);
      return $this->db->get()->result_array();
   }

   public function get_all_ibu_hamil_by_id_with_bumil($table, $id, $bumil_id)
   {
      $this->db->select('t.*, b.n_ibu');
      $this->db->from($table . ' t');
      $this->db->join('ibu_hamil b', 't.bumil_id = b.id', 'left');
      $this->db->where('t.bumil_id', $bumil_id);
      $this->db->where('t.id', $id);
      return $this->db->get()->row_array();
   }

   // public function get_all_monitoring_ibu_hamil_by_id($bumil_id)
   // {
   //    $this->db->select('m.*, b.n_ibu');
   //    $this->db->from('monitoring_ibu_hamil m');
   //    $this->db->join('ibu_hamil b', 'm.bumil_id = b.id', 'left');
   //    $this->db->where('m.bumil_id', $bumil_id);
   //    return $this->db->get()->result_array();
   // }

   public function get_ibu_hamil_by_id($id)
   {
      return $this->db->get_where('ibu_hamil', ['id' => $id])->row_array();
   }

   public function get_ibu_by_id($id)
   {
      return $this->db->get_where('ibu', ['id' => $id])->row_array();
   }

   public function add_ibu($data)
   {
      return $this->db->insert('ibu', $data);
   }

   public function update_ibu($id, $data)
   {
      $this->db->where('id', $id);
      return $this->db->update('ibu', $data);
   }

   public function delete_ibu($id)
   {
      $this->db->where('id', $id);
      return $this->db->delete('ibu');
   }
}
