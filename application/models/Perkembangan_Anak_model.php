<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perkembangan_Anak_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function get_all_pa()
   {
      $this->db->select('p.*, u.name, u.email, u.is_active');
      $this->db->from('perkembangan_anak p');
      $this->db->join('users u', 'p.anak_id = u.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_pa_by_id($id)
   {
      $this->db->select('p.*, u.name, u.email, u.is_active');
      $this->db->from('perkembangan_anak p');
      $this->db->join('users u', 'p.anak_id = u.id', 'left');
      $this->db->where('u.id', $id);
      return $this->db->get()->result_array();
      // return $this->db->get_where('perkembangan_anak', ['id' => $id])->row_array();
   }



   public function add_pa($data)
   {
      return $this->db->insert('perkembangan_anak', $data);
   }

   public function update_pa($id, $data)
   {
      $this->db->where('id', $id);
      return $this->db->update('perkembangan_anak', $data);
   }

   public function delete_pa($id)
   {
      $this->db->where('id', $id);
      return $this->db->delete('perkembangan_anak');
   }
}
