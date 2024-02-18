<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posyandu_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
   }

   public function get_posyandu()
   {
      return $this->db->get('posyandu')->result_array();
   }

   public function get_posyandu_by_id($posyandu_id)
   {
      return $this->db->get_where('posyandu', ['id' => $posyandu_id])->row_array();
   }

   public function add_posyandu($data)
   {
      return $this->db->insert('posyandu', $data);
   }

   public function update_posyandu($posyandu_id, $data)
   {
      $this->db->where('id', $posyandu_id);
      return $this->db->update('posyandu', $data);
   }

   public function delete_posyandu($posyandu_id)
   {
      $this->db->where('id', $posyandu_id);
      return $this->db->delete('posyandu');
   }
}
