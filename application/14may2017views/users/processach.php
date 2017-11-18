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
        <h1>Process Payment</h1>
      </div>
      <!-- END PAGE TITLE --> 
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('users/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">Process Payment</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-info"></i> <span class="caption-subject font-blue-hoki bold uppercase">ACH Payment Information</span>
            </div>
          </div>
          <div class="portlet-body form"> 
            <!-- BEGIN FORM-->
            <form action="<?php echo base_url('users/processACH');?>" method="post" class="horizontal-form">
              <div class="form-body">
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
                    <div class="form-group <?php if(form_error('billing_country_id') != "") echo 'has-error'; ?>">
                      <label class="control-label">Country</label>
                      <select class="form-control" name="billing_country_id" id="billin_country">
                          <option value="223" <?php echo set_select('billing_country_id', 223);?>>United States</option>
                        </select>
                        <span class="help-block"><?php echo form_error('billing_country_id'); ?></span>
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_state_id') != "") echo 'has-error'; ?>">
                      <label class="control-label">State</label>
                      <select class="form-control" name="billing_state_id" id="billin_state">
                        <?php
                            if($billing_states->num_rows() >0){
                                foreach($billing_states->result() as $row){
                        ?>
                                <option value="<?php echo $row->state_id;?>" <?php echo set_select('billing_state_id', $row->state_id);?>><?php echo $row->name;?></option>
                        <?php } }?>
                      </select>
                      <span class="help-block"><?php echo form_error('billing_state_id'); ?></span>
                    </div>
                  </div>
                  <!--/span--> 
                </div>
                <!--/row-->
                
                <!--/row-->
                <h3 class="form-section">Shipping Information</h3>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-9">
                        <div class="mt-checkbox-inline">
                            <label class="mt-checkbox">
                                <input type="checkbox" name="Samebillingshipping" id="Samebillingshipping" value="1" <?php echo set_checkbox('Samebillingshipping', 1);?>> Same As Billing Address
                                <span></span>
                            </label>
                            
                        </div>
                    </div>
                </div>
                  <div class="col-md-6">
                  	<div class="form-group <?php if(form_error('shipping_first_name') != "") echo 'has-error'; ?>">
                    <label class="control-label">Shipping First Name</label>
                    <input name="shipping_first_name" id="shipping_first_name" type="text" class="form-control" value="<?php echo set_value('shipping_first_name');?>">
                    <span class="help-block"><?php echo form_error('shipping_first_name'); ?></span>
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('shipping_last_name') != "") echo 'has-error'; ?>">
                      <label class="control-label">Shipping Last Name</label>
                      <input name="shipping_last_name" id="shipping_last_name" type="text" class="form-control" value="<?php echo set_value('shipping_last_name');?>">
                      <span class="help-block"><?php echo form_error('shipping_last_name'); ?></span>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('shipping_address_1') != "") echo 'has-error'; ?>">
                      <label class="control-label">Shipping Address Line 1</label>
                      <input name="shipping_address_1" id="shipping_address_1" type="text" class="form-control" value="<?php echo set_value('shipping_address_1');?>">
                      <span class="help-block"><?php echo form_error('shipping_address_1'); ?></span>
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('shipping_address_2') != "") echo 'has-error'; ?>">
                      <label class="control-label">Shipping Address Line 2</label>
                      <input name="shipping_address_2" id="shipping_address_2" type="text" class="form-control" value="<?php echo set_value('shipping_address_2');?>">
                      <span class="help-block"><?php echo form_error('shipping_address_2'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('shipping_city_name') != "") echo 'has-error'; ?>">
                      <label class="control-label">Shipping City Name</label>
                      <input name="shipping_city_name" id="shipping_city_name" type="text" class="form-control" value="<?php echo set_value('shipping_city_name');?>">
                    <span class="help-block"><?php echo form_error('shipping_city_name'); ?></span>								
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('shipping_zip_code') != "") echo 'has-error'; ?>">
                      <label class="control-label">Shipping Zip Code</label>
                      <input name="shipping_zip_code" id="shipping_zip_code" type="text" class="form-control" value="<?php echo set_value('shipping_zip_code');?>">
                      <span class="help-block"><?php echo form_error('shipping_zip_code'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Shipping Country</label>
                      <select class="form-control" name="shipping_country_id" id="shipping_country">
						<option value="223" <?php echo set_select('billing_country_id', 223);?>>United States</option>
                        </select>
                        <span class="help-block"><?php echo form_error('shipping_country_id'); ?></span>
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Shipping State</label>
                      <select class="form-control" name="shipping_state_id" id="shipping_state">
                        <?php
                            if($shipping_states->num_rows() >0){
                                foreach($shipping_states->result() as $row){
                        ?>
                                <option value="<?php echo $row->state_id;?>" <?php echo set_select('billing_state_id', $row->state_id);?>><?php echo $row->name;?></option>
                        <?php } }?>
                      </select>
                      <span class="help-block"><?php echo form_error('shipping_state_id'); ?></span>
                    </div>
                  </div>
                  <!--/span--> 
                </div>
                <h3 class="form-section">Payment Information</h3>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('affiliate_customer_id') != "") echo 'has-error'; ?>">
                      <label class="control-label">Affiliate Reference Customer ID</label>
                      <input name="affiliate_customer_id" type="text" class="form-control" value="<?php echo set_value('affiliate_customer_id');?>">
                      <span class="help-block"><?php echo form_error('affiliate_customer_id'); ?></span>
                  </div>
                  </div>
                  
                  <div class="col-md-6">
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
                
                  <div class="col-md-6">
                  	<div class="form-group <?php if(form_error('bankname') != "") echo 'has-error'; ?>">
                    <label class="control-label">Bank  Name</label>
                    <input name="bankname" type="text" class="form-control" value="<?php echo set_value('bankname');?>">
                    <span class="help-block"><?php echo form_error('bankname'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                  	<div class="form-group <?php if(form_error('bankaddress') != "") echo 'has-error'; ?>">
                    <label class="control-label">Bank Address</label>
                    <input name="bankaddress" type="text" class="form-control" value="<?php echo set_value('bankaddress');?>">
                    <span class="help-block"><?php echo form_error('bankaddress'); ?></span>
                    </div>
                  </div>
                  
                  
                </div>
                <div class="row">
                  <div class="col-md-6">
                  	<div class="form-group <?php if(form_error('routingnumber') != "") echo 'has-error'; ?>">
                    <label class="control-label">Routing Number</label>
                    <input name="routingnumber" type="text" class="form-control" value="<?php echo set_value('routingnumber');?>">
                    <span class="help-block"><?php echo form_error('routingnumber'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                  	<div class="form-group <?php if(form_error('checknumber') != "") echo 'has-error'; ?>">
                    <label class="control-label">Check Number</label>
                    <input name="checknumber" type="text" class="form-control" value="<?php echo set_value('checknumber');?>">
                    <span class="help-block"><?php echo form_error('checknumber'); ?></span>
                    </div>
                  </div>
                </div>  
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('bankaccountnumber') != "") echo 'has-error'; ?>">
                      <label class="control-label">Bank Account Number</label>
                      <input name="bankaccountnumber" type="text" class="form-control" value="<?php echo set_value('bankaccountnumber');?>">
                      <span class="help-block"><?php echo form_error('amount'); ?></span>
                  </div>
                  </div>
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
                <button type="submit" class="btn blue"> <i class="fa fa-check"></i> Process ACH Payment</button>
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