<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Badrequest extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('session');
   }

   public function error($code)
   {
      if ($code == 404) {
         $this->load->view('errors/html/error_404');
      } elseif ($code == 500) {
         $this->load->view('errors/html/error_500');
      } elseif ($code == 403) {
         $this->load->view('errors/html/error_403');
      }
   }
}
