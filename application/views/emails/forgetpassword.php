<?php $this->load->view('emails/common/header'); ?>

<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left">Hello <strong style="color:#464646;"><?php echo $userDetail->first_name.' '.$userDetail->last_name;?></strong>,</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left" style="background-color:#145881; color:#FFF; font-size: 12px; font-weight:bold; padding: 10px;">Please reset your password by clicking on link given below.</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left"><table width="100%">
    <tr>
      <td align="left" colspan="2"><p><a href="<?php echo $passwordLink?>" target="_blank">Click here to change password.</a></p></td>
    </tr>
<?php $this->load->view('emails/common/footer'); ?>
