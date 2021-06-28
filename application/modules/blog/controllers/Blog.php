<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    // $this->load->library('form_validation');
    // $this->load->library('session');
    $this->load->model('M_Blog', 'blog');
  }

  public function index()
  {
    $data['title'] = "Halaman Blog";
    $data['tag'] = $this->blog->getDataTag()->result_array();
    $data['list_blog'] = $this->blog->getBlog();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('blog/blog', $data);
    $this->load->view('Templates/footer', $data);
  }
  public function tambah_blog()
  {
    $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
    if ($this->form_validation->run() == false) {
      $data['tag'] = $this->blog->getDataTag()->result_array();
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['title'] = "Halaman Tambah Blog";

      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('blog/tambah_blog', $data);
      $this->load->view('Templates/footer', $data);
    } else {
      $config['upload_path']   = FCPATH . './assets/images/blog/';
      $config['allowed_types'] = 'jpg|png|gif|jpeg';
      $config['max_size']      = '5090';
      //   $config['max_width']     = '1024';
      //   $config['max_height']    = '768';
      $config['file_name']     = url_title($this->input->post('gambar'));
      // $filename = $this->upload->file_name;
      $this->upload->initialize($config);

      $this->upload->do_upload('gambar');
      $data = $this->upload->data();


      $slug = url_title($this->input->post('judul'), 'dash', TRUE);
      $data = array(

        // 'id' => $this->input->post->id = uniqid(),
        'slug' => $slug,
        'tag_id' => $this->input->post('tag_id'),
        'judul' => $this->input->post('judul'),
        'deskripsi' => $this->input->post('deskripsi'),
        'author' => $this->input->post('author'),
        'date_created' => time(),
        'tgl_blog' => $this->input->post('tgl_blog'),
        'gambar' => $data['file_name']
      );
      $this->db->insert('blog', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">
      blog has been Added!
      </div>');
      redirect('blog/index');
    }
  }
  public function blogid($id)
  {
    $data['edit_id'] = $this->blog->getDataBlogId($id)->row();
    $data['title'] = 'Halaman Edit Blog';
    $data['tag'] = $this->blog->getDataTag()->result();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('blog/edit_blog', $data);
    $this->load->view('Templates/footer', $data);
  }
  public function hapus_blog($id)
  {
    $this->blog->delete_blog($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    blog has been Deleted!
    </div>');
    redirect('blog/index');
  }
  public function edit_blog()
  {
    $id = $this->input->post('id');
    $slug = url_title($this->input->post('judul'), 'dash', TRUE);
    $config['upload_path']   = FCPATH . './assets/images/blog/';
    $config['allowed_types'] = 'jpg|png|gif';
    $config['max_size']      = '5090';
    //   $config['max_width']     = '1024';
    //   $config['max_height']    = '768';
    $config['file_name']     = url_title($this->input->post('gambar'));
    // $filename = $this->upload->file_name;
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('gambar')) {
      $data = array(
        'slug' => $slug,
        'tag_id' => $this->input->post('tag_id'),
        'judul' => $this->input->post('judul'),
        'deskripsi' => $this->input->post('deskripsi'),
        'author' => $this->input->post('author'),
        'date_created' => time(),
        'tgl_blog' => $this->input->post('tgl_blog'),
      );
      $this->db->where('id', $id);
      $this->db->update('blog', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        blog has been Update!
        </div>');
      redirect('blog/index');
    } else {
      $old_image = $id['blog']['gambar'];
      if ($old_image != 'default.jpg') {
        unlink(FCPATH . './assets/images/blog/' . $old_image);
      }
      $new_image = $this->upload->data('file_name');
      $data = array(

        'slug' => $slug,
        'tag_id' => $this->input->post('tag_id'),
        'judul' => $this->input->post('judul'),
        'deskripsi' => $this->input->post('deskripsi'),
        'author' => $this->input->post('author'),
        'date_created' => time(),
        'tgl_blog' => $this->input->post('tgl_blog'),
        'gambar' => $new_image
      );
      $this->db->where('id', $id);
      $this->db->update('blog', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        blog has been Update!
        </div>');
      redirect('blog/index');
    }
  }
}
