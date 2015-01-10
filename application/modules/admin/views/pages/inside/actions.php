<div class="container col-md-4 col-md-offset-4" style="margin-top: 10%;margin-bottom: 5%">
	<div class="panel panel-info">
    	<div class="panel-heading">Actions</div>
        <div class="panel-body">
        	<ul class="list-group">
                <li class="list-group-item">
                    <i class="glyphicon glyphicon-list"></i>
                    <a href="<?php echo base_url();?>admin/reservations">Reservation List</a>
                </li>
                 <li class="list-group-item">
                    <i class="glyphicon glyphicon-cog"></i>
                    <a href="<?php echo base_url();?>admin/data_settings">Data Settings</a>
                </li>
                 <li class="list-group-item">
                    <i class="glyphicon glyphicon-user"></i>
                    <a href="<?php echo base_url();?>admin/acount">Acount Settings</a>
                </li>
                <?php if($this->session->userdata('id') == 20){
					echo '
						 <li class="list-group-item">
							<i class="glyphicon glyphicon-plus"></i>
							<a href="'.base_url().'admin/add_admin">Add Admin Acount</a>
						</li>
						<li class="list-group-item">
							<i class="glyphicon glyphicon-plus"></i>
							<a href="'.base_url().'admin/remove_admin">Remove Admin Acount</a>
						</li>';
				}else{
					echo '<li class="list-group-item">
							<i class="glyphicon glyphicon-list"></i>
							<a href="'.base_url().'admin/admin_list">Admin List</a>
						</li>';
				};?>
            </ul>
        </div>
    </div>
</div>