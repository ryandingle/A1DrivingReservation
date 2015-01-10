<div class="container" style="margin-top: 50px;">
<?php echo form_open('in/complete');?>
    <div class="col-md-4 col-md-offset-4">
    	<?php echo $error;?>
        <header style="margin-bottom: 30px"><h2>Your valid Information</h2></header>
        <div class="form-group">
            <label><small>First Name <sup>(required)</sup></small></small></label>
            <input name="fname" type="text" class="form-control" value="<?php echo set_value('fname');?>" required="required" autofocus="autofocus" />
        </div>
        <div class="form-group">
            <label><small>Last Name <sup>(required)</sup></small></small></label>
            <input name="lname" type="text" class="form-control" value="<?php echo set_value('lname');?>" required="required" />
        </div>
        <div class="form-group">
            <label><small>Gender <sup>(required)</sup></small></label>
            <?php
            $identity = 'title="Please select your gender" style="width: 50%" class="form-control" required="required"';
            $pax = array(''=>'Select gender','male'=>'Male','Female'=>'Female');
            echo form_dropdown('gender',$pax,set_value('gender'),$identity);
            ;?>
        </div>
        
        <div class="form-group">
            <label><small>Age <sup>(required)</sup></small></label>
            <select name="age" class="form-control" style="width: 50%" required="required">
            <option value="">Select age</option>
            <?php
			for($a = 1;$a <= 100;$a++){
				if($a == set_value('age'))
				echo "<option value=".$a." selected='selected'>".$a."</option>";
				else echo "<option value=".$a.">".$a."</option>";
			};?>
            </select>
        </div>
        <div class="form-group">
            <label><small>Phone</small></label>
            <input name="phone" type="text" class="form-control" value="<?php echo set_value('phone');?>" required="required" />
        </div>
        <div class="form-group">
            <label><small>Mobile <sup>(required)</sup></small></small></label>
            <input name="mobile" type="text" class="form-control" value="<?php echo set_value('mobile');?>" required="required" />
        </div><div class="form-group">
            <label><small>Address <sup>(required)</sup></small></small></label>
            <textarea name="address" class="form-control" required="required"><?php echo set_value('address');?></textarea>
        </div>
        <div class="form-group">
          <button type="submit" name="complete" class="btn btn-info pull-right">
            Complete
            <i class="glyphicon glyphicon-log-in"></i>
          </button>
        </div>
    </div>
</div>