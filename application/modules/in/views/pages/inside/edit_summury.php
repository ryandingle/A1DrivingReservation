<div class="container">
<div class="row">
	<div class="grid-fluid">
        <h1><small>Please complete the following fields.</small></h1><br />
    	<div class="col-md-5">
			<?php echo form_open('in/edit_sum_action');?>
                <div class="form-group col-md-6">
                    <label><small>Firstname</small></label>
                    <input name="fname" type="text" disabled="disabled" class="form-control" value="<?php echo ucfirst($this->session->userdata('fname'));?>" />
                </div>
            
                <div class="form-group col-md-6 col-md-offset-7" style="margin-left: 0px;padding-right: 0px;">
                    <label><small>Lastname</small></label>
                    <input name="lname" type="text" disabled="disabled" class="form-control" value="<?php echo ucfirst($this->session->userdata('lname'));?>" />
                </div>
            
                <div class="form-group" style="padding-left: 15px">
                    <label><small>Email Address</small></label>
                    <input name="email" type="text" disabled="disabled" class="form-control" value="<?php echo $this->session->userdata('email');?>" />
                </div>
                
                <div class="form-group" style="padding-left: 15px">
                    <label><small>Gender <sup>(required)</sup></small></label>
                    <?php
                    $identity = 'title="Please select your gender" style="width: 50%" class="form-control" required="required" disabled="disabled"';
            		$pax = array(''=>'Select gender','male'=>'Male','Female'=>'Female');
            		echo form_dropdown('gender',$pax,$this->session->userdata('gender'),$identity);
          			;?>
                </div>
                
                <div class="form-group" style="padding-left: 15px">
                    <label><small>Age <sup>(required)</sup></small></label>
                    <select name="age" class="form-control" style="width: 50%" required="required" disabled="disabled">
                   	<option value="">Select age</option>
                    <?php
					$this->db->where('email',$this->session->userdata('email'));
					$this->db->where('id',$this->session->userdata('id'));
					$get = $this->db->get('new_users');
					$row = $get->row();
					for($a = 1;$a <= 100;$a++){
						if($a == $row->age)
						echo "<option value=".$a." selected='selected'>".$a."</option>";
						else echo "<option value=".$a.">".$a."</option>";
					};?>
                    </select>
                </div>
                <div class="form-group" style="padding-left: 15px">
                    <label><small>Address | Location</small></label>
                    <textarea name="address" disabled="disabled" class="form-control">
                    	<?php echo $this->session->userdata('address');?>
                    </textarea>
                </div>
			</div>
          	<div class="col-md-offset-6">
        		<?php echo $error;?>
                <div class="form-group" style="padding-left: 15px">
                    <label><small>Course Type <sup>(required)</sup></small></label>
                    <select name="course_type" class="show_course form-control" required="required">
                    	<option value="">choose</option>
                        <?php 
							$getc = $this->db->get('courses');
						?>
                        <?php foreach($getc->result() as $row){?>
                        <option data-id="<?php echo $row->c_id;?>" value="<?php echo $row->c_id;?>" <?php if(set_value('course_type') == $row->courses) echo 'selected="selected"';?>> <?php echo $row->courses;?>
                        </option>
                        <?php };?>
                    </select>
                </div>
                
                <div class="form-group" style="padding-left: 15px">
                  <label><small>Course <sup>(required)</sup></small></label>
                   <select name="course" class="course show_fee form-control" required="required">
                    	<option value="">choose course</option>
                        <?php 
							$getc = $this->db->get('course_type');
						?>
                        <?php foreach($getc->result() as $row){?>
                        <option data-id="<?php echo $row->course_id;?>" value="Premium" <?php if(set_value('course') == $row->course_type_title) echo 'selected="selected"';?>> <?php echo $row->course_type_title;?>
                        </option>
                        <?php };?>
                    </select>
                </div>
                
                <div class="form-group" style="padding-left: 15px">
                  <label><small>Course Fee <sup>(required)</sup></small></label>
                   <select name="course_fee" class="course_fee form-control" required="required">
                    	<option value="">choose course fee</option>
                    </select>
                </div>
                
                <div class="form-group" style="padding-left: 15px">
                  <label><small>Branch <sup>(required)</sup></small></label>
                    <select name="branch" class="form-control" required="required">
                    	<option value="">choose</option>
                    	<?php 
							$this->db->order_by('branch','ASC');
							$c2 = $this->db->get('branches');
							foreach($c2->result() as $row){
								if(set_value('branch') == $row->branch){
									echo '<option value="'.$row->branch.'" selected="selected">'.$row->branch.'</option>';
								}else{
									echo '<option value="'.$row->branch.'">'.$row->branch.'</option>';
								}
							}
						;?>
                    </select>
                </div>
                
                <div class="form-group" style="padding-left: 15px">
                  <label><small>Phone</small></label>
                    <input disabled="disabled" name="phone" type="text" class="form-control" value="<?php echo $this->session->userdata('phone');?>" />
                </div>
                
                <div class="form-group" style="padding-left: 15px">
                  <label><small>Mobile</small></label>
                    <input disabled="disabled" type="text" name="mobile" class="form-control" value="<?php echo $this->session->userdata('mobile');?>" />
                </div>
                
                <div class="form-group" style="padding-left: 15px">
                  <label><small>Date</small></label>
                    <input type="date" name="date" class="form-control" value="<?php echo set_value('date');?>" required="required" />
                </div>
               
                <div class="form-group">
                  <button type="submit" name="submit" id="submit_login" class="btn btn-info pull-right">
                    Process
                    <i class="glyphicon glyphicon-log-in"></i>
                  </button>
                </div>
            <?php echo form_close();?>
        </div>
       
    </div>
</div>
</div>