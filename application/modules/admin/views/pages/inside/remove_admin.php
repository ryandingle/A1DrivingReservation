<div class="container">
<h3>Admin List Page</h3>

<?php echo $error;?>
<div class="pagination">
	<?php echo $links;?>
    <li><a href="javascript:void(0)"><?php echo $new_users->num_rows();?> results found.</a></li>
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
        <td>Actions</td>
    </thead>
    <?php foreach($new_users->result() as $row){?>
    <tr <?php if($row->status == 'approve') echo 'style="background:#ddd"';?>>
    	<td><?php echo $row->fname.' '.$row->lname;?></td>
        <td><?php echo $row->email;?></td>
        <td><?php echo $row->gender;?></td>
        <td><?php echo $row->age;?></td>
        <td><?php echo $row->phone;?></td>
        <td><?php echo $row->mobile;?></td>
        <td><?php echo $row->address;?></td>
        <td>
        <?php 
			
			if($this->session->userdata('id') == $row->id)
			{
				echo 'Your Acount.';
			}
			elseif($this->session->userdata('id') == 20)
			{
				echo '<a href="'.base_url().'admin/remove_acount/'.$row->id.'"><button class="btn btn-default">Remove</button></td></a>';
			}
			else
			{
        		echo 'Not Allow';
			}
		?>
    </tr>
	<?php };?>
</table>

<div class="pagination">
	<?php echo $links;?>
    <li><a href="javascript:void(0)"><?php echo $new_users->num_rows();?> results found.</a></li>
</div>
</div>