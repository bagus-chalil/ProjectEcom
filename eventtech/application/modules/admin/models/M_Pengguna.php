<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengguna extends CI_Model
{
  public function getPenggunaId($id)
  {
    return $this->db->get_where('user', ['id' => $id]);
  }
  public function allPengguna()
  {
    $query = "SELECT DISTINCT role_id FROM user";
    return $this->db->query($query);
  }
  public function delete_user($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('user');
  }
}
