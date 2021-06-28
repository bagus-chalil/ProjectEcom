<?php
defined('BASEPATH') or exit('No direct access allowed');

class M_Blog extends CI_Model
{
  public function getBlog()
  {
    $query = "SELECT `blog`.*, `tags`.`tags_name`
    FROM `blog` JOIN `tags`
    ON `blog`.`tag_id` = `tags`.`id` ORDER BY id DESC
";
    return $this->db->query($query)->result_array();
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
    $this->db->select('blog.*, tags.tags_name');
    $this->db->from('blog');
    $this->db->where($data);
    $this->db->join('tags', 'blog.tag_id = tags.id');
    return $this->db->get();
  }
  public function delete_blog($id)
  {
    $this->db->where(['id' => $id]);
    return $this->db->delete('blog');
  }
}
