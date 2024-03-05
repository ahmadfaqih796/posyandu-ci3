<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Query_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function get_all($table)
   {
      return $this->db->get($table)->result_array();
   }
}
