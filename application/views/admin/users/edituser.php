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
          <p> <strong>Merchant Api ID :</strong> <?php echo $userInfo->user_id;?></p>
          <p> <strong>Merchant Key :</strong> <?php if($apiKey==false) echo 'Api Key has not been generated for this user.'; else echo $apiKey;?></p>
          <p> <strong>Merchant Password :</strong> <?php if($apiKey!=false) echo $userInfo->password;?></p>
          <p> <strong>Merchant Affiliate ID :</strong> <?php echo $userInfo->merchant_affiliate_id;?></p>
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
                          <input name="first_name" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('first_name'); else echo $userInfo->first_name;?>" tabindex="1">
                        </div>
                      	
                        <div class="form-group">
                          <label class="control-label">Company Name</label>
                          <input name="company_name" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('company_name'); else echo $userInfo->company_name;?>" tabindex="3">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Mobile No.</label>
                          <input name="mobile_no" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('mobile_no'); else echo $userInfo->mobile_no;?>" tabindex="5">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Password</label>
                          <input name="password" type="password" class="form-control" value="<?php echo set_value('password');?>" tabindex="7">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Merchant Affiliate ID</label>
                          <input name="merchant_affiliate_id" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('merchant_affiliate_id'); else echo $userInfo->merchant_affiliate_id;?>"  tabindex="9">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="control-label">Last Name</label>
                          <input name="last_name" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('last_name'); else echo $userInfo->last_name;?>" tabindex="2">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Job title</label>
                          <input name="job_title" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('job_title'); else echo $userInfo->job_title;?>" tabindex="4">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Email</label>
                          <input name="email" type="email" class="form-control" value="<?php if(validation_errors()!='') echo set_value('email'); else echo $userInfo->email;?>" tabindex="6">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Account Status</label>
                            <select class="form-control" name="user_account_status"  tabindex="8">
                              <option value="">Select Status</option>
                                <option value="ACTIVE" <?php if(validation_errors()!='') echo set_select('user_account_status', 'ACTIVE'); elseif($userInfo->user_account_status=='ACTIVE') echo 'selected="selected"';?>>ACTIVE</option>
                                <option value="DORMANT" <?php if(validation_errors()!='') echo set_select('user_account_status', 'DORMANT'); elseif($userInfo->user_account_status=='DORMANT') echo 'selected="selected"';?>>DORMANT</option>
                                <option value="TERMINATED" <?php if(validation_errors()!='') echo set_select('user_account_status', 'TERMINATED'); elseif($userInfo->user_account_status=='TERMINATED') echo 'selected="selected"';?>>TERMINATED</option>
                                <option value="ARCHIVED" <?php if(validation_errors()!='') echo set_select('user_account_status', 'ARCHIVED'); elseif($userInfo->user_account_status=='ARCHIVED') echo 'selected="selected"';?>>ARCHIVED</option>
                                <option value="CLOSED" <?php if(validation_errors()!='') echo set_select('user_account_status', 'CLOSED'); elseif($userInfo->user_account_status=='CLOSED') echo 'selected="selected"';?>>CLOSED</option>
                              
                            </select>
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label">Comments</label>
                        <textarea name="admin_comments" class="form-control" placeholder="Comments"><?php if(validation_errors()!='') echo set_value('admin_comments'); else echo $userInfo->admin_comments; ?></textarea>
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