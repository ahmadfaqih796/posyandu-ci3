<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaders_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
   }

   public function get_kaders()
   {
      $this->db->select('k.*, u.name, u.email, u.is_active, p.n_posyandu');
      $this->db->from('kaders k');
      $this->db->join('users u', 'k.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'k.posyandu_id = p.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_count_kaders()
   {
      return $this->db->get('kaders')->num_rows();
   }

   public function get_kader_by_id($kader_id)
   {
      return $this->db->get_where('kaders', ['id' => $kader_id])->row_array();
   }

   public function add_kader($data)
   {
      $this->db->insert('kaders', $data);
      return $this->db->insert_id();
   }

   public function update_kader($kader_id, $data)
   {
      $this->db->where('id', $kader_id);
      return $this->db->update('kaders', $data);
   }

   public function delete_kader($kader_id)
   {
      $this->db->where('id', $kader_id);
      return $this->db->delete('kaders');
   }
}
