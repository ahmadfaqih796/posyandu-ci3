<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
      $this->load->model('Kaders_model', 'km');
      $this->load->model('Anak_model', 'am');
   }

   public function get_users($role = null, $notAnak = null)
   {
      $this->db->select('users.*, roles.role');
      $this->db->from('users');
      $this->db->join('roles', 'users.role_id = roles.id', 'left');
      $this->db->where('users.is_deleted', 0);
      if ($role) {
         $this->db->where('users.role_id', $role);
      }
      if ($notAnak) {
         $this->db->where('users.role_id != 3');
      }
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
            $payload = [
               'user_id' => $user_id
            ];
            $this->km->add_kader($payload);
         }
      }
      if ($user['role_id'] == 3) {
         $existing_anak = $this->db->get_where('anak', ['user_id' => $user_id])->row_array();
         if (!$existing_anak) {
            $payload = [
               'user_id' => $user_id
            ];
            $this->am->add_anak($payload);
         }
      }
      $this->db->where('id', $user_id);
      return $this->db->update('users', $data);
   }

   public function delete_user($user_id)
   {
      return $this->db->update('users', ['is_deleted' => 1], ['id' => $user_id]);
   }
}
