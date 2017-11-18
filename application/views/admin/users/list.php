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
        <h1>Users</h1>
      </div>
      <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('admin/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url('admin/users');?>">Users</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">All Users</span> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12"> 
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
          <div class="portlet-body">
            <div class="table-toolbar">
              <div class="row">
                <div class="col-md-6">
                  <div class="btn-group">
                    <a href="<?php echo base_url('admin/users/adduser');?>" class="btn sbold green">Add New User  <i class="fa fa-plus"></i></a>
                  </div>
                </div>
                
              </div>
            </div>
            
            
            <?php
				if($this->session->flashdata('message')!=''){
					echo '<div class="alert alert-success"><p>'.$this->session->flashdata('message').'</p></div>';
				}
			 ?>
             
             
          <form action="<?php echo base_url('admin/users/index/'.$orderBy.'/'.$sortOrder.'/0');?>" method="post" class="horizontal-form transaction-search">
          <div class="form-body">
          <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">First Name</label>
                  <input type="text" name="firstName" class="form-control" placeholder="First Name" value="<?php if($this->session->userdata('firstName')!='') echo $this->session->userdata('firstName');?>">
              </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Last Name</label>
                  <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="<?php if($this->session->userdata('lastName')!='') echo $this->session->userdata('lastName');?>">
              </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input type="text" name="userEmail" class="form-control" placeholder="Email" value="<?php if($this->session->userdata('userEmail')!='') echo $this->session->userdata('userEmail');?>">
              </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Company Name</label>
                  <input type="text" name="companyName" class="form-control" placeholder="Company Name" value="<?php if($this->session->userdata('companyName')!='') echo $this->session->userdata('companyName');?>">
              </div>
            </div>
            
          </div>
          <div class="row">
          <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Account Status</label>
                  <select class="form-control" name="accountStatus">
                      <option value="" <?php if(empty($this->session->userdata('accountStatus'))) echo 'selected="selected"';?>>Select Account Status</option>
                      <option value="ACTIVE" <?php if($this->session->userdata('accountStatus')=='ACTIVE') echo 'selected="selected"';?>>Active</option>
                      <option value="CLOSED" <?php if($this->session->userdata('accountStatus')=='CLOSED') echo 'selected="selected"';?>>Closed</option>
                      <option value="DORMANT" <?php if($this->session->userdata('accountStatus')=='DORMANT') echo 'selected="selected"';?>>Dormant</option>
                      <option value="TERMINATED" <?php if($this->session->userdata('accountStatus')=='TERMINATED') echo 'selected="selected"';?>>Terminated</option>
                      <option value="ARCHIVED" <?php if($this->session->userdata('accountStatus')=='ARCHIVED') echo 'selected="selected"';?>>Archived</option>
                      
                  </select>
              </div>
              <!--/span--> 
            </div>
          </div>
          <div class="form-actions">
              <button type="submit" class="btn blue" name="filter" value="filter">Search</button>
              <button type="submit" class="btn green" name="clear" value="clear">Clear Search Results</button>
          </div>
          </div>
          </form>
          
          <?php
				$firstNameSortOrder		= 'asc';
				$lastNameSortOrder		= 'asc';
				$companyNameSortOrder	= 'asc';
				$joiningDateSortOrder	= 'asc';
				
				if(($sortOrder!='' && $sortOrder=='asc') && $orderBy=='firstName'){
					$firstNameSortOrder = 'desc';
					$baseUrl = base_url('admin/users/index/firstName/'.$firstNameSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>';
				}elseif(($sortOrder!='' && $sortOrder=='desc') && $orderBy=='firstName'){
					$firstNameSortOrder	= 'asc';
					$baseUrl = base_url('admin/users/index/firstName/'.$firstNameSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>';
				}
				
				if(($sortOrder!='' && $sortOrder=='asc') && $orderBy=='lastName'){
					$lastNameSortOrder	= 'desc';
					$baseUrl = base_url('admin/users/index/lastName/'.$lastNameSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>';
				}elseif(($sortOrder!='' && $sortOrder=='desc') && $orderBy=='lastName'){
					$lastNameSortOrder	= 'asc';
					$baseUrl = base_url('admin/users/index/lastName/'.$lastNameSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>';
				}
				
				if(($sortOrder!='' && $sortOrder=='asc') && $orderBy=='companyName'){
					$companyNameSortOrder	= 'desc';
					$baseUrl = base_url('admin/users/index/companyName/'.$companyNameSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>';
				}elseif(($sortOrder!='' && $sortOrder=='desc') && $orderBy=='companyName'){
					$companyNameSortOrder	= 'asc';
					$baseUrl = base_url('admin/users/index/companyName/'.$companyNameSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>';
				}
				
				if(($sortOrder!='' && $sortOrder=='asc') && $orderBy=='joiningDate'){
					$joiningDateSortOrder	= 'desc';
					$baseUrl = base_url('admin/users/index/joiningDate/'.$joiningDateSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>';
				}elseif(($sortOrder!='' && $sortOrder=='desc') && $orderBy=='joiningDate'){
					$joiningDateSortOrder	= 'asc';
					$baseUrl = base_url('admin/users/index/joiningDate/'.$joiningDateSortOrder.'/0');
					$sortingOrderDir = '<a href="'.$baseUrl.'"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>';
				}
				
				
		  ?>
          
          <div class="row">
            <div class="form-group col-md-4">
              <label class="col-md-2 control-label" style="padding:0px;"><strong>Sort By</strong></label>
              <div class="col-md-9" style="padding:0 8px;">
               <select class="form-control" name="sorting" id="sorting">
                  
                  <option value="<?php echo base_url('admin/users/index/firstName/'.$firstNameSortOrder.'/0');?>" <?php if($orderBy=='firstName') echo'selected="selected"'; ?>>First Name</option>
                  <option value="<?php echo base_url('admin/users/index/lastName/'.$lastNameSortOrder.'/0');?>" <?php if($orderBy=='lastName') echo'selected="selected"'; ?>>Last Name</option>
                  <option value="<?php echo base_url('admin/users/index/companyName/'.$companyNameSortOrder.'/0');?>" <?php if($orderBy=='companyName') echo'selected="selected"'; ?>>Company Name</option>
                  <option value="<?php echo base_url('admin/users/index/joiningDate/'.$joiningDateSortOrder.'/0');?>" <?php if($orderBy=='joiningDate') echo'selected="selected"'; ?>>Joining Date</option>
               </select>
              </div>
              <div class="col-md-1" style="padding:0px;">
              	<?php echo $sortingOrderDir;?>
              </div>
          </div>
          </div>
          <div class="table-scrollable">   
            <table class="table table-striped table-bordered table-hover table-checkable order-column">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Job Title</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Account Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php 
				  if($listing->num_rows()>0){
					  foreach($listing->result() as $row){
			  ?>
				  <tr class="even gradeX">
					  <td><?php echo $row->company_name;?></td>
					  <td><?php echo $row->email?></td>
					  <td><?php echo $row->job_title?></td>
                      <td>
					  <?php if($row->verified_by_email==1){?>
						  <span class="label label-sm label-success">Verified</span>
					  <?php }else{?>
						  <span class="label label-sm label-danger">Not Verified</span>
					  <?php }?>
					  </td>
                      <td>
					  <?php if($row->status==1){?>
						  <a href="<?php echo base_url('admin/users/updatestatus/0/'.$row->user_id);?>"><span class="label label-sm label-success"> Block </span></a>
					  <?php }else{?>
						  <a href="<?php echo base_url('admin/users/updatestatus/1/'.$row->user_id);?>"><span class="label label-sm label-danger">Unbloack</span></a>
					  <?php }?>
					  </td>
					  <td><?php echo $row->user_account_status?></td>
					  <td><a href="<?php echo base_url('admin/users/edituser/'.$row->user_id);?>" class="btn btn-sm green btn-outline margin-bottom" style="margin-bottom:5px;"><i class="fa fa-pencil"></i> Edit</a>
                      
                      <a href="<?php echo base_url('admin/users/paymentprocessor/'.$row->user_id);?>" class="btn btn-sm green btn-outline margin-bottom" style="margin-bottom:5px;"><i class="fa fa-gear"></i> Set Payment Processor</a>
                      
                       <a href="<?php echo base_url('admin/users/processpayment/'.$row->user_id);?>" class="btn btn-sm green btn-outline margin-bottom" style="margin-bottom:5px;"><i class="fa fa-credit-card"></i> Process Payment</a>
                       
                       <a href="<?php echo base_url('admin/users/generateApiKey/'.$row->user_id);?>" class="btn btn-sm green btn-outline margin-bottom" style="margin-bottom:5px;"><i class="fa fa-key"></i> Generate Api Key</a>
                       
                       <a href="<?php echo base_url('admin/users/viewtransactions/'.$row->user_id);?>" class="btn btn-sm green btn-outline margin-bottom" style="margin-bottom:5px;"><i class="fa fa-usd"></i> View Transactions</a>
                       
                      </td>
				  </tr>
			  <?php } }else{?>
              	<tr>
                <td colspan="7"><p style="margin-bottom:5px;"><strong>No Record Found.</strong></p></td>
                </tr>
              <?php }?>
                
              </tbody>
            </table>
           </div>
            <div class="row">
                  <div class="col-md-12">
                      <div class="pull-right">
                          <?php echo $this->pagination->create_links(); ?>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET--> 
      </div>
    </div>
    <!-- END PAGE BASE CONTENT --> 
  </div>
  <!-- END CONTENT BODY --> 
</div>
<!-- END CONTENT --> 

