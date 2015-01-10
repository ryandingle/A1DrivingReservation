<div class="container">
<?php
	if($this->session->userdata('role') == '22' && $this->uri->segment(2) == 'acount' || $this->uri->segment(2) == 'edit_acount'){
		$this->load->view('pages/inside/acount');
	}else if($this->session->userdata('role') == '22' && $this->uri->segment(2) == 'data_settings'){
		$this->load->view('pages/inside/data_settings');
	}else if($this->session->userdata('role') == '22' && $this->uri->segment(2) == 'search'){
		$this->load->view('pages/inside/search');
	}else if($this->session->userdata('role') == '22' && $this->uri->segment(2) == 'page'){
		$this->load->view('pages/inside/search');
	}else if($this->session->userdata('role') == '22' && $this->uri->segment(2) == 'find'){
		$this->load->view('pages/inside/search');
	}else if($this->session->userdata('role') == '22' && $this->uri->segment(2) == 'reservations'){
		$this->load->view('pages/inside/reservation_list');
	}else if($this->session->userdata('role') == '22' && $this->uri->segment(2) == 'data_settings'){
		$this->load->view('pages/inside/data_settings');
	}else if($this->session->userdata('role') == '22' && $this->uri->segment(2) == 'add_admin'){
		$this->load->view('pages/inside/add_admin');
	}else if($this->session->userdata('role') == '22' && $this->uri->segment(2) == 'remove_admin'){
		$this->load->view('pages/inside/remove_admin');
	}else if($this->session->userdata('role') == '22' && $this->uri->segment(2) == 'remove_acount'){
		$this->load->view('pages/inside/remove_admin');
	}else{
		$this->load->view('pages/inside/actions');
	}
?>
</div>