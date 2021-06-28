<?php
defined('BASEPATH') or exit('No direct access allowed');

class M_Event extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		// $this->load->library('form_validation');
		// $this->load->library('session');
		// $this->load->model('M_Event', 'event');
	}
    public function getDataEvent()
    {
        if ($this->session->userdata('role_id') ==1) {
            $this->db->select('event.*, categories.categories,user.*');
            $this->db->from('event');
            $this->db->join('categories','event.category_id = categories.id');
            $this->db->join('user','event.author = user.id');
            return $this->db->get();
        }else{
            $data= $this->session->userdata('name');
            $this->db->select('event.*, categories.categories,user.*');
            $this->db->from('event');
            $this->db->join('categories','event.category_id = categories.id');
            $this->db->join('user','event.author = user.id');
            $this->db->where('user.name=',$data);
            return $this->db->get();
        }
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
        $this->db->select('event.*, categories.categories,user.*');
        $this->db->from('event');
        $this->db->join('categories','event.category_id = categories.id');
        $this->db->join('user','event.author = user.id');
        $this->db->where($data);
        return $this->db->get();
    }
}
