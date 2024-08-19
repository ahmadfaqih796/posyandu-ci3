<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Schedule_model', 'sm');
   }
   public function index()
   {
      $this->load->view('visitor/index');
   }

   public function monitoring_posyandu()
   {
      $data =  [
         'title' => 'Monitoring Posyandu',
         'data' => $this->sm->get_schedule()
      ];
      $this->load->view('visitor/m_posyandu', $data);
   }

   public function monitoring_ibu_hamil()
   {
      $data =  [
         'title' => 'Monitoring Ibu Hamil',
         'data' => $this->sm->get_schedule()
      ];
      $this->load->view('visitor/m_ibu_hamil', $data);
   }
}
