<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tools extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		is_logged_in();
        $this->load->library('form_validation');
		$this->load->model('M_Menu','menu');
    }
	public function index()
	{
		$data['title'] = "Manu Management";
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		
			$this->load->view('Templates/header' ,$data);
			$this->load->view('Templates/topbar' ,$data);
			$this->load->view('Templates/sidebar',$data);
			$this->load->view('Tools/menu',$data);
			$this->load->view('Templates/footer');

	}
	public function addmenu(){
			
		$this->db->insert('user_menu',['menu'=>$this->input->post('menu')]);
		$this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">New Menu Added !!!</div>');
		redirect('Tools');
	}
	public function delete_menu($id)
    {
        $delete = $this->menu->Mdelete_menu($id);
        $this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">Delete Menu Success !!!</div>');
		redirect('Tools');
    }
	public function edit_menu()
    {
		$data = array (
            'menu'=>$this->input->post('menu')
        );
        $this->menu->Medit_menu($data);
        $this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">Edit Menu Success !!!</div>');
		redirect('Tools');
    }
	public function submenu(){
		$data['title'] = "Sub Menu Management";
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu']=$this->db->get('user_menu')->result_array();
		
			$this->load->view('Templates/header' ,$data);
			$this->load->view('Templates/topbar' ,$data);
			$this->load->view('Templates/sidebar',$data);
			$this->load->view('Tools/submenu',$data);
			$this->load->view('Templates/footer');
	}
	public function addsubmenu(){
			
		
		$data=[
			'menu_id'=>$this->input->post('menu_id'),
			'title'=>$this->input->post('title'),
			'url'=>$this->input->post('url'),
			'icon'=>$this->input->post('icon'),
			'is_active'=>$this->input->post('is_active')
			
		];
		$this->db->insert('user_sub_menu',$data);
		$this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">New SubMenu Added !!!</div>');
		redirect('Tools/submenu');
	}
	public function edit_Submenu($id)
    {
        $data['data_edit'] = $this->menu->getDataEditSubmenu($id)->row();
        $data['title'] = 'Tabel Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu']=$this->db->get('user_menu')->result_array();

        $this->load->view('Templates/header' ,$data);
			$this->load->view('Templates/topbar' ,$data);
			$this->load->view('Templates/sidebar',$data);
			$this->load->view('Tools/edit_submenu',$data);
			$this->load->view('Templates/footer');
	}
	public function ubah_Submenu()
    {
        $data = array (
            'menu_id'=>$this->input->post('menu_id'),
			'title'=>$this->input->post('title'),
			'url'=>$this->input->post('url'),
			'icon'=>$this->input->post('icon'),
			'is_active'=>$this->input->post('is_active')
        );

        $this->menu->ubah_submenu($data);
		$this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">SubMenu Successful Edit !!!</div>');
        redirect(base_url('Tools/submenu'));
    }
	public function delete_submenu($id)
    {
        $delete = $this->menu->Mdelete_submenu($id);
        $this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">Delete SubMenu Success !!!</div>');
		redirect('Tools/submenu');
    }
}
