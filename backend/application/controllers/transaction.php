<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: PUT, GET, POST");
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-o9_hVAqr-DA3DdRPL2lTip5f', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		$this->load->model('Snap_Model','snap');
		
    }

    public function index()
    {
		$data['title'] = "Halaman Cek Transaksi";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('Templates/header', $data);
		$this->load->view('Templates/topbar', $data);
		$this->load->view('Templates/sidebar',$data);
    	$this->load->view('midtrans/transaction',$data);
		$this->load->view('Templates/footer',$data);
    }
	public function verifikasi($id)
	{
		$data['title'] = "Halaman Cek Transaksi";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['detail'] = $this->snap->getOrderId($id);
		
		$this->load->view('Templates/header', $data);
		$this->load->view('Templates/topbar', $data);
		$this->load->view('Templates/sidebar',$data);
    	$this->load->view('pembayaran/status_transaksi',$data);
		$this->load->view('Templates/footer',$data);
	}

    public function process()
    {
    	$order_id = $this->input->post('order_id');
    	$action = $this->input->post('action');
    	switch ($action) {
		    case 'status':
		        $this->status($order_id);
		        break;
		    case 'approve':
		        $this->approve($order_id);
		        break;
		    case 'expire':
		        $this->expire($order_id);
		        break;
		   	case 'cancel':
		        $this->cancel($order_id);
		        break;
		}

    }

	public function status($order_id)
	{
		echo 'Test Get Status </br>';
		echo '<pre>';
		print_r ($this->veritrans->status($order_id));
		echo '</pre>';

		$response = $this->veritrans->status(($order_id));
		$transaction_status = $response->transaction_status;

		$update = $this->db->query(
					"update pembayaran_midtrans set transaction_status='$transaction_status'
					where order_id='$order_id'");
		if ($update) {
			echo 'Status Transaksi berhasil di update';
		}else {
			echo ' Status Transaksi gagal di update';
		}
	}

	public function cancel($order_id)
	{
		echo 'test cancel trx </br>';
		echo $this->veritrans->cancel($order_id);
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		print_r ($this->veritrans->approve($order_id) );
	}

	public function expire($order_id)
	{
		echo 'test get expire </br>';
		print_r ($this->veritrans->expire($order_id) );
	}
}
