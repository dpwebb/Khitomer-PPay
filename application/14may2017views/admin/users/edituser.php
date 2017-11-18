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
      <li> <a href="<?php echo base_url('admin/users');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url('admin/users');?>">Users</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">Edit User</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12">
      <?php 
	  		$apiKey = getColumnValue('api_keys', 'key', 'user_id='.$userInfo->user_id);
	  ?>
      <div class="m-heading-1 border-green m-bordered">
          <h3>User Api Information</h3>
          <p> <strong>Merchant ID :</strong> <?php echo $userInfo->user_id;?></p>
          <p> <strong>Merchant Key :</strong> <?php if($apiKey==false) echo 'Api Key has not been generated for this user.'; else echo $apiKey;?></p>
          <p> <strong>Merchant Password :</strong> <?php if($apiKey!=false) echo $userInfo->password;?></p>
      </div>
      
      
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
          <div class="row">
            <div class="col-md-12">
              <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                  <div class="caption caption-md"> <i class="icon-globe theme-font hide"></i> <span class="caption-subject font-blue-madison bold uppercase">Edit User</span> </div>
                  
                </div>
                <div class="portlet-body">
                 <?php if (validation_errors() != "") { ?>
                 	<div class="col-lg-12">
                      <div class="alert alert-danger">
                          <?php echo validation_errors(); ?>
                      </div>
                    </div>
                  <?php } ?>
                      <form role="form" action="<?php echo base_url('admin/users/edituser/'.$userID);?>" method="post">
                      <div class="col-lg-6">
                      	<div class="form-group">
                          <label class="control-label">First Name</label>
                          <input name="first_name" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('first_name'); else echo $userInfo->first_name;?>">
                        </div>
                      	
                        <div class="form-group">
                          <label class="control-label">Company Name</label>
                          <input name="company_name" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('company_name'); else echo $userInfo->company_name;?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Mobile No.</label>
                          <input name="mobile_no" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('mobile_no'); else echo $userInfo->mobile_no;?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Password</label>
                          <input name="password" type="password" class="form-control" value="<?php echo set_value('password');?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="control-label">Last Name</label>
                          <input name="last_name" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('last_name'); else echo $userInfo->last_name;?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Job title</label>
                          <input name="job_title" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('job_title'); else echo $userInfo->job_title;?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Email</label>
                          <input name="email" type="email" class="form-control" value="<?php if(validation_errors()!='') echo set_value('email'); else echo $userInfo->email;?>" readonly="readonly">
                        </div>
                      </div>  
                        
                     
                        
                        
                        <div class="margiv-top-10 col-lg-12">
                        	<input type="submit" name="submit" value="Save Changes" class="btn green" />
                        </div>
                        <div class="clearfix"></div>
                      </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PROFILE CONTENT --> 
      </div>
    </div>
    <!-- END PAGE BASE CONTENT --> 
  </div>
  <!-- END CONTENT BODY --> 
</div>
<!-- END CONTENT -->