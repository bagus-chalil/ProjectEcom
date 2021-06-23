<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		is_logged_in();
		$this->load->model('M_Admin','admin');
    }
	public function index()
	{
		$data['title'] = "Halaman Admin";
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();

		// modules::run('templates/Templates');
		// $this->load->view('header', $data);
		$this->load->view('Templates/header' ,$data);
		$this->load->view('Templates/topbar' ,$data);
		$this->load->view('Templates/sidebar');
		$this->load->view('Admin/coba1');
		$this->load->view('Templates/footer');
	}
	public function role()
	{
		$data['title'] = "Role User";
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		// modules::run('templates/Templates');
		// $this->load->view('header', $data);
		$this->load->view('Templates/header' ,$data);
		$this->load->view('Templates/topbar' ,$data);
		$this->load->view('Templates/sidebar');
		$this->load->view('Admin/role');
		$this->load->view('Templates/footer');
	}
	public function addrole(){
			
		$this->db->insert('user_role',['role'=>$this->input->post('role')]);
		$this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">New Role Added !!!</div>');
		redirect('Admin/role');
	}
	public function delete_role($id)
    {
        $delete = $this->admin->Mdelete_role($id);
        $this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">Delete Role Success !!!</div>');
		redirect('Admin/role');
    }
	public function roleAccess($role_id)
	{
		$data['title'] = "Role User";
		$data['user'] = $this->db->get_where('user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role',['id'=>$role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu']= $this->db->get('user_menu')->result_array();

		$this->load->view('Templates/header' ,$data);
		$this->load->view('Templates/topbar' ,$data);
		$this->load->view('Templates/sidebar');
		$this->load->view('Admin/role_access');
		$this->load->view('Templates/footer');
	}
	public function changeAccess(){
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data=[
			'role_id'=>$role_id,
			'menu_id'=>$menu_id
		];
		$result = $this->db->get_where('user_access_menu',$data);
		if ($result->num_rows()<1) {
			$this->db->insert('user_access_menu',$data);
		}else{
			$this->db->delete('user_access_menu',$data);
		}
		$this->session->set_flashdata('message','<div class="alert alert-success"
		role="alert">Access Role Change !!!</div>');
	}
}
