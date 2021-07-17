<?php
defined('BASEPATH') or exit('No direct access allowed');

class M_Blog extends CI_Model
{
  public function getBlog()
  {
    if ($this->session->userdata('role_id') ==1) {
      $this->db->select('blog.*, tags.tags_name,user.name,user.role_id');
      $this->db->from('blog');
      $this->db->join('tags','blog.tag_id = tags.id','left');
      $this->db->join('user','blog.author = user.id','left');
      $this->db->order_by('blog.id','ASC');
      return $this->db->get();
  }else{
      $data= $this->session->userdata('name');
        $this->db->select('blog.*, tags.tags_name,user.name,user.role_id');
        $this->db->from('blog');
        $this->db->join('tags','blog.tag_id = tags.id','left');
        $this->db->join('user','blog.author = user.id','left');
        $this->db->order_by('blog.id','ASC');
      $this->db->where('user.name=',$data);
      return $this->db->get();
  }
  }
  public function getDataTag()
  {
    return $this->db->get('tags');
  }
  public function getDataBlogId($id)
  {
    $data = array(
      'blog.id' => $id,
    );
    $this->db->select('blog.*, tags.tags_name,user.name,user.role_id');
        $this->db->from('blog');
        $this->db->join('tags','blog.tag_id = tags.id','left');
        $this->db->join('user','blog.author = user.id','left');
        $this->db->order_by('blog.id','ASC');
      $this->db->where($data);
    return $this->db->get();
  }
  public function delete_blog($id)
  {
    $this->db->where(['id' => $id]);
    return $this->db->delete('blog');
  }
}
