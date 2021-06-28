<?php
defined('BASEPATH') or exit('No direct access allowed');

class M_Pricelist extends CI_Model
{
  public function getPriceId($id)
  {
    return $this->db->get_where('pricelist', ['id' => $id]);
  }
  public function delete_price($id)
  {
    return $this->db->delete('pricelist', ['id' => $id]);
  }
}
