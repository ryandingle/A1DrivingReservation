<?php if($this->uri->segment(2) == 'register' || 'login'){
	echo '
		<div class="navbar navbar-default">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<div class="container">
				<ul class="nav navbar-nav navbar-left">
					<li style="border-right: 1px solid #eee">
						<a href="'.base_url().'">Home</a>
					</li>
					<li style="border-right: 1px solid #eee">
						<a href="'.base_url().'home/courses">Courses</a>
					</li>
					<li style="border-right: 1px solid #eee">
						<a href="'.base_url().'home/branches">Branches</a>
					</li>
					<li style="border-right: 1px solid #eee">
						<a href="'.base_url().'home/contact">Contact Us</a>
					</li>
					<li style="border-right: 1px solid #eee">
						<a href="'.base_url().'home/licensing">Licensing</a>
					</li>
					<li style="border-right: 1px solid #eee">
						<a href="'.base_url().'home/login">Reservation</a>
					</li>
					<li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li style="border-right: 1px solid #eee">
						<a href="'.base_url().'home/register">Register</a>
					</li>
					<li>
						<a href="'.base_url().'home/login">Login</a>
					</li>
			   </ul>
		  </div>
	  </div>
	';
}else{
	echo '
<div class="page-header">
  <h1>Example page header <small>Subtext for header</small></h1>
</div>
    <div class="navbar">
    	<div class="container">
        	<ul class="nav navbar-nav navbar-left">
				<li style="border-right: 1px solid #eee">
					<a href="'.base_url().'">Home</a>
				</li>
				<li style="border-right: 1px solid #eee">
					<a href="'.base_url().'home/courses">Courses</a>
				</li>
				<li style="border-right: 1px solid #eee">
					<a href="'.base_url().'home/branches">Branches</a>
				</li>
				<li style="border-right: 1px solid #eee">
					<a href="'.base_url().'home/contact">Contact Us</a>
				</li>
				<li style="border-right: 1px solid #eee">
					<a href="'.base_url().'home/licensing">Licensing</a>
				</li>
				<li style="border-right: 1px solid #eee">
					<a href="'.base_url().'home/login">Reservation</a>
				</li>
				<li>
			</ul>
      </div>
</div>
';
};?>
    
	