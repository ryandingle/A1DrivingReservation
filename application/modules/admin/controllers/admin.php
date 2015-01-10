<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->checking();
	}
	public function index()
	{
		$data['title'] = 'Admin | A1 Driving';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/layout';
		$data['error'] = '';
		
		$config['base_url'] = base_url().'admin/page/'.$this->uri->segment(3).'/';
		
		$config['total_rows'] = $this->db->get('reservations')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		
		$this->db->where('role','11');
		$data['reservation_list'] = $this->db->get('reservations',$config['per_page'],$this->uri->segment(4));
		
		$this->load->view('template',$data);
	}
	public function page()
	{
		$data['title'] = 'Searching | Admin';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/layout';
		$data['error'] = '';
		
		$config['base_url'] = base_url().'admin/page/'.$this->uri->segment(3).'/';
		
		$config['total_rows'] = $this->db->get('reservations')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		
		$this->db->where('role','11');
		$data['reservation_list'] = $this->db->get('reservations',$config['per_page'],$this->uri->segment(4));
		
		$this->load->view('template',$data);
	}
	
	public function reservations(){$this->index();}
	public function acount(){$this->index();}
	public function data_settings(){$this->index();}
	public function add_admin(){$this->index();}
	public function remove_admin()
	{
		$data['title'] = 'Admin List';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/layout';
		$data['error'] = '';
		
		$config['base_url'] = base_url().'admin/remove_admin/'.$this->uri->segment(3).'/';
		
		$this->db->where('role','22');
		$config['total_rows'] = $this->db->get('new_users')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		
		$this->db->where('role','22');
		$data['new_users'] = $this->db->get('new_users',$config['per_page'],$this->uri->segment(4));
		
		$this->load->view('template',$data);
	}
	public function remove_acount()
	{
		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete('new_users');
		
		
		$data['title'] = 'Admin List';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/layout';
		$data['error'] = '<div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">
									&times;</span><span class="sr-only">Close</span>
									</button>
									Successfully deleted.
								  </div><br>';
		
		$config['base_url'] = base_url().'admin/page/'.$this->uri->segment(3).'/';
		
		$this->db->where('role','22');
		$config['total_rows'] = $this->db->get('new_users')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		
		$this->db->where('role','22');
		$data['new_users'] = $this->db->get('new_users',$config['per_page'],$this->uri->segment(4));
		
		$this->load->view('template',$data);
	}
	public function add_new_admin()
	{
		$data['title'] = 'Admin | A1 Driving';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/inside/add_admin';
		
		$this->form_validation->set_rules('email','Email Address','trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean[max_length[6]]');
		$this->form_validation->set_rules('password2','Repeat password','trim|required|xss_clean|matches[password]');
		if($this->form_validation->run() == FALSE){
			$data['error'] = '<div class="alert alert-danger"><small>'.validation_errors().'</small></div>';
		}
		else
		{
			
			$this->db->where('role',22);
			$get2 = $this->db->get('new_users');
			
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
			elseif($get2->num_rows() == 20)
			{
				$data['error'] = '<div class="alert alert-danger alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">
									&times;</span><span class="sr-only">Close</span>
									</button>
									Unable to add new admin. Maximum admin member is 20. Else delete old admin that is not active.
								  </div>';
			}
			else
			{
				$data = array(
					'email'=>$this->input->post('email'),
					'password'=>sha1($this->input->post('password')),
					'status'=>'verified',
					'role'=>'22',
					'welcome'=>'done',
					'completed'=>'done',
				);
					
				$this->db->insert('new_users',$data);
				$data['title'] = 'Admin | A1 Driving';
				$data['header'] = 'includes/header';
				$data['footer'] = 'includes/footer';
				$data['content'] = 'pages/inside/add_admin';
				$data['error'] = '<div class="alert alert-success"><small>Successfully Added.</small></div>';
			}
		}
		
		$this->load->view('template',$data);
	}
	public function admin_list()
	{
		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete('new_users');
		
		
		$data['title'] = 'Admin List';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/inside/remove_admin';
		$data['error'] = '';
		
		$this->db->where('role','22');
		$config['base_url'] = base_url().'admin/page/'.$this->uri->segment(3).'/';
		
		$config['total_rows'] = $this->db->get('reservations')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		
		$this->db->where('role','22');
		$data['new_users'] = $this->db->get('new_users',$config['per_page'],$this->uri->segment(4));
		
		$this->load->view('template',$data);
	}
	public function search_admin()
	{
		$data['title'] = 'Admin | A1 Driving';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/inside/remove_admin';
		$data['error'] = '';
	
		$config['base_url'] = base_url().'admin/result/'.$_GET['search'].'/';
		
		$this->db->where('role',22);
		$config['total_rows'] = $this->db->get('new_users')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		
		$this->db->where('role',22);
		$this->db->like('fname',$_GET['search']);
		$this->db->or_like('lname',$_GET['search']);
		$this->db->or_like('email',$_GET['search']);
		$data['new_users'] = $this->db->get('new_users',$config['per_page'],$this->uri->segment(4));
		
		$this->load->view('template',$data);
	}
	public function result()
	{
		$data['title'] = 'Searching | Admin';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/inside/remove_admin';
		$data['error'] = '';
		
		$config['base_url'] = base_url().'admin/result/'.$this->uri->segment(3).'/';
		
		
		$this->db->where('role',22);
		$config['total_rows'] = $this->db->get('new_users')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		
		$this->db->where('role','22');
		$data['new_users'] = $this->db->get('new_users',$config['per_page'],$this->uri->segment(4));
		
		$this->load->view('template',$data);
	}
	public function edit_acount()
	{
		$data['title'] = 'Admin | A1 Driving';
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
	public function approve()
	{	
		$this->db->where('r_user_id',$this->uri->segment(3));
		$p = $this->db->get('reservations');
		$row = $p->row();
		$this->email->set_newline("\r\n");
		$this->email->from('a1-driving.com'); // change it to yours
		$this->email->to($row->r_email); // change it to yours
		$this->email->subject('Congratulations.');
		$data = array('message'=>"You've been added to our database.");
		$email = $this->load->view('mails/user-approve', $data, TRUE);
		$this->email->message($email);
		$this->email->send();
		
		$data = array('status'=>'approve');
		$this->db->set($data);
		$this->db->where('r_user_id',$this->uri->segment(3));
		$this->db->update('reservations');
		
		//$this->db->where('r_user_id',$this->uri->segment(3));
		//$p = $this->db->get('reservations');
		//echo json_encode($p->result());
		
		//if have net
		//$this->reservations();
		//else
		redirect('admin/reservations');
		
	}
	public function remove()
	{	
		//$this->db->where('id',$this->uri->segment(3));
		//$this->db->delete('users');
		$this->db->where('r_user_id',$this->uri->segment(3));
		$this->db->delete('reservations');
		//redirect(base_url().$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(4));
		//if have net
		//$this->reservations();
		//else
		redirect('admin/reservations');
	}
	public function add()
	{
		if($this->uri->segment(3) == 'course')
		{
			$data = array('courses'=>$this->security->xss_clean($this->uri->segment(4)));
			$this->db->insert('courses',$data);
			
			$this->db->order_by('courses','ASC');
			$b = $this->db->get('courses');
			echo json_encode($b->result());	
		}
		elseif($this->uri->segment(3) == 'course_type')
		{
			$data = array(
					'course_type_title'=>$this->security->xss_clean($_POST['course_type']),
					'course_id'=>$this->security->xss_clean($_POST['by']),
				);
			$this->db->insert('course_type',$data);
			
			$this->db->order_by('course_type_title','ASC');
			$b = $this->db->get('course_type');
			echo json_encode($b->result());	
		}
		elseif($this->uri->segment(3) == 'course_fee')
		{
			$this->db->where('id',$this->security->xss_clean($this->uri->segment(6)));
			$c = $this->db->get('course_type');
			$row1 = $c->row();
			
			$this->db->where('c_id',$row1->course_id);
			$d = $this->db->get('courses');
			$row2 = $d->row();
			
			$data = array(
					'course_fee'=>'Php '.$this->security->xss_clean($this->uri->segment(4)),
					'course_hours'=>$this->security->xss_clean($this->uri->segment(5)).' Hours',
					'course_type_id'=>$this->security->xss_clean($this->uri->segment(6)),
					'course_id'=>$row2->c_id,
				);
			$this->db->insert('course_fee',$data);
		}
		elseif($this->uri->segment(3) == 'branch')
		{
			$branch = array(
				'branch'=>$this->security->xss_clean($_POST['branch']),
			);
			$this->db->insert('branches',$branch);
		}
	}
	public function delete()
	{
		if($this->uri->segment(3) == 'course')
		{
			$this->db->where('c_id',$this->security->xss_clean($this->uri->segment(4)));
			$this->db->delete('courses');
			
			$this->db->where('course_id',$this->security->xss_clean($this->uri->segment(4)));
			$this->db->delete('course_type');
			$this->db->where('course_id',$this->security->xss_clean($this->uri->segment(4)));
			$this->db->delete('course_fee');
			
			$this->db->order_by('courses','ASC');
			$b = $this->db->get('courses');
			echo json_encode($b->result());
		}
		elseif($this->uri->segment(3) == 'course_type')
		{
			$this->db->where('id',$this->security->xss_clean($this->uri->segment(4)));
			$this->db->where('course_id',$this->security->xss_clean($this->uri->segment(5)));
			$this->db->delete('course_type');
			
			$this->db->where('course_type_id',$this->security->xss_clean($this->uri->segment(4)));
			$this->db->where('course_id',$this->security->xss_clean($this->uri->segment(5)));
			$this->db->delete('course_fee');
		}elseif($this->uri->segment(3) == 'del_fee')
		{
			//$this->db->where('id',$this->security->xss_clean($this->uri->segment(4)));
			//$c = $this->db->get('course_type');
			//$row1 = $c->row();
			
			$this->db->where('id',$this->security->xss_clean($this->uri->segment(5)));
			$this->db->where('course_type_id',$this->security->xss_clean($this->uri->segment(4)));
			$this->db->delete('course_fee');
		}
		elseif($this->uri->segment(3) == 'branch')
		{
			$this->db->where('b_id',$this->uri->segment(4));
			$this->db->delete('branches');
			
			$branches = $this->db->get('branches');
			echo json_encode($branches->result());
		}
	}
	public function get()
	{
		if($this->uri->segment(3) == 'course_type')
		{				
			$this->db->where('course_id',$this->uri->segment(4));
			$g = $this->db->get('course_type');
			echo json_encode($g->result());
		}
		elseif($this->uri->segment(3) == 'course_fee')
		{
			$this->db->where('course_type_id',$this->uri->segment(4));
			$a = $this->db->get('course_fee');
			echo json_encode($a->result());
		}
		elseif($this->uri->segment(3) == 'branch')
		{
			$this->db->order_by('branch','ASC');
			$branches = $this->db->get('branches');
			echo json_encode($branches->result());
		}
	}
	public function search()
	{
		$data['title'] = 'Admin | A1 Driving';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/layout';
		$data['error'] = '';
	
		$config['base_url'] = base_url().'admin/find/'.$_GET['search'].'/';
		
		
		$this->db->like('r_fname',$_GET['search'],'after');
		$this->db->or_like('r_lname',$_GET['search'],'after');
		$this->db->or_like('r_email',$_GET['search'],'after');
		$config['total_rows'] = $this->db->get('reservations')->num_rows();
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$this->db->like('r_fname',$_GET['search'],'after');
		$this->db->or_like('r_lname',$_GET['search'],'after');
		$this->db->or_like('r_email',$_GET['search'],'after');
		$data['reservation_list'] = $this->db->get('reservations',$config['per_page'],$this->uri->segment(4));
		
		$this->load->view('template',$data);
	}
	public function find()
	{
		$data['title'] = 'Admin | A1 Driving';
		$data['header'] = 'includes/header';
		$data['footer'] = 'includes/footer';
		$data['content'] = 'pages/layout';
		$data['error'] = '';
	
		$config['base_url'] = base_url().'admin/find/'.$this->uri->segment(3).'/';
		
		$this->db->like('r_fname',$this->uri->segment(3),'after');
		$this->db->or_like('r_lname',$this->uri->segment(3),'after');
		$this->db->or_like('r_email',$this->uri->segment(3),'after');
		$config['total_rows'] = $this->db->get('reservations')->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		
		$this->pagination->initialize($config);
		
		$data['links'] = $this->pagination->create_links();
		$this->db->like('r_fname',$this->uri->segment(3),'after');
		$this->db->or_like('r_lname',$this->uri->segment(3),'after');
		$this->db->or_like('r_email',$this->uri->segment(3),'after');
		$data['reservation_list'] = $this->db->get('reservations',$config['per_page'],$this->uri->segment(4));
		
		$this->load->view('template',$data);
	}
	private function checking()
	{
		if($this->session->userdata('logged_in') && $this->session->userdata('role') == '22') return true;
		else redirect(base_url());
	}
}