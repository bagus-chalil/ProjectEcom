<?php

use Myth\Auth\Commands\Publish;

defined('BASEPATH') or exit('No direct script access allowed');

class Pricelist extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // $this->load->library('form_validation');
    // $this->load->library('session');
    $this->load->model('M_Pricelist', 'pricelist');
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['title'] = "Halaman Price List";
    $data['getprice'] = $this->db->get('pricelist')->result_array();
    $data['priceid'] = $this->db->get('pricelist')->row();

    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('Kategori/pricelist/index', $data);
    $this->load->view('Templates/footer', $data);
  }
  public function tambah_pricelist()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['title'] = "Halaman Tambah Price List";

    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
    if ($this->form_validation->run() == false) {

      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('Kategori/pricelist/tambah_pricelist', $data);
      $this->load->view('Templates/footer', $data);
    } else {
      $config['upload_path']   = FCPATH . './assets/images/pricelist/';
      $config['allowed_types'] = 'jpg|png|gif|jpeg';
      $config['max_size']      = '5090';
      //   $config['max_width']     = '1024';
      //   $config['max_height']    = '768';
      $config['file_name']     = url_title($this->input->post('gambar'));
      // $filename = $this->upload->file_name;
      $this->upload->initialize($config);

      $this->upload->do_upload('gambar');
      $data = $this->upload->data();


      $data = array(

        'nameplan' => $this->input->post('nameplan'),
        'colorplan' => $this->input->post('colorplan'),
        'harga' => $this->input->post('harga'),
        'offer' => $this->input->post('offer'),
        'not_offer' => $this->input->post('notoffer'),
        'gambar' => $data['file_name']
      );
      $this->db->insert('pricelist', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">
      price list has been Added!
      </div>');
      redirect('kategori/pricelist/index');
    }
  }
  public function edit_id($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['price_id'] = $this->pricelist->getPriceId($id)->row();
    $data['plan'] = ['Free Plan', 'Starter Plan', 'Business Plan', 'Ultimate Plan'];

    $data['title'] = "Halaman Tambah Price List";
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
    if ($this->form_validation->run() == false) {

      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('Kategori/pricelist/edit_pricelist', $data);
      $this->load->view('Templates/footer', $data);
    }
  }
  public function edit_pricelist()
  {
    $id = $this->input->post('id');
    $config['upload_path']   = FCPATH . './assets/images/pricelist/';
    $config['allowed_types'] = 'jpg|png|gif';
    $config['max_size']      = '5090';
    //   $config['max_width']     = '1024';
    //   $config['max_height']    = '768';
    $config['file_name']     = url_title($this->input->post('gambar'));
    // $filename = $this->upload->file_name;
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('gambar')) {
      $data = array(

        'nameplan' => $this->input->post('nameplan'),
        'colorplan' => $this->input->post('colorplan'),
        'harga' => $this->input->post('harga'),
        'offer' => $this->input->post('offer'),
        'not_offer' => $this->input->post('notoffer'),

      );
      $this->db->where('id', $id);
      $this->db->update('pricelist', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Pricelist has been Update!
        </div>');
      redirect('kategori/pricelist/index');
    } else {
      $old_image = $id['pricelist']['gambar'];
      if ($old_image != 'default.jpg') {
        unlink(FCPATH . './assets/images/pricelist/' . $old_image);
      }
      $new_image = $this->upload->data('file_name');
      $data = array(


        'nameplan' => $this->input->post('nameplan'),
        'colorplan' => $this->input->post('colorplan'),
        'harga' => $this->input->post('harga'),
        'offer' => $this->input->post('offer'),
        'not_offer' => $this->input->post('notoffer'),
        'gambar' => $new_image
      );
      $this->db->where('id', $id);
      $this->db->update('pricelist', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Pricelist has been Update!
        </div>');
      redirect('kategori/pricelist/index');
    }
  }
  public function hapus_pricelist($id)
  {
    $this->pricelist->delete_price($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    Pricelist has been Deleted!
    </div>');
    redirect('kategori/pricelist/index');
  }
}
