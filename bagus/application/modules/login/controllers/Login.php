<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('coba');
	}
	/*public function coba(){
		modules::run('coba/Coba');
        $this->load->view('coba1');
	}*/
}