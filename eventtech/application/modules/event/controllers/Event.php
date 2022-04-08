<?php

use phpDocumentor\Reflection\PseudoTypes\False_;

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
		error_reporting(0);
		$bulan=date('m');
		$tahun=date('Y');
		$thn=substr($tahun,2,2);
		$code= 'EVT';
		$penjualan = $this->event->getLastEvent($bulan,$tahun,$code)->row_array();
		$nomorterakhir=$penjualan['event_id'];
		$event_id=buatkode($nomorterakhir,$code.$bulan.$thn,4);
		$data['event_id'] = $event_id;	
	
		$data['kategori'] = $this->event->getDataKategori()->result();
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();
		$data['title'] = "Halaman Tambah Event";

		$this->load->view('Templates/header',$data);
		$this->load->view('Templates/topbar',$data);
		$this->load->view('Templates/sidebar',$data);
		$this->load->view('Event/tambah',$data);
		$this->load->view('Templates/footer',$data);

	if (isset($_POST['submit'])) {
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');

		$config['upload_path']   = FCPATH. './assets/images/event/';
	  	$config['allowed_types'] = 'jpg|png|gif';
	  	$config['max_size']      = 5090;
	  	$config['encrypt_name']  = False;
		$this->load->library('upload',$config);
		//Thumbnail
		if (!empty($_FILES['thumbs'])) {
			$config['file_name']     = url_title($this->input->post('thumbs'));
			// $filename = $this->upload->file_name;
			$this->upload->initialize($config); 
		
			$this->upload->do_upload('thumbs');
			$data1 = $this->upload->data();

			$config['image_library']='gd2';
			$config['source_image']=FCPATH. './assets/images/event/'.$data1['file_name'];
			$config['create_thumb']=FALSE;
			$config['width']=1024;
			$config['height']=768;
			$config['maintain_ratio']=FALSE;
			$config['new_image']=FCPATH. './assets/images/event/thumbs/'.$data1['file_name'];

			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			$thumbs=$data1['file_name'];
			
		}
		//Gambar Poster
		if (!empty($_FILES['gambar'])) {
			$config['file_name']     = url_title($this->input->post('gambar'));
			// $filename = $this->upload->file_name;
			$this->upload->initialize($config); 
		
			$this->upload->do_upload('gambar');
			$data2 = $this->upload->data();
			$gambar= $data2['file_name'];
		}
		if ($this->form_validation->run()) {
			$judul=$this->input->post('judul'.TRUE);
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
				'thumbs' => $thumbs, 
				'gambar' => $gambar 
			);
			$this->db->insert('event', $data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Event has been Added!
			</div>');
			redirect('Event/view_tabel');
		}else{
			$bulan=date('m');
			$tahun=date('Y');
			$thn=substr($tahun,2,2);
			$code= 'EVT';
			$penjualan = $this->event->getLastEvent($bulan,$tahun,$code)->row_array();
			$nomorterakhir=$penjualan['event_id'];
			$event_id=buatkode($nomorterakhir,$code.$bulan.$thn,4);
			$data['event_id'] = $event_id;	
		
			$data['kategori'] = $this->event->getDataKategori()->result();
			$data['user'] = $this->db->get_where('user',['email'=>
			$this->session->userdata('email')])->row_array();
			$data['title'] = "Halaman Tambah Event";

			$this->load->view('Templates/header',$data);
			$this->load->view('Templates/topbar',$data);
			$this->load->view('Templates/sidebar',$data);
			$this->load->view('Event/tambah',$data);
			$this->load->view('Templates/footer',$data);
		}
	}else{
	}
	}

	public function view_tabel()
	{
		$data['title'] = "Halaman Tabel Produk";

		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();
		$data['title'] = "Halaman Tabel Event";
		$data['kategori'] = $this->event->getDataKategori()->result();
		$data['list_event']=$this->event->getDataEvent()->result_array();
		$data['get_jmlevent']=$this->event->getJmlEvent();
		$data['get_jmleventbln']=$this->event->getJmlStatusEvent();
		$data['get_jmltutup']=$this->event->getJmlStatusTutup();
		$data['get_jmltersedia']=$this->event->getJmlStatusTersedia();

		$this->load->view('Templates/header',$data);
		$this->load->view('Templates/topbar',$data);
		$this->load->view('Templates/sidebar',$data);
		$this->load->view('Event/view_tabel',$data);
		$this->load->view('Templates/footer');
	}
	public function hapus_event($event_id)
    {
        $delete = $this->event->delete_event($event_id);
        redirect(base_url('Event/view_tabel'));
    }
	public function edit_event($id)
	{
		$data['title'] = 'Edit Event';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_edit'] = $this->event->getDataEditEvent($id)->row();
		$data['title'] = "Halaman Edit Event";
		$data['kategori'] = $this->event->getDataKategori()->result();
		
		$this->form_validation->set_rules('judul', 'FULL JUDUL', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Templates/header',$data);
			$this->load->view('Templates/topbar',$data);
			$this->load->view('Templates/sidebar',$data);
			$this->load->view('Event/edit_data',$data);
			$this->load->view('Templates/footer',$data);
		} else {
			redirect('edit_data');
		}
	}
	public function edit_event2()
	{
		$event_id = $this->input->post('event_id');
		
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
	
			$config['upload_path']   = FCPATH. './assets/images/event/';
			  $config['allowed_types'] = 'jpg|png|gif';
			  $config['max_size']      = 5090;
			  $config['encrypt_name']  = False;
			$this->load->library('upload',$config);
			//Thumbnail
			if (!empty($_FILES['thumbs'])) {
				$config['file_name']     = url_title($this->input->post('thumbs'));
				// $filename = $this->upload->file_name;
				$this->upload->initialize($config); 
			
				$this->upload->do_upload('thumbs');
				$data4 = $this->upload->data();
	
				$config['image_library']='gd2';
				$config['source_image']=FCPATH. './assets/images/event/'.$data4['file_name'];
				$config['create_thumb']=FALSE;
				$config['width']=1024;
				$config['height']=768;
				$config['maintain_ratio']=FALSE;
				$config['new_image']=FCPATH. './assets/images/event/thumbs/'.$data4['file_name'];
	
				$this->load->library('image_lib',$config);
				$this->image_lib->resize();
				$thumbs=$data4['file_name'];
			}
			//Gambar Poster
			if (!empty($_FILES['gambar'])) {
				$config['file_name']     = url_title($this->input->post('gambar'));
				// $filename = $this->upload->file_name;
				$this->upload->initialize($config);
				$this->upload->do_upload('gambar');
				$data3 = $this->upload->data();
				$gambar= $data3['file_name'];
				if ($this->form_validation->run()) {
					$judul=$this->input->post('judul'.TRUE);
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
						'thumbs' => $thumbs, 
						'gambar' => $gambar 
					);
					$this->db->where('event_id', $event_id);
					$this->db->update('event', $data);
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
					Event has been Update!
					</div>');
					redirect('Event/view_tabel');
				}else{
					redirect('Event/view_tabel');
				}
			}else if (empty($_FILES['gambar'])){
				$old_image = $this->input->post('gambar1');
				
				if ($old_image != 'default.png') {
					unlink(FCPATH. './assets/images/event/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				if ($this->form_validation->run()) {
					$judul=$this->input->post('judul'.TRUE);
					$data = array(
						'event_id' =>$this->input->post('event_id'),
						'judul' =>$this->input->post('judul'),
						'category_id' =>$this->input->post('category_id'),
						'deskripsi' => $this->input->post('deskripsi') ,
						'author' => $this->input->post('author') ,
						'date_created' => time() ,
						'harga' => $this->input->post('harga') ,
						'kuota' => $this->input->post('kuota') ,
						'tgl_event' => $this->input->post('tgl_event'),
						'gambar' => $new_image
					);
					$this->db->where('event_id', $event_id);
					$this->db->update('event', $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Event has been Update!
				</div>');
					redirect('event/view_tabel');
				}else{
					redirect('Event/view_tabel');
				}
				
			}
		}
	}
}

