<div class="navbar" style="background:#eee">
    <div class="container">
        <ul class="nav navbar-nav">
            <li>
                <a href="<?php echo base_url();?>">Dashboard</a>
            </li>
       </ul>
       <ul class="nav navbar-nav pull-right">
            <li  class="dropdown">
                <a  class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Howdy! 
				<?php if($this->session->userdata('fname') == '' || $this->session->userdata('lname') == ''){ echo $this->session->userdata('email'); }else{ echo $this->session->userdata('fname').' '.$this->session->userdata('lname');};?>
                 <span class="caret"></span></a>
                <ul class="dropdown-menu role="menu">
                	<li>
                        <a href="<?php echo base_url();?>in/acount">Acount <i class="glyphicon glyphicon-user pull-right"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>home/acounts/logout?key=<?php echo sha1('true');?>">Logout <i class="glyphicon glyphicon-off pull-right"></i></a>
                    </li>
                </ul>
            </li>
       </ul>
	</div>
</div>
    
	