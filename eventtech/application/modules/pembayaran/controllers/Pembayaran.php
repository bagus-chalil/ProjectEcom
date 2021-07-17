<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('M_Pembayaran', 'pembayaran');
    }
	public function index()
	{
		$data['title'] = "Halaman Pembayaran";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['pembayaran']=$this->pembayaran->getPembayaran();
		$data['get_jmlbayar']=$this->pembayaran->getJmlPembayaran();
		$data['get_jmlfailed']=$this->pembayaran->getJmlStatusFailed();
		$data['get_jmlsuccess']=$this->pembayaran->getJmlStatusSuccess();
		$data['get_jmlpending']=$this->pembayaran->getJmlStatusPending();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('pembayaran/index',$data);
		$this->load->view('templates/footer',$data);
	}
    public function hapus_pembayaran($id)
	{
		$delete = $this->pembayaran->delete_Pembayaran($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success"
		role="alert">Delete Pembayaran Success !!!</div>');
		redirect('pembayaran');
	}
}
