<div class="container">
<?php
	if($this->uri->segment(2) == 'acount' || 'edit_acount')
	{
		$this->load->view('pages/inside/acount');
	}
	else
	{
		$this->db->where('r_user_id',$this->session->userdata('id'));
		$p = $this->db->get('reservations');
		$row = $p->row();
			if($p->num_rows() == 0)
			{
				if($this->session->userdata('role') == '11' && $this->session->userdata('status') == 'verified' && $this->session->userdata('welcome') == 'done' && $this->session->userdata('completed') == 'done'){
					$this->load->view('pages/inside/reservation');
				}
				else{
					if($this->session->userdata('role') == '11' && $this->session->userdata('welcome') == 'yes')
					{
						$this->load->view('pages/inside/welcome');
					}
					else if($this->session->userdata('role') == '11' && $this->session->userdata('completed') == 'yes')
					{
						$this->load->view('pages/inside/info');
					}
					else if($this->session->userdata('role') == '11' && $this->session->userdata('status') == 'unverified')
					{
						$this->load->view('pages/inside/notice');
					}
				}
			}elseif($row->status == 'approve')
			{
				$this->load->view('pages/inside/done');
			}
			else
			{
				
				if($this->session->userdata('role') == '11' && $this->session->userdata('welcome') == 'yes')
				{
					$this->load->view('pages/inside/welcome');
				}
				else if($this->session->userdata('role') == '11' && $this->session->userdata('completed') == 'yes')
				{
					$this->load->view('pages/inside/info');
				}
				else if($this->session->userdata('role') == '11' && $this->session->userdata('status') == 'unverified')
				{
					$this->load->view('pages/inside/notice');
				}
				else
				{
					$this->load->view('pages/inside/approval');
				}
				
			}
		
	}
	
?>
	
</div>