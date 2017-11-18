<?php $this->load->view('emails/common/header'); ?>

<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left">Dear <strong style="color:#464646;"><?php echo $first_name.' '.$last_name;?></strong>,</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left" style="background-color:#145881; color:#FFF; font-size: 12px; font-weight:bold; padding: 10px;">Account Approval</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left"><table width="100%">
    <tr>
      <td align="left" colspan="2"><p>Your account has been approved by Administration. Please go to <a href="<?php echo base_url('users/signin');?>">Login Page</a> and login to begin your processing. Thank you for choosing Khitomer Consultancy Limited.</p></td>
    </tr>
    
<?php $this->load->view('emails/common/footer'); ?>
