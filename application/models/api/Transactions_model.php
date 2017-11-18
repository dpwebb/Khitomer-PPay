<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions_model extends CI_Model {


    public function __construct() {
        parent::__construct();
    }

    public function verifyApiCredentials($merchantId, $merchantKey, $merchantPassword) {
        $this->db->select('*');
        $this->db->from('api_keys');
        $this->db->where('user_id', $merchantId);
		$this->db->where('key', $merchantKey);
        $resultSet = $this->db->get();
        if ($resultSet->num_rows() > 0) {
            $this->db->select('*');
			$this->db->from('users');
			$this->db->where('user_id', $merchantId);
			$this->db->where('password', $merchantPassword);
			$resultSet = $this->db->get();
			if ($resultSet->num_rows() > 0)
				return true;
			else
				return false;			
        }
        return false;
    }
	//------------get user Info----------
    public function getUserInfo($merchantId){
        $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id', $merchantId);
        return $this->db->get()->row();
    }
	//------------get api list----------
    public function getUserAPI($userId, $apitype){
        $this->db->select('khitomer_api.*, user_api_list.*');
		$this->db->from('khitomer_api');
		$this->db->join('user_api_list', 'khitomer_api.api_id=user_api_list.api_list_api_id', 'inner');
		$this->db->where('khitomer_api.api_status', 1);
		$this->db->where('khitomer_api.api_type', $apitype);
		$this->db->where('user_api_list.api_list_user_id', $userId);
		$this->db->order_by('user_api_list.api_list_sort_order', 'ASC');
        $result = $this->db->get()->result();
		//getPrint($result); exit;
		$apiData = array();
		foreach($result as $row){
			$apiData['api_id']				= $row->api_id;
			$apiData['api_type']			= $row->api_type;
			$apiData['api_name']			= $row->api_name;
			$apiData['api_mode']			= $row->api_list_mode;
			$apiData['api_sandbox_url']		= $row->api_sandbox_url;
			$apiData['api_sandbox_user']	= $row->api_sandbox_user;
			$apiData['api_sandbox_key']		= $row->api_sandbox_key;
			$apiData['api_live_url']		= $row->api_live_url;
			$apiData['api_live_user']		= $row->api_live_user;
			$apiData['api_live_key']		= $row->api_live_key;
			$apiData['api_status']			= $row->api_status;
			$apiData['response_code']		= $row->response_code;
			$apiData['api_send_email']		= $row->api_send_email;
			$apiData['api_list_sort_order'] = $row->api_list_sort_order;
			$apiResult[] = (object)$apiData;
		}
		return $apiResult;
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
	
	//Insert transactions Records
    public function insertTransactions($data){
        $this->db->insert('transactions', $data);
        return $this->db->insert_id();
    }
   

}
