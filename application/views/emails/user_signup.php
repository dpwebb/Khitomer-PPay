<?php $this->load->view('emails/common/header'); ?>

<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left">Hello <strong style="color:#464646;"><?php echo $first_name.' '.$last_name;?></strong>,</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left" style="background-color:#145881; color:#FFF; font-size: 12px; font-weight:bold; padding: 10px;">Thanks for signing up at <?php echo $site_name;?>.</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left"><table width="100%">
    <tr>
      <td align="left" colspan="2"><p>Welcome to Khitomer! Thanks so much for joining us. You're on your way to super-productivity and beyond!</p></td>
    </tr>
    <tr>
      <td align="left" colspan="2"><p>Please click on link below to verify your details<br />
<a href="<?php echo $verificationLink;?>">Verify Your Email Address</a></p></td>
    </tr>
<?php $this->load->view('emails/common/footer'); ?>
