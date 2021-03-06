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
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
          <div class="dashboard-stat blue">
              <div class="visual">
                  <i class="fa fa-user fa-icon-medium"></i>
              </div>
              <div class="details">
                  <div class="number"> <?php echo $totalUsers;?> </div>
                  <div class="desc"> Total Users </div>
              </div>
              <a class="more" href="<?php echo base_url('admin/users');?>"> View more
                  <i class="m-icon-swapright m-icon-white"></i>
              </a>
          </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="dashboard-stat red">
              <div class="visual">
                  <i class="fa fa-money"></i>
              </div>
              <div class="details">
                  <div class="number"> <?php echo $totalTransactions;?> </div>
                  <div class="desc"> Total Transactions </div>
              </div>
              <a class="more" href="<?php echo base_url('admin/transactions');?>"> View more
                  <i class="m-icon-swapright m-icon-white"></i>
              </a>
          </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="dashboard-stat green">
              <div class="visual">
                  <i class="fa fa-gear fa-icon-medium"></i>
              </div>
              <div class="details">
                  <div class="number"> <?php echo $totalApis;?> </div>
                  <div class="desc"> Our APIS </div>
              </div>
              <a class="more" href="<?php echo base_url('admin/khitomerapi');?>"> View more
                  <i class="m-icon-swapright m-icon-white"></i>
              </a>
          </div>
      </div>
  </div>
    
    <div class="clearfix"></div>
    <!-- END DASHBOARD STATS 1-->
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('approved')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('completed')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('success')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('ok')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('cleared')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('decline')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('declined')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('error')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('pending')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('processing')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('expired')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('rejected')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('refunded')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('others')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('approved')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('completed')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('success')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('ok')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('cleared')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('decline')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('declined')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('error')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('pending')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('processing')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('expired')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('rejected')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('refunded')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('others')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('approved')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('completed')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('success')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('ok')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('cleared')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('decline')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('declined')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('error')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('pending')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('processing')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('expired')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('rejected')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('refunded')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('others')
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