<div class="container">
<?php
	if($this->uri->segment(2) == 'login' || $this->uri->segment(3) == 'login'){
		$this->load->view('pages/outside/login');
	}else if($this->uri->segment(2) == 'register' || $this->uri->segment(3) == 'register'){
		$this->load->view('pages/outside/register');
	}
	else if($this->uri->segment(2) == 'reservation') {
		$this->load->view('pages/outside/login');
	}
	else if($this->uri->segment(2) == 'courses') {
		$this->load->view('pages/outside/courses');
	}
	else if($this->uri->segment(2) == 'branches') {
		$this->load->view('pages/outside/branches');
	}
	else if($this->uri->segment(2) == 'contact') {
		$this->load->view('pages/outside/about');
	}
	else if($this->uri->segment(2) == 'licensing') {
		$this->load->view('pages/outside/licensed');
	}
	else{
		$this->load->view('pages/outside/home1');
	}
?>
	
</div>