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
      <li> <span class="active">Add New User</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12"> 
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
          <div class="row">
            <div class="col-md-12">
              <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                  <div class="caption caption-md"> <i class="icon-globe theme-font hide"></i> <span class="caption-subject font-blue-madison bold uppercase">Add New User</span> </div>
                  
                </div>
                <div class="portlet-body">
                 <?php if (validation_errors() != "") { ?>
                 	<div class="col-lg-12">
                      <div class="alert alert-danger">
                          <?php echo validation_errors(); ?>
                      </div>
                    </div>
                  <?php } ?>
                      <form role="form" action="<?php echo base_url('admin/users/adduser/');?>" method="post">
                      <div class="col-lg-6">
                      	<div class="form-group">
                          <label class="control-label">First Name</label>
                          <input name="first_name" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('first_name');?>">
                        </div>
                      	
                        <div class="form-group">
                          <label class="control-label">Company Name</label>
                          <input name="company_name" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('company_name');?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Mobile No.</label>
                          <input name="mobile_no" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('mobile_no');?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Password</label>
                          <input name="password" type="password" class="form-control" value="<?php echo set_value('password');?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="control-label">Last Name</label>
                          <input name="last_name" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('last_name');?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Job title</label>
                          <input name="job_title" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('job_title');?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Email</label>
                          <input name="email" type="email" class="form-control" value="<?php if(validation_errors()!='') echo set_value('email');?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Confirm Password</label>
                          <input name="confirmpassword" type="password" class="form-control" value="<?php echo set_value('confirmpassword');?>">
                        </div>
                      </div>  
                        
                     
                        
                        
                        <div class="margiv-top-10 col-lg-12">
                        	<input type="submit" name="submit" value="Add New User" class="btn green" />
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