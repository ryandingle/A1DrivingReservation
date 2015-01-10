<?php echo form_open('home/acounts/login');?>
<div class="row col-md-12" style="margin-top: 13%;margin-bottom: 20%">
    <div class="jumbotron row col-lg-4 col-md-offset-4" style="background: #fff;padding: 20px;padding-top: 0">
       <h3 style="border-bottom: 2px solid #ccc;padding-bottom:10px">Login</h3>
    	<?php echo $error;?>
        <div class="form-group">
          <?php $email = array(
                        'name'=>'email',
						'type'=>'email',
						'placeholder'=>'Email Address',
                        'autocomplete'=>'off',
                        'id'=>'email',
                        'class'=>'form-control',
						'required'=>'required',
						'autofocus'=>'autofcus',
						'value'=>set_value('email')
                        ); 
                echo form_input($email)
          ;?>
        </div>
        
        <div class="form-group">
          <?php $password = array(
                        'name'=>'password',
						'placeholder'=>'Password',
                        'autocomplete'=>'off',
                        'id'=>'password',
                        'class'=>'form-control',
						'required'=>'required',
						); 
                echo form_password($password)
          ;?>
        </div>
        
        <div class="form-group">
          <input type="checkbox" name="netid" /> Remember me?
          <button type="submit" name="submit" id="submit_login" class="btn btn-info pull-right">
          	Log in
          	<i class="glyphicon glyphicon-log-in"></i>
          </button>
        </div>
    </div>
    
    <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;color: #fff;text-shadow: 1px 1px 1px #000">
        <p>Dont have an acount? <a href="<?php echo base_url();?>home/register">Register</a></p>
    </div>
</div>
<?php echo form_close();?>