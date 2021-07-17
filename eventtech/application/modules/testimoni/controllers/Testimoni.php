<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('M_Testi', 'testi');
  }
  public function index()
  {
    $data['title'] = "Lihat Testimoni";
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['alltesti'] = $this->testi->getTestimoni()->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('index', $data);
    $this->load->view('templates/footer');
  }
  public function tambah()
  {
    $this->form_validation->set_rules('penyelenggara', 'penyelenggara', 'required|trim');
    if ($this->form_validation->run() == false) {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = "Halaman Tambah Blog";

      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('testimoni/tambah', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $config['upload_path']   = FCPATH . './assets/images/testimoni/';
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
        'penyelenggara' => $this->input->post('penyelenggara'),
        'desk' => $this->input->post('desk'),
        'gambar' => $data['file_name']
      );
      $this->db->insert('testimonials', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">
      Testimoni has been Added!
      </div>');
      redirect('testimoni/index');
    }
  }
}
