<table style="font-family:Verdana,sans-serif; font-size:11px; color:#374953; width: 600px;" cellpadding="0" cellspacing="0">
    <tr>
      <td align="left" style="background-color:#FFFFFF; padding:10px 10px 10px 0px;" width="67%"><a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/pages/img/email-logo.jpg');?>" alt="<?php echo $site_name;?>" height="90px"/></a></td>
      <td align="left" style="background-color:#FFFFFF; padding:10px 10px 10px 0px;" width="33%"><p>Transaction ID# <?php echo $transID;?></p>
        <p>Date: <?php echo date('d-m-Y', strtotime($payment_date));?></p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left" style="background-color:#145881; color:#FFFFFF; font-size: 12px; font-weight:bold; padding: 10px;" colspan="2">This transaction was completed by our affiliate : <?php echo $affiliateName;?></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="2" style="padding:10px;">
      <p><strong>Sold To:</strong> <?php echo $billing_first_name.' '.$billing_last_name;?></p>
      <p><?php if($billing_address_2!='') echo $billing_address_1.', '.$billing_address_2; else echo $billing_address_1;?></p>
      <p>
      <?php echo $billing_city_name.', '.$billingState.', '.$billing_zip_code.', '.$billingCountry; ?></p>
      <p><?php echo $billing_phone_no;?></p>
      <p><?php echo $billing_email;?></p>
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    
    <tr>
      <td align="left" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;" width="60%">Payment Method</td>
      <td align="left" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;" width="40%">Check#</td>
    </tr>
    
    <tr>
      <td align="left" width="60%" style="padding:10px;"><p><strong>Payment Type:</strong> <?php echo $paymentMethod;?></p></td>
      <td align="left" width="40%" style="padding:10px;"><p><strong><?php if($bankaccountnumber!='') echo $bankaccountnumber;?></strong></p></td>
    </tr>

    <tr>
      <td align="left" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;" width="60%">Item</td>
      <td align="left" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;" width="40%">Price</td>
    </tr>
    
    <tr>
      <td align="left" width="60%" style="padding:10px; border-bottom:1px solid #EEEEEE;"><p><?php if($order_description!='') echo $order_description;?></p></td>
      <td align="left" width="40%" style="padding:10px; border-bottom:1px solid #EEEEEE;">
      <p>
      <?php
      		$symbol = getColumnValue('currency', 'symbol_left', $where="code='$currency'");
			$priceDisplay = $symbol.$amount;
		  	if($symbol==false){
		 		$symbol = getColumnValue('currency', 'symbol_right', $where="code='$currency'");
				$priceDisplay = $amount.$symbol;
			}
	  ?>
      <strong><?php if($priceDisplay!='') echo $priceDisplay;?></strong>
      </p></td>
    </tr>
    
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="2" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;"><p>
      <?php 
	  	if($transaction_type=='ach'){
			echo 'This amount was billed to your bank. You will see the description
'.$API_descriptor.' on your monthly Bank Statement. If you have any concerns or
comments regarding this transaction please contact us immediately at +18009871509';
		}elseif($transaction_type=='cc'){
			echo 'This amount was billed to your credit card. You will see the description
'.$API_descriptor.' on your monthly Credit Card Statement. If you have any concerns or
comments regarding this transaction please contact us immediately at +18009871509';
		}
	  ?>
      </p></td>
    </tr>
    
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    
    <tr>
      <td align="center" style="background-color:#145881; padding:10px; font-size:10px;" colspan="2"><a href="<?php echo base_url();?>" style="color:#FFFFFF; font-weight:bold; text-decoration:none;"><?php echo date('Y'); ?> &copy; <?php echo $site_name;?></a></td>
    </tr>
  </table>