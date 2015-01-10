<div class="jumbotron container">
	<div class="container">
		<h2>Welcome <?php echo $this->session->userdata('email');?></h2>
        <br />
        <div class="col-md-10">
        	<p>Thanks for signing up. Your acount has been created and added to our driving school database.
            	<br>Before proceeding to process your request. you must verify your acount by clicking the email verification link that we sent to your email acount.
            </p><br>
            <p>If email did'nt arrive. please check your spam folder in your email count. or you may <a href="in/resend/<?php echo sha1($this->session->userdata('email')+microtime());?>">Resend email verification.</a> again.</p>
            <br><p>Best regards, a1driving corporation</p>
            <a href="<?php echo base_url();?>in/myacount"><button class="btn btn-warning pull-right">Complete Personal Detail now.</button></a>
        </div>
    </div>
</div>
    