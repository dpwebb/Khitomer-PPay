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
            <div class="caption"> <i class="fa fa-info"></i> <span class="caption-subject font-blue-hoki bold uppercase">Process Payment Information</span>
            </div>
          </div>
          <?php
		  	$countryList = array('GB'=>'United Kingdom', 'US'=>'United States', 'CA'=>'Canada');
			$clientIP 	= $_SERVER['REMOTE_ADDR'];
			$geoLoc		= unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$clientIP"));
			
			//getPrint($geoLoc);
			//echo $clientIP.'<br>';
			$displayform = false;
			if(array_key_exists($geoLoc['geoplugin_countryCode'], $countryList)){
				if($countryList[$geoLoc['geoplugin_countryCode']]==$geoLoc['geoplugin_countryName'])
					$displayform = true;
			}
			if($displayform==false){
				echo '<div class="alert alert-danger col-md-9 col-xs-offset-1"><p>You are passing an IP address that is not based in the United States, United Kingdom or Canada. Please enable your VPN in order to process your transactions.</p></div><div class="clearfix"></div>';
			}
	     ?>
          <div class="portlet-body form" <?php if($displayform==false) echo 'style="display:none"';?>> 
            <!-- BEGIN FORM-->
            <form action="<?php echo base_url('users/processpayment');?>" method="post" class="horizontal-form">
              <div class="form-body">
                <h3 class="form-section">Customer Information</h3>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_first_name') != "") echo 'has-error'; ?>">
                      <label class="control-label">First Name</label>
                      <input name="billing_first_name" id="billing_first_name" type="text" class="form-control" value="<?php echo set_value('billing_first_name');?>" placeholder="First Name">
                      <span class="help-block"><?php echo form_error('billing_first_name'); ?></span>
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_last_name') != "") echo 'has-error'; ?>">
                      <label class="control-label">Last Name</label>
                      <input name="billing_last_name" id="billing_last_name" type="text" class="form-control" value="<?php echo set_value('billing_last_name');?>" placeholder="Last Name">
                      <span class="help-block"><?php echo form_error('billing_last_name'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_email') != "") echo 'has-error'; ?>">
                      <label class="control-label">Email</label>
                      <input name="billing_email" id="billing_email" type="text" class="form-control" value="<?php echo set_value('billing_email');?>" placeholder="Email">
                      <span class="help-block"><?php echo form_error('billing_email'); ?></span>
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_phone_no') != "") echo 'has-error'; ?>">
                      <label class="control-label">Phone No.</label>
                      <input name="billing_phone_no" id="billing_phone_no" type="text" class="form-control" value="<?php echo set_value('billing_phone_no');?>" placeholder="+ countrycode xxxxx...">
          			 <span class="help-block"><?php echo form_error('billing_phone_no'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_address_1') != "") echo 'has-error'; ?>">
                      <label class="control-label">Address Line 1</label>
                      <input name="billing_address_1" id="billing_address_1" type="text" class="form-control" value="<?php echo set_value('billing_address_1');?>" placeholder="Address Line 1">
                      <span class="help-block"><?php echo form_error('billing_address_1'); ?></span>
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_address_2') != "") echo 'has-error'; ?>">
                      <label class="control-label">Address Line 2</label>
                      <input name="billing_address_2" id="billing_address_2" type="text" class="form-control" value="<?php echo set_value('billing_address_2');?>" placeholder="Address Line 2">
                      <span class="help-block"><?php echo form_error('billing_address_2'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_city_name') != "") echo 'has-error'; ?>">
                      <label class="control-label">City Name</label>
                      <input name="billing_city_name" id="billing_city_name" type="text" class="form-control" value="<?php echo set_value('billing_city_name');?>" placeholder="City Name">
                      <span class="help-block"><?php echo form_error('billing_city_name'); ?></span>
                     </div>
                  </div>
                  <!--/span-->
                  
                <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_state_id') != "") echo 'has-error'; ?>">
                      <label class="control-label">State</label>
                      <select class="form-control" name="billing_state_id" id="billin_state">
                        <option value="">Select State Name</option>
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
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_country_id') != "") echo 'has-error'; ?>">
                      <label class="control-label">Country</label>
                      <select class="form-control" name="billing_country_id" id="billin_country">
                        <option value="">Select Country Name</option>
						<?php foreach($country as $row){?>
                          <option value="<?php echo $row->country_id;?>" <?php if(validation_errors()!='') echo set_select('billing_country_id', $row->country_id); elseif($row->country_id==223) echo 'selected="selected"';?>><?php echo $row->name;?></option>
                        <?php }?>
                        </select>
                        <span class="help-block"><?php echo form_error('billing_country_id'); ?></span>
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('billing_zip_code') != "") echo 'has-error'; ?>">
                      <label class="control-label">Zip Code</label>
                      <input name="billing_zip_code" id="billing_zip_code" type="text" class="form-control" value="<?php echo set_value('billing_zip_code');?>" placeholder="Zip Code">
                      <span class="help-block"><?php echo form_error('billing_zip_code'); ?></span>
                  </div>
                  <!--/span--> 
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
                </div>
                <div class="row">
                	<div class="col-md-6">
                  	<div class="form-group <?php if(form_error('shipping_first_name') != "") echo 'has-error'; ?>">
                    <label class="control-label">Shipping First Name</label>
                    <input name="shipping_first_name" id="shipping_first_name" type="text" class="form-control" value="<?php echo set_value('shipping_first_name');?>" placeholder="Shipping First Name">
                    <span class="help-block"><?php echo form_error('shipping_first_name'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('shipping_last_name') != "") echo 'has-error'; ?>">
                      <label class="control-label">Shipping Last Name</label>
                      <input name="shipping_last_name" id="shipping_last_name" type="text" class="form-control" value="<?php echo set_value('shipping_last_name');?>" placeholder="Shipping Last Name">
                      <span class="help-block"><?php echo form_error('shipping_last_name'); ?></span>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('shipping_address_1') != "") echo 'has-error'; ?>">
                      <label class="control-label">Shipping Address Line 1</label>
                      <input name="shipping_address_1" id="shipping_address_1" type="text" class="form-control" value="<?php echo set_value('shipping_address_1');?>" placeholder="Shipping Address Line 1">
                      <span class="help-block"><?php echo form_error('shipping_address_1'); ?></span>
                     </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('shipping_address_2') != "") echo 'has-error'; ?>">
                      <label class="control-label">Shipping Address Line 2</label>
                      <input name="shipping_address_2" id="shipping_address_2" type="text" class="form-control" value="<?php echo set_value('shipping_address_2');?>" placeholder="Shipping Address Line 2">
                      <span class="help-block"><?php echo form_error('shipping_address_2'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('shipping_city_name') != "") echo 'has-error'; ?>">
                      <label class="control-label">Shipping City Name</label>
                      <input name="shipping_city_name" id="shipping_city_name" type="text" class="form-control" value="<?php echo set_value('shipping_city_name');?>" placeholder="Shipping City Name">
                    <span class="help-block"><?php echo form_error('shipping_city_name'); ?></span>								
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Shipping State</label>
                      <select class="form-control" name="shipping_state_id" id="shipping_state">
                        <option value="">Select State Name</option>
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
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Shipping Country</label>
                      <select class="form-control" name="shipping_country_id" id="shipping_country">
                        <option value="">Select Country Name</option>
						<?php foreach($country as $row){?>
                          <option value="<?php echo $row->country_id;?>" <?php if(validation_errors()!='') echo set_select('billing_country_id', $row->country_id); elseif($row->country_id==223) echo 'selected="selected"';?> ><?php echo $row->name;?></option>
                        <?php }?>
                        </select>
                        <span class="help-block"><?php echo form_error('shipping_country_id'); ?></span>
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('shipping_zip_code') != "") echo 'has-error'; ?>">
                      <label class="control-label">Shipping Zip Code</label>
                      <input name="shipping_zip_code" id="shipping_zip_code" type="text" class="form-control" value="<?php echo set_value('shipping_zip_code');?>" placeholder="Shipping Zip Code">
                      <span class="help-block"><?php echo form_error('shipping_zip_code'); ?></span>
                  </div>
                  <!--/span--> 
                </div>
                  <!--/span--> 
                </div>
                <h3 class="form-section">Payment Information</h3>
                <div class="row">
                  
                  <div class="col-md-3">
                  	<div class="form-group <?php if(form_error('currency') != "") echo 'has-error'; ?>">
                    <label class="control-label">Currency</label>
                    <select class="form-control" name="currency">
                      <option value="">Select Currency</option>
                      <?php foreach($currency as $row){?>
                        <option value="<?php echo $row->code;?>" <?php echo set_select('currency', $row->code);?>><?php echo $row->title;?></option>
                      <?php }?>
                      
                    </select>
                    <span class="help-block"><?php echo form_error('currency'); ?></span>
                    </div>
                    <input name="affiliate_customer_id" type="hidden" value="<?php echo @$this->session->userdata('affiliateID');?>">
                  </div>
                  
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('order_number') != "") echo 'has-error'; ?>">
                      <label class="control-label">Order Number</label>
                      <input name="order_number" type="text" class="form-control" value="<?php echo set_value('order_number');?>" placeholder="Order Number i.e 702894">
                      <span class="help-block"><?php echo form_error('order_number'); ?></span>
                  </div>
                  </div>
                  <div class="col-md-6">
                  	<div class="form-group <?php if(form_error('order_description') != "") echo 'has-error'; ?>">
                    <label class="control-label">Order Description</label>
          			<textarea name="order_description" class="form-control" placeholder="Order Description"><?php echo set_value('order_description');?></textarea>
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
                    <input name="cardnumber" type="text" class="form-control" value="<?php echo set_value('cardnumber');?>" placeholder="Ex. xxxxxxxxxxxxxxxx">
                    <span class="help-block"><?php echo form_error('cardnumber'); ?></span>
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-3">
                    <div class="form-group <?php if(form_error('expmonth') != "" || form_error('expyear') != "") echo 'has-error'; ?>">
                      <label class="control-label" style="display:block;">Expiry Date <?php echo $startingMonth = date('m');?></label>
                      <select class="form-control expmonth" name="expmonth">
                      <?php 
					  	 //$startingMonth = date('m');
                        for($month=01; $month<=12; $month++){ 
                            if ($month<10){
                                $monthVal = '0'.(int)$month;
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
                    <input name="cardCVV" type="text" class="form-control" value="<?php echo set_value('cardCVV');?>" placeholder="Ex.  xxx or xxxx">
                    <span class="help-block"><?php echo form_error('cardCVV'); ?></span>
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group <?php if(form_error('amount') != "") echo 'has-error'; ?>">
                      <label class="control-label">Amount</label>
                      <input name="amount" type="text" class="form-control" value="<?php echo set_value('amount');?>" placeholder="Ex. 100.50">
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