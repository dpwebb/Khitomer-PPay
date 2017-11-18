<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{
	
	public $tblName;
	
    public function __construct(){
        parent::__construct();
		$this->tblName = 'users';
    }
	
	//------------validate user detail----------
    public function getUserDetail($where){
        $this->db->select('*');
		$this->db->from($this->tblName);
		$this->db->where($where);
        return $this->db->get()->row();
    }
	//------------get all users----------
    public function getAllUsers($sorting, $limit=0, $start=0){
        $this->db->select('*');
		$this->db->from($this->tblName);
		$this->db->where('user_type!=', 'admin');
		
		if($this->session->userdata('firstName')!='')
			$this->db->like('first_name', $this->session->userdata('firstName'));
		if($this->session->userdata('lastName')!='')
			$this->db->like('last_name', $this->session->userdata('lastName'));
		if($this->session->userdata('userEmail')!='')
			$this->db->like('email', $this->session->userdata('userEmail'));
		if($this->session->userdata('companyName')!='')
			$this->db->like('company_name', $this->session->userdata('companyName'));
		if($this->session->userdata('accountStatus')!='')
			$this->db->where('user_account_status', $this->session->userdata('accountStatus'));
		
		if($sorting['orderBy']!='' && $sorting['orderBy']=='firstName')
			$this->db->order_by('first_name', strtoupper($sorting['sortOrder']));
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='lastName')
			$this->db->order_by('last_name', strtoupper($sorting['sortOrder']));
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='companyName')
			$this->db->order_by('company_name', strtoupper($sorting['sortOrder']));
			
		if($sorting['orderBy']!='' && $sorting['orderBy']=='joiningDate')
			$this->db->order_by('date_joined ', strtoupper($sorting['sortOrder']));
		
		$this->db->limit($limit, $start);
        $result = $this->db->get();
		return $result;
    }
	//------------count Total Users----------
    public function countTotalUsers(){
        $this->db->select('*');
		$this->db->from($this->tblName);
		$this->db->where('user_type!=', 'admin');
		
		if($this->session->userdata('firstName')!='')
			$this->db->like('first_name', $this->session->userdata('firstName'));
		if($this->session->userdata('lastName')!='')
			$this->db->like('last_name', $this->session->userdata('lastName'));
		if($this->session->userdata('userEmail')!='')
			$this->db->like('email', $this->session->userdata('userEmail'));
		if($this->session->userdata('companyName')!='')
			$this->db->like('company_name', $this->session->userdata('companyName'));
		if($this->session->userdata('accountStatus')!='')
			$this->db->where('user_account_status', $this->session->userdata('accountStatus'));
        $result = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $result->num_rows();
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
	
	//------------get api list----------
    public function getUserAPIKey($userId){
		
		$salt = base_convert(bin2hex($this->security->get_random_bytes(64)), 16, 36);
		// If an error occurred, then fall back to the previous method
		if ($salt === FALSE){
			$salt = hash('sha256', time() . mt_rand());
		}
		$newKey = substr($salt, 0, 30);
		$newKey = $newKey.$userId;
		if(strlen($newKey)>40)
			$newKey = substr($salt, 0, 40);
			
        $this->db->select('*');
		$this->db->from('api_keys');
		$this->db->where('api_keys.user_id', $userId);
        $result = $this->db->get();
		/*print_r($result);
		exit;*/
		if($result->num_rows()>0)
			return $result->row_array();
		else{
			//echo $newKey;
			$insertKey['user_id']		= $userId;
			$insertKey['key']			= $newKey;
			$insertKey['level']			= 1;
			$insertKey['ignore_limits'] = 1;
			$insertKey['ip_addresses'] 	= $_SERVER['REMOTE_ADDR'];
			$insertKey['date_created']	= time();
			$this->db->insert('api_keys', $insertKey);
			return $insertKey;
		}
    }
	//------------All Time Transactios History----------
    public function getAllTimeTransactions($userID, $transactionStatus){
		
		$this->db->select('SUM(amount) AS totalBalanceUSD, currency AS currencyUSD');
		$this->db->from('transactions');
		$this->db->where('user_id', $userID);
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		$this->db->where('currency', 'USD');
		$resultUSD = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceGBP, currency AS currencyGBP');
		$this->db->from('transactions');
		$this->db->where('user_id', $userID);
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		$this->db->where('currency', 'GBP');
		$resultGBP = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceEUR, currency AS currencyEUR');
		$this->db->from('transactions');
		$this->db->where('user_id', $userID);
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		$this->db->where('currency', 'EUR');
		$resultEUR = $this->db->get()->row();
		//getPrint(array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR)); exit;
		return array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR);
			
    }
	
	//------------Transactios History For Today----------
    public function getTransactionsByToday($userID, $transactionStatus){
		
		$currentDate = date('Y-m-d'); //, strtotime("-1 days")
		
		$this->db->select('SUM(amount) AS totalBalanceUSD, currency AS currencyUSD');
		$this->db->from('transactions');
		$this->db->where('user_id', $userID);
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		$this->db->where('currency', 'USD');
		$this->db->where('DATE(payment_date) >=', $currentDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$resultUSD = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceGBP, currency AS currencyGBP');
		$this->db->from('transactions');
		$this->db->where('user_id', $userID);
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		$this->db->where('currency', 'GBP');
		$this->db->where('DATE(payment_date) >=', $currentDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$resultGBP = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceEUR, currency AS currencyEUR');
		$this->db->from('transactions');
		$this->db->where('user_id', $userID);
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		$this->db->where('currency', 'EUR');
		$this->db->where('DATE(payment_date) >=', $currentDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$resultEUR = $this->db->get()->row();
		//getPrint(array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR)); exit;
		return array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR);
			
    }
	
	//------------Transactios History For Last Week----------
    public function getTransactionsByLastWeek($userID, $transactionStatus){
		
		$currentDate = date('Y-m-d');
		$lastWeekDate = date('Y-m-d', strtotime("-7 days"));
		
		$this->db->select('SUM(amount) AS totalBalanceUSD, currency AS currencyUSD');
		$this->db->from('transactions');
		$this->db->where('user_id', $userID);
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		$this->db->where('currency', 'USD');
		$this->db->where('DATE(payment_date) >=', $lastWeekDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$resultUSD = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceGBP, currency AS currencyGBP');
		$this->db->from('transactions');
		$this->db->where('user_id', $userID);
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		$this->db->where('currency', 'GBP');
		$this->db->where('DATE(payment_date) >=', $lastWeekDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$resultGBP = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceEUR, currency AS currencyEUR');
		$this->db->from('transactions');
		$this->db->where('user_id', $userID);
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		$this->db->where('currency', 'EUR');
		$this->db->where('DATE(payment_date) >=', $lastWeekDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$resultEUR = $this->db->get()->row();
		//getPrint(array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR)); exit;
		return array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR);
			
    }
}
