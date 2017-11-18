<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
<?php $this->load->view('users/head');?>

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo"> <a href="<?php echo base_url();?>"> <img src="<?php echo base_url();?>assets/pages/img/logo.png" alt="" /> </a> </div>
<!-- END LOGO --> 
<!-- BEGIN LOGIN -->
<div class="content"> 
  <!-- BEGIN LOGIN FORM -->
  <form class="login-form" action="<?php echo base_url('users/signin');?>" method="post">
    <h3 class="form-title font-green">Verification</h3>
    
    <div class="alert alert-success"><p style="font-size:16px;">Your details have been confirmed. Please wait for your account to be activated by Administration. If more information is required you will be sent an email to the address you have selected in your profile. If you have any questions please contact us at +1 905-267-3355.<br>
Thank you.</p>
    </div>    
    <div class="create-account">
      <p> <a href="<?php echo base_url('users/signup');?>" id="register-btn" class="uppercase">Create an account</a> </p>
    </div>
  </form>
  <!-- END LOGIN FORM --> 

</div>

<?php $this->load->view('users/javascript');?>
</body>
</html>