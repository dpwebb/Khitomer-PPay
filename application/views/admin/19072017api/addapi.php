<style type="text/css">
.radio-list > label {
    display: inline;
    margin-left: 8px;
}
</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Our Apis</h1>
      </div>
      <!-- END PAGE TITLE --> 
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('admin/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url('admin/khitomerapi');?>">Our Apis</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">Add New Api</span> </li>
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
                  <div class="caption caption-md"> <i class="icon-globe theme-font hide"></i> <span class="caption-subject font-blue-madison bold uppercase">Add New Api</span> </div>
                  
                </div>
                <div class="portlet-body">
                 <?php if (validation_errors() != "") { ?>
                 	<div class="col-lg-12">
                      <div class="alert alert-danger">
                          <?php echo validation_errors(); ?>
                      </div>
                    </div>
                  <?php } ?>
                      <form role="form" action="<?php echo base_url('admin/khitomerapi/addapi/');?>" method="post">
                      <div class="col-lg-6">
                     	<div class="form-group">
                            <label class="control-label">Api Type</label>
                            <select class="form-control" name="api_type">
                              <option value="">Select Api Type</option>
                              <option value="cc" <?php echo set_select('api_type', 'cc');?>>Credit Card</option>                              <option value="ach" <?php echo set_select('api_type', 'ach');?>>ACH</option>
                            </select>
                        </div>
                      	<div class="form-group">
                          <label class="control-label">Api Name</label>
                          <input name="api_name" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('api_name');?>">
                        </div>
                      	
                        <div class="form-group">
                          <label class="control-label">Api Sandbox Url</label>
                          <input name="api_sandbox_url" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('api_sandbox_url');?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Api Sandbox User</label>
                          <input name="api_sandbox_user" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('api_sandbox_user');?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Api Sandbox Key</label>
                          <input name="api_sandbox_key" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('api_sandbox_key');?>">
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label">Sorting Order</label>
                          <input name="api_sort_order" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('api_sort_order');?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="control-label">Api Mode</label>
                          <div class="radio-list" style="margin-bottom:27px;">
                          <label><input type="radio" name="api_mode" value="sandbox" data-title="sandbox" <?php echo set_radio('api_mode', 'sandbox'); ?>> Sandbox </label>
                          <label><input type="radio" name="api_mode" value="live" data-title="live" <?php echo set_radio('api_mode', 'live'); ?>> Live </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Api Live Url</label>
                          <input name="api_live_url" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('api_live_url');?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Api Live User</label>
                          <input name="api_live_user" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('api_live_user');?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Api Live Key</label>
                          <input name="api_live_key" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('api_live_key');?>">
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label">Processor Response Code</label>
                          <input name="response_code" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('response_code');?>">
                        </div>
                        
                      </div>  
                        
                     
                        
                        
                        <div class="margiv-top-10 col-lg-12">
                        	<input type="submit" name="submit" value="Add New Api" class="btn green" />
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