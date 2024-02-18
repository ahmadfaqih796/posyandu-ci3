<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function get_all_anak()
   {
      $this->db->select('a.*, u.name, u.email, u.is_active');
      $this->db->from('anak a');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      return $this->db->get()->result_array();
   }

   public function add_anak($data)
   {
      return $this->db->insert('anak', $data);
   }

   public function update_anak($id, $data)
   {
      $this->db->where('id', $id);
      return $this->db->update('anak', $data);
   }

   public function delete_anak($id)
   {
      $this->db->where('id', $id);
      return $this->db->delete('anak');
   }
}
