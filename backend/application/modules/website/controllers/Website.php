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

    $data['newevent'] = $this->website->getnewEvent()->result_array();
    $data['workshop'] = $this->website->getAllWrkEvent()->result_array();
    $this->load->view('Templates/webs/header', $data);
    $this->load->view('Website/index');
    $this->load->view('Templates/webs/footer');
  }
  public function event()
  {
    $data['title'] = "Event Tech";
    $data['event'] = $this->website->getAllEvent()->result_array();

    $this->load->view('Templates/webs/header', $data);
    $this->load->view('Website/event');
    $this->load->view('Templates/webs/footer');
  }
  public function pricelist()
  {
    $data['price'] = $this->website->getpriceList()->result_array();
    $data['title'] = "Event Tech";
    $this->load->view('Templates/webs/header', $data);
    $this->load->view('Website/pricelist');
    $this->load->view('Templates/webs/footer');
  }
  public function eventcategory($category)
  {
    $data['title'] = "Event Tech";
    $data['getcat'] = $this->website->getcategory();
    $data['bycategory'] = $this->website->getcatEvent($category)->result_array();
    $this->load->view('Templates/webs/header', $data);
    $this->load->view('Website/event');
    $this->load->view('Templates/webs/footer');
  }
  public function detail_event($id)
  {
    $data['title'] = "Event Tech";
    $data['getcat'] = $this->website->getcategory();
    $data['detailevent'] = $this->website->getEventId($id);
    $this->load->view('Templates/webs/header', $data);
    $this->load->view('Website/event_detail');
    $this->load->view('Templates/webs/footer');
  }
}
