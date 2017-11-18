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
      <li> <a href="<?php echo base_url('admin/khitomerapi/index/0');?>">Our Apis</a> <i class="fa fa-circle"></i> </li>
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
                    <a href="<?php echo base_url('admin/khitomerapi/addapi/'.$parentId);?>" class="btn sbold green">Add New Api <i class="fa fa-plus"></i></a>
                  </div>
                </div>
                
              </div>
            </div>
            <?php
				if($this->session->flashdata('message')!=''){
					echo '<div class="alert alert-success"><p>'.$this->session->flashdata('message').'</p></div>';
				}
			 ?>
           <div class="table-container">
              <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover table-checkable order-column">
              <thead>
                <tr>
                  <th width="20%">Api Name</th>
                  <th width="10%">Default Currency</th>
                  <th width="10%">Api Mode</th>
                  <th width="12%">Sort Order</th>
                  <th width="15%">Status</th>
                  <th width="20%">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php 
				  if($apiListing->num_rows()>0){
					  foreach($apiListing->result() as $row){
			  ?>
				  <tr class="even gradeX">
					  <td><?php echo $row->api_name.' ('.$row->api_type.')';?></td>
                      <td><?php echo $row->api_currency?></td>
					  <td><?php echo $row->api_mode?></td>
					  <td><?php echo $row->api_sort_order?></td>
					  <td>
					  <?php if($row->api_status==1){?>
						  <a href="<?php echo base_url('admin/khitomerapi/updatestatus/'.$parentId.'/0/'.$row->api_id);?>"><span class="label label-sm label-success"> Enabled </span></a>
					  <?php }else{?>
						  <a href="<?php echo base_url('admin/khitomerapi/updatestatus/'.$parentId.'/1/'.$row->api_id);?>"><span class="label label-sm label-danger">Disabled</span></a>
					  <?php }?>
					  </td>
					  <td>
                      <a href="<?php echo base_url('admin/khitomerapi/editapi/'.$parentId.'/'.$row->api_id);?>" class="btn btn-sm green btn-outline margin-bottom"><i class="fa fa-pencil"></i> Edit</a>
                      <?php if($parentId==0){?>
                      <a href="<?php echo base_url('admin/khitomerapi/index/'.$row->api_id);?>" class="btn btn-sm green btn-outline margin-bottom"><i class="fa fa-bars"></i> Sub Accounts</a>
                      <?php }?>
                      </td>
				  </tr>
			  <?php } }else{?>
              		<tr>
                    	<td colspan="6">
                        <p style="text-align:center;"><strong>
                        <?php 
							if($parentId==0)
								echo 'No Record Found.';
							else
								echo 'No Sub Accounts Found.';
						?>
                        </strong></p>
              			</td>
                    </tr>
              <?php }?>
                
              </tbody>
            </table>
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
