<?php 
defined('BASEPATH') OR exit('No direct access allowed');

class M_Event extends CI_Model 
{
    public function getDataEvent()
    {
        $query = "SELECT `event`.*, `categories`.`categories`
                    FROM `event` JOIN `categories`
                    ON `event`.`category_id` = `categories`.`id`
        ";
        return $this->db->query($query)->result_array();
    }
    public function getDataKategori()
    {
        return $this->db->get('categories');
    }
    public function delete_event($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('event');
    }   
    public function getDataEditEvent($id)
    {
        $data = array(
            'event.id' => $id, 
        );
        $this->db->select('event.*, categories.categories');
        $this->db->from('event');
        $this->db->where($data);
		$this->db->join('categories','event.category_id = categories.id');
        return $this->db->get();
    }
}