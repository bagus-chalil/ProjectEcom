<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		if ($this->session->userdata('email')){
			redirect('profil');
		}
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		
		if ($this->form_validation->run() == FALSE){
		$data['title'] ="Login Member";
		$this->load->view('Templates/layout/headerL',$data);
		$this->load->view('Login/login');
		$this->load->view('Templates/layout/footerL');
		}else{
			$this->_login();
		}
	}
	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['email' => $email])->row_array();
		
		if($user){
			if($user['is_active'] == 1){
				//cek password
				if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'name' => $user['name']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] ==1){
						redirect('Admin');
					}else{
						redirect('Profil');
					}
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">
				Your Password is Incorrect !
				</div>');	
				redirect('Login');
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">
				Your Email dont Activated !
				</div>');	
				redirect('Login');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">
			Your Account dont register !
			</div>');
			redirect('Login');
		}
	} 
	 public function logout(){
		 $this->session->unset_userdata('email');
		 $this->session->unset_userdata('role_id');

		 $this->session->set_flashdata('message','<div class="alert alert-primary text-center" role="alert">
			Thank you, You Have been Logout !
			</div>');
			redirect('Login');
	 }
	 public function blocked(){
		$this->load->view('Login/blocked');
	 }
}

