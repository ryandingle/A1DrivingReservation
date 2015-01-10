<div class="col-md-6" style="color: #fff;text-shadow: 1px 1px 1px #000">
  	<h1>Welcom to A1 Driving School</h1>
    <h2>
    	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibendum ac. Sed ultrices leo.<br />
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibendum ac. Sed ultrices leo.
    </h2>
  </div>
<?php echo form_open('home/acounts/register');?>
    <div class="jumbotron col-md-5" style="background: #fff;padding: 20px;padding-top:0;margin-top: 5%">
        <h3 style="border-bottom: 2px solid #ccc;padding-bottom:10px">Registration</h3>
    	<?php echo $error;?>
        <div class="form-group">
                <input name="email" type="email" placeholder="Email Address" class="form-control" value="<?php echo set_value('email');?>" required="required" autofocus="autofocus" />
        </div>
        <div class="form-group">
                <input name="password" placeholder="Password" type="password" class="form-control" value="<?php echo set_value('password');?>" required="required" />
        </div>
        <div class="form-group">
                <input name="password2" placeholder="Repeat Password" type="password" class="form-control" value="<?php echo set_value('password2');?>" required="required" />
        </div>
        <div class="form-group">
          <button type="submit" name="register" class="btn btn-info pull-right">
            Register
            <i class="glyphicon glyphicon-log-in"></i>
          </button>
        </div>
    </div>
    <div class="row col-md-4 col-md-offset-9" style="margin-top: -60px;color: #fff;text-shadow: 1px 1px 1px #000">
        <p class="log-cop">Have an acount? <a href="<?php echo base_url();?>home/login">Login now!</a></p>
    </div>
<?php echo form_close();?>