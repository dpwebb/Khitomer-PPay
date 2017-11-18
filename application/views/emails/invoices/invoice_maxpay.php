<div style="width:600px; border:2px solid #145881;">
  <table style="font-family:Verdana,sans-serif; font-size:11px; color:#374953; width: 600px;" cellpadding="0" cellspacing="0">
    <tr>
      <td align="left" style="background-color:#FFFFFF; padding:10px 0px 10px 10px;" width="67%"><img src="<?php echo base_url('assets/pages/img/'.$emailLogo);?>" alt="PCSV" height="90px"/></td>
      <td align="left" style="background-color:#FFFFFF; padding:10px 10px 10px 0px;" width="33%"><p><strong>Transaction ID# <?php echo $transID;?></strong></p>
        <p><strong>Date: <?php echo date('d-m-Y', strtotime($payment_date));?></strong></p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="2" align="left" style="background-color:#145881; color:#FFFFFF; font-size: 12px; padding: 10px;"><h3 align="center"><strong>IMPORTANT!!<br>
        THIS IS AN INTERNATIONAL SETTLED TRANSACTION.<br> 
        Your bank  may contact you for authorization.</strong><br>
          This transaction will appear on your card statement as: <br /><span style="color:#FFFF00;">&quot;PCSV 18009869316&quot; </span><br>Please make note of this.</h3>
      </p></td>
      
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
      <td align="left" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;" width="40%">Credit Card #</td>
    </tr>
    
    <tr>
      <td align="left" width="60%" style="padding:10px;"><p><strong>Payment Type:</strong> <?php echo $paymentMethod;?></p></td>
      <td align="left" width="40%" style="padding:10px;"><p><strong><?php echo $card_number;?></strong></p></td>
    </tr>

    <tr>
      <td align="left" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;" width="60%">Item</td>
      <td align="left" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;" width="40%">Price</td>
    </tr>
    
    <tr>
      <td align="left" width="60%" style="padding:10px; border-bottom:1px solid #EEEEEE;"><p><?php if($order_description!='') echo $order_description;?></p></td>
      <td align="left" width="40%" style="padding:10px; border-bottom:1px solid #EEEEEE;">
      <?php
      		$symbol = getColumnValue('currency', 'symbol_left', $where="code='$currency'");
			$priceDisplay = $symbol.$amount;
		  	if($symbol==false){
		 		$symbol = getColumnValue('currency', 'symbol_right', $where="code='$currency'");
				$priceDisplay = $amount.$symbol;
			}
	  ?>
      <strong><?php if($priceDisplay!='') echo $priceDisplay;?></strong>
      </p>
      </td>
    </tr>
    
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="2" style="background-color:#eeeeee; color:#434343; font-size: 12px; padding: 10px;"><p>PCSV is a billing company that services your sales affiliate <strong><?php echo $affiliateName;?></strong>, and has taken this amount from your credit card on your authorization given to the Sales Person. If you have any issues with this transaction or the product or services you have purchased please call us immediately at +1 800 986 9316.</p></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><h3 style="text-align:center; margin:0 0 5px; width:90%; margin:0 auto; font-size:16px;">Do you APPROVE this charge and agree to pay it as per your agreement with your Bank?</h3></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">
      <table>
          <tr>
          <td width="250" style="padding:10px; text-align:right;"><a href="<?php echo $respURL.'/rejected'?>" target="_blank"><img src="<?php echo base_url('assets/pages/img/rejected.jpg');?>" alt="Reject" width="113" height="55" align="middle"></a></td>
            <td width="350" style="padding:10px; text-align:left;"><a href="<?php echo $respURL.'/approved'?>"><img src="<?php echo base_url('assets/pages/img/approved.jpg');?>" alt="Accept" width="225" height="107" align="middle"></a></td>
            
          </tr>
        </table>
        </td>
    </tr>
    
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    
    <tr>
      <td align="center" style="background-color:#145881; padding:10px; font-size:12px; color:#FFFFFF; font-weight:bold;" colspan="2"><?php echo date('Y'); ?> &copy; PCSV18009869316</td>
    </tr>
  </table>
</div>
