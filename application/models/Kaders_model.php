<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaders_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
   }

   public function get_all_kaders()
   {
      return $this->db->get('kaders')->result_array();
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
