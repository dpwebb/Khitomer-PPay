<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends Public_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('admin/transactions_model');
		$this->data['activeClass']	= 'transactions';
		isUserLogin();
		/*$this->output->enable_profiler(TRUE);
		error_reporting(E_ALL);
		ini_set('display_errors', 1);*/
    }
	
	public function index(){
		if($this->uri->segment(6)!='')
			$this->data['page'] = $this->uri->segment(6);
		else
			$this->data['page'] = 0;
			
		if($this->uri->segment(4)!='')
			$this->data['orderBy']		= $sorting['orderBy']	= $this->uri->segment(4);
		else
			$this->data['orderBy']		= $sorting['orderBy']	= 'transactionDate';
			
		if($this->uri->segment(5)!='')
			$this->data['sortOrder']	= $sorting['sortOrder']	= $this->uri->segment(5);
		else
			$this->data['sortOrder']	= $sorting['sortOrder']	= 'desc';
		
			
		if(!isset($this->data['page']) || $this->input->post('clear')=='clear'){
			$this->session->unset_userdata('transDateFrom');
			$this->session->unset_userdata('trans_date_to');
			$this->session->unset_userdata('billing_first_name');
			$this->session->unset_userdata('billing_last_name');
			$this->session->unset_userdata('company_name');
			$this->session->unset_userdata('trans_type');
			$this->session->unset_userdata('trans_api_id');
			$this->session->unset_userdata('trans_status');
		}
		//getPrint($this->data);
		$transDateFrom	= '';
		$transDateTo	= '';
		
		if($this->input->post('trans_date_from')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('transDateFrom', $this->input->post('trans_date_from'));
			//$transDateFrom = $this->input->post('trans_date_from');
		}
		if($this->input->post('trans_date_to')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('trans_date_to', $this->input->post('trans_date_to'));
			//$transDateTo = $this->input->post('trans_date_to');
		}
		
		if($this->input->post('billing_first_name')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('billing_first_name', $this->input->post('billing_first_name'));
		}
		
		if($this->input->post('billing_last_name')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('billing_last_name', $this->input->post('billing_last_name'));
		}
		
		if($this->input->post('company_name')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('company_name', $this->input->post('company_name'));
		}
		
		if(isset($_POST['trans_type']) && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('trans_type', $this->input->post('trans_type'));
		}
		
		if(isset($_POST['trans_api_id']) && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('trans_api_id', $this->input->post('trans_api_id'));
		}
		
		if(isset($_POST['trans_status']) && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('trans_status', $this->input->post('trans_status'));
		}
		
		if($this->input->post('excel')=='excel'){
			$this->downloadReport($sorting);
		}
		$url = base_url("admin/transactions/index/".$this->data['orderBy'].'/'.$this->data['sortOrder'].'/');
        $totalrows = $this->transactions_model->countTotalTransactions();
        parent::pagination_conf($this->data['page'], $url, $totalrows, 6);
		
		$this->data['apiList']	= $this->transactions_model->getAllApi();
		$this->data['listing']	= $this->transactions_model->getAllTransactions($sorting, 50, $this->data['page']);
		//getPrint($this->data['listing']->result()); exit;
		$this->data['contents']		= 'admin/transactions/list';
		$this->load->view('template', $this->data);
	}
	//ajax loading
	public function getAllTransaction(){
		//$_REQUEST['trans_date_from'].'--'.$_REQUEST['trans_date_to'];
		$transDateFrom	= '';
		$transDateTo	= '';
		
		if(isset($_REQUEST['trans_date_from']) && $_REQUEST['trans_date_from']!='')
			$transDateFrom = date('Y-m-d', strtotime($_REQUEST['trans_date_from']));
			
		if(isset($_REQUEST['trans_date_to']) && $_REQUEST['trans_date_to']!='')
			$transDateTo = date('Y-m-d', strtotime($_REQUEST['trans_date_to']));
		
		//echo $_REQUEST['trans_date_to'];
			
		$iTotalRecords	= $this->transactions_model->countTotalTransactions($transDateFrom, $transDateTo);
		
		if(isset($_REQUEST['length']))
			$iDisplayLength = intval($_REQUEST['length']);
		else
			$iDisplayLength = 10;
			
		$iDisplayLength	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		
		if(isset($_REQUEST['length']))
			$iDisplayStart	= intval($_REQUEST['start']);
		else
			$iDisplayStart = 0;
		
		$sEcho			= intval($_REQUEST['draw']);
		
		
			
		$allTransactions= $this->transactions_model->getAllTransactions($transDateFrom, $transDateTo,$iDisplayLength, $iDisplayStart);
		//getPrint($allTransactions->result()); exit;
		$records = array();
		$records["data"] = array(); 
	  
		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
	  
		foreach($allTransactions->result() as $row) {
		  /*if($row->trans_api_id==1)
		  	$StateMent = 'GrnArrow8009869316';
		  elseif($row->trans_api_id==2)
		  	$StateMent = 'CF MERCANTILE CAMBRIDGE';*/
		  $symbol = getColumnValue('currency', 'symbol_left', $where="code='$row->currency'");
		  if($symbol==false)
		 	 $symbol = getColumnValue('currency', 'symbol_right', $where="code='$row->currency'");
			 
		  $companyName = getColumnValue('users', 'company_name', 'user_id='.$row->user_id.'');
		  $records["data"][] = array(
		  	$companyName,
			$row->billing_first_name.' '.$row->billing_last_name,
			$symbol.$row->amount,
			$row->transaction_status,
			$row->transaction_msg,
			$row->response_code,
			date('d F, Y', strtotime($row->payment_date)),
			'<a href="'.base_url('admin/transactions/gettransactiondetail/'.$row->id).'" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a>',
		 );
		}
	  
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
		  $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
		  $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
	  
		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
		
		echo json_encode($records);
		
	}
	public function edittransaction(){
		$this->data['orderBy']			= $this->uri->segment(4);
		$this->data['sortOrder']		= $this->uri->segment(5);
		$this->data['page']				= $this->uri->segment(6);
		$this->data['transactionId']	= $transactionId	= $this->uri->segment(7);
		$this->data['transactionInfo']	= $this->transactions_model->getTransactionDetail($transactionId);
		//getPrint($this->data['transactionInfo']); exit;
		$this->form_validation->set_rules('transaction_id', '', '');
		$this->form_validation->set_rules('transaction_status', 'Transaction Status', 'trim|required');
		$this->form_validation->set_rules('transaction_msg', 'Transaction Message', 'trim|required');
		
		//getPrint($data['country']);
		if($this->form_validation->run() == false){
			$this->data['contents'] = 'admin/transactions/edittransaction';
			$this->load->view('template', $this->data);
		}else{
			//getPrint($_POST); exit;
			$transData['transaction_id']			= $this->input->post('transaction_id');
			$transData['transaction_status']		= strtoupper($this->input->post('transaction_status'));
			$transData['system_transaction_status'] = strtolower($transData['transaction_status']);
			$transData['transaction_msg']			= $this->input->post('transaction_msg');
			$this->common_model->updateData('transactions', $transData, array('id'=>$transactionId));
			$this->session->set_flashdata('message', 'Transaction has been updated.');
			redirect('admin/transactions/index/'.$this->data['orderBy'].'/'.$this->data['sortOrder'].'/'.$this->data['page']);
		}
	}
	//update transaction data
	public function gettransactiondetail(){
		$transactionID	= $this->uri->segment(4);
		$this->data['transactionInfo']	= $this->transactions_model->getTransactionDetail($transactionID);
		$this->data['affiliateInfo']	= $this->transactions_model->getAffiliateDetail($this->data['transactionInfo']->user_id);
		
		//getPrint($this->data['transactionInfo']); exit;
		$this->data['contents'] 		= 'admin/transactions/transaction_detail';
		$this->load->view('template', $this->data);
	}
	//View Transaction Response
	public function viewtransactionresponse(){
		$this->data['orderBy']			= $this->uri->segment(4);
		$this->data['sortOrder']		= $this->uri->segment(5);
		$this->data['page']				= $this->uri->segment(6);
		$this->data['transactionId']	= $transactionID	= $this->uri->segment(7);
		$this->data['transactionResponse']	= $this->transactions_model->viewTransactionResponse($transactionID);
		
		//getPrint($this->data['transactionResponse']); exit;
		$this->data['contents'] 		= 'admin/transactions/transaction_response';
		$this->load->view('template', $this->data);
	}
	public function downloadReport($sorting){
		$this->load->library('excel');
		//getPrint($sorting); exit;
		$transactionsInfo	= $this->transactions_model->getTransactionsReport($sorting);
		//getPrint($sorting); exit;
		
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1:Z1')->getFont()
			->setSize(15)
			->setBold(true);
		/*$this->excel->getActiveSheet()->getStyle('AA1:AB1')->getFont()
			->setSize(15)
			->setBold(true);*/
		$this->excel->getActiveSheet()->setCellValue('A1', 'Date/Time');
		$this->excel->getActiveSheet()->setCellValue('B1', 'Affiliate'); // Company Name
		$this->excel->getActiveSheet()->setCellValue('C1', 'Amount');
		$this->excel->getActiveSheet()->setCellValue('D1', 'Currency');
		$this->excel->getActiveSheet()->setCellValue('E1', 'Status');
		$this->excel->getActiveSheet()->setCellValue('F1', 'Trans Type');
		//$this->excel->getActiveSheet()->setCellValue('G1', 'Gateway');
		$this->excel->getActiveSheet()->setCellValue('G1', 'Response');
		$this->excel->getActiveSheet()->setCellValue('H1', 'Trans Id');
		$this->excel->getActiveSheet()->setCellValue('I1', 'Product Id');
		$this->excel->getActiveSheet()->setCellValue('J1', 'Product Description');
		$this->excel->getActiveSheet()->setCellValue('K1', 'Ip Address');
		$this->excel->getActiveSheet()->setCellValue('L1', 'First Name');
		$this->excel->getActiveSheet()->setCellValue('M1', 'Last Name');
		$this->excel->getActiveSheet()->setCellValue('N1', 'Email');
		$this->excel->getActiveSheet()->setCellValue('O1', 'Phone');
		$this->excel->getActiveSheet()->setCellValue('P1', 'Address');
		$this->excel->getActiveSheet()->setCellValue('Q1', 'Address 2');
		$this->excel->getActiveSheet()->setCellValue('R1', 'City');
		$this->excel->getActiveSheet()->setCellValue('S1', 'State');
		$this->excel->getActiveSheet()->setCellValue('T1', 'Zip/Postal Code');
		$this->excel->getActiveSheet()->setCellValue('U1', 'CSC');
		$this->excel->getActiveSheet()->setCellValue('V1', 'AVS');
		$this->excel->getActiveSheet()->setCellValue('W1', 'METHOD');
		$this->excel->getActiveSheet()->setCellValue('X1', 'CC ACCOUNT');
		$this->excel->getActiveSheet()->setCellValue('Y1', 'CC EXP');
		$this->excel->getActiveSheet()->setCellValue('Z1', 'CHANNEL');
		//$this->excel->getActiveSheet()->setCellValue('AB1', 'Entry Method');
		
		
		foreach(range('A','Z') as $columnID) {
			$this->excel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}
		
		/*$columnID = 'AA';
		$this->excel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);*/
		/*$columnID = 'AB';
		$this->excel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);*/
		
		$k=2;
		foreach($transactionsInfo->result() as $row){
			//$trnasactionApiName = getColumnValue('khitomer_api', 'api_name', 'api_id='.$row->trans_api_id.'');
			$ApiDescriptor	= getColumnValue('khitomer_api', 'response_code', 'api_id='.$row->trans_api_id.'');
			$ApiName		= getColumnValue('khitomer_api', 'api_name', 'api_id='.$row->trans_api_id.'');
			
			$symbol = getColumnValue('currency', 'symbol_left', $where="code='$row->currency'");
			if($symbol==false)
			   $symbol = getColumnValue('currency', 'symbol_right', $where="code='$row->currency'");
			
			if($row->transaction_from_api==1)
				$methodBy = 'Keyed';
			else
				$methodBy = 'API';
				
			if($row->shipping_state_id==0)
				$stateName = $row->billing_state_code;
			else
				$stateName = getColumnValue('states', 'name', $where='state_id='.$row->shipping_state_id);
			
				
			$this->excel->getActiveSheet()->setCellValue('A'.$k, date('m-d-Y', strtotime($row->payment_date)));
			$this->excel->getActiveSheet()->setCellValue('B'.$k, $row->company_name);
			$this->excel->getActiveSheet()->setCellValue('C'.$k, number_format($row->amount,2));
			$this->excel->getActiveSheet()->setCellValue('D'.$k, $row->currency);
			$this->excel->getActiveSheet()->setCellValue('E'.$k, $row->transaction_status);
			$this->excel->getActiveSheet()->setCellValue('F'.$k, $row->transaction_type);
			//$this->excel->getActiveSheet()->setCellValue('G'.$k, $ApiName);
			$this->excel->getActiveSheet()->setCellValue('G'.$k, @$ApiDescriptor);
			$this->excel->getActiveSheet()->setCellValue('H'.$k, $row->id);
			$this->excel->getActiveSheet()->setCellValue('I'.$k, $row->order_number);
			$this->excel->getActiveSheet()->setCellValue('J'.$k, $row->order_description);
			$this->excel->getActiveSheet()->setCellValue('K'.$k, $row->ipaddress);
			$this->excel->getActiveSheet()->setCellValue('L'.$k, $row->billing_first_name);
			$this->excel->getActiveSheet()->setCellValue('M'.$k, $row->billing_last_name);
			$this->excel->getActiveSheet()->setCellValue('N'.$k, $row->billing_email);
			$this->excel->getActiveSheet()->setCellValue('O'.$k, $row->billing_phone_no);
			$this->excel->getActiveSheet()->setCellValue('P'.$k, $row->billing_address_1);
			$this->excel->getActiveSheet()->setCellValue('Q'.$k, $row->billing_address_2);
			$this->excel->getActiveSheet()->setCellValue('R'.$k, $row->billing_city_name);
			$this->excel->getActiveSheet()->setCellValue('S'.$k, $stateName);
			$this->excel->getActiveSheet()->setCellValue('T'.$k, $row->billing_zip_code);
			$this->excel->getActiveSheet()->setCellValue('U'.$k, '');
			$this->excel->getActiveSheet()->setCellValue('V'.$k, '');
			$this->excel->getActiveSheet()->setCellValue('W'.$k, $methodBy);
			$this->excel->getActiveSheet()->setCellValue('X'.$k, $row->card_number);
			$this->excel->getActiveSheet()->setCellValue('Y'.$k, $row->expiry_date);
			$this->excel->getActiveSheet()->setCellValue('Z'.$k, '');
			//$this->excel->getActiveSheet()->setCellValue('AB'.$k, '');
			$k++;
		}
		$filename	= time().'_transactions_report.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}
	
}
