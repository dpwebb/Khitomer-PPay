<?php $this->load->view('emails/common/header'); ?>

<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left">Hello <strong style="color:#464646;">Admin</strong>,</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left" style="background-color:#145881; color:#FFF; font-size: 12px; font-weight:bold; padding: 10px;">Following user has verified his Email Address.</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="left"><table width="100%">
    <tr>
      <td align="left" width="15%"><b>First Name</b>:</td>
      <td align="left" width="80%"><?php echo $first_name;?></td>
    </tr>
    <tr>
      <td align="left" width="15%"><b>Last Name</b>:</td>
      <td align="left" width="80%"><?php echo $last_name;?></td>
    </tr>
    <tr>
      <td align="left" width="15%"><b>Company Name</b>:</td>
      <td align="left" width="80%"><?php echo $company_name;?></td>
    </tr>
    <tr>
      <td align="left" width="15%"><b>Job title</b>:</td>
      <td align="left" width="80%"><?php echo $job_title;?></td>
    </tr>
    <tr>
      <td align="left" width="15%"><b>Email</b>:</td>
      <td align="left" width="80%"><?php echo $email;?></td>
    </tr>
    <tr>
      <td align="left" width="15%"><b>Mobile No</b>:</td>
      <td align="left" width="80%"><?php echo $mobile_no;?></td>
    </tr>
    
<?php $this->load->view('emails/common/footer'); ?>
