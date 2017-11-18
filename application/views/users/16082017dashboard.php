<!-- BEGIN CONTENT -->
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1><?php echo $this->session->userdata('fullName');?> Dashboard <small>statistics and reports</small> </h1>
      </div>
      <!-- END PAGE TITLE --> 
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('users/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">Dashboard</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    
    <!-- BEGIN PAGE BASE CONTENT --> 
    
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo base_url('users/transactions');?>">
        <div class="visual"> <i class="fa fa-usd"></i> </div>
        <div class="details">
          <div class="number"> <span data-counter="counterup" data-value="<?php echo $totalUsers;?>">0</span> </div>
          <div class="desc"> Total Transactions Processed</div>
        </div>
        </a> </div>
      <?php /*?><div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo base_url('users/transactions');?>">
        <div class="visual"> <i class="fa fa-credit-card"></i> </div>
        <div class="details">
          <div class="number">  <span data-counter="counterup" data-value="<?php echo number_format($approvedBalance, 2);?>">0</span></div>
          <div class="desc"> Approved Transactions </div>
        </div>
        </a> </div>
      
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo base_url('users/transactions');?>">
        <div class="visual"> <i class="fa fa-credit-card"></i> </div>
        <div class="details">
          <div class="number">  <span data-counter="counterup" data-value="<?php echo number_format($pendingBalance, 2);?>">0</span></div>
          <div class="desc"> Pending Transactions </div>
        </div>
        </a> </div>
      
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo base_url('users/transactions');?>">
        <div class="visual"> <i class="fa fa-credit-card"></i> </div>
        <div class="details">
          <div class="number">  <span data-counter="counterup" data-value="<?php echo number_format($declinedBalance, 2);?>">0</span></div>
          <div class="desc"> Declined Transactions </div>
        </div>
        </a> </div><?php */?>
      
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
                            <h2 style="padding-bottom:10px; border-bottom:2px solid #e7ecf1; margin:10px 15px 20px;">Complete Transaction History (CC)</h2>
                              
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Completed</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('cc','completed')
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
                                  <h4 class="widget-thumb-heading">Accepted</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('cc','accepted')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('cc','refunded')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('cc','declined')
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
                             <div class="row widget-row">
                              <h2 style="padding-bottom:10px; border-bottom:2px solid #e7ecf1; margin:10px 15px 20px;">Complete Transaction History (ECHECK)</h2>
                           
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Completed</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('echeck','declined')
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
                                  <h4 class="widget-thumb-heading">Accepted</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('echeck','accepted')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('echeck','refunded')
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
                                  	$approvedTrans = $this->dashboard_model->getAllTimeTransactions('echeck','completed')
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
                            <h2 style="padding-bottom:10px; border-bottom:2px solid #e7ecf1; margin:10px 15px 20px;">Today's Transaction History (CC)</h2>
                              
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Completed</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('cc','completed')
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
                                  <h4 class="widget-thumb-heading">Accepted</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('cc','accepted')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('cc','refunded')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('cc','declined')
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
                             <div class="row widget-row">
                              <h2 style="padding-bottom:10px; border-bottom:2px solid #e7ecf1; margin:10px 15px 20px;">Today's Transaction History (ECHECK)</h2>
                           
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Completed</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('echeck','declined')
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
                                  <h4 class="widget-thumb-heading">Accepted</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('echeck','accepted')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('echeck','refunded')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByToday('echeck','completed')
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
                            <h2 style="padding-bottom:10px; border-bottom:2px solid #e7ecf1; margin:10px 15px 20px;">Last Week's Transaction History (CC)</h2>
                              
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Completed</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('cc','completed')
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
                                  <h4 class="widget-thumb-heading">Accepted</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('cc','accepted')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('cc','refunded')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('cc','declined')
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
                             <div class="row widget-row">
                              <h2 style="padding-bottom:10px; border-bottom:2px solid #e7ecf1; margin:10px 15px 20px;">Last Week's Transaction History (ECHECK)</h2>
                           
                              <div class="col-md-3"> 
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                  <h4 class="widget-thumb-heading">Completed</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('echeck','declined')
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
                                  <h4 class="widget-thumb-heading">Accepted</h4>
                                  <?php
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('echeck','accepted')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('echeck','refunded')
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
                                  	$approvedTrans = $this->dashboard_model->getTransactionsByLastWeek('echeck','completed')
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