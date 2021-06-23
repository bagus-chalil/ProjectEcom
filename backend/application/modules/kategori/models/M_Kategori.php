<?php 
defined('BASEPATH') OR exit('No direct access allowed');

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
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('categories',$data);
    }
}