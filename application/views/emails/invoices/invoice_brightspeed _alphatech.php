<?php
	$symbol = getColumnValue('currency', 'symbol_left', $where="code='$currency'");
	$priceDisplay = $symbol.$amount;
	if($symbol==false){
		$symbol = getColumnValue('currency', 'symbol_right', $where="code='$currency'");
		$priceDisplay = $amount.$symbol;
	}
?>
<div style="width:600px; margin:0 auto; border:2px solid #145881;">
  <table style="font-family:Verdana,sans-serif; font-size:11px; color:#374953; width: 600px;" cellpadding="0" cellspacing="0">
    <tbody><tr>
      <td align="left" style="background-color:#FFFFFF; padding:10px 10px 10px 10px;" width="67%"><img src="<?php echo base_url('assets/pages/img/'.$emailLogo);?>" alt="Khitomer" height="90px"></td>
      <td align="left" style="background-color:#FFFFFF; padding:10px 10px 10px 0px;" width="33%"><p><strong>Transaction ID# <?php echo $transID;?></strong></p>
        <p><strong>Date: <?php echo date('M d, Y', strtotime($payment_date));?></strong></p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="98" colspan="2" align="left" style="background-color:#145881; color:#FFFFFF; font-size: 12px; padding: 10px;"><h3 style="text-align:center;"><strong>IMPORTANT!!<br>This is your receipt for the ACH eCheck Transaction you just completed with <?php echo $affiliateName;?>. This transaction will take money from your checking account in the amount of <?php echo $priceDisplay;?>. The "Pay To The Order OF:" for this check will read KCL AlphaTech - 1-800-968-7240.<br />
Thank you</strong></h3>
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
      <td align="left" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;" width="40%"><?php echo $paymentMethod;?></td>
    </tr>
    
    <tr>
      <td align="left" width="100%" style="padding:10px;" colspan="2"><p><strong>Payment Type:</strong> <?php echo $bankname?> / <?php echo $routingnumber?> / <?php echo $bankaccountnumber?></p></td>
    </tr>

    <tr>
      <td align="left" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;" width="60%">Item</td>
      <td align="left" style="background-color:#eeeeee; color:#434343; font-size: 12px; font-weight:bold; padding: 10px;" width="40%">Price</td>
    </tr>
    
    <tr>
      <td align="left" width="60%" style="padding:10px; border-bottom:1px solid #EEEEEE;"><p><?php if($order_description!='') echo $order_description;?></p></td>
      <td align="left" width="40%" style="padding:10px; border-bottom:1px solid #EEEEEE;">
      <p>
      
      <strong><?php if($priceDisplay!='') echo $priceDisplay;?></strong></p>
      </td>
    </tr>
    
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="2" style="background-color:#eeeeee; color:#434343; font-size: 12px; padding: 10px;"><p>AlphaTech LLC is a billing company that services your sales affiliate <?php echo $affiliateName;?>, and has taken this amount from your bank account on your authorization given to the Sales Person. If you have any issues with this transaction or the product or services you have purchased please call us immediately at 1-844-922-7436.</p></td>
    </tr>
    
    <tr>
      <td colspan="2"><table width="597" height="53" border="0">
        <tr>
          <td height="49" class="Bottom"><div align="center"><strong>Do you APPROVE this charge and agree to pay it as per your agreement with your Bank?</strong></div></td>
        </tr>
      </table>
        <table width="598" height="46" border="0">
          <tr>
          <td width="250" style="padding:10px; text-align:right;">
            <a href="<?php echo $respURL.'/rejected'?>" target="_blank"><img src="<?php echo base_url('assets/pages/img/rejected.jpg');?>" alt="Reject" height="55px"></a>
          </td>
          <td width="350" style="padding:10px; text-align:left;">
          	<a href="<?php echo $respURL.'/approved'?>" target="_blank"><img src="<?php echo base_url('assets/pages/img/approved.jpg');?>" alt="Approve" height="110px"></a>
          </td>	
         </tr>
        </table></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="footer" style="background-color:#145881; padding:10px; font-size:10px; color:#FFFFFF;">2017 &copy; AlphaTech LLC </td>
    </tr>
  </tbody></table>
</div>