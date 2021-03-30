<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

	public function index()
	{
		$data['title']="Login";
		modules::run('login/Login');
        $this->load->view('coba',$data);
	}
}