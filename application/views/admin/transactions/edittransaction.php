<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Transactions</h1>
      </div>
      <!-- END PAGE TITLE --> 
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('users/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url("admin/transactions/index/$orderBy/$sortOrder/$page");?>">Transactions</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">Edit Transaction</span> </li>

    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption">  <span class="caption-subject font-blue-hoki bold uppercase">Edit Transaction</span>
            </div>
          </div>
          <div class="portlet-body form"> 
            <!-- BEGIN FORM-->
            <?php if (validation_errors() != "") { ?>
                 	<div class="col-lg-8">
                      <div class="alert alert-danger">
                          <?php echo validation_errors(); ?>
                      </div>
                    </div>
                  <?php } ?>
            <form action="<?php echo base_url("admin/transactions/edittransaction/$orderBy/$sortOrder/$page/$transactionId");?>" method="post" class="horizontal-form">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Transaction Id</label>
                      <input name="transaction_id" type="text" class="form-control" value="<?php if(validation_errors()!='') echo set_value('transaction_id'); else echo $transactionInfo->transaction_id;?>">
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Transaction Status</label>
                      <select class="form-control" name="transaction_status">
                              <option value="">Select Transaction Status</option>
                              <option value="approved" <?php if(validation_errors()!='') echo set_select('transaction_status', 'approved'); elseif($transactionInfo->system_transaction_status=='approved') echo 'selected="selected"';?>>Approved</option>
                              <option value="decline" <?php if(validation_errors()!='') echo set_select('transaction_status', 'decline'); elseif($transactionInfo->system_transaction_status=='decline') echo 'selected="selected"';?>>Decline</option>
                             <option value="declined" <?php if(validation_errors()!='') echo set_select('transaction_status', 'declined'); elseif($transactionInfo->system_transaction_status=='declined') echo 'selected="selected"';?>>Declined</option>   
                                
                      <option value="error" <?php if(validation_errors()!='') echo set_select('transaction_status', 'error'); elseif($transactionInfo->system_transaction_status=='error') echo 'selected="selected"';?>>Error</option>
                      
                      <option value="ok" <?php if(validation_errors()!='') echo set_select('transaction_status', 'ok'); elseif($transactionInfo->system_transaction_status=='ok') echo 'selected="selected"';?>>Ok</option>
                      
                      <option value="pending" <?php if(validation_errors()!='') echo set_select('transaction_status', 'pending'); elseif($transactionInfo->system_transaction_status=='pending') echo 'selected="selected"';?>>Pending</option>
                      
                      <option value="completed" <?php if(validation_errors()!='') echo set_select('transaction_status', 'completed'); elseif($transactionInfo->system_transaction_status=='completed') echo 'selected="selected"';?>>Completed</option>
                      
                      <option value="rejected" <?php if(validation_errors()!='') echo set_select('transaction_status', 'rejected'); elseif($transactionInfo->system_transaction_status=='rejected') echo 'selected="selected"';?>>Rejected</option>
                      
                      <option value="success" <?php if(validation_errors()!='') echo set_select('transaction_status', 'success'); elseif($transactionInfo->system_transaction_status=='success') echo 'selected="selected"';?>>Success</option>
                      
                      <option value="processing" <?php if(validation_errors()!='') echo set_select('transaction_status', 'processing'); elseif($transactionInfo->system_transaction_status=='processing') echo 'selected="selected"';?>>Processing</option>
                      
                      <option value="cleared" <?php if(validation_errors()!='') echo set_select('transaction_status', 'cleared'); elseif($transactionInfo->system_transaction_status=='cleared') echo 'selected="selected"';?>>Cleared</option>
                      <option value="expired" <?php if(validation_errors()!='') echo set_select('transaction_status', 'expired'); elseif($transactionInfo->system_transaction_status=='expired') echo 'selected="selected"';?>>Expired</option>
                      
                      <option value="refunded" <?php if(validation_errors()!='') echo set_select('transaction_status', 'refunded'); elseif($transactionInfo->system_transaction_status=='refunded') echo 'selected="selected"';?>>Refunded</option>
                              
                            </select>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <div class="row">
                	<div class="col-md-12">
                    <div class="form-group">
                    <label class="control-label">Transaction Message</label>
          			<textarea name="transaction_msg" class="form-control" placeholder="Transaction Message"><?php if(validation_errors()!='') echo set_value('transaction_msg'); else echo $transactionInfo->transaction_msg;?></textarea>
                    </div>
                    </div>
                </div>
              </div>
              <div class="form-actions right">
                <button type="submit" class="btn blue"> <i class="fa fa-check"></i> Update Transaction</button>
              </div>
            </form>
            <!-- END FORM--> 
          </div>
        </div>
      </div>
    </div>
    <!-- END PAGE BASE CONTENT --> 
  </div>
  <!-- END CONTENT BODY --> 
</div>
<!-- END CONTENT -->