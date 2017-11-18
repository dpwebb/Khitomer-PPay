<style type="text/css">
.table-scrollable > .table-bordered > tbody > tr > th {
	border-left:1px solid #e7ecf1 !important;
}


</style>
<div class="page-content-wrapper"> 
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content"> 
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Transactions</h1>
      </div>
      <!-- END PAGE TITLE --> 
    </div>
    <!-- END PAGE HEAD--> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="<?php echo base_url('users/dashboard');?>">Home</a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url("admin/transactions/index/$orderBy/$sortOrder/$page");?>">Transactions</a> <i class="fa fa-circle"></i> </li>
      <li> <span class="active">Transaction Response</span> </li>

    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption">  <span class="caption-subject font-blue-hoki bold uppercase">Transaction Response</span>
            </div>
          </div>
          <div class="portlet-body"> 
            
            <?php
            
				if($transactionResponse->trans_api_id==2 || $transactionResponse->trans_api_id==7 || $transactionResponse->trans_api_id==8){
					getPrint(json_decode($transactionResponse->transaction_complete_response)); //exit;
					/*$payTooResponse = json_decode($transactionResponse->transaction_complete_response);
					$PaytooRequest	= $payTooResponse->PaytooRequest;
					$PaytooTransaction	= $payTooResponse->PaytooTransaction;
					$PaytooAccount	= $payTooResponse->PaytooAccount;*/
					
			?>
            <?php /*?><div class="portlet box green">
          <div class="portlet-title">
            <div class="caption">Transaction Response From Paytoo</div>
          </div>
          <div class="portlet-body">
            <div class="table-scrollable">
              <table class="table table-striped table-bordered table-hover">
                <tbody>
                  <tr>
                    <th width="30%">[status]</th>
                    <td width="70%"><?php echo $payTooResponse->status;?></td>
                  </tr>
                 <tr>
                    <th width="30%">[request_id]</th>
                    <td width="70%"><?php echo $payTooResponse->request_id;?></td>
                  </tr>
                  <tr>
                    <th width="30%">[request_status]</th>
                    <td width="70%"><?php echo $payTooResponse->request_status;?></td>
                  </tr>
                  
                  <tr>
                    <th width="30%">[tr_id]</th>
                    <td width="70%"><?php echo $payTooResponse->tr_id;?></td>
                  </tr>
                  <tr>
                    <th width="30%">[sub_account_id]</th>
                    <td width="70%"><?php echo $payTooResponse->sub_account_id;?></td>
                  </tr>
                  <tr>
                    <th width="30%">[ref_id]</th>
                    <td width="70%"><?php echo $payTooResponse->ref_id;?></td>
                  </tr>
                  <tr>
                    <th width="30%">[msg]</th>
                    <td width="70%"><?php echo $payTooResponse->msg;?></td>
                  </tr>
                  <tr>
                    <th width="30%">[info]</th>
                    <td width="70%"><?php echo $payTooResponse->info;?></td>
                  </tr>
                  <tr>
                    <th width="30%">[phone_number]</th>
                    <td width="70%"><?php echo $payTooResponse->phone_number;?></td>
                  </tr>
                  <tr>
                    <th width="30%">[w_number]</th>
                    <td width="70%"><?php echo $payTooResponse->w_number;?></td>
                  </tr>
                  <tr>
                    <th width="30%">[cc_id]</th>
                    <td width="70%"><?php echo $payTooResponse->cc_id;?></td>
                  </tr>
                  <tr>
                    <th width="30%">[PaytooPaymentRequest]</th>
                    <td width="70%"><?php echo $payTooResponse->PaytooPaymentRequest;?></td>
                  </tr>
                  <tr>
                    <th width="30%">[hash]</th>
                    <td width="70%"><?php echo $payTooResponse->hash;?></td>
                  </tr>
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div><?php */?>
            
            <?php }?>
          </div>
        </div>
      </div>
    </div>
    <!-- END PAGE BASE CONTENT --> 
  </div>
  <!-- END CONTENT BODY --> 
</div>
<!-- END CONTENT -->