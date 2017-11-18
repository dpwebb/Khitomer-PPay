<div class="container content-box">
  <div class="row">
  <?php $this->load->view('includes/sidebar');?>
  <div class="col-sm-8 col-md-9">
  <?php
	if($this->session->flashdata('message')!=''){
		echo '<div class="alert alert-success"><p>'.$this->session->flashdata('message').'</p></div>';
	}
 ?>
  	<table class="table table-striped">
    <thead>
      <tr>
      	<th>Amount</th>
        <th>Status</th>
        <th>Message</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
		if($transactionsListing->num_rows()>0){
			foreach($transactionsListing->result() as $row){
	?>
      	<tr>
        	<td>$<?php echo $row->amount?></td>
        	<td><?php echo $row->transaction_status?></td>
            <td><?php echo $row->transaction_msg?></td>
            <td><?php echo date('d F, Y', strtotime($row->payment_date));?></td>
            <td><a href="<?php echo base_url('admin/transactions/gettransactiondetail/'.$row->id);?>">View Detail</a></td>
      	</tr>
    <?php } }else{?>
    	<tr>
        	<td colspan="5"><strong>No transactions record found.</strong></td>
      	</tr>
    <?php }?>
    </tbody>
  </table>
  <div class="site-seperator"></div>
  <p><a href="<?php echo base_url('admin/transactions/downloadreport');?>" class="btn btn-primary custom-button red-btn">Download Report</a></p>
  </div>
  </div>
</div>
