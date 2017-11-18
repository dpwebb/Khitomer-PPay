<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions_model extends CI_Model{
	
	public $tblName;
	
    public function __construct(){
        parent::__construct();
		$this->tblName = 'transactions';
    }
	
	//------------get all Transactions----------
    public function getAllTransactions($sorting, $limit=0, $start=0){
        $this->db->select(''.$this->tblName.'.*, khitomer_api.api_id, khitomer_api.api_name, khitomer_api.response_code, users.user_account_status');
		$this->db->from($this->tblName);
		$this->db->join('khitomer_api', ''.$this->tblName.'.trans_api_id=khitomer_api.api_id', 'INNER');
		$this->db->join('users', ''.$this->tblName.'.user_id=users.user_id', 'INNER');
		$this->db->where('users.user_account_status', 'ACTIVE');
		
		
		if($this->session->userdata('transDateFrom')!='')
			$this->db->where('DATE('.$this->tblName.'.payment_date) >=', $this->session->userdata('transDateFrom'));
		if($this->session->userdata('trans_date_to')!='')
			$this->db->where('DATE('.$this->tblName.'.payment_date) <=', $this->session->userdata('trans_date_to'));
		if($this->session->userdata('billing_first_name')!='')
			$this->db->like('transactions.billing_first_name', $this->session->userdata('billing_first_name'));
		
		if($this->session->userdata('billing_last_name')!='')
			$this->db->like('transactions.billing_last_name', $this->session->userdata('billing_last_name'));
		
		if($this->session->userdata('company_name')!='')
			$this->db->like('users.company_name', $this->session->userdata('company_name'));
		
		if($this->session->userdata('trans_type')!='')
			$this->db->like('transactions.transaction_type', $this->session->userdata('trans_type'));
		
		if($this->session->userdata('trans_api_id')!='')
			$this->db->where('transactions.trans_api_id', $this->session->userdata('trans_api_id'));
		
		if($this->session->userdata('trans_status')!='' && $this->session->userdata('trans_status')!='Others')
			$this->db->where(''.$this->tblName.'.system_transaction_status', $this->session->userdata('trans_status'));
		elseif($this->session->userdata('trans_status')!='')
			$this->db->where(''.$this->tblName.'.transaction_status', NULL);
		
		if($sorting['orderBy']!='' && $sorting['orderBy']=='companyName')
			$this->db->order_by('users.company_name', strtoupper($sorting['sortOrder']));
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='custormerName')
			$this->db->order_by(''.$this->tblName.'.billing_first_name', strtoupper($sorting['sortOrder']));
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='amount')
			$this->db->order_by(''.$this->tblName.'.amount', strtoupper($sorting['sortOrder']));
		
		if($sorting['orderBy']!='' && $sorting['orderBy']=='transactionDate')
			$this->db->order_by(''.$this->tblName.'.payment_date', strtoupper($sorting['sortOrder']));
			
		$this->db->limit($limit, $start);
			
        $result = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $result;
    }
	//------------count Total Transactions----------
    public function countTotalTransactions(){
        $this->db->select('*');
		$this->db->from($this->tblName);
		$this->db->join('users', ''.$this->tblName.'.user_id=users.user_id', 'INNER');
		$this->db->where('users.user_account_status', 'ACTIVE');
		
		if($this->session->userdata('transDateFrom')!='')
			$this->db->where('DATE(payment_date) >=', $this->session->userdata('transDateFrom'));
			
		if($this->session->userdata('trans_date_to')!='')
			$this->db->where('DATE(payment_date) <=', $this->session->userdata('trans_date_to'));
			
		if($this->session->userdata('billing_first_name')!='')
			$this->db->like('transactions.billing_first_name', $this->session->userdata('billing_first_name'));
		
		if($this->session->userdata('billing_last_name')!='')
			$this->db->like('transactions.billing_last_name', $this->session->userdata('billing_last_name'));
		
		if($this->session->userdata('company_name')!='')
			$this->db->like('users.company_name', $this->session->userdata('company_name'));
			
		if($this->session->userdata('trans_type')!='')
			$this->db->like('transactions.transaction_type', $this->session->userdata('trans_type'));
		
		if($this->session->userdata('trans_api_id')!='')
			$this->db->where('transactions.trans_api_id', $this->session->userdata('trans_api_id'));
			
		if($this->session->userdata('trans_status')!='' && $this->session->userdata('trans_status')!='Others')
			$this->db->where(''.$this->tblName.'.system_transaction_status', $this->session->userdata('trans_status'));
		elseif($this->session->userdata('trans_status')!='')
			$this->db->where(''.$this->tblName.'.transaction_status', NULL);
			
		//$this->db->order_by('payment_date', 'DESC');
        $result = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $result->num_rows();
    }
	
	//------------get all transactions for report----------
    public function getTransactionsReport($sorting){
        $this->db->select(''.$this->tblName.'.*, users.first_name, users.last_name, users.company_name');
		$this->db->from($this->tblName);
		$this->db->join('users', 'users.user_id = '.$this->tblName.'.user_id', 'INNER');
		//$this->db->where(''.$this->tblName.'.transaction_mode !=', 'sandbox');
		
		if($this->session->userdata('transDateFrom')!='')
			$this->db->where('DATE('.$this->tblName.'.payment_date) >=', $this->session->userdata('transDateFrom'));
		if($this->session->userdata('trans_date_to')!='')
			$this->db->where('DATE('.$this->tblName.'.payment_date) <=', $this->session->userdata('trans_date_to'));
		if($this->session->userdata('billing_first_name')!='')
			$this->db->like('transactions.billing_first_name', $this->session->userdata('billing_first_name'));
		
		if($this->session->userdata('billing_last_name')!='')
			$this->db->like('transactions.billing_last_name', $this->session->userdata('billing_last_name'));
		
		if($this->session->userdata('company_name')!='')
			$this->db->like('users.company_name', $this->session->userdata('company_name'));
		
		if($this->session->userdata('trans_type')!='')
			$this->db->like('transactions.transaction_type', $this->session->userdata('trans_type'));
		
		if($this->session->userdata('trans_api_id')!='')
			$this->db->where('transactions.trans_api_id', $this->session->userdata('trans_api_id'));
		
		if($this->session->userdata('trans_status')!='' && $this->session->userdata('trans_status')!='Others')
			$this->db->where(''.$this->tblName.'.system_transaction_status', $this->session->userdata('trans_status'));
		elseif($this->session->userdata('trans_status')!='')
			$this->db->where(''.$this->tblName.'.transaction_status', NULL);
		
		if($sorting['orderBy']!='' && $sorting['orderBy']=='companyName')
			$this->db->order_by('users.company_name', strtoupper($sorting['sortOrder']));
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='custormerName')
			$this->db->order_by(''.$this->tblName.'.billing_first_name', strtoupper($sorting['sortOrder']));
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='amount')
			$this->db->order_by(''.$this->tblName.'.amount', strtoupper($sorting['sortOrder']));
		
		if($sorting['orderBy']!='' && $sorting['orderBy']=='transactionDate')
			$this->db->order_by(''.$this->tblName.'.payment_date', strtoupper($sorting['sortOrder']));
		
		//$result = $this->db->get();
		//$this->db->order_by(''.$this->tblName.'.payment_date', 'DESC');
		//echo $this->db->last_query(); exit;
        return $this->db->get();
    }
	//------------get Transaction Detail----------
    public function getTransactionDetail($transactionId){
        $this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('id', $transactionId);
        return $this->db->get()->row();
		//echo $this->db->last_query(); exit;
    }
	//get customer response on transactions
	public function getTransactionResponse($transId){
		$this->db->select('*');
		$this->db->from('transactions_response');
		$this->db->where('trans_id', $transId);
        $result = $this->db->get();
		$customerResponse = '';
		if($result->num_rows()>0){
			foreach($result->result() as $row){
				if($customerResponse!='')
					$customerResponse .= ', '.$row->response;
				else
					$customerResponse .= $row->response;
			}
			return $customerResponse;
		}
		return false;
	}
	
	//get all Api List
	public function getAllApi(){
		$this->db->select('*');
		$this->db->from('khitomer_api');
		$this->db->order_by('api_name', 'asc');
        return $this->db->get()->result();
	}

}
