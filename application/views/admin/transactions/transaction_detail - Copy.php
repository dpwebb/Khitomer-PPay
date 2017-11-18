<div class="container content-box">
  <div class="row">
  <?php $this->load->view('includes/sidebar');?>
  <div class="col-sm-8 col-md-9 processpayment">
  	<div class="forms-box">
      <h2 class="forms-box-box-heading">Transaction Detail</h2>
      <div class="row">
      <h3 class="inner-headings">Customer Information</h3>
      </div>
      
      <table class="table table-striped">
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
      
      
      <div class="row">
      <h3 class="inner-headings">Shipping Information</h3>
      </div>
      
      <table class="table table-condensed table-hover">
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
      
      
      <div class="row">
      <h3 class="inner-headings">Payment Information</h3>
      </div>
      
      <table class="table table-striped">
      <tbody>
      <tr>
        <th width="30%">Type of Transaction</th>
        <td width="70%"><?php echo $transactionInfo->transaction_type;?></td>
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
      
      
      <div class="clearfix"></div>
      
  </div>
  </div>
  </div>
</div>
