<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
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

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'Email has already use !'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]',[
			'min_length' => 'Password min 8 Character !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password]',[
			'matches' => 'Password dont match !',
			'min_length' => 'Password min 8 Character !'
		]);

		if ($this->form_validation->run() == FALSE){

		$data['title'] ="Register Member";
		$this->load->view('Templates/layout/headerL',$data);
		$this->load->view('Register/register',$data);
		$this->load->view('Templates/layout/footerL');
		}else{
			$email = $this->input->post('email', true);
			echo 'Data Berhasil Disimpan';
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			//token aktivasi
			$token = bin2hex(openssl_random_pseudo_bytes(32));
			$user_token = [
			  'email' => $email,
			  'token' => $token,
			  'date_created' => time(),
			];

			$this->db->insert('user', $data);
        	$this->db->insert('user_token', $user_token);

			$this->sendEmail($token,'verify');

			$this->session->set_flashdata('message','<div class="alert alert-success text-center" role="alert">
			Your Account has been Created. Please log in !
			</div>');
			redirect('Login');
		}
	} 
	private function sendEmail($token,$type)
	{
		$config =[
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'eventtech21@gmail.com',
			'smtp_pass' => 'event_tech2021',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		  ];

		  $this->load->library('email',$config);

		  	$this->email->from('eventtech21@gmail.com','Admin Event Tech');
      		$this->email->to($this->input->post('email'));

			if($type == 'verify'){
			$this->email->subject('Verification Account Event Tech');
			$this->email->message('
			Click this link to verify your account 
			<a href="'.base_url().'Register/verify?email=' . $this->input->post('email')
			. '&token='.urlencode($token). '">Activated</a>');
			
			}else if($type == 'forgot'){
				$this->email->subject('Reset Password');
				$this->email->message('Click this link to reset your password : 
				<a href="'.base_url().'Register/resetPassword?email='. $this->input->post('email').
				'&token='.urlencode($token). '">Reset Password</a>');
			}

		  	if ($this->email->send()) {
				  return true;
			  }else{
				  echo $this->email->print_debugger();
				  die;
			  }
	}
	public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');        
      
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
          $user_token =$this->db->get_where('user_token',['token' =>$token])->row_array();
           
          if ($user_token) {
            
            if(time() - $user_token['date_created'] < (60*60*24)){
              $this->db->set('is_active',1);
              $this->db->where('email',$email);
              $this->db->update('user');

              $this->db->delete('user_token',['email' =>$email]);

              $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">
              '.$email.' has been activated! Please Login
              </div>');
              redirect('Login');
            }else{

              $this->db->delete('user',['email' => $email]);
              $this->db->delete('user_token',['email' => $email]);


              $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">
              Account Activation Failed ! Token Expired
              </div>');
              redirect('Login');
            }
          } else {
            $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">
            Wrong token !
            </div>');
            redirect('Login');
          }
          }else {
          $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">
          Account Activation failed wrong email !
          </div>');
          redirect('Login');
        } 
      }
	public function forgotPassword()
    {
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
        if($this->form_validation->run() === false){

        $data['title'] = 'Forgot Password';
        $this->load->view('Templates/layout/headerL',$data);
		$this->load->view('Register/forgotpassword',$data);
		$this->load->view('Templates/layout/footerL');
		}else{
			$email = $this->input->post('email',true);
			$user = $this->db->get_where('user',['email' => $email,'is_active' => 1])->row_array();
		
			if($user) {
			$token = bin2hex(openssl_random_pseudo_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];
			
			$this->db->insert('user_token', $user_token);
	
			$this->sendEmail($token, 'forgot');
	
			$this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">
				Please check your email to reset your password
				</div>');
				redirect('Login');
	
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				Email is not registered or Activated !
				</div>');
				redirect('Register/forgotPassword');
			}
		}
    }
	public function resetPassword()
  	{
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user',['email' => $email])->row_array();
  
    if($user) {
      $user_token = $this->db->get_where('user_token',['token' => $token])->row_array();
      
      if($user_token){
		$this->session->set_userdata('reset_email', $email);
        $this->changePassword();
      }else{
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        Reset Password failed ! Wrong token.
        </div>');
        redirect('Register/forgotPassword');
      }
    
    }else{
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
          Reset Password failed ! Wrong email.
          </div>');
          redirect('Register/forgotPassword');
    	}
  	}

	public function changePassword()
  	{
		if(!$this->session->userdata('reset_email')){
			redirect('Login');
		  }
		  $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]',
			array(
			  'matches' => 'Password dont match!',
			  'min_length' => 'Password min 8 Character'
			));
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]',
			array(
			  'min_length' => 'Password min 8 Character'
			));
			  if($this->form_validation->run() == false){
				$data['title'] = 'Forgot Password';
				$this->load->view('Templates/layout/headerL',$data);
				$this->load->view('Register/changepassword',$data);
				$this->load->view('Templates/layout/footerL');
			}else{
				$password = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
				$email = $this->session->userdata('reset_email');
	  
				$this->db->set('password',$password);
				$this->db->where('email',$email);
				$this->db->update('user');
	  
			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			password has been change !
			</div>');
			redirect('Login');
		}
  	}
}

