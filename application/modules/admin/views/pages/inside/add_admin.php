<div class="container">
<h3>Add Admin Page</h3>
<div class="container col-md-4 col-md-offset-4" style="margin-top: 10%;margin-bottom: 5%">
	<?php echo $error;?>
    <?php echo form_open('admin/add_new_admin');?>
	<div class="form-group">
		<input type="email" name="email" class="form-control" placeholder="New Admin Email Address" autofocus="autofocus" required="required" />    
    </div>
    <div class="form-group">
		<input type="password" name="password" class="form-control" placeholder="Password" autofocus="autofocus" required="required" />    
    </div>
    <div class="form-group">
		<input type="password" name="password2" class="form-control" placeholder="Repeat Password" autofocus="autofocus" required="required" />    
    </div>
    <div class="form-group">
		<button type="submit"class="btn btn-success form-control">Add User Admin</button>
    </div>
    <?php echo form_close();?>
</div>
</div>