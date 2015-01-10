<h3>Reservation List Page</h3>
<div class="col-md-4 col-md-offset-8">
	<form action="<?php echo base_url();?>admin/search">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-search"></span> 
                </div>       
                <input name="search" type="search" class="form-control" placeholder="Search keyword" autofocus="autofocus" />
            </div>
        </div>
   	</form>
</div>

<div class="pagination">
	<?php echo $links;?>
    <li><a href="javascript:void(0)"><?php echo $reservation_list->num_rows();?> results found.</a></li>
</div>

<table class="table table-bordered table-hover table-responsive" style="font-size: 12px">
	<thead style="font-weight: bold">
    	<td>Full Name</td>
        <td>Email</td>
        <td>Gender</td>
        <td>Age</td>
        <td>Phone</td>
        <td>Mobile</td>
        <td>Address</td>
        <td>Course</td>
        <td>Course Type</td>
        <td>Course Fee</td>
        <td>Branch</td>
        <td>Date Requested</td>
        <td>Status</td>
    </thead>
    <?php foreach($reservation_list->result() as $row){?>
    <tr <?php if($row->status == 'approve') echo 'style="background:#ddd"';?>>
    	<td><?php echo $row->r_fname.' '.$row->r_lname;?></td>
        <td><?php echo $row->r_email;?></td>
        <td><?php echo $row->r_gender;?></td>
        <td><?php echo $row->r_age;?></td>
        <td><?php echo $row->r_phone;?></td>
        <td><?php echo $row->r_mobile;?></td>
        <td><?php echo $row->r_address;?></td>
        <td><?php echo $row->r_course_type;?></td>
        <td><?php echo $row->r_course;?></td>
        <td><?php echo $row->course_fee;?></td>
        <td><?php echo $row->r_branch;?></td>
        <td><?php echo $row->r_date;?></td>
        <td class="<?php echo $row->r_user_id;?>">
        	<?php if($row->status == 'approve'){
				echo '<a href="'.base_url().'admin/remove/'.$row->r_user_id.'"><button type="button" data-id="'.$row->r_user_id.'" class="remove_button btn btn-default" title="Remove user">Remove</button></a>';
			}else{
				echo '<a href="'.base_url().'admin/approve/'.$row->r_user_id.'"><button type="button" data-id="'.$row->r_user_id.'" class="btn btn-default" title="confirm reservation request">Approve</button></a>';
			}
        	;?>
        </td>
    </tr>
	<?php };?>
</table>

<div class="pagination">
	<?php echo $links;?>
    <li><a href="javascript:void(0)"><?php echo $reservation_list->num_rows();?> results found.</a></li>
</div>