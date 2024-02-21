<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
   }

   public function get_schedule()
   {
      $this->db->select('s.*, p.n_posyandu');
      $this->db->from('schedule s');
      $this->db->join('posyandu p', 's.posyandu_id = p.id', 'left');
      return $this->db->get()->result_array();
      // return $this->db->get('schedule')->result_array();
   }

   public function get_schedule_by_id($schedule_id)
   {
      return $this->db->get_where('schedule', ['id' => $schedule_id])->row_array();
   }

   public function add_schedule($data)
   {
      return $this->db->insert('schedule', $data);
   }

   public function update_schedule($schedule_id, $data)
   {
      $this->db->where('id', $schedule_id);
      return $this->db->update('schedule', $data);
   }

   public function delete_schedule($schedule_id)
   {
      $this->db->where('id', $schedule_id);
      return $this->db->delete('schedule');
   }
}
