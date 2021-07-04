<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Website extends CI_Model
{

  public function getnewEvent()
  {
    $this->db->select('event.*, categories.categories,user.*');
    $this->db->from('event');
    $this->db->join('categories', 'event.category_id = categories.id');
    $this->db->join('user', 'event.author = user.id');
    $this->db->order_by('event.id', 'desc');
    $this->db->limit('3');
    return $this->db->get();
  }
  public function getpriceList()
  {
    return $this->db->get('pricelist');
  }
  public function getAllEvent()
  {
    $this->db->select('event.*, categories.categories,user.role_id');
    $this->db->from('event');
    $this->db->join('categories', 'event.category_id = categories.id');
    $this->db->join('user', 'event.author = user.id');
    $this->db->order_by('event.id', 'desc');
    return $this->db->get();
  }
  public function getcatEvent($category)
  {
    $this->db->select('event.*, categories.categories,user.*');
    $this->db->from('event');
    $this->db->join('categories', 'event.category_id = categories.id');
    $this->db->join('user', 'event.author = user.id');
    $this->db->order_by('event.id', 'desc');
    $this->db->where('categories.categories', $category);
    return $this->db->get();
  }
  public function getAllWrkEvent()
  {
    $query = "SELECT `event`.*, `categories`.`categories`, `user`.`name`, `user`. `role_id` FROM `event` JOIN `categories` ON `event`.`category_id` = `categories`.`id` JOIN user ON `event`.`author` = `user`.`id` WHERE `categories` = 'Workshop' ";
    return $this->db->query($query);
  }
  public function getcategory()
  {
    return $this->db->get('categories')->result_array();
  }
  public function getEventId($id)
  {
    $this->db->select('event.*, categories.categories,user.*');
    $this->db->from('event');
    $this->db->join('categories', 'event.category_id = categories.id');
    $this->db->join('user', 'event.author = user.id');
    $this->db->order_by('event.id', 'desc');
    $this->db->where('event.event_id', $id);
    return $this->db->get()->row_array();
  }
}
