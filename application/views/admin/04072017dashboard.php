<!-- BEGIN CONTENT -->
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Admin Dashboard <small>statistics and reports</small> </h1>
      </div>
      <!-- END PAGE TITLE --> 
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('admin/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">Dashboard</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    
    <!-- BEGIN PAGE BASE CONTENT --> 
    
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo base_url('admin/users');?>">
        <div class="visual"> <i class="fa fa-user"></i> </div>
        <div class="details">
          <div class="number"> <span data-counter="counterup" data-value="<?php echo $totalUsers;?>">0</span> </div>
          <div class="desc"> Total Users </div>
        </div>
        </a> </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 red" href="#">
        <div class="visual"> <i class="fa fa-credit-card"></i> </div>
        <div class="details">
          <div class="number"> $ <span data-counter="counterup" data-value="<?php echo number_format($approvedBalance, 2);?>">0</span></div>
          <div class="desc"> Approved Transactions </div>
        </div>
        </a> </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 green" href="#">
        <div class="visual"> <i class="fa fa-credit-card"></i> </div>
        <div class="details">
          <div class="number"> $ <span data-counter="counterup" data-value="<?php echo number_format($pendingBalance, 2);?>">0</span></div>
          <div class="desc"> Pending Transactions </div>
        </div>
        </a> </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
        <div class="visual"> <i class="fa fa-credit-card"></i> </div>
        <div class="details">
          <div class="number"> $ <span data-counter="counterup" data-value="<?php echo number_format($declinedBalance, 2);?>">0</span></div>
          <div class="desc"> Declined Transactions </div>
        </div>
        </a> </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
        <div class="visual"> <i class="fa fa-gear"></i> </div>
        <div class="details">
          <div class="number"> <span data-counter="counterup" data-value="3">0</span> </div>
          <div class="desc"> Our APIS </div>
        </div>
        </a> </div>
      
    </div>
    <div class="clearfix"></div>
    <!-- END DASHBOARD STATS 1-->
    
  </div>
  <!-- END CONTENT BODY --> 
</div>
<!-- END CONTENT -->