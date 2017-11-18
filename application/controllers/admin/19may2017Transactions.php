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
		$this->data['contents']		= 'admin/transactions/list';
		$this->load->view('template', $this->data);
	}
	//ajax loading
	public function getAllTransaction(){
		//$_REQUEST['trans_date_from'].'--'.$_REQUEST['trans_date_to'];
		$transDateFrom	= '';
		$transDateTo	= '';
		
		if(isset($_REQUEST['trans_date_from']))
			$transDateFrom = date('Y-m-d', strtotime($_REQUEST['trans_date_from']));
			
		if(isset($_REQUEST['trans_date_to']))
			$transDateTo = date('Y-m-d', strtotime($_REQUEST['trans_date_to']));
			
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
	public function updateTransaction(){
		//<br><a href="'.base_url('admin/transactions/updateTransaction/'.$row->id).'" class="btn btn-sm btn-outline grey-salsa ajax"><i class="fa fa-pencil"></i> Edit</a>
		$this->data['transactionID']	= $transactionID	= $this->uri->segment(4);
		$this->data['transactionInfo']	= $this->transactions_model->getTransactionDetail($transactionID);
		//getPrint($this->data['transactionInfo']);
		$this->form_validation->set_rules('transaction_status ', 'Transaction Status', 'trim|required');
		$this->form_validation->set_rules('transaction_msg ', 'Transaction Message', 'trim|required');
		//getPrint($data['country']);
		if ($this->form_validation->run() == false){
			$this->data['contents'] = 'admin/transactions/edittransaction';
			$this->load->view('template', $this->data);
		}else{
			getPrint($_POST); exit;
		}
	}
	//update transaction data
	public function gettransactiondetail(){
		$transactionID	= $this->uri->segment(4);
		$this->data['transactionInfo']	= $this->transactions_model->getTransactionDetail($transactionID);
		
		//getPrint($this->data['transactionInfo']); exit;
		$this->data['contents'] 		= 'admin/transactions/transaction_detail';
		$this->load->view('template', $this->data);
	}
	public function downloadReport(){
		$this->load->library('excel');
		$transactionsInfo	= $this->transactions_model->getTransactionsReport();
		//getPrint($transactionsInfo->result()); exit;
		
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1:Z1')->getFont()
			->setSize(15)
			->setBold(true);
		$this->excel->getActiveSheet()->getStyle('AA1:AB1')->getFont()
			->setSize(15)
			->setBold(true);
		$this->excel->getActiveSheet()->setCellValue('A1', 'Payment Date');
		$this->excel->getActiveSheet()->setCellValue('B1', 'Affiliate Name'); // Company Name
		$this->excel->getActiveSheet()->setCellValue('C1', 'Amount');
		$this->excel->getActiveSheet()->setCellValue('D1', 'Currency');
		$this->excel->getActiveSheet()->setCellValue('E1', 'Status');
		$this->excel->getActiveSheet()->setCellValue('F1', 'Office Use');
		$this->excel->getActiveSheet()->setCellValue('G1', 'Processor Response Code');
		$this->excel->getActiveSheet()->setCellValue('H1', 'Descriptor');
		$this->excel->getActiveSheet()->setCellValue('I1', 'Full Name');
		$this->excel->getActiveSheet()->setCellValue('J1', 'Transaction System id');
		$this->excel->getActiveSheet()->setCellValue('K1', 'Order Number');
		$this->excel->getActiveSheet()->setCellValue('L1', 'Order Description');
		$this->excel->getActiveSheet()->setCellValue('M1', 'Order IP');
		$this->excel->getActiveSheet()->setCellValue('N1', 'First Name');
		$this->excel->getActiveSheet()->setCellValue('O1', 'Last Name');
		$this->excel->getActiveSheet()->setCellValue('P1', 'Email');
		$this->excel->getActiveSheet()->setCellValue('Q1', 'Mobile No');
		$this->excel->getActiveSheet()->setCellValue('R1', 'Address');
		$this->excel->getActiveSheet()->setCellValue('S1', 'Address 2');
		$this->excel->getActiveSheet()->setCellValue('T1', 'City Name');
		$this->excel->getActiveSheet()->setCellValue('U1', 'State');
		$this->excel->getActiveSheet()->setCellValue('V1', 'Zip Code');
		$this->excel->getActiveSheet()->setCellValue('W1', 'Country');
		$this->excel->getActiveSheet()->setCellValue('X1', 'Office Use');
		$this->excel->getActiveSheet()->setCellValue('Y1', 'Payment Type');
		$this->excel->getActiveSheet()->setCellValue('Z1', 'Card Number');
		$this->excel->getActiveSheet()->setCellValue('AA1', 'Card Expiry Date');
		$this->excel->getActiveSheet()->setCellValue('AB1', 'Entry Method');
		
		
		foreach(range('A','Z') as $columnID) {
			$this->excel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}
		
		$columnID = 'AA';
		$this->excel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		$columnID = 'AB';
		$this->excel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		
		$k=2;
		foreach($transactionsInfo->result() as $row){
			//$trnasactionApiName = getColumnValue('khitomer_api', 'api_name', 'api_id='.$row->trans_api_id.'');
			$ApiDescriptor		= getColumnValue('khitomer_api', 'response_code', 'api_id='.$row->trans_api_id.'');
			
			$this->excel->getActiveSheet()->setCellValue('A'.$k, date('d F, Y', strtotime($row->payment_date)));
			$this->excel->getActiveSheet()->setCellValue('B'.$k, $row->company_name);
			$this->excel->getActiveSheet()->setCellValue('C'.$k, '$'.number_format($row->amount,2));
			$this->excel->getActiveSheet()->setCellValue('D'.$k, $row->currency);
			$this->excel->getActiveSheet()->setCellValue('E'.$k, $row->transaction_status);
			$this->excel->getActiveSheet()->setCellValue('F'.$k, '');
			$this->excel->getActiveSheet()->setCellValue('G'.$k, $row->transaction_msg);
			$this->excel->getActiveSheet()->setCellValue('H'.$k, @$ApiDescriptor);
			$this->excel->getActiveSheet()->setCellValue('I'.$k, $row->billing_first_name.' '.$row->billing_last_name);
			$this->excel->getActiveSheet()->setCellValue('J'.$k, $row->id);
			$this->excel->getActiveSheet()->setCellValue('K'.$k, $row->order_number);
			$this->excel->getActiveSheet()->setCellValue('L'.$k, $row->order_description);
			$this->excel->getActiveSheet()->setCellValue('M'.$k, $row->ipaddress);
			
			//$this->excel->getActiveSheet()->setCellValue('K'.$k, @$trnasactionApiName);
			
			$this->excel->getActiveSheet()->setCellValue('N'.$k, $row->billing_first_name);
			$this->excel->getActiveSheet()->setCellValue('O'.$k, $row->billing_last_name);
			$this->excel->getActiveSheet()->setCellValue('P'.$k, $row->billing_email);
			$this->excel->getActiveSheet()->setCellValue('Q'.$k, $row->billing_phone_no);
			$this->excel->getActiveSheet()->setCellValue('R'.$k, $row->billing_address_1);
			$this->excel->getActiveSheet()->setCellValue('S'.$k, $row->billing_address_2);
			$this->excel->getActiveSheet()->setCellValue('T'.$k, $row->billing_city_name);
			$this->excel->getActiveSheet()->setCellValue('U'.$k, getColumnValue('states', 'name', $where='state_id='.$row->shipping_state_id));
			$this->excel->getActiveSheet()->setCellValue('V'.$k, $row->billing_zip_code);
			$this->excel->getActiveSheet()->setCellValue('W'.$k, getColumnValue('country', 'name', $where='country_id='.$row->shipping_country_id));
			$this->excel->getActiveSheet()->setCellValue('X'.$k, '');
			$this->excel->getActiveSheet()->setCellValue('Y'.$k, $row->transaction_type);
			$this->excel->getActiveSheet()->setCellValue('Z'.$k, $row->card_number);
			$this->excel->getActiveSheet()->setCellValue('AA'.$k, $row->expiry_date);
			$this->excel->getActiveSheet()->setCellValue('AB'.$k, 'Keyed');
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
