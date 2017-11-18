<!-- BEGIN CONTENT -->

<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Transactions <small>complete reporting</small> </h1>
      </div>
      <!-- END PAGE TITLE -->  
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('users/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url('users/transactions');?>">Transactions</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">My Transactions</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12">
        
        <!-- Begin: Demo Datatable 1 -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
          <div class="portlet-title">
            <div class="caption"><span class="caption-subject font-dark sbold uppercase">My Transactions</span> </div>
            <div class="actions">
              
              <div class="btn-group"> <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown"> <i class="fa fa-share"></i> <span class="hidden-xs"> Tools </span> <i class="fa fa-angle-down"></i> </a>
                <ul class="dropdown-menu pull-right">
                  <li> <a href="<?php echo base_url('users/downloadReport/');?>"> Export to Excel </a> </li>
                </ul>
              </div>
            </div>
          </div>
          
          <?php
			if($this->session->flashdata('message')!=''){
				echo '<div class="alert alert-success col-md-9 col-xs-offset-1"><p>'.$this->session->flashdata('message').'</p></div>';
			}
	     ?>
          
          <div class="portlet-body">
            <div class="table-container">
              
              <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_userTrans">
                <thead>
                  <tr role="row" class="heading">
                    <th width="5%"> Amount</th>
                    <th width="15%"> Status </th>
                    <th width="30%"> Message</th>
                    <th width="15%"> Descriptor</th>
                    <th width="20%"> Date </th>
                    <th width="15%"> Actions </th>
                  </tr>
                  <tr role="row" class="filter">
                  	<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control form-filter input-sm" readonly name="trans_date_from" placeholder="From">
                        <span class="input-group-btn">
                        <button class="btn btn-sm default" type="button"> <i class="fa fa-calendar"></i> </button>
                        </span> </div>
                      <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control form-filter input-sm" readonly name="trans_date_to" placeholder="To">
                        <span class="input-group-btn">
                        <button class="btn btn-sm default" type="button"> <i class="fa fa-calendar"></i> </button>
                        </span> </div>
                    </td>
                    <td><div class="margin-bottom-5">
                        <button class="btn btn-sm green btn-outline filter-submit margin-bottom"> <i class="fa fa-search"></i> Search</button>
                      </div>
                      <button class="btn btn-sm red btn-outline filter-cancel"> <i class="fa fa-times"></i> Reset</button></td>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End: Demo Datatable 1 --> 
      </div>
    </div>
    <!-- END PAGE BASE CONTENT --> 
  </div>
  <!-- END CONTENT BODY --> 
</div>
<!-- END CONTENT -->