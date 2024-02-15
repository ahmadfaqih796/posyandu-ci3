<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
   }

   public function index()
   {
      $data['user'] =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      // var_dump($data['user']);
      echo "Hello Users" . $data['user']['name'];
   }
}
