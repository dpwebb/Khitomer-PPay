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
  <form class="changepaswd-form" action="<?php echo base_url('users/changepassword/'.$passwordToken);?>" method="post">
    <h3 class="form-title font-green">Change Password</h3>
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
      <label class="control-label visible-ie8 visible-ie9">New Password</label>
      <input class="form-control form-control-solid placeholder-no-fix new-password" type="password" autocomplete="off" placeholder="New Password" name="password" value="<?php echo set_value('password');?>"/>
    </div>
    <div class="form-group"> 
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
      <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" name="confirmpassword" value="<?php echo set_value('confirmpassword');?>"/>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn green uppercase">Submit</button>
      
      <a href="<?php echo base_url('users/signin');?>" id="forget-password" class="btn green btn-outline forget-password">Signin</a> </div>
    
    <div class="create-account">
      <p> <a href="<?php echo base_url('users/signup');?>" id="register-btn" class="uppercase">Create an account</a> </p>
    </div>
  </form>
  <!-- END LOGIN FORM --> 

</div>

<?php $this->load->view('users/javascript');?>
</body>
</html>