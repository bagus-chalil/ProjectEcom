<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
		is_logged_in();
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_Event','event');
    }

	public function index()
	{
	$this->form_validation->set_rules('judul', 'Judul', 'required|trim');

		if($this->form_validation->run() == false) {
		$data['kategori'] = $this->event->getDataKategori()->result();
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();
		$data['title'] = "Halaman Tambah Event";

		$this->load->view('Templates/header',$data);
		$this->load->view('Templates/topbar',$data);
		$this->load->view('Templates/sidebar',$data);
		$this->load->view('Event/tambah',$data);
		$this->load->view('Templates/footer',$data);
	} else {
	  $config['upload_path']   = FCPATH. './assets/images/event/';
	  $config['allowed_types'] = 'jpg|png|gif';
	  $config['max_size']      = '5090';
	//   $config['max_width']     = '1024';
	//   $config['max_height']    = '768';
	  $config['file_name']     = url_title($this->input->post('gambar'));
	  // $filename = $this->upload->file_name;
	  $this->upload->initialize($config); 
  
	  $this->upload->do_upload('gambar');
	  $data = $this->upload->data();
  
	  $data = array(
		
		  					'event_id' =>$this->input->post('event_id'),
							'judul' =>$this->input->post('judul'),
							'category_id' =>$this->input->post('category_id'),
							'deskripsi' => $this->input->post('deskripsi') ,
							'author' => $this->input->post('author') ,
							'date_created' => time() ,
							'harga' => $this->input->post('harga') ,
							'kuota' => $this->input->post('kuota') ,
							'tgl_event' => $this->input->post('tgl_event') ,
							'gambar' => $data['file_name'] 
	  );
	  $this->db->insert('event', $data);
	  redirect('Event/view_tabel');
	}
	}
	public function view_tabel()
	{
		$data['title'] = "Halaman Tabel Produk";

		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();
		$data['title'] = "Halaman Tabel Event";
		$data['kategori'] = $this->event->getDataKategori()->result();
		$data['list_event']=$this->event->getDataEvent();

		$this->load->view('Templates/header',$data);
		$this->load->view('Templates/topbar',$data);
		$this->load->view('Templates/sidebar',$data);
		$this->load->view('Event/view_tabel',$data);
		$this->load->view('Templates/footer');
	}
	public function hapus_event($id)
    {
        $delete = $this->event->delete_event($id);
        redirect(base_url('Event/view_tabel'));
    }
	public function edit_event($id)
	{
		$data['data_edit'] = $this->event->getDataEditEvent($id)->row();
		$data['title'] = "Halaman Edit Event";
		$data['kategori'] = $this->event->getDataKategori()->result();
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();
		$data['title'] = "Halaman Tambah Event";

		$this->load->view('Templates/header',$data);
		$this->load->view('Templates/topbar',$data);
		$this->load->view('Templates/sidebar',$data);
		$this->load->view('Event/edit_data',$data);
		$this->load->view('Templates/footer',$data);
	}
	public function edit_produk()
    {
		$id= $this->input->post('id');

		$config['upload_path']   = FCPATH. './assets/images/event/';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['max_size']      = '5090';
	//   $config['max_width']     = '1024';
	//   $config['max_height']    = '768';
	  	$config['file_name']     = url_title($this->input->post('gambar'));
	  // $filename = $this->upload->file_name;
	 	 $this->upload->initialize($config); 
		if (! $this->upload->do_upload('gambar')){
			$data = array(
							'event_id' =>$this->input->post('event_id'),
							'judul' =>$this->input->post('judul'),
							'category_id' =>$this->input->post('category_id'),
							'deskripsi' => $this->input->post('deskripsi') ,
							'author' => $this->input->post('author') ,
							'date_created' => time() ,
							'harga' => $this->input->post('harga') ,
							'kuota' => $this->input->post('kuota') ,
							'tgl_event' => $this->input->post('tgl_event') ,
		);
		$this->db->where('id',$id);
		$this->db->update('event', $data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Event has been Update!
        </div>');
	  	redirect('event/view_tabel');
		}else{
			$old_image =$id['event']['gambar'];
                if($old_image != 'default.jpg'){
                    unlink(FCPATH .'./assets/images/event/' . $old_image);
                }
				$new_image = $this->upload->data('file_name');
			$data = array(
		
							'event_id' =>$this->input->post('event_id'),
							'judul' =>$this->input->post('judul'),
							'category_id' =>$this->input->post('category_id'),
							'deskripsi' => $this->input->post('deskripsi') ,
							'author' => $this->input->post('author') ,
							'date_created' => time() ,
							'harga' => $this->input->post('harga') ,
							'kuota' => $this->input->post('kuota') ,
							'tgl_event' => $this->input->post('tgl_event') ,
							'gambar' => $new_image 
		);
		$this->db->where('id',$id);
		$this->db->update('event', $data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Event has been Update!
        </div>');
	  	redirect('event/view_tabel');
		}  
    }
}

