<!-- BEGIN CONTENT -->
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Users</h1>
      </div>
      <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('admin/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url('admin/users');?>">Users</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">All Users</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12"> 
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
          <div class="portlet-body">
            <div class="table-toolbar">
              <div class="row">
                <div class="col-md-6">
                  <div class="btn-group">
                    <a href="<?php echo base_url('admin/users/adduser');?>" class="btn sbold green">Add New User  <i class="fa fa-plus"></i></a>
                  </div>
                </div>
                
              </div>
            </div>
            <?php
				if($this->session->flashdata('message')!=''){
					echo '<div class="alert alert-success"><p>'.$this->session->flashdata('message').'</p></div>';
				}
			 ?>
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="tbl_users">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Job Title</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php 
				  if($usersListing->num_rows()>0){
					  foreach($usersListing->result() as $row){
			  ?>
				  <tr class="even gradeX">
					  <td><?php echo $row->company_name;?></td>
					  <td><?php echo $row->email?></td>
					  <td><?php echo $row->job_title?></td>
                      <td>
					  <?php if($row->verified_by_email==1){?>
						  <span class="label label-sm label-success">Verified</span>
					  <?php }else{?>
						  <span class="label label-sm label-danger">Not Verified</span>
					  <?php }?>
					  </td>
					  <td>
					  <?php if($row->status==1){?>
						  <a href="<?php echo base_url('admin/users/updatestatus/0/'.$row->user_id);?>"><span class="label label-sm label-success"> Block </span></a>
					  <?php }else{?>
						  <a href="<?php echo base_url('admin/users/updatestatus/1/'.$row->user_id);?>"><span class="label label-sm label-danger">Unbloack</span></a>
					  <?php }?>
					  </td>
					  <td><a href="<?php echo base_url('admin/users/edituser/'.$row->user_id);?>" class="btn btn-sm green btn-outline margin-bottom"><i class="fa fa-pencil"></i> Edit</a> <a href="<?php echo base_url('admin/users/paymentprocessor/'.$row->user_id);?>" class="btn btn-sm green btn-outline margin-bottom"><i class="fa fa-gear"></i> Set Payment Processor</a>
                      
                       <a href="<?php echo base_url('admin/users/processpayment/'.$row->user_id);?>" class="btn btn-sm green btn-outline margin-bottom"><i class="fa fa-credit-card"></i> Process Payment</a>
                       
                       <a href="<?php echo base_url('admin/users/generateApiKey/'.$row->user_id);?>" class="btn btn-sm green btn-outline margin-bottom"><i class="fa fa-key"></i> Generate Api Key</a>
                       
                      </td>
				  </tr>
			  <?php } }?>
                
              </tbody>
            </table>
          </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET--> 
      </div>
    </div>
    <!-- END PAGE BASE CONTENT --> 
  </div>
  <!-- END CONTENT BODY --> 
</div>
<!-- END CONTENT --> 
