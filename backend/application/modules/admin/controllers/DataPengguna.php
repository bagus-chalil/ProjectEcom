<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPengguna extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('M_Pengguna', 'pengguna');
  }
  public function index()
  {
    $data['title'] = "Halaman Data Pengguna";
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['getuser'] = $this->db->get('user')->result_array();

    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('Templates/sidebar');
    $this->load->view('Admin/pengguna/index');
    $this->load->view('Templates/footer');
  }
  public function edit_pengguna($id)
  {
    $data['title'] = "Halaman Edit Data Pengguna";
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['getuser'] = $this->pengguna->allPengguna()->result();
    $data['edit_id'] =    $this->pengguna->getPenggunaId($id)->row();

    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('Templates/sidebar');
    $this->load->view('Admin/pengguna/edit_pengguna');
    $this->load->view('Templates/footer');
  }
  public function update_pengguna()
  {
    $this->form_validation->set_rules('new_password1', 'New Password', 'trim|min_length[8]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|min_length[8]|matches[new_password1]');
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $new_password = $this->input->post('new_password1');
    $oldpwd = $this->input->post('oldpwd');
    if ($new_password == '') {
      $passUpdate = $oldpwd;
    } else {
      $passUpdate = password_hash($new_password, PASSWORD_DEFAULT);
    }

    if ($this->form_validation->run() == TRUE) {
      $id = $this->input->post('id');

      $config['upload_path']   = FCPATH . './assets/images/users/';
      $config['allowed_types'] = 'jpg|png|gif';
      $config['max_size']      = '5090';
      //   $config['max_width']     = '1024';
      //   $config['max_height']    = '768';
      $config['file_name']     = url_title($this->input->post('image'));
      // $filename = $this->upload->file_name;
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('image')) {
        $data = array(
          'name' => $this->input->post('name'),
          'role_id' => $this->input->post('role_id'),

        );
        $this->db->set('password',  $passUpdate);
        $this->db->where('email', $this->input->post('email'));
        $this->db->update('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        User has been Update!
        </div>');
        redirect('admin/datapengguna/index');
      } else {
        $old_image = $id['user']['image'];
        if ($old_image != 'default.jpg') {
          unlink(FCPATH . './assets/images/users/' . $old_image);
        }
        $new_image = $this->upload->data('file_name');
        $data = array(

          'name' => $this->input->post('name'),
          'role_id' => $this->input->post('role_id'),
          'image' => $new_image
        );
        $this->db->set('password',  $passUpdate);
        $this->db->where('email', $this->input->post('email'));
        $this->db->update('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        User has been Update!
        </div>');
        redirect('admin/datapengguna/index');
      }
    }
  }
  public function hapus_pengguna($id)
  {
    $this->pengguna->delete_user($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        User has been Deleted!
        </div>');
    redirect('admin/datapengguna/index');
  }
}
