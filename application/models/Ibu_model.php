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
      $this->db->join('bidan b', 'k.bidan_id = b.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_all_kematian()
   {
      $this->db->select('k.*, b.n_ibu');
      $this->db->from('kematian_ibu_hamil k');
      $this->db->join('bidan b', 'k.bidan_id = b.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_all_bidan_no_dead()
   {
      $this->db->select('b.*');
      $this->db->from('bidan b');
      $this->db->where('b.is_death', 0);
      return $this->db->get()->result_array();
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
