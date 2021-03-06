<!-- BEGIN CONTENT -->
<style type="text/css">
.table > tbody > tr > td {
    border-top: 1px solid #e7ecf1 !important;
    line-height: 1.42857;
    padding: 8px;
    vertical-align: top;
}
</style>
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Transaction Detail</h1>
      </div>
      <!-- END PAGE TITLE --> 
      <!-- BEGIN PAGE TOOLBAR --> 
      
      <!-- END PAGE TOOLBAR --> 
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('users/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url('users/transactions');?>">Transactions</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">Transaction Detail</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- BEGIN PAGE BASE CONTENT -->
    
    <div class="row">
      <div class="col-md-6"> 
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-cogs"></i>Billing Information </div>
          </div>
          <div class="portlet-body">
            <div class="table-scrollable table-scrollable-borderless">
              <table class="table table-hover table-light">
                <tbody>
                  <tr>
                    <th width="30%">First Name</th>
                    <td width="70%"><?php echo $transactionInfo->billing_first_name;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Last Name</th>
                    <td width="70%"><?php echo $transactionInfo->billing_last_name;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Email</th>
                    <td width="70%"><?php echo $transactionInfo->billing_email;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Phone No.</th>
                    <td width="70%"><?php echo $transactionInfo->billing_phone_no;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Address 1</th>
                    <td width="70%"><?php echo $transactionInfo->billing_address_1;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Address 1</th>
                    <td width="70%"><?php echo $transactionInfo->billing_address_2;?></td>
                  </tr>
                  <tr>
                    <th width="30%">City Name</th>
                    <td width="70%"><?php echo $transactionInfo->billing_city_name;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Zip Code</th>
                    <td width="70%"><?php echo $transactionInfo->billing_zip_code;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Country Name</th>
                    <td width="70%"><?php echo getColumnValue('country', 'name', $where='country_id='.$transactionInfo->billing_country_id);?></td>
                  </tr>
                  <tr>
                    <th width="30%">State Name</th>
                    <td width="70%"><?php echo getColumnValue('states', 'name', $where='state_id='.$transactionInfo->billing_state_id);?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET--> 
      </div>
      <div class="col-md-6"> 
        <!-- BEGIN CONDENSED TABLE PORTLET-->
        <div class="portlet box red">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-cogs"></i>Shipping Information</div>
          </div>
          <div class="portlet-body">
            <div class="table-scrollable table-scrollable-borderless">
              <table class="table table-hover table-light">
                <tbody>
                  <tr>
                    <th width="30%">First Name</th>
                    <td width="70%"><?php echo $transactionInfo->shipping_first_name;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Last Name</th>
                    <td width="70%"><?php echo $transactionInfo->shipping_last_name;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Address 1</th>
                    <td width="70%"><?php echo $transactionInfo->shipping_address_1;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Address 1</th>
                    <td width="70%"><?php echo $transactionInfo->shipping_address_2;?></td>
                  </tr>
                  <tr>
                    <th width="30%">City Name</th>
                    <td width="70%"><?php echo $transactionInfo->shipping_city_name;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Zip Code</th>
                    <td width="70%"><?php echo $transactionInfo->shipping_zip_code;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Country Name</th>
                    <td width="70%"><?php echo getColumnValue('country', 'name', $where='country_id='.$transactionInfo->shipping_country_id);?></td>
                  </tr>
                  <tr>
                    <th width="30%">State Name</th>
                    <td width="70%"><?php echo getColumnValue('states', 'name', $where='state_id='.$transactionInfo->shipping_state_id);?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- END CONDENSED TABLE PORTLET--> 
      </div>
    </div>
    <div class="row">
      <div class="col-md-12"> 
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
          <div class="portlet-title">
            <div class="caption"> <i class="fa fa-credit-card"></i>Payment Information </div>
          </div>
          <div class="portlet-body">
            <div class="table-scrollable table-scrollable-borderless">
              <table class="table table-hover table-light">
                <tbody>
                  <tr>
                    <th width="30%">Transaction From</th>
                    <td width="70%"><?php echo getColumnValue('khitomer_api', 'api_name', 'api_id='.$transactionInfo->trans_api_id.'');?></td>
                  </tr>
                  <tr>
                    <th width="30%">Affiliate Reference Customer ID</th>
                    <td width="70%"><?php echo $transactionInfo->affiliate_customer_id;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Currency</th>
                    <td width="70%"><?php echo $transactionInfo->currency;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Order Number</th>
                    <td width="70%"><?php echo $transactionInfo->order_number;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Order Description</th>
                    <td width="70%"><?php echo $transactionInfo->order_description;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Card Number</th>
                    <td width="70%"><?php echo $transactionInfo->card_number;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Expiry Date</th>
                    <td width="70%"><?php echo $transactionInfo->expiry_date;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Security Code (CVC)</th>
                    <td width="70%"><?php echo $transactionInfo->security_code;?></td>
                  </tr>
                  <tr>
                    <th width="30%">Amount</th>
                    <td width="70%"><?php echo number_format($transactionInfo->amount,2);?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET--> 
      </div>
    </div>
    
    <!-- END PAGE BASE CONTENT --> 
  </div>
  <!-- END CONTENT BODY --> 
</div>
<!-- END CONTENT -->