<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
      $this->load->model('Kaders_model', 'km');
   }

   public function get_users()
   {
      $this->db->select('users.*, roles.role');
      $this->db->from('users');
      $this->db->join('roles', 'users.role_id = roles.id', 'left');
      $query = $this->db->get();
      return $query->result_array();
   }

   public function get_user_by_id($user_id)
   {
      return $this->db->get_where('users', array('id' => $user_id))->row_array();
   }

   public function insert_user($data)
   {
      $user = $this->db->get_where('users', ['email' => $data['email']])->row_array();
      if ($user) {
         return $this->notification->notify_error('management/users', 'Email sudah terdaftar!');
      }
      $this->db->insert('users', $data);
      return $this->db->insert_id();
   }

   public function update_user($user_id, $data)
   {
      $user = $this->db->get_where('users', ['id' => $user_id])->row_array();
      if ($user['role_id'] == 2) {
         $existing_kader = $this->db->get_where('kaders', ['user_id' => $user_id])->row_array();
         if (!$existing_kader) {
            $kader_data = [
               'user_id' => $user_id
            ];
            $this->km->add_kader($kader_data);
         }
      }
      $this->db->where('id', $user_id);
      return $this->db->update('users', $data);
   }

   public function delete_user($user_id)
   {
      return $this->db->delete('users', array('id' => $user_id));
   }
}
