<h3>DATA SETTINGS PAGE</h3>
<div class="col-md-5 col-md-offset-1">
	<div class="panel panel-info">
    	<div class="panel-heading">Course Settings</div>
        <div class="panel-body">
        
        	<div class="form-group">
            	<label><small>Add New Course</small></label>
                <div class="col-lg-10"  style="margin-left: -15px">
                    <input name="course_type" type="text" class="new_course form-control" value="" required="required" />
                </div>
                <button data-new-course="new_course" class="add_new_course btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i></button>
        	</div>
            
        	<div class="form-group">
            	<label style="padding-top: 20px;width: 100%"><small>Delete Course</small></label>
                <div class="col-lg-10"  style="margin-left: -15px">
                	<?php $course_type = $this->db->get('courses');?>
                    <select name="del_course" class="course_list form-control">
                    	<option value=""></option>
                    	<?php foreach($course_type->result() as $row){?>
                    	<option value="<?php echo $row->c_id;?>"><?php echo $row->courses;?></option>
                        <?php };?>
                    </select>
                </div>
                <button class="delete_course btn btn-info pull-left"><i style="color: #930" class="glyphicon glyphicon-remove"></i></button>
        	</div>
            
        </div>
    </div>
    
    <div class="panel panel-info">
    	<div class="panel-heading">Course Type Settings</div>
        <div class="panel-body">
        
        	<div class="form-group">
                <div class="col-lg-10"  style="margin-left: -15px">
                <a class="add_course_type" data-show="add_course_type_form" data-hide="remove_course_type_form" href="javascript:void(0)"><i class="glyphicon glyphicon-plus"></i> Add Course Type <i class="caret"></i></a>
                </div>
        	</div>
            
        	<div class="form-group add_course_type_form" style="padding: 20px;margin-bottom: 30px;">
            	<label style="padding-top: 20px;width: 100%"><small>Add to Course</small></label>
                <div class="col-lg-10"  style="margin-left: -15px">
                	<?php $course_type = $this->db->get('courses');?>
                    <select name="course" class="course form-control">
                    	<option value=""></option>
                    	<?php foreach($course_type->result() as $row){?>
                    	<option value="<?php echo $row->c_id;?>"><?php echo $row->courses;?></option>
                        <?php };?>
                    </select>
                </div>
                
            	<label style="padding-top: 20px;width: 100%"><small>Course Type Title</small></label>
                <div class="col-lg-10"  style="margin-left: -15px">
                    <input name="course_type" type="text" class="course_type form-control" required="required" />
                </div>
                <button data-get-from="course_type" data-lead-course="course" class="insert_new_course_type btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i></button>
        	</div>
            
            <div class="form-group">
                <div class="col-lg-10"  style="margin-left: -15px">
                <a class="remove_course_type" data-show="remove_course_type_form" data-hide="add_course_type_form" href="javascript:void(0)"><i class="glyphicon glyphicon-remove"></i> Remove Course Type <i class="caret"></i></a>
                </div>
        	</div>
            
            <div class="form-group remove_course_type_form" style="padding: 20px;margin-bottom: 30px;display: none">
            	<label style="padding-top: 20px;width: 100%"><small>Remove from course</small></label>
                <div class="col-lg-10"  style="margin-left: -15px">
                	<?php $course_type = $this->db->get('courses');?>
                    <select name="del_course" class="del_from_course form-control">
                    	<option value=""></option>
                    	<?php foreach($course_type->result() as $row){?>
                    	<option value="<?php echo $row->c_id;?>"><?php echo $row->courses;?></option>
                        <?php };?>
                    </select>
                </div>
                
            	<label style="padding-top: 20px;width: 100%"><small>Course Type Title</small></label>
                <div class="col-lg-10"  style="margin-left: -15px">
                    <select name="to_del_course_type" class="to_del_course_type form-control">
                    	<option value=""></option>
                    </select>
                </div>
                <button data-to-del="to_del_course_type" data-head="del_from_course" class="del_course_type btn btn-info pull-left"><i class="glyphicon glyphicon-remove"></i></button>
        	</div>      
        </div>
    </div>
    
    
            <div class="form-group">
                <a href="<?php echo base_url();?>admin/reservations"><button class="btn btn-large btn-success form-control">Proceed to Reservation List  <i class="glyphicon glyphicon-forward"></i></button>
                </a>
            </div>
