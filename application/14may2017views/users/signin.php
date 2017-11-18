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
    <h3 class="form-title font-green">Sign In</h3>
    <?php
	if($this->session->flashdata('message')!=''){
			echo '<div class="alert alert-success"><p>'.$this->session->flashdata('message').'</p></div>';
		}
	?>
	<?php if (validation_errors() != "") { ?>
		<div class="alert alert-danger">
			<?php echo validation_errors(); ?>
		</div>
	<?php } ?>
    
    <div class="form-group"> 
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Email</label>
      <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" value="<?php echo set_value('email');?>"/>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" value="<?php echo set_value('password');?>"/>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn green uppercase">Signin</button>
      
      <a href="<?php echo base_url('users/forgetpassword');?>" id="forget-password" class="forget-password">Forgot Password?</a> </div>
    
    <div class="create-account">
      <p> <a href="<?php echo base_url('users/signup');?>" id="register-btn" class="uppercase">Create an account</a> </p>
    </div>
  </form>
  <!-- END LOGIN FORM --> 

</div>

<?php $this->load->view('users/javascript');?>
</body>
</html>