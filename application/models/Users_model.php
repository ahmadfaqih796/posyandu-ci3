<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
   }

   public function get_users()
   {
      return $this->db->get('users')->result_array();
   }

   public function get_user_by_id($user_id)
   {
      return $this->db->get_where('users', array('id' => $user_id))->row_array();
   }

   public function insert_user($data)
   {
      $this->db->insert('users', $data);
      return $this->db->insert_id();
   }

   public function update_user($user_id, $data)
   {
      $this->db->where('id', $user_id);
      return $this->db->update('users', $data);
   }

   public function delete_user($user_id)
   {
      return $this->db->delete('users', array('id' => $user_id));
   }
}