</div>
<div class="col-md-5">
	<div class="panel panel-info">
    	<div class="panel-heading">Course Fee Settings</div>
            <div class="panel-body">
                <div class="form-group">
                	<label><small>Course Type Fee</small></label>
                    <input name="course_fee" type="text" placeholder="ex. 5000" class="course_fee form-control" required="required" />
                </div>
                
                <div class="form-group">
                	<label><small>Course Type Hours</small></label>
                    <input name="course_hour" type="text" placeholder="ex. 12" class="course_hour form-control" required="required" />
            	</div>
            
                <div class="form-group">
                    <label style="padding-top: 20px;width: 100%"><small>To Course type</small></label>
					<?php $course_type = $this->db->get('course_type');?>
                    <select name="to_course_type" class="to_course_type form-control">
                    	<option value=""></option>
                        <?php foreach($course_type->result() as $row){
							$this->db->where('c_id',$row->course_id);
							$a = $this->db->get('courses');
							foreach($a->result() as $rey){
						?>
                        <option value="<?php echo $row->id;?>"><?php echo $row->course_type_title;?> - <?php echo $rey->courses;?></option>
                        <?php }};?>
                    </select>
                </div>
            
            <div class="form-group" style="border-bottom: 2px solid #ccc;padding-bottom: 20px">
                <button data-course-fee="course_fee" data-course-hour="course_hour" data-to-course-type="to_course_type" class="add_course_fee btn btn-info form-control">
                	<i class="glyphicon glyphicon-plus"></i> Add
                </button>
           	</div>
            
            <div class="form-group">
                    <label style="padding-top: 20px;width: 100%"><small>From Course type</small></label>
					<?php $course_type = $this->db->get('course_type');?>
                    <select class="d_course_type form-control">
                    	<option value=""></option>
                        <?php foreach($course_type->result() as $row){
							$this->db->where('c_id',$row->course_id);
							$a = $this->db->get('courses');
							foreach($a->result() as $rey){
						?>
                        <option value="<?php echo $row->id;?>"><?php echo $row->course_type_title;?> - <?php echo $rey->courses;?></option>
                        <?php }};?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label style="padding-top: 20px;width: 100%"><small>Delete Fee</small></label>
                    <select name="to_d_course_fee" class="to_d_course_fee form-control">
                    	<option value=""></option>
                    </select>
                </div>
                
                <div class="form-group" style="border-bottom: 2px solid #ccc;padding-bottom: 20px">
                <button data-d-course-fee="to_d_course_fee" data-from-course-type="d_course_type" class="del_course_fee btn btn-danger form-control">
                	<i class="glyphicon glyphicon-remove"></i> Delete
                </button>
           	</div>
            
            <div class="form-group">
            	<label><small>Add Branch Location</small></label>
                <div class="col-lg-10"  style="margin-left: -15px">
                    <textarea name="branch" class="new_branch form-control"></textarea>
                </div>
                <button data-from="new_branch" class="add_branch btn btn-info pull-left"><i class="glyphicon glyphicon-plus"></i></button>
        	</div>
            
        	<div class="form-group">
            	<label style="padding-top: 20px;width: 100%"><small>Delete Branch Location</small></label>
                <div class="col-lg-10"  style="margin-left: -15px">
                	<?php 
						$this->db->order_by('branch','ASC');
						$course_type = $this->db->get('branches');
					?>
                    <select name="del_branch" class="del_branch form-control">
                    	<option value=""></option>
                    	<?php foreach($course_type->result() as $row){?>
                    	<option value="<?php echo $row->b_id;?>"><?php echo $row->branch;?></option>
                        <?php };?>
                    </select>
                </div>
                <button class="delete_branch btn btn-info pull-left"><i style="color: #930" class="glyphicon glyphicon-remove"></i></button>
        	</div>
        </div>
    </div>
    
</div>