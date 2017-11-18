<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{
	public $tblName;
    public function __construct(){
        parent::__construct();
		$this->tblName = 'users';
    }
	//------------validate user detail----------
    public function validateUserDetail($where){
        $this->db->select('*');
		$this->db->from($this->tblName);
		$this->db->where($where);
        return $this->db->get();
    }
	
	//------------get user transactions----------
    public function getAllTransactions($sorting, $userId, $limit=0, $start=0){
        $this->db->select('transactions.*, khitomer_api.api_id, khitomer_api.api_name, khitomer_api.response_code');
		$this->db->from('transactions');
		$this->db->join('khitomer_api', 'transactions.trans_api_id=khitomer_api.api_id', 'INNER');
		$this->db->where('transactions.user_id', $userId);
		
		if($this->session->userdata('transDateFrom')!='')
			$this->db->where('DATE(transactions.payment_date) >=', $this->session->userdata('transDateFrom'));
			
		if($this->session->userdata('trans_date_to')!='')
			$this->db->where('DATE(transactions.payment_date) <=', $this->session->userdata('trans_date_to'));
		
		if($this->session->userdata('billing_first_name')!='')
			$this->db->like('transactions.billing_first_name', $this->session->userdata('billing_first_name'));
		
		if($this->session->userdata('billing_last_name')!='')
			$this->db->like('transactions.billing_last_name', $this->session->userdata('billing_last_name'));
		
		if($this->session->userdata('trans_type')!='')
			$this->db->like('transactions.transaction_type', $this->session->userdata('trans_type'));
			
		if($this->session->userdata('trans_status')!='' && $this->session->userdata('trans_status')!='Others')
			$this->db->where('transactions.system_transaction_status', $this->session->userdata('trans_status'));
			
		elseif($this->session->userdata('trans_status')!='')
			$this->db->where('transactions.transaction_status', NULL);
		
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='custormerName')
			$this->db->order_by('transactions.billing_first_name', strtoupper($sorting['sortOrder']));
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='amount')
			$this->db->order_by('transactions.amount', strtoupper($sorting['sortOrder']));
		
		if($sorting['orderBy']!='' && $sorting['orderBy']=='transactionDate')
			$this->db->order_by('transactions.payment_date', strtoupper($sorting['sortOrder']));
		
		$this->db->limit($limit, $start);
		
		$result = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $result;
    }
	//------------count Total Transactions----------
    public function countTotalTransactions($userId){
        $this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		
		if($this->session->userdata('transDateFrom')!='')
			$this->db->where('DATE(transactions.payment_date) >=', $this->session->userdata('transDateFrom'));
			
		if($this->session->userdata('trans_date_to')!='')
			$this->db->where('DATE(transactions.payment_date) <=', $this->session->userdata('trans_date_to'));
		
		if($this->session->userdata('billing_first_name')!='')
			$this->db->like('transactions.billing_first_name', $this->session->userdata('billing_first_name'));
		
		if($this->session->userdata('billing_last_name')!='')
			$this->db->like('transactions.billing_last_name', $this->session->userdata('billing_last_name'));
		
		if($this->session->userdata('trans_type')!='')
			$this->db->like('transactions.transaction_type', $this->session->userdata('trans_type'));
		
		if($this->session->userdata('trans_status')!='' && $this->session->userdata('trans_status')!='Others')
			$this->db->where('transactions.system_transaction_status', $this->session->userdata('trans_status'));
			
		elseif($this->session->userdata('trans_status')!='')
			$this->db->where('transactions.transaction_status', NULL);
		
        $result = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $result->num_rows();
    }
	//------------get Transaction Detail----------
    public function getTransactionDetail($transactionId, $userId){
        $this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('id', $transactionId);
		$this->db->where('user_id', $userId);
        return $this->db->get()->row();
		//echo $this->db->last_query(); exit;
    }
	
	//------------get api list----------
    public function getUserAPI($userId, $apiType){
        $this->db->select('khitomer_api.*, user_api_list.api_list_sort_order');
		$this->db->from('khitomer_api');
		$this->db->join('user_api_list', 'khitomer_api.api_id=user_api_list.api_list_api_id', 'inner');
		$this->db->where('khitomer_api.api_type', $apiType);
		$this->db->where('khitomer_api.api_status', 1);
		$this->db->where('user_api_list.api_list_user_id', $userId);
		$this->db->order_by('user_api_list.api_list_sort_order', 'ASC');
        return $this->db->get()->result();
		//echo $this->db->last_query(); exit;
    }
	
	//------------Get User Api By Currency----------
    public function getUserAPIByCurrency($userId, $apitype, $currencyCode){
        $this->db->select('khitomer_api.*, user_api_list.*');
		$this->db->from('khitomer_api');
		$this->db->join('user_api_list', 'khitomer_api.api_id=user_api_list.api_list_api_id', 'inner');
		$this->db->where('khitomer_api.api_status', 1);
		$this->db->where('khitomer_api.api_type', $apitype);
		$this->db->where('user_api_list.api_list_user_id', $userId);
		$this->db->order_by('user_api_list.api_list_sort_order', 'ASC');
        $result = $this->db->get()->row();
		
		$parentAPiId 	= $result->api_id;
		$apilistMode 	= $result->api_list_mode;
		$apisendEmail	= $result->api_send_email;
		$listSortOrder	= $result->api_list_sort_order;
		
		$this->db->select('*');
		$this->db->from('khitomer_api');
		$this->db->where('api_status', 1);
		$this->db->where('api_type', $apitype);
		$this->db->where('api_currency', $currencyCode);
		$this->db->where('parent_id', $parentAPiId);
		$subAccount = $this->db->get()->row();
		//getPrint($subAccount); exit;
		$apiData = array();
		
		$apiData['api_id']				= $subAccount->api_id;
		$apiData['api_type']			= $subAccount->api_type;
		$apiData['api_name']			= $subAccount->api_name;
		$apiData['api_mode']			= $apilistMode;
		$apiData['api_sandbox_url']		= $subAccount->api_sandbox_url;
		$apiData['api_sandbox_user']	= $subAccount->api_sandbox_user;
		$apiData['api_sandbox_key']		= $subAccount->api_sandbox_key;
		$apiData['api_live_url']		= $subAccount->api_live_url;
		$apiData['api_live_user']		= $subAccount->api_live_user;
		$apiData['api_live_key']		= $subAccount->api_live_key;
		$apiData['api_status']			= $subAccount->api_status;
		$apiData['response_code']		= $subAccount->response_code;
		$apiData['api_currency']		= $subAccount->api_currency;
		$apiData['api_send_email']		= $apisendEmail;
		$apiData['api_list_sort_order'] = $listSortOrder;
		
		$apiResult = (object)$apiData;
		return $apiResult;
		//echo $this->db->last_query(); exit;
    }
	
	//------------get ACH API----------
    public function getAchAPI($apiId){
        $this->db->select('*');
		$this->db->from('khitomer_api');
		$this->db->where('khitomer_api.api_status', 1);
		$this->db->where('api_id', $apiId);
        return $this->db->get()->row();
		//echo $this->db->last_query(); exit;
    }
	//------------Total Users processed by Affiliate----------
    public function getTotalUsers($userId){
        $this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
        return $this->db->get()->num_rows();
    }
	//------------count user transactions balance----------
    public function getTotalTransactions($userId){
        $this->db->select('SUM(amount) as totalBalance');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
        return $this->db->get()->row()->totalBalance;
    }
	//------------get all transactions for report----------
    public function getTransactionsReport($userId, $sorting){
        $this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		
		if($this->session->userdata('transDateFrom')!='')
			$this->db->where('DATE(transactions.payment_date) >=', $this->session->userdata('transDateFrom'));
			
		if($this->session->userdata('trans_date_to')!='')
			$this->db->where('DATE(transactions.payment_date) <=', $this->session->userdata('trans_date_to'));
		
		if($this->session->userdata('billing_first_name')!='')
			$this->db->like('transactions.billing_first_name', $this->session->userdata('billing_first_name'));
		
		if($this->session->userdata('billing_last_name')!='')
			$this->db->like('transactions.billing_last_name', $this->session->userdata('billing_last_name'));
			
		if($this->session->userdata('trans_status')!='' && $this->session->userdata('trans_status')!='Others')
			$this->db->where('transactions.system_transaction_status', $this->session->userdata('trans_status'));
		elseif($this->session->userdata('trans_status')!='')
			$this->db->where('transactions.transaction_status', NULL);
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='custormerName')
			$this->db->order_by('transactions.billing_first_name', strtoupper($sorting['sortOrder']));
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='amount')
			$this->db->order_by('transactions.amount', strtoupper($sorting['sortOrder']));
		
		if($sorting['orderBy']!='' && $sorting['orderBy']=='transactionDate')
			$this->db->order_by('transactions.payment_date', strtoupper($sorting['sortOrder']));
		
        return $this->db->get();
    }

	//------------count user transactions balance----------
    public function countTotalBalance($userId, $transStatus){
        /*$this->db->select('SUM(amount) as totalBalance');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		$this->db->where('system_transaction_status', $transStatus);
		if($transStatus=='error'){
			$this->db->or_where('system_transaction_status', 'declined');
			$this->db->or_where('system_transaction_status', NULL);
		}
		if($transStatus=='success')
			$this->db->where_in('system_transaction_status', 'ok', 'approved', 'success');
		if($transStatus=='pending')
			$this->db->where_in('system_transaction_status', 'pending');*/
			
		$sqlCommand = "SELECT SUM(`amount`) as totalBalance FROM `transactions` WHERE `user_id`=".$userId."";
		if($transStatus=='error' || $transStatus=='declined'){
			$sqlCommand .=" AND (`system_transaction_status` ='error' OR `system_transaction_status`='declined' OR `system_transaction_status`='decline' OR `system_transaction_status` IS NULL)";
		}
		
		if($transStatus=='success' || $transStatus=='approved'){
			$sqlCommand .=" AND (`system_transaction_status`='success' OR `system_transaction_status`='approved' OR `system_transaction_status`='ok')";
		}
		
		if($transStatus=='pending'){
			$sqlCommand .=" AND `system_transaction_status`='pending'";
		}
		//echo $sqlCommand; exit;
		$result		= $this->db->query($sqlCommand);
			
        return $result->row()->totalBalance;
    }
}
