<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Testi extends CI_Model
{

  public function getTestimoni()
  {
    return $this->db->get('testimonials');
  }
}
