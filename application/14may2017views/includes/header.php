<!-- BEGIN HEADER -->

<div class="page-header navbar navbar-fixed-top"> 
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner "> 
    <!-- BEGIN LOGO -->
    <div class="page-logo"> <a href="<?php echo base_url();?>"> <img src="<?php echo base_url();?>assets/layouts/layout4/img/logo-light.png" alt="logo" class="logo-default" /> </a>
      <div class="menu-toggler sidebar-toggler"> 
        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header --> 
      </div>
    </div>
    <!-- END LOGO --> 
    <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a> 
    <!-- END RESPONSIVE MENU TOGGLER --> 
    
    <!-- BEGIN PAGE TOP -->
    <div class="page-top"> 
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
          <li class="separator hide"> </li>
        
          <!-- BEGIN USER LOGIN DROPDOWN --> 
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          <li class="dropdown dropdown-user dropdown-dark"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('fullName');?> </span> 
            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used --> 
            <img alt="" class="img-circle" src="<?php echo base_url();?>assets/layouts/layout4/img/avatar.png" /> </a>
            <ul class="dropdown-menu dropdown-menu-default">
              <li> <a href="<?php echo base_url('users/profile');?>"> <i class="icon-user"></i> My Profile </a> </li>
              <li> <a href="<?php echo base_url('users/signout');?>"> <i class="icon-key"></i> Sign Out </a> </li>
            </ul>
          </li>
          <!-- END USER LOGIN DROPDOWN --> 
        </ul>
      </div>
      <!-- END TOP NAVIGATION MENU --> 
    </div>
    <!-- END PAGE TOP --> 
  </div>
  <!-- END HEADER INNER --> 
</div>
<!-- END HEADER --> 
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->