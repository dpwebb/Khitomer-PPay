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
    public function getAllTransactions($userId, $transDateFrom='', $transDateTo='', $limit=0, $start=0){
        $this->db->select('transactions.*, khitomer_api.api_id, khitomer_api.api_name, khitomer_api.response_code');
		$this->db->from('transactions');
		$this->db->join('khitomer_api', 'transactions.trans_api_id=khitomer_api.api_id', 'INNER');
		$this->db->where('transactions.user_id', $userId);
		if($transDateFrom!='')
			$this->db->where('transactions.payment_date >=', $transDateFrom);
		if($transDateTo!='')
			$this->db->where('transactions.payment_date <=', $transDateTo);
		
		$this->db->order_by('transactions.payment_date', 'DESC');
		$result = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $result;
    }
	//------------count Total Transactions----------
    public function countTotalTransactions($userId, $transDateFrom='', $transDateTo=''){
        $this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		if($transDateFrom!='')
			$this->db->where('payment_date >=', $transDateFrom);
		if($transDateTo!='')
			$this->db->where('payment_date <=', $transDateTo);
		
		$this->db->order_by('payment_date', 'DESC');
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
    public function getUserAPI($userId){
        $this->db->select('khitomer_api.*, user_api_list.api_list_sort_order');
		$this->db->from('khitomer_api');
		$this->db->join('user_api_list', 'khitomer_api.api_id=user_api_list.api_list_api_id', 'inner');
		$this->db->where('khitomer_api.api_status', 1);
		$this->db->where('user_api_list.api_list_user_id', $userId);
		$this->db->order_by('user_api_list.api_list_sort_order', 'ASC');
        return $this->db->get()->result();
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
    public function getTransactionsReport($userId){
        $this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		$this->db->order_by('transactions.payment_date', 'DESC');
        return $this->db->get();
    }

	//------------count user transactions balance----------
    public function countTotalBalance($userId, $transStatus){
        $this->db->select('SUM(amount) as totalBalance');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		$this->db->where('transaction_status', $transStatus);
		if($transStatus=='ERROR')
			$this->db->or_where('transaction_status', 'DECLINED');
			
        return $this->db->get()->row()->totalBalance;
    }
}
