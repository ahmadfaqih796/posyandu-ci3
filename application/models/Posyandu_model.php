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
      $this->db->select('p.*, 
      (SELECT COUNT(posyandu_id) FROM kaders WHERE posyandu_id = p.id) AS total_kader,
      (SELECT COUNT(posyandu_id) FROM anak WHERE posyandu_id = p.id) AS total_anak,
      u.name,
      u.email,
      u.is_active');
      $this->db->from('posyandu p');
      $this->db->join('users u', 'p.user_id = u.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_kegiatan_posyandu($id_posyandu = null)
   {
      $this->db->select('m.*, p.n_posyandu');
      $this->db->from('monitoring_kegiatan_posyandu m');
      $this->db->join('posyandu p', 'm.posyandu_id = p.id', 'left');
      if ($id_posyandu != null) {
         $this->db->where('m.posyandu_id', $id_posyandu);
      }
      return $this->db->get()->result_array();
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
