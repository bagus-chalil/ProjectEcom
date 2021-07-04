<?php
defined('BASEPATH') or exit('No direct access allowed');

class M_Event extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
    public function getDataEvent()
    {
        if ($this->session->userdata('role_id') ==1) {
            $this->db->select('event.*, categories.categories,user.name,user.role_id');
            $this->db->from('event');
            $this->db->join('categories','event.category_id = categories.id','left');
            $this->db->join('user','event.author = user.id','left');
            $this->db->order_by('event.id','ASC');
            return $this->db->get();
        }else{
            $data= $this->session->userdata('name');
            $this->db->select('event.*, categories.categories,user.name,user.role_id');
            $this->db->from('event');
            $this->db->join('categories','event.category_id = categories.id','left');
            $this->db->join('user','event.author = user.id','left');
            $this->db->order_by('event.id','ASC');
            $this->db->where('user.name=',$data);
            return $this->db->get();
        }
    }
    public function getDataKategori()
    {
        return $this->db->get('categories');
    }
    public function getLastEvent($bulan,$tahun,$code)
    {
            $this->db->select('event.event_id');
            $this->db->from('event');
            $this->db->join('user','event.author = user.id','left');
            $this->db->join('eventcode','user.is_active = eventcode.id','left');
            $this->db->order_by('event.event_id','DESC');
            $this->db->where('eventcode.event_code=',$code);
            $this->db->where('MONTH(tgl_event)',$bulan);
            $this->db->where('YEAR(tgl_event)',$tahun);
            $this->db->limit(1);
        return $this->db->get();
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
