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
      <li> <span class="active">Set Payment Processor</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <div class="m-heading-1 border-green m-bordered">
      <h3>Sort Order</h3>
      <p>Please set sorting order for each API for user, API will lowest sorting value will be used first when  user will perform transactions</p>
    </div>
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12"> 
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
          <div class="row">
            <div class="col-md-12">
              <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                  <div class="caption caption-md"> <i class="icon-globe theme-font hide"></i> <span class="caption-subject font-blue-madison bold uppercase">Payment Processor</span> </div>
                </div>
                <div class="portlet-body">
                  <?php if (validation_errors() != "") { ?>
                  <div class="col-lg-12">
                    <div class="alert alert-danger"> <?php echo validation_errors(); ?> </div>
                  </div>
                  <?php } ?>
                  <form role="form" action="<?php echo base_url('admin/users/paymentprocessor/'.$userID);?>" method="post">
                  <input type="hidden" name="userID" value="<?php echo $userID;?>" />
                    <?php $k=1; foreach($apiList as $row){?>
                    <?php
                    
					$sortOrder = getColumnValue('user_api_list', 'api_list_sort_order', 'api_list_user_id ='.$userID.' AND api_list_api_id='.$row->api_id.'');
					/*if($sortOrder==0)
						$sortOrder = '';
					elseif($sortOrder>0)
					else
						$sortOrder = $row->api_sort_order;*/
					?>
                    
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="control-label"><?php echo $row->api_name;?></label>
                        <input name="api_list_sort_order_<?php echo $k;?>" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('api_list_sort_order_'.$k); else echo $sortOrder;?>" />
                        <input type="hidden" name="api_list_api_id_<?php echo $k;?>" value="<?php echo $row->api_id;?>" />
                      </div>
                    </div>
                    <?php $k++;}?>
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