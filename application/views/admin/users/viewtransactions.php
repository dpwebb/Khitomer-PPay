<style type="text/css">
.widget-thumb {
	padding:0px !important;
}
.widget-thumb .widget-thumb-heading {
	background: #e7ecf1;
    color: #8e9daa;
    font-size: 14px;
    font-weight: 700;
    margin: 0 0 10px;
    padding: 10px;
}
.widget-thumb .widget-thumb-body .widget-thumb-subtitle {
	color:#3e4f5e !important;
	font-size:14px !important;
}
.widget-thumb .widget-thumb-body .widget-thumb-body-stat {
	color:#8e9daa !important;
	font-size:18px !important;
}

.widget-thumb .widget-thumb-wrap {
	padding:0 20px 10px !important;
}
</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Users</h1>
      </div>
      <!-- END PAGE TITLE --> 
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('admin/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url('admin/users');?>">Users</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">Edit User</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    
    <!-- BEGIN PAGE BASE CONTENT --> 
    
    <div class="row">
      <div class="col-lg-12 col-xs-12 col-sm-12">
            <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                    <div class="caption">
                        <i class="icon-bubbles font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">Transactions Stats</span>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#portlet_alltime" data-toggle="tab" aria-expanded="true"> All Time </a>
                        </li>
                        <li class="">
                            <a href="#portlet_today" data-toggle="tab" aria-expanded="false"> Today </a>
                        </li>
                        <li class="">
                            <a href="#portlet_lastweek" data-toggle="tab" aria-expanded="false"> last Week </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_alltime">
                            <div class="row widget-row">
                            <h2 style="padding-bottom:10px; border-bottom:2px solid #e7ecf1; margin:10px 15px 20px;">Complete Transaction History</h2>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Approved</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'approved')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Completed</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'completed')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Success</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'success')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Ok</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'ok')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Cleared</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'cleared')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              
                          
                            
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Decline</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'decline')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Declined</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'declined')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Error</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'error')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Pending</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'pending')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Processing</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'processing')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Expired</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'expired')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Rejected</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'rejected')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Refunded</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'refunded')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Others</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getAllTimeTransactions($userID, 'others')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              
                              
                              
                            </div>	
                        </div>
                        <div class="tab-pane" id="portlet_today">
                            <div class="row widget-row">
                            <h2 style="padding-bottom:10px; border-bottom:2px solid #e7ecf1; margin:10px 15px 20px;">Today's Transaction History</h2>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Approved</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'approved')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Completed</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'completed')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Success</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'success')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Ok</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'ok')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Cleared</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'cleared')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              
                          
                            
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Decline</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'decline')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Declined</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'declined')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Error</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'error')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Pending</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'pending')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Processing</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'processing')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Expired</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'expired')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Rejected</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'rejected')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Refunded</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'refunded')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Others</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByToday($userID, 'others')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              
                              
                              
                            </div>
                        </div>
                        <div class="tab-pane" id="portlet_lastweek">
                            <div class="row widget-row">
                            <h2 style="padding-bottom:10px; border-bottom:2px solid #e7ecf1; margin:10px 15px 20px;">Last Week's Transaction History</h2>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Approved</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'approved')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Completed</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'completed')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Success</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'success')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Ok</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'ok')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Cleared</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'cleared')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              
                          
                            
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Decline</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'decline')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Declined</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'declined')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Error</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'error')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Pending</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'pending')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Processing</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'processing')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Expired</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'expired')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Rejected</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'rejected')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Refunded</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'refunded')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Others</h4>
                                  <?php
                                  	$approvedTrans = $this->users_model->getTransactionsByLastWeek($userID, 'others')
								  ?>
                                  <div class="widget-thumb-wrap"> 
                                    <div class="widget-thumb-body">
                                    	<span class="widget-thumb-subtitle">US Dollar (<i class="fa fa-usd" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceUSD'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Pound Sterling (<i class="fa fa-gbp" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceGBP'], 2);?></span>
                                        <span class="widget-thumb-subtitle">Euro (<i class="fa fa-eur" aria-hidden="true"></i>)</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?>"><?php echo number_format($approvedTrans['totalBalanceEUR'], 2);?></span>
                                        </div>
                                  </div>
                                </div>
                                <!-- END WIDGET THUMB --> 
                              </div>
                              
                              
                              
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- END CONTENT BODY --> 
</div>
<!-- END CONTENT -->