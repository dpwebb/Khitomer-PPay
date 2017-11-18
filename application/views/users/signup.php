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
  <!-- BEGIN REGISTRATION FORM -->
  <form class="register-form" action="<?php echo base_url('users/signup');?>" method="post">
    <h3 class="font-green">Registration</h3>
    <?php
		if($this->session->flashdata('message')!=''){
			echo '<div class="alert alert-success"><p>'.$this->session->flashdata('message').'</p></div>';
		}
	?>
    <?php
		if($this->session->flashdata('error')!=''){
			echo '<div class="alert alert-warning"><p>'.$this->session->flashdata('error').'</p></div>';
		}
	?>
    <?php if (validation_errors() != "") { ?>
		<div class="alert alert-danger">
			<?php echo validation_errors(); ?>
		</div>
	<?php } ?>
    <p class="hint">Enter your personal details below:</p>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">First Name</label>
      <input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="first_name" value="<?php echo set_value('first_name');?>"/>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Last Name</label>
      <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="last_name" value="<?php echo set_value('last_name');?>"/>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Compnay Name</label>
      <input class="form-control placeholder-no-fix" type="text" placeholder="Compnay Name" name="company_name" value="<?php echo set_value('company_name');?>"/>
    </div>
    
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Job title</label>
      <input class="form-control placeholder-no-fix" type="text" placeholder="Job title" name="job_title" value="<?php echo set_value('job_title');?>"/>
    </div>
    
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Mobile No</label>
      <input class="form-control placeholder-no-fix" type="text" placeholder="Mobile No" name="mobile_no" value="<?php echo set_value('mobile_no', '+1');?>"/>
    </div>
    
    <p class="hint"> Enter your account details below: </p>
    <div class="form-group"> 
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Email</label>
      <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" value="<?php echo set_value('email');?>"/>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" value="<?php echo set_value('password');?>"/>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
      <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="confirmpassword" value="<?php echo set_value('confirmpassword');?>"/>
    </div>
    <div class="form-actions">
    <a href="<?php echo site_url('users/signin');?>" class="btn green btn-outline">Signin</a>
      <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
    </div>
  </form>
  <!-- END REGISTRATION FORM --> 
</div>

<?php $this->load->view('users/javascript');?>
</body>
</html>