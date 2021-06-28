<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // is_logged_in();
    $this->load->model('M_Website', 'website');
  }
  public function index()
  {
    $data['title'] = "Event Tech";
    $this->load->view('Templates/webs/header', $data);
    $this->load->view('Website/index');
    $this->load->view('Templates/webs/footer');
  }
}
