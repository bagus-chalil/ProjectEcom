<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        // $this->load->library('session');
        $this->load->model('M_Kategori', 'kategori');
    }

    public function index()
    {
        $data['kategori'] = $this->kategori->getDataKategori()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Halaman Kategori Event";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kategori', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_kategori()
    {

        $this->db->insert('categories', ['categories' => $this->input->post('categories')]);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
		role="alert">New Kategori Added !!!</div>');
        redirect('kategori');
    }
    public function hapus_kategori($id)
    {
        $delete = $this->kategori->delete_kategori($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
		role="alert">Delete Kategori Event Success !!!</div>');
        redirect('kategori');
    }
    public function edit_kategori()
    {
        $data = array(
            'categories' => $this->input->post('categories')
        );
        $this->kategori->Medit_kategori($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
		role="alert">Edit Kategori Event Success !!!</div>');
        redirect('kategori');
    }
    public function view_tags()
    {
        $data['tag'] = $this->kategori->getDataTag()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = "Halaman Kategori Tag";


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tags', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_tag()
    {

        $this->db->insert('tags', ['tags_name' => $this->input->post('tags_name')]);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
		role="alert">New Tags Added !!!</div>');
        redirect('kategori/view_tags');
    }
    public function hapus_tag($id)
    {
        $delete = $this->kategori->delete_tag($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
		role="alert">Delete tags Event Success !!!</div>');
        redirect('kategori/view_tags');
    }
    public function edit_tag()
    {
        $data = array(
            'tags_name' => $this->input->post('tags_name')
        );
        $this->kategori->ubah_tag($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
		role="alert">Edit Tags Success !!!</div>');
        redirect('kategori/view_tags');
    }
}
