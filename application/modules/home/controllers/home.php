<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->checking();
	}
	public function index()
	{
		$data['title'] = 'Welcome to A1 DRIVING SCHOOL';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/layout';
		$data['error'] = '';
		
		$this->load->view('template',$data);
	}
	public function courses(){$this->index();}
	public function branches(){$this->index();}
	public function contact(){$this->index();}
	public function reservation(){$this->index();}
	public function licensing(){$this->index();}
	public function register(){$this->index();}
	public function login(){$this->index();}
	private function checking()
	{
		if($this->session->userdata('logged_in') && $this->session->userdata('role') == '11') redirect('in');
		elseif($this->session->userdata('logged_in') && $this->session->userdata('role') == '22') redirect('admin');
		else return true;
	}
}