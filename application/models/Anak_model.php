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
      $this->db->select('a.*, u.name, u.email, u.is_active, p.n_posyandu, i.n_ibu');
      $this->db->from('anak a');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->join('ibu i', 'a.orang_tua_id = i.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_all_anak_no_dead()
   {
      $this->db->select('a.*, u.name');
      $this->db->from('anak a');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->where('a.is_death', 0);
      return $this->db->get()->result_array();
   }

   public function get_all_anak_table($table)
   {
      $this->db->select('t.*, u.name');
      $this->db->from($table . ' t');
      $this->db->join('users u', 't.anak_id = u.id', 'left');
      return $this->db->get()->result_array();
   }

   public function get_all_anak_by_ibu($id)
   {
      $this->db->select('a.*, u.name, u.email, u.is_active, p.n_posyandu, i.n_ibu');
      $this->db->from('anak a');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->join('ibu i', 'a.orang_tua_id = i.id', 'left');
      $this->db->where('a.orang_tua_id', $id);
      return $this->db->get()->result_array();
   }

   public function get_anak_by_id($anak_id)
   {
      $this->db->select('a.*, u.name, u.email, u.image, u.is_active, p.n_posyandu');
      $this->db->from('anak a');
      $this->db->join('users u', 'a.user_id = u.id', 'left');
      $this->db->join('posyandu p', 'a.posyandu_id = p.id', 'left');
      $this->db->where('a.user_id', $anak_id);
      return $this->db->get()->row_array();
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

   public function update_anak_by_user_id($id, $data)
   {
      $this->db->where('user_id', $id);
      return $this->db->update('anak', $data);
   }

   public function delete_anak($id)
   {
      $this->db->where('id', $id);
      return $this->db->delete('anak');
   }
}
