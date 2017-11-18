<!-- BEGIN CONTENT -->
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Our Apis</h1>
      </div>
      <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('admin/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url('admin/khitomerapi');?>">Our Apis</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">All Apis</span> </li>
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
                    <a href="<?php echo base_url('admin/khitomerapi/addapi');?>" class="btn sbold green">Add New Api <i class="fa fa-plus"></i></a>
                  </div>
                </div>
                
              </div>
            </div>
            <?php
				if($this->session->flashdata('message')!=''){
					echo '<div class="alert alert-success"><p>'.$this->session->flashdata('message').'</p></div>';
				}
			 ?>
           <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="tbl_users">
              <thead>
                <tr>
                  <th>Api Name</th>
                  <th>Api Mode</th>
                  <th>Sort Order</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php 
				  if($apiListing->num_rows()>0){
					  foreach($apiListing->result() as $row){
			  ?>
				  <tr class="even gradeX">
					  <td><?php echo $row->api_name.' ('.$row->api_type.')';?></td>
					  <td><?php echo $row->api_mode?></td>
					  <td><?php echo $row->api_sort_order?></td>
					  <td>
					  <?php if($row->api_status==1){?>
						  <a href="<?php echo base_url('admin/khitomerapi/updatestatus/0/'.$row->api_id);?>"><span class="label label-sm label-success"> Enabled </span></a>
					  <?php }else{?>
						  <a href="<?php echo base_url('admin/khitomerapi/updatestatus/1/'.$row->api_id);?>"><span class="label label-sm label-danger">Disabled</span></a>
					  <?php }?>
					  </td>
					  <td><a href="<?php echo base_url('admin/khitomerapi/editapi/'.$row->api_id);?>" class="btn btn-sm green btn-outline margin-bottom"><i class="fa fa-pencil"></i> Edit</a></td>
				  </tr>
			  <?php } }?>
                
              </tbody>
            </table>
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
