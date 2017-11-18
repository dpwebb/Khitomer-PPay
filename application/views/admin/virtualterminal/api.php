<!-- BEGIN CONTENT -->
<style type="text/css">
.portlet-body .form-group .expmonth {
    width: 100px !important;
    float: left;
}
.portlet-body .form-group .expyear {
    width: 100px !important;
    float: left;
    margin-left: 8px;
}
</style>
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>API Test Terminal</h1>
      </div>
      <!-- END PAGE TITLE --> 
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('users/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">API Test Terminal</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption"><span class="caption-subject font-blue-hoki bold uppercase">API Test Terminal</span>
            </div>
          </div>
          <div class="portlet-body form"> 
          	<?php
				if($this->session->flashdata('message')!=''){
					echo '<div class="alert alert-success"><p>'.$this->session->flashdata('message').'</p></div>';
				}
			 ?>
            <!-- BEGIN FORM-->
            <form action="<?php echo base_url('admin/virtualterminal/index/');?>" method="post" class="horizontal-form">
              <div class="form-body">
              	<h3 class="form-section">API Credentials</h3>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label">Merchant ID</label>
                      <input name="merchantId" id="merchantId" type="password" class="form-control" value="<?php  echo $apiCredentials['merchantId'];?>" readonly="readonly">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label">Merchant Key</label>
                      <input name="merchantKey" id="merchantKey" type="password" class="form-control" value="<?php echo $apiCredentials['merchantKey'];?>" readonly="readonly">
                  </div>
                </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label">Merchant Password</label>
                      <input name="merchantPassword" id="merchantPassword" type="password" class="form-control" value="<?php echo $apiCredentials['merchantPassword'];?>" readonly="readonly">
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <h3 class="form-section">Customer Information</h3>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_first_name') != "") echo 'has-error'; ?>">
                      <label class="control-label">First Name</label>
                      <input name="billing_first_name" id="billing_first_name" type="text" class="form-control" value="<?php echo set_value('billing_first_name');?>">
                      <span class="help-block"><?php echo form_error('billing_first_name'); ?></span>
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_last_name') != "") echo 'has-error'; ?>">
                      <label class="control-label">Last Name</label>
                      <input name="billing_last_name" id="billing_last_name" type="text" class="form-control" value="<?php echo set_value('billing_last_name');?>">
                      <span class="help-block"><?php echo form_error('billing_last_name'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_email') != "") echo 'has-error'; ?>">
                      <label class="control-label">Email</label>
                      <input name="billing_email" id="billing_email" type="text" class="form-control" value="<?php echo set_value('billing_email');?>">
                      <span class="help-block"><?php echo form_error('billing_email'); ?></span>
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_phone_no') != "") echo 'has-error'; ?>">
                      <label class="control-label">Phone No.</label>
                      <input name="billing_phone_no" id="billing_phone_no" type="text" class="form-control" value="<?php echo set_value('billing_phone_no');?>">
          			 <span class="help-block"><?php echo form_error('billing_phone_no'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_address_1') != "") echo 'has-error'; ?>">
                      <label class="control-label">Address Line 1</label>
                      <input name="billing_address_1" id="billing_address_1" type="text" class="form-control" value="<?php echo set_value('billing_address_1');?>">
                      <span class="help-block"><?php echo form_error('billing_address_1'); ?></span>
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_address_2') != "") echo 'has-error'; ?>">
                      <label class="control-label">Address Line 2</label>
                      <input name="billing_address_2" id="billing_address_2" type="text" class="form-control" value="<?php echo set_value('billing_address_2');?>">
                      <span class="help-block"><?php echo form_error('billing_address_2'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_city_name') != "") echo 'has-error'; ?>">
                      <label class="control-label">City Name</label>
                      <input name="billing_city_name" id="billing_city_name" type="text" class="form-control" value="<?php echo set_value('billing_city_name');?>">
                      <span class="help-block"><?php echo form_error('billing_city_name'); ?></span>
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_zip_code') != "") echo 'has-error'; ?>">
                      <label class="control-label">Zip Code</label>
                      <input name="billing_zip_code" id="billing_zip_code" type="text" class="form-control" value="<?php echo set_value('billing_zip_code');?>">
                      <span class="help-block"><?php echo form_error('billing_zip_code'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_country') != "") echo 'has-error'; ?>">
                      <label class="control-label">Country</label>
                      <select class="form-control" name="billing_country" id="api_billing_country">
                        <option value="">Select Country Name</option>
						<?php foreach($country as $row){?>
                          <option value="<?php echo $row->country_id;?>" <?php echo set_select('billing_country', $row->country_id);?>><?php echo $row->name;?></option>
                        <?php }?>
                        </select>
                        <span class="help-block"><?php echo form_error('billing_country'); ?></span>
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_state') != "") echo 'has-error'; ?>">
                      <label class="control-label">State</label>
                      <select class="form-control" name="billing_state" id="api_billing_state">
                        <option value="">Select State Name</option>
                        <?php
                            if($billing_states->num_rows() >0){
                                foreach($billing_states->result() as $row){
                        ?>
                                <option value="<?php echo $row->state_id;?>" <?php echo set_select('billing_state', $row->state_id);?>><?php echo $row->name;?></option>
                        <?php } }?>
                      </select>
                      <span class="help-block"><?php echo form_error('billing_state'); ?></span>
                    </div>
                  </div>
                  <!--/span--> 
                </div>
                <!--/row-->

                <h3 class="form-section">Payment Information</h3>
                <div class="row">
                  <?php /*?><div class="col-md-6">
                  	<div class="form-group <?php if(validation_errors() != "") echo 'has-error'; ?>">
                    <label class="control-label">Type of Transaction</label>
                    <input name="transaction_type" type="text" class="form-control" value="<?php echo set_value('transaction_type');?>">
                    <span class="help-block"><?php echo form_error('transaction_type'); ?></span>
                    </div>
                  </div><?php */?>
                  <!--/span-->
                  <div class="col-md-5">
                    <div class="form-group <?php if(form_error('affiliate_customer_id') != "") echo 'has-error'; ?>">
                      <label class="control-label">Affiliate Reference Customer ID</label>
                      <input name="affiliate_customer_id" type="text" class="form-control" value="<?php echo set_value('affiliate_customer_id');?>">
                      <span class="help-block"><?php echo form_error('affiliate_customer_id'); ?></span>
                  </div>
                  </div>
                  <div class="col-md-3">
                  	<div class="form-group <?php if(form_error('currency') != "") echo 'has-error'; ?>">
                    <label class="control-label">Currency</label>
                    <select class="form-control" name="currency">
                      <option value="">Select Currency</option>
                      <?php foreach($currency as $row){?>
                        <option value="<?php echo $row->code;?>" <?php echo set_select('currency', $row->code);?>><?php echo $row->title;?></option>
                      <?php }?>
                      <?php /*?><option value="USD" <?php echo set_select('currency', 'USD');?>>USD</option>
                      <option value="GBP" <?php echo set_select('currency', 'GBP');?>>GBP</option>
                      <option value="EUR" <?php echo set_select('currency', 'EUR');?>>EUR</option><?php */?>
                    </select>
                    <span class="help-block"><?php echo form_error('currency'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group <?php if(form_error('order_number') != "") echo 'has-error'; ?>">
                      <label class="control-label">Order Number</label>
                      <input name="order_number" type="text" class="form-control" value="<?php echo set_value('order_number');?>">
                      <span class="help-block"><?php echo form_error('order_number'); ?></span>
                  </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                  	<div class="form-group <?php if(form_error('order_description') != "") echo 'has-error'; ?>">
                    <label class="control-label">Order Description</label>
          			<textarea name="order_description" class="form-control"><?php echo set_value('order_description');?></textarea>
          			<span class="help-block"><?php echo form_error('order_description'); ?></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group <?php if(form_error('card_type') != "") echo 'has-error'; ?>">
                      <label class="control-label" style="display:block;">Card Type</label>
                      <select class="form-control" name="card_type">
                      <option value="">Select Card Type</option>
                      <?php foreach($cards as $row){?>
                        <option value="<?php echo $row->short_code;?>" <?php echo set_select('card_type', $row->short_code);?>><?php echo $row->card_name;?></option>
                      <?php }?>
                      
                    </select>
                    <span class="help-block"><?php echo form_error('card_type'); ?></span>
                  </div>
                  </div>
                  <div class="col-md-6">
                  	<div class="form-group <?php if(form_error('cardnumber') != "") echo 'has-error'; ?>">
                    <label class="control-label">Card Number</label>
                    <input name="cardnumber" type="text" class="form-control" value="<?php echo set_value('cardnumber');?>">
                    <span class="help-block"><?php echo form_error('cardnumber'); ?></span>
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-3">
                    <div class="form-group <?php if(form_error('expmonth') != "" || form_error('expyear') != "") echo 'has-error'; ?>">
                      <label class="control-label" style="display:block;">Expiry Date</label>
                      <select class="form-control expmonth" name="expmonth">
                      <?php 
                        for($month=1; $month<=12; $month++){ 
                            if ($month<10){
                                $monthVal = '0'.$month;
                                echo '<option value="'.$monthVal.'" '.set_select('expmonth', $monthVal).'>'.$monthVal.'</option>';
                            }else
                                echo '<option value="'.$month.'" '.set_select('expmonth', $month).'>'.$month.'</option>';
                        }
                      ?>
                      </select>
                      <select class="form-control expyear" name="expyear">
                      <?php 
                        $startingYear = date('Y');
                        $endingYear   = $startingYear +20;
                        for($startingYear; $startingYear<=$endingYear; $startingYear++){ 
                            echo '<option value="'.$startingYear.'" '.set_select('expyear', $startingYear).'>'.$startingYear.'</option>';
                        }
                      ?>
                      </select>
                      <span class="help-block"><?php echo form_error('expmonth'); ?></span>
                      <span class="help-block"><?php echo form_error('expyear'); ?></span>
                  </div>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-md-6">
                  	<div class="form-group <?php if(form_error('cardCVV') != "") echo 'has-error'; ?>">
                    <label class="control-label">Security Code (CVC)</label>
                    <input name="cardCVV" type="text" class="form-control" value="<?php echo set_value('cardCVV');?>">
                    <span class="help-block"><?php echo form_error('cardCVV'); ?></span>
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('amount') != "") echo 'has-error'; ?>">
                      <label class="control-label">Amount</label>
                      <input name="amount" type="text" class="form-control" value="<?php echo set_value('amount');?>">
                      <span class="help-block"><?php echo form_error('amount'); ?></span>
                  </div>
                  </div>
                </div>
              </div>
              <div class="form-actions right">
                <button type="submit" class="btn blue"> <i class="fa fa-check"></i> Process Payment</button>
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
