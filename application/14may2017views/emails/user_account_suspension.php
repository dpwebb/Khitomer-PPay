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
  <td align="left" style="background-color:#145881; color:#FFF; font-size: 12px; font-weight:bold; padding: 10px;">Account suspension</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left"><table width="100%">
    <tr>
      <td align="left" colspan="2"><p>Be advised that Administration has suspended your processing account. Please contact your Account manager to discuss the issues that have brought about this suspension. If we do not hear from you within the next 7 days your account will be closed and revert to the terminated account settlement procedure.</p></td>
    </tr>
    
<?php $this->load->view('emails/common/footer'); ?>
