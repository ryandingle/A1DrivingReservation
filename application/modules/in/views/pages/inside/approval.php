<div class="container">
	<div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h2>Your reservation request has been sent.</h2>
        <h3>Please Check your Email for our response.</h3>
        <h3>Kindly keep your contact information lines open and we will assist you through a call.</h3>
    </div>
    <div>
        <h4>Your reservation request summary. <a href="<?php echo base_url();?>in/s_edit">Edit <i class="glyphicon glyphicon-pencil"></i></a></h4>
        <table class="table table-responsiv table-bordered">
            <thead style="font-weight: bold">
                    <td>Full Name</td>
                    <td>Email Address</td>
                    <td>Gender</td>
                    <td>Age</td>
                    <td>Course</td>
                    <td>Course Type</td>
                    <td>Branch</td>
                    <td>Mobile</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Course Fee</td>
                    <td>Requested Date</td>
                </h4>
            </thead>
            <?php 
                $this->db->where('r_email',$this->session->userdata('email'));
                $a = $this->db->get('reservations');
            ;?>
            <?php foreach($a->result() as $row){?>
            <?php };?>
          <tr>
                <td><?php echo $row->r_fname;?> <?php echo $row->r_lname;?></td>
                <td><?php echo $row->r_email;?></td>
                <td><?php echo $row->r_gender;?></td>
                <td><?php echo $row->r_age;?></td>
                <td><?php echo $row->r_course;?></td>
                <td><?php echo $row->r_course_type;?></td>
                <td><?php echo $row->r_branch;?></td>
                <td><?php echo $row->r_mobile;?></td>
                <td><?php echo $row->r_phone;?></td>
                <td><?php echo $row->r_address;?></td>
                <td><?php echo $row->course_fee;?></td>
                <td><?php echo $row->r_date;?></td>
                
          </tr>
        </table>
    </div>
</div>