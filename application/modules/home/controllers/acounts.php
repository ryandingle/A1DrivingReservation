<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acounts extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->check_login();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    	$this->output->set_header('Pragma: no-cache');
	}
	public function index()
	{
		redirect('in');
	}
	public function login()
	{
		$this->form_validation->set_rules('email','Email Address','required|trim|xss_clean|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean');
		if($this->form_validation->run() == FALSE){
			$data['error'] = '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<small>'.validation_errors().'</small></div>';
		}else{
			$this->db->where('email',$this->input->post('email'));
			$this->db->where('password',sha1($this->input->post('password')));
			$get = $this->db->get('new_users');
			if($get->num_rows() == 1){
				$row = $get->row();
				$data = array(
					'logged_in'=>true,
					'id'=>$row->id,
					'email'=>$row->email,
					'mobile'=>$row->mobile,
					'phone'=>$row->phone,
					'fname'=>$row->fname,
					'lname'=>$row->lname,
					'verification'=>$row->verification,
					'status'=>$row->status,
					'role'=>$row->role,
					'age'=>$row->age,
					'gender'=>$row->gender,
					'welcome'=>$row->welcome,
					'completed'=>$row->completed,
					'address'=>$row->address,
					'started'=>$row->started,
				);
				if($this->input->post('r-me')){
					$this->session->sess_expiration = 0;
					$this->session->sess_expire_on_close = FALSE;
				}
				$this->session->set_userdata($data);
				if($row->role == '22') 
				redirect('admin');
				else
				redirect('in');
			}else{
				$data['error'] = '<div class="alert alert-danger alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><small>Invalid Email Address or Password.</small></div>';
			}
		}
		$data['title'] = 'Login | A1 Driving School';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/layout';
		
		$this->load->view('template',$data);
	}
	public function register()
	{
		$this->form_validation->set_rules('email','Email Address','required|trim|xss_clean|valid_email_callback_username_check');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean|min_length[6]');
		$this->form_validation->set_rules('password2','Repeat Password','required|trim|xss_clean|matches[password]');
		if($this->form_validation->run() == FALSE){
			$data['error'] = '<div class="alert alert-danger"><small>'.validation_errors().'</small></div>';
		}
		else{
			$this->db->where('email',$this->input->post('email'));
			$get = $this->db->get('new_users');
			if($get->num_rows() == 1){
				$data['error'] = '<div class="alert alert-danger alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<small><font color="#FFFFFF">'.$this->input->post('email').'</font> email already exists. Please put deffirent email.</small></div>';
			}
			else{
				$data = array(
					'email'=>$this->input->post('email'),
					'password'=>sha1($this->input->post('password')),
					'status'=>'unverified',
					'role'=>'11',
					'welcome'=>'yes',
					'completed'=>'yes',
					'verification'=>sha1($this->input->post('email')+microtime()),
				);
				$this->db->set($data);
				$a = $this->db->insert('new_users');
				if(!$a){ echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> System error!contact system developer.
</div>';
				}else{
					$this->db->where('email',$this->input->post('email'));
					$new_get = $this->db->get('new_users');
					$row = $new_get->row();
					$data = array(
						'logged_in'=>true,
						'id'=>$row->id,
						'email'=>$row->email,
						'mobile'=>$row->mobile,
						'phone'=>$row->phone,
						'fname'=>$row->fname,
						'lname'=>$row->lname,
						'verification'=>$row->verification,
						'status'=>$row->status,
						'role'=>$row->role,
						'age'=>$row->age,
						'gender'=>$row->gender,
						'welcome'=>$row->welcome,
						'completed'=>$row->completed,
						'address'=>$row->address,
						'started'=>$row->started,
					);
					$this->session->set_userdata($data);
					
					$this->email->set_newline("\r\n");
					$this->email->from('a1-driving.com'); // change it to yours
				  	$this->email->to($this->input->post('email')); // change it to yours
				  	$this->email->subject('Verify your A1 Driving Reservation Acount');
				  	$data = array('message'=>"Welcome to A1-Driving.com");
				  	$email = $this->load->view('mails/user-verify', $data, TRUE);
				  	$this->email->message($email);
					$this->email->send();
					
					redirect('in');
				}
			}
		}
		$data['title'] = 'Registration | A1 Driving School';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/layout';
		
		$this->load->view('template',$data);
	}
	public function logout(){
		if($_GET['key'] == sha1('true')){
			$data = array(
					'logged_in'=>true,
					'id'=>'',
					'email'=>'',
					'mobile'=>'',
					'phone'=>'',
					'fname'=>'',
					'lname'=>'',
					'verification'=>'',
					'status'=>'',
					'role'=>'',
					'age'=>'',
					'gender'=>'',
					'welcome'=>'',
					'address'=>'',
					'started'=>'',
				);
			$this->session->sess_destroy();
			$this->session->unset_userdata($data);
			//delete_cookie('ci_session');
			redirect('home/login');
		}
		else redirect('in');
	}
	private function check_login(){
		if($this->uri->segment(3) == 'logout?key='.sha1('true').''){
			return true;
		}
		else{
			if($this->session->userdata('logged_in') && $this->session->userdata('role') == '11') return false;
			elseif($this->session->userdata('logged_in') && $this->session->userdata('role') == '22') return false;
			else return true;
		}
	}
}