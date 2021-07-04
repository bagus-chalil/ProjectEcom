<?php
defined('BASEPATH') or exit('No direct access allowed');

class M_Kategori extends CI_Model
{
    public function getDataKategori()
    {
        return $this->db->get('categories');
    }
    public function delete_kategori($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('categories');
    }
    public function Medit_kategori($data)
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('categories', $data);
    }
    public function getDataTag()
    {
        return $this->db->get('tags');
    }
    public function delete_tag($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tags');
    }
    public function ubah_tag($data)
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('tags', $data);
    }
}
