<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
   }

   public function get_roles()
   {
      return $this->db->get('roles')->result_array();
   }

   public function get_role_by_id($role_id)
   {
      return $this->db->get_where('roles', ['id' => $role_id])->row_array();
   }

   public function add_role($data)
   {
      $this->db->insert('roles', $data);
      return $this->db->insert_id();
   }

   public function update_role($role_id, $data)
   {
      $this->db->where('id', $role_id);
      return $this->db->update('roles', $data);
   }

   public function delete_role($role_id)
   {
      $this->db->where('id', $role_id);
      return $this->db->delete('roles');
   }
}
