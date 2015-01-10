<div class="container">
<h2 style="border-bottom: 2px solid #ccc;padding: 10px">Your Acount Settings.
<label class="pull-right edit_myacount" data-from="in" style="cursor: pointer;font-size: 24px"><small>Edit <i class="glyphicon glyphicon-pencil"></i></small></label></h2>
<?php echo $error;?>
<?php echo form_open('in/edit_acount');?>
<div class="col-md-5" style="margin-right: 50px">
	<h4 style="color: #ccc">Acount Info</h4>
    <div class="form-group">
    	<label><small>Your Fullname</small></label>
    	<h4><?php echo $this->session->userdata('fname');?> <?php echo $this->session->userdata('lname');?></h4>
    </div>
    <div class="form-group">
    	<label><small>Email Address</small></label>
    	<input type="email" name="email" value="<?php echo $this->session->userdata('email');?>" class="all form-control" disabled="disabled" />
    </div>
    <div class="form-group">
    	<label><small>Password</small></label>
    	<input type="password" name="password" class="all form-control" required="required" disabled="disabled" />
    </div>
    <div class="form-group">
    	<label><small>Repeat Password</small></label>
    	<input type="password" name="password2" class="all form-control" required="required" disabled="disabled" />
    </div>
</div>
<div class="col-md-6" style="border-left: 2px solid #ccc;"> 
	<h4 style="color: #ccc">Personal Info</h4>
	<ul style="padding: 20px">
    	<li style="padding: 10px;font-size: 18px;border-bottom: 1px dotted;list-style: none">Age : <?php echo $this->session->userdata('age');?></li>
        <li style="padding: 10px;font-size: 18px;border-bottom: 1px dotted;list-style: none">Gender : <?php echo $this->session->userdata('gender');?></li>
        <li style="padding: 10px;font-size: 18px;border-bottom: 1px dotted;list-style: none">
        	Current Address : <?php echo $this->session->userdata('address');?>
        	<!--<input type="textarea" name="address" value="<?php echo set_value('address');?>" class="all form-control" placeholder="New Address" required="required" style="margin-top: 20px;display:none" />-->
            <textarea name="address" class="all form-control" placeholder="New Address" style="margin-top: 20px;display:none"><?php echo set_value('address');?></textarea>
        </li>
        <li style="padding: 10px;font-size: 18px;border-bottom: 1px dotted;list-style: none">
        	<small>Contact info</small><br />
        	Mobile : <?php echo $this->session->userdata('mobile');?><br />
        	<input type="text" name="mobile" value="<?php echo set_value('mobile');?>" placeholder="New Mobile Number" class="all form-control" style="margin-top: 20px;display:none" />
            Phone : <?php echo $this->session->userdata('phone');?>
        	<input type="text" name="phone" value="<?php echo set_value('phone');?>" placeholder="New Phone Number" class="all form-control"  style="margin-top: 20px;display:none" />
        </li>
        <li style="padding: 10px;font-size: 18px;border-bottom: 1px dotted;list-style: none">Started : <?php echo $this->session->userdata('started');?></li>
    </ul>
</div>

    <div class="form-group">
    	<input type="submit" value="Update Acount" name="change" class="all btn btn-info pull-right" required="required" disabled="disabled" />
    </div>
<?php echo form_close();?>
</div>