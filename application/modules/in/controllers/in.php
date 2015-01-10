<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class In extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->check_login();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    	$this->output->set_header('Pragma: no-cache');
	}
	public function index()
	{
		$data['title'] = 'Welcome to A1 DRIVING SCHOOL';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['error'] = '';
		$this->db->where('r_user_id',$this->session->userdata('id'));
		$p = $this->db->get('reservations');
		$row = $p->row();
		if($p->num_rows() == 1)
		{
			if($row->status == 'approve')
			{
				$data['content'] = 'pages/inside/done';
			}
			else
			{
				$data['content'] = 'pages/inside/approval';
			}
		}
		else
		{
			if($this->session->userdata('role') == '11' && $this->session->userdata('status') == 'verified' && $this->session->userdata('welcome') == 'done' && $this->session->userdata('completed') == 'done')
			{
				$data['content'] = 'pages/inside/reservation';
			}
			elseif($this->session->userdata('role') == '11' && $this->session->userdata('welcome') == 'yes')
			{
				$data['content'] = 'pages/inside/welcome';
			}
			elseif($this->session->userdata('role') == '11' && $this->session->userdata('completed') == 'yes')
			{
				$data['content'] = 'pages/inside/info';
			}
			elseif($this->session->userdata('role') == '11' && $this->session->userdata('status') == 'unverified')
			{
				$data['content'] = 'pages/inside/notice';
			}
		}
		$this->load->view('template',$data);
	}
	public function s_edit()
	{
		$data['title'] = 'Edit | A1 DRIVING SCHOOL';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/inside/edit_summury';
		$data['error'] = '';
		
		$this->load->view('template',$data);
	}
	public function edit_sum_action()
	{
		$this->form_validation->set_rules('course_type','Course Type','|required|trim|xss_clean');
		$this->form_validation->set_rules('course','Course','|required|trim|xss_clean');
		$this->form_validation->set_rules('course_fee','Course Fee','|required|trim|xss_clean');
		$this->form_validation->set_rules('branch','Branch','|required|trim|xss_clean');
		$this->form_validation->set_rules('date','Date','|required|trim|xss_clean');
		if($this->form_validation->run() == false){
			$data['title'] = 'Reservation | A1 Driving School';
			$data['header'] = 'includes/header';
			$data['footer'] = 'includes/footer';
			$data['content'] = 'pages/inside/edit_summury';
			$data['error'] = '<div class="alert alert-danger"><small>'.validation_errors().'</small></div>';
			
			$this->load->view('template',$data);
		}
		else{
			$this->db->where('c_id',$this->input->post('course_type'));
			$a = $this->db->get('courses');
			$r1 = $a->row();
			$this->db->where('id',$this->input->post('course'));
			$b = $this->db->get('course_type');
			$r2 = $b->row();
			$this->db->where('id',$this->input->post('course_fee'));
			$c = $this->db->get('course_fee');
			$r3 = $c->row();
			$update = array(
				'r_user_id'=>$this->session->userdata('id'),
				'r_email'=>$this->session->userdata('email'),
				'r_mobile'=>$this->session->userdata('mobile'),
				'r_phone'=>$this->session->userdata('phone'),
				'r_fname'=>$this->session->userdata('fname'),
				'r_lname'=>$this->session->userdata('lname'),
				'r_age'=>$this->session->userdata('age'),
				'r_gender'=>$this->session->userdata('gender'),
				'r_address'=>$this->session->userdata('address'),
				'r_course_type'=>$r1->courses,
				'r_course'=>$r2->course_type_title,
				'course_fee'=>$r3->course_hours.''.$r3->course_fee,
				'r_branch'=>$this->input->post('branch'),
				'role'=>$this->session->userdata('role'),
				'r_date'=>$this->input->post('date'),
			);
			$this->db->set($update);
			$this->db->where('r_user_id',$this->session->userdata('id'));
			$c = $this->db->update('reservations');
			if($c){
				$data['title'] = 'Reservation | A1 Driving School';
				$data['header'] = 'includes/header';
				$data['footer'] = 'includes/footer';
				$data['content'] = 'pages/inside/approval';
				$data['error'] = '';
				
				$this->load->view('template',$data);
			}else{
				echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> System error!contact system developer.
</div>';
			}
		}
	}
	public function reservation()
	{
		$data['title'] = 'Reservation | A1 Driving School';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/layout';
		$data['error'] = '';
		
		$this->load->view('template',$data);
	}
	public function myacount()
	{
		$data['title'] = 'Acount | A1 Driving School';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/inside/info';
		$data['error'] = '';
		$this->db->where('email',$this->session->userdata('email'));
		$this->db->where('id',$this->session->userdata('id'));
		$updata = array('welcome'=>'done');
		$this->db->set($updata);
		$u = $this->db->update('new_users');
		if($u){
			$this->db->where('email',$this->session->userdata('email'));
			$this->db->where('id',$this->session->userdata('id'));
			$get = $this->db->get('new_users');
			$row = $get->row();
			$data_new = array(
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
			);
			$this->session->set_userdata($data_new);
		}
		else{
			echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> System error!contact system developer.
</div>';
		}
		$this->load->view('template',$data);
	}
	public function complete()
	{
		$data['title'] = 'Acount | A1 Driving School';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['error'] = '';
		
		$this->form_validation->set_rules('fname','First Name','|required|trim|xss_clean');
		$this->form_validation->set_rules('lname','Last Name','|required|trim|xss_clean');
		$this->form_validation->set_rules('age','Age','|required|trim|xss_clean');
		$this->form_validation->set_rules('gender','Gender','|required|trim|xss_clean');
		$this->form_validation->set_rules('mobile','Mobile Number','|required|trim|xss_clean');
		$this->form_validation->set_rules('phone','Phone Number','|required|trim|xss_clean');
		$this->form_validation->set_rules('address','Address','|required|trim|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			$data['content'] = 'pages/inside/info';
			if($this->input->post('age') < 16)
				$data['error'] = '<div class="alert alert-danger"><small>Minumum Age is 16.</small></div>';
			else
				$data['error'] = '<div class="alert alert-danger"><small>'.validation_errors().'</small></div>';
		}
		else{
			if($this->input->post('age') < 16)
			{
				
				$data['content'] = 'pages/inside/info';
				$data['error'] = '<div class="alert alert-danger"><small>Minumum Age is 16.</small></div>';
			}
			else
			{
				$this->db->where('email',$this->session->userdata('email'));
				$this->db->where('id',$this->session->userdata('id'));
				$c = $this->db->get('new_users');
				$r = $c->row();
				if($r->status == 'verified' && $r->completed  == 'done'){
					$data['content'] = 'pages/inside/reservation';
				}else{
					$data['content'] = 'pages/inside/notice';
				}
				$all = array(
					'fname'=>ucfirst($this->input->post('fname')),
					'lname'=>ucfirst($this->input->post('lname')),
					'age'=>$this->input->post('age'),
					'gender'=>$this->input->post('gender'),
					'address'=>$this->input->post('address'),
					'mobile'=>$this->input->post('mobile'),
					'phone'=>$this->input->post('phone'),
				);
				$this->db->set($all);
				$this->db->where('email',$this->session->userdata('email'));
				$this->db->where('id',$this->session->userdata('id'));
				$i = $this->db->update('new_users');
				if($i)
				{
					$datas = array('completed'=>'done');
					$this->db->set($datas);
					$this->db->where('email',$this->session->userdata('email'));
					$this->db->where('id',$this->session->userdata('id'));
					$this->db->update('new_users');
					
					$this->db->where('email',$this->session->userdata('email'));
					$this->db->where('id',$this->session->userdata('id'));
					$get = $this->db->get('new_users');
					$row =$get->row();
					$data_new = array(
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
					);
					$this->session->set_userdata($data_new);
				}
				else
				{
					echo '<div class="alert alert-warning alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	  <strong>Warning!</strong> System error!contact system developer.
	</div>';
				}
			}
		}
		$this->load->view('template',$data);
	}
	public function process()
	{
		$this->form_validation->set_rules('course_type','Course Type','|required|trim|xss_clean');
		$this->form_validation->set_rules('course','Course','|required|trim|xss_clean');
		$this->form_validation->set_rules('course_fee','Course Fee','|required|trim|xss_clean');
		$this->form_validation->set_rules('branch','Branch','|required|trim|xss_clean');
		$this->form_validation->set_rules('date','Date','|required|trim|xss_clean');
		if($this->form_validation->run() == false){
			$data['title'] = 'Reservation | A1 Driving School';
			$data['header'] = 'includes/header';
			$data['footer'] = 'includes/footer';
			$data['content'] = 'pages/inside/reservation';
			$data['error'] = '<div class="alert alert-danger"><small>'.validation_errors().'</small></div>';
			
			$this->load->view('template',$data);
		}
		else{
			$this->db->where('c_id',$this->input->post('course_type'));
			$a = $this->db->get('courses');
			$r1 = $a->row();
			$this->db->where('id',$this->input->post('course'));
			$b = $this->db->get('course_type');
			$r2 = $b->row();
			$this->db->where('id',$this->input->post('course_fee'));
			$c = $this->db->get('course_fee');
			$r3 = $c->row();
			$insert = array(
				'r_user_id'=>$this->session->userdata('id'),
				'r_email'=>$this->session->userdata('email'),
				'r_mobile'=>$this->session->userdata('mobile'),
				'r_phone'=>$this->session->userdata('phone'),
				'r_fname'=>$this->session->userdata('fname'),
				'r_lname'=>$this->session->userdata('lname'),
				'r_age'=>$this->session->userdata('age'),
				'r_gender'=>$this->session->userdata('gender'),
				'r_address'=>$this->session->userdata('address'),
				'r_course_type'=>$r1->courses,
				'r_course'=>$r2->course_type_title,
				'course_fee'=>$r3->course_hours.''.$r3->course_fee,
				'r_branch'=>$this->input->post('branch'),
				'role'=>$this->session->userdata('role'),
				'r_date'=>$this->input->post('date'),
			);
			$c = $this->db->insert('reservations',$insert);
			if($c){
				$data['title'] = 'Reservation | A1 Driving School';
				$data['header'] = 'includes/header';
				$data['footer'] = 'includes/footer';
				$this->load->view('pages/inside/reserv',$data);
			}else{
				echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> System error!contact system developer.
</div>';
			}
		}
	}
	public function verify(){
		if($this->uri->segment(3) == $this->session->userdata('verification')){
			$data = array('status'=>'verified','welcome'=>'done');
			$this->db->set($data);
			$this->db->where('email',$this->session->userdata('email'));
			$this->db->where('id',$this->session->userdata('id'));
			$this->db->update('new_users');
			
			$this->db->where('email',$this->session->userdata('email'));
			$this->db->where('id',$this->session->userdata('id'));
			$get = $this->db->get('new_users');
			$row =$get->row();
			$data_new = array(
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
			);
			$this->session->set_userdata($data_new);
			redirect('in');
		}
		else{
			$this->index();
		}
	}
	public function resend(){
		$data = array('verification'=>$this->uri->segment(3));
		$this->db->set($data);
		$this->db->where('email',$this->session->userdata('email'));
		$this->db->where('id',$this->session->userdata('id'));
		$this->db->update('new_users');
		
		$this->email->set_newline("\r\n");
		$this->email->from('a1-driving.com'); // change it to yours
		$this->email->to($this->session->userdata('email')); // change it to yours
		$this->email->subject('Verify your A1 Driving Reservation Acount');
		$data = array('message'=>"please verify your acount.");
		$email = $this->load->view('mails/user-verify', $data, TRUE);
		$this->email->message($email);
		$this->email->send();
		
		$this->db->where('email',$this->session->userdata('email'));
		$this->db->where('id',$this->session->userdata('id'));
		$get = $this->db->get('new_users');
		$row =$get->row();
		$data_new = array(
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
		);
		$this->session->set_userdata($data_new);
		$this->index();
	}
	public function acount()
	{
		$data['title'] = 'Welcome to A1 DRIVING SCHOOL';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['error'] = '';
		$data['content'] = 'pages/inside/acount';
		$this->load->view('template',$data);
	}
	public function edit_acount()
	{
		$data['title'] = 'Acount | A1 Driving';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/inside/acount';
		$data['error'] = '';
		
		$this->form_validation->set_rules('email','Email Address','trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean[max_length[6]]');
		$this->form_validation->set_rules('password2','Repeat password','trim|required|xss_clean|matches[password]');
		if($this->form_validation->run() == FALSE){
			$data['error'] = '<div class="alert alert-danger"><small>'.validation_errors().'</small></div>';
		}
		else{
			if($this->input->post('email') != $this->session->userdata('email'))
			{
				$this->db->where('email',$this->input->post('email'));
				$get = $this->db->get('new_users');
				if($get->num_rows() == 1)
				{
					$data['error'] = '<div class="alert alert-danger alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">
										&times;</span><span class="sr-only">Close</span>
										</button>
										<small><font color="#FFFFFF">'.$this->input->post('email').'</font>
										 email already exists. Please put deffirent email.</small>
									  </div>';
				}
				
			}
			else
			{
				$address;
				$phone;
				$mobile;
				if($this->input->post('address') == ''){
					$address = $this->session->userdata('address');
				}
				else{
					$address = $this->input->post('address');
				}
				if($this->input->post('phone') == ''){
					$phone = $this->session->userdata('phone');
				}
				else{
					$phone = $this->input->post('phone');
				}
				if($this->input->post('mobile') == ''){
					$mobile = $this->session->userdata('mobile');
				}
				else{
					$mobile = $this->input->post('mobile');
				}
				$data = array(
					'email'=>$this->input->post('email'),
					'password'=>sha1($this->input->post('password')),
					'address'=>$address,
					'phone'=>$phone,
					'mobile'=>$mobile
					);
				$this->db->set($data);
				$this->db->where('email',$this->input->post('email'));
				$this->db->update('new_users');
				$this->db->where('email',$this->input->post('email'));
				$get = $this->db->get('new_users');
				$row = $get->row();
				$new = array(
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
				);
				$this->session->set_userdata($new);
				$data['title'] = 'Acount | A1 Driving';
				$data['header'] = 'includes/header';
				$data['footer'] = 'includes/footer';
				$data['content'] = 'pages/inside/acount';
				$data['error'] = '<div class="alert alert-success"><small>Successfully Updated.</small></div>';
				//redirect('home/acounts/logout?key='.sha1('true').'');
			}
		}
		
		$this->load->view('template',$data);
	}
	public function get()
	{
		if($this->uri->segment(3) == 'course_type')
		{
			$this->db->where('course_id',$this->uri->segment(4));
			$data = $this->db->get('course_type');
			echo json_encode($data->result());
		}
		elseif($this->uri->segment(3) == 'get_fee')
		{
			$this->db->where('course_type_id',$this->uri->segment(4));
			$data = $this->db->get('course_fee');
			echo json_encode($data->result());
		}
		
	}
	private function check_login(){
		if($this->session->userdata('logged_in') && $this->session->userdata('role') == '11') return true;
		else redirect(base_url());
	}
}