<style type="text/css">
.transaction-search .form-body {
	background:#f7f7f7;
	border:2px solid #eef1f5;
	margin-bottom:20px;
	padding:15px 15px !important;
}
.transaction-search .form-body .form-actions {
	border-top:2px solid #eef1f5;
	padding:8px 0px!important;
	margin-top:10px !important;
}
.transaction-search .form-body .form-actions .btn {
	min-width:120px;
	/*text-transform:uppercase !important;*/
}
.table-sorting thead .sorting_asc:after, .table-sorting thead .sorting_desc:after {
    position: absolute;
    bottom: 8px;
    right: 8px;
    display: block;
    font-family: 'Glyphicons Halflings';
    opacity: 0.5;
}
.table-sorting thead .sorting_asc:after {
    content: "\e155"
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
            <?php /*?><div class="actions">
              
              <div class="btn-group"> <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown"> <i class="fa fa-share"></i> <span class="hidden-xs"> Tools </span> <i class="fa fa-angle-down"></i> </a>
                <ul class="dropdown-menu pull-right">
                  <li> <a href="<?php echo base_url('users/downloadReport/');?>"> Export to Excel </a> </li>
                </ul>
              </div>
            </div><?php */?>
          </div>
          
          <?php
			if($this->session->flashdata('message')!=''){
				echo '<div class="alert alert-success col-md-9 col-xs-offset-1"><p>'.$this->session->flashdata('message').'</p></div>';
			}
	     ?>
          
          <div class="portlet-body">
          
          <form action="<?php echo base_url('users/transactions/'.$orderBy.'/'.$sortOrder.'/0');?>" method="post" class="horizontal-form transaction-search">
          <div class="form-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group ">
                <label class="control-label">From</label>
                <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                      <input type="text" name="trans_date_from" class="form-control" placeholder="From" value="<?php if($this->session->userdata('transDateFrom')!='') echo $this->session->userdata('transDateFrom');?>" readonly>
                      <span class="input-group-btn">
                          <button class="btn default" type="button">
                              <i class="fa fa-calendar"></i>
                          </button>
                      </span>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
                <div class="form-group ">
                  <label class="control-label">To</label>
                  <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                      <input type="text" name="trans_date_to" class="form-control" placeholder="To" value="<?php if($this->session->userdata('trans_date_to')!='') echo $this->session->userdata('trans_date_to');?>" readonly>
                      <span class="input-group-btn">
                          <button class="btn default" type="button">
                              <i class="fa fa-calendar"></i>
                          </button>
                      </span>
                  </div>
              </div>
              <!--/span--> 
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">First Name</label>
                  <input type="text" name="billing_first_name" class="form-control" placeholder="First Name" value="<?php if($this->session->userdata('billing_first_name')!='') echo $this->session->userdata('billing_first_name');?>">
              </div>
              <!--/span--> 
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Last Name</label>
                  <input type="text" name="billing_last_name" class="form-control" placeholder="Last Name" value="<?php if($this->session->userdata('billing_last_name')!='') echo $this->session->userdata('billing_last_name');?>">
              </div>
              <!--/span--> 
            </div>
          </div>
          <div class="row">
          <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Transaction Type</label>
                  <select class="form-control" name="trans_type">
                      <option value="" <?php if($this->session->userdata('trans_type')=='') echo 'selected="selected"';?>>Select Transaction Type</option>
                      <option value="cc" <?php if($this->session->userdata('trans_type')=='cc') echo 'selected="selected"';?>>Credit Card</option>
                      <option value="echeck" <?php if($this->session->userdata('trans_type')=='echeck') echo 'selected="selected"';?>>Check Payments </option>
                  </select>
              </div>
              <!--/span--> 
            </div>
          <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Transaction status</label>
                  <select class="form-control" name="trans_status">
                      <option value="" <?php if($this->session->userdata('trans_status')=='') echo 'selected="selected"';?>>Select Transaction Status</option>
                      <option value="approved" <?php if($this->session->userdata('trans_status')=='approved') echo 'selected="selected"';?>>approved</option>
                      <option value="accepted" <?php if($this->session->userdata('trans_status')=='accepted') echo 'selected="selected"';?>>Accepted</option>
                      <option value="decline" <?php if($this->session->userdata('trans_status')=='decline') echo 'selected="selected"';?>>decline</option>
                      <option value="declined" <?php if($this->session->userdata('trans_status')=='declined') echo 'selected="selected"';?>>declined</option>
                      <option value="error" <?php if($this->session->userdata('trans_status')=='error') echo 'selected="selected"';?>>error</option>
                      <option value="ok" <?php if($this->session->userdata('trans_status')=='ok') echo 'selected="selected"';?>>ok</option>
                      <option value="pending" <?php if($this->session->userdata('trans_status')=='pending') echo 'selected="selected"';?>>pending</option>
                      <option value="success" <?php if($this->session->userdata('trans_status')=='success') echo 'selected="selected"';?>>success</option>
                      <option value="completed" <?php if($this->session->userdata('trans_status')=='completed') echo 'selected="selected"';?>>completed</option>
                      <option value="rejected" <?php if($this->session->userdata('trans_status')=='rejected') echo 'selected="selected"';?>>Rejected</option>
                      <option value="refused" <?php if($this->session->userdata('trans_status')=='refused') echo 'selected="selected"';?>>Refused</option>
                      <option value="processing" <?php if($this->session->userdata('trans_status')=='processing') echo 'selected="selected"';?>>Processing</option>
                      <option value="cleared" <?php if($this->session->userdata('trans_status')=='cleared') echo 'selected="selected"';?>>Cleared</option>
                      <option value="expired" <?php if($this->session->userdata('trans_status')=='expired') echo 'selected="selected"';?>>Expired</option>
                      <option value="refunded" <?php if($this->session->userdata('trans_status')=='refunded') echo 'selected="selected"';?>>Refunded</option>
                      <option value="Others" <?php if($this->session->userdata('trans_status')=='Others') echo 'selected="selected"';?>>Others</option>
                  </select>
              </div>
              <!--/span--> 
            </div>
          </div>
          <div class="form-actions">
              <button type="submit" class="btn blue" name="filter" value="filter">Filter</button>
              <button type="submit" class="btn green" name="excel" value="excel">Export to Excel</button>
              <button type="submit" class="btn blue" name="clear" value="clear">Clear Filter</button>
          </div>
          </div>
          </form>
          
          <?php
				$custormerSortOrder			= 'asc';
				$amountSortOrder			= 'asc';
				$transactionDateSortOrder	= 'asc';
				
				if(($sortOrder!='' && $sortOrder=='asc') && $orderBy=='custormerName'){
					$custormerSortOrder = 'desc';
					$baseUrl = base_url('users/transactions/custormerName/'.$custormerSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>';
				}elseif(($sortOrder!='' && $sortOrder=='desc') && $orderBy=='custormerName'){
					$custormerSortOrder	= 'asc';
					$baseUrl = base_url('users/transactions/custormerName/'.$custormerSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>';
				}
				
				if(($sortOrder!='' && $sortOrder=='asc') && $orderBy=='amount'){
					$amountSortOrder	= 'desc';
					$baseUrl = base_url('users/transactions/amount/'.$amountSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>';
				}elseif(($sortOrder!='' && $sortOrder=='desc') && $orderBy=='amount'){
					$amountSortOrder	= 'asc';
					$baseUrl = base_url('users/transactions/amount/'.$amountSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>';
				}
				
				if(($sortOrder!='' && $sortOrder=='asc') && $orderBy=='transactionDate'){
					$transactionDateSortOrder	= 'desc';
					$baseUrl = base_url('users/transactions/transactionDate/'.$transactionDateSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>';
				}elseif(($sortOrder!='' && $sortOrder=='desc') && $orderBy=='transactionDate'){
					$transactionDateSortOrder	= 'asc';
					$baseUrl = base_url('users/transactions/transactionDate/'.$transactionDateSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>';
				}
				
				
		  ?>
          
          <div class="row">
            <div class="form-group col-md-4">
              <label class="col-md-2 control-label" style="padding:0px;"><strong>Sort By</strong></label>
              <div class="col-md-9" style="padding:0 8px;">
               <select class="form-control" name="sorting" id="sorting">
                  
                  <option value="<?php echo base_url('users/transactions/custormerName/'.$custormerSortOrder.'/0');?>" <?php if($orderBy=='custormerName') echo'selected="selected"'; ?>>Customer Name</option>
                  <option value="<?php echo base_url('users/transactions/amount/'.$amountSortOrder.'/0');?>" <?php if($orderBy=='amount') echo'selected="selected"'; ?>>Transaction Amount</option>
                  <option value="<?php echo base_url('users/transactions/transactionDate/'.$transactionDateSortOrder.'/0');?>" <?php if($orderBy=='transactionDate') echo'selected="selected"'; ?>>Transaction Date</option>
               </select>
              </div>
              <div class="col-md-1" style="padding:0px;">
              	<?php echo $sortingOrderDir;?>
              </div>
          </div>
          </div>
          
            <div class="table-container">
              
              <table class="table table-striped table-bordered table-hover table-checkable">
                <thead>
                  <tr role="row" class="heading">
                  	<th width="15%">Customer Name</th>
                    <th width="5%">Amount</th>
                    <th width="8%">Status</th>
                    <th width="23%">Message</th>
                    <th width="15%">Descriptor</th>
                    <th width="20%">Date</th>
                    <th width="15%">Actions</th>
                  </tr>
                </thead>
                <?php if($listing->num_rows()>0){?>
                <?php foreach($listing->result() as $row){?>
                	<?php
                    	$symbol = getColumnValue('currency', 'symbol_left', $where="code='$row->currency'");
						if($symbol==false)
						   $symbol = getColumnValue('currency', 'symbol_right', $where="code='$row->currency'");
					?>
                	<tr>
                        <td><?php echo $row->billing_first_name.' '.$row->billing_last_name;?></td>
                        <td><?php echo $symbol.$row->amount;?></td>
                        <td><?php echo $row->transaction_status;?></td>
                        <td><?php echo $row->transaction_msg?></td>
                        <td><?php echo $row->response_code?></td>
                        <td><?php echo date('d F, Y', strtotime($row->payment_date));?></td>
                        <td><a href="<?php echo base_url('users/gettransactiondetail/'.$row->id);?>" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr>
                <?php } }else{?>
                	<tr>
                    	<td colspan="7"><p>No Record Found.</p></td>
                    </tr>
                <?php }?>
              </table>
              <div class="row">
                  <div class="col-md-12">
                      <div class="pull-right">
                          <?php echo $this->pagination->create_links(); ?>
                      </div>
                  </div>
              </div>
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
