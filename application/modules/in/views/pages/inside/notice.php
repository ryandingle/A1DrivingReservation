<div class="container">
    <div class="col-lg-8 col-md-offset-2" style="margin-top: 10%">
        <div class="alert alert-warning alert-dismissible" role="alert">
          <strong>Please verify your acount.</strong>
          <br>
          <br>
          <p>If email did'nt arrive. please check your spam folder in your email acount. or you may <a href="in/resend/<?php echo sha1($this->session->userdata('email')+microtime());?>">Resend email verification.</a> again.
          </p>
        </div>
    </div>
</div>