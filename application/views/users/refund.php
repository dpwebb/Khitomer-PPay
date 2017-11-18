<!-- BEGIN CONTENT -->
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Transaction Refund Form</h1>
      </div>
      <!-- END PAGE TITLE --> 
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('admin/users');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">Refund Request</span> </li>
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
                  <div class="caption caption-md"> <i class="fa fa-exchange"></i> <span class="caption-subject font-blue-madison bold uppercase">Refund Request</span> </div>
                  
                </div>
                <div class="portlet-body">
                 <?php if (validation_errors() != "") { ?>
                 	<div class="col-lg-12">
                      <div class="alert alert-danger">
                          <?php echo validation_errors(); ?>
                      </div>
                    </div>
                  <?php } ?>
                  <?php
                    if($this->session->flashdata('message')!=''){
                        echo '<div class="col-lg-12"><div class="alert alert-success"><p>'.$this->session->flashdata('message').'</p></div></div>';
                    }
                 ?>
                      <form role="form" action="<?php echo base_url('users/profile');?>" method="post">
                      <div class="m-heading-1 border-green m-bordered">
                          <h3>Transaction ID: <?php echo $transactionInfo->id;?></h3>
                          <h3>Transaction Billing Name: <?php echo $transactionInfo->billing_first_name.' '.$transactionInfo->billing_last_name;?></h3>
                          <h3>Transaction Amount: <?php echo $transactionInfo->currency.' '.$transactionInfo->amount;?></h3>
                          <h3>Transaction Date: <?php echo date('d F, Y', strtotime($transactionInfo->payment_date));?></h3>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group <?php if(form_error('refund_description') != "") echo 'has-error'; ?>">
                          <label class="control-label">Refund Description</label>
                          <textarea name="refund_description" class="form-control"><?php echo set_value('refund_description');?></textarea>
                          <span class="help-block"><?php echo form_error('refund_description'); ?></span>
                          </div>
                        </div>
                      </div>  
                      <div class="row">
                        <div class="margiv-top-10 col-lg-12">
                        	<input type="submit" name="submit" value="Request Refund" class="btn green" />
                        </div>
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