<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper"> 
  <!-- BEGIN SIDEBAR --> 
  <div class="page-sidebar navbar-collapse collapse"> 
    <!-- BEGIN SIDEBAR MENU --> 
    <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
    <?php if($this->session->userdata('userType')=='admin'){?>
      <li class="nav-item <?php if($activeClass=='dashboard') echo 'active';?>"> <a href="<?php echo base_url('admin/dashboard');?>" class="nav-link"> <i class="icon-home"></i> <span class="title">Dashboard</span></a></li>
      
     <li class="nav-item  <?php if($activeClass=='users') echo 'active';?>"> <a href="<?php echo base_url('admin/users');?>" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">Users</span></a>
      </li>
      
     <li class="nav-item <?php if($activeClass=='transactions') echo 'active';?>"> <a href="<?php echo base_url('admin/transactions');?>" class="nav-link"> <i class="icon-credit-card"></i> <span class="title">Transactions</span></a></li>
     
     <li class="nav-item <?php if($activeClass=='api') echo 'active';?>"> <a href="<?php echo base_url('admin/khitomerapi');?>" class="nav-link"> <i class="icon-settings"></i> <span class="title">Our APIS</span></a>
      </li>
      
      <li class="nav-item <?php if($activeClass=='virtualterminal') echo 'active';?>"> <a href="<?php echo base_url('admin/virtualterminal');?>" class="nav-link"> <i class="icon-settings"></i> <span class="title">API Test Terminal</span></a>
      </li>
      
   <?php }else{?>
    <li class="nav-item <?php if($activeClass=='dashboard') echo 'active';?>"> <a href="<?php echo base_url('users/dashboard');?>" class="nav-link"> <i class="icon-home"></i> <span class="title">Dashboard</span></a></li>
    <li class="nav-item <?php if($activeClass=='processpayment') echo 'active';?>"> <a href="<?php echo base_url('users/processpayment');?>" class="nav-link"> <i class="icon-credit-card"></i> <span class="title">Process Payment</span></a></li>
     <li class="nav-item <?php if($activeClass=='processach') echo 'active';?>"> <a href="<?php echo base_url('users/processACH');?>" class="nav-link"> <i class="icon-credit-card"></i> <span class="title">Process ACH Payments</span></a></li>
    <li class="nav-item <?php if($activeClass=='transactions') echo 'active';?>"> <a href="<?php echo base_url('users/transactions');?>" class="nav-link"> <i class="icon-credit-card"></i> <span class="title">Transactions</span></a></li>
   <?php }?>   
      <li class="nav-item <?php if($activeClass=='profile') echo 'active';?>"> <a href="<?php echo base_url('users/profile');?>" class="nav-link"> <i class="icon-user"></i> <span class="title">My Profile</span></a></li>
      <li class="nav-item  "> <a href="<?php echo base_url('users/signout');?>" class="nav-link"> <i class="icon-key"></i> <span class="title">Signout</span></a></li>
    </ul>
    <!-- END SIDEBAR MENU --> 
  </div>
  <!-- END SIDEBAR --> 
</div>
<!-- END SIDEBAR -->