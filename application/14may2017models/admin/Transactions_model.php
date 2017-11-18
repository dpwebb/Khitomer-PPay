<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions_model extends CI_Model{
	
	public $tblName;
	
    public function __construct(){
        parent::__construct();
		$this->tblName = 'transactions';
    }
	
	//------------get all Transactions----------
    public function getAllTransactions($transDateFrom='', $transDateTo='', $limit=0, $start=0){
        $this->db->select(''.$this->tblName.'.*, khitomer_api.api_id, khitomer_api.api_name, khitomer_api.response_code');
		$this->db->from($this->tblName);
		$this->db->join('khitomer_api', ''.$this->tblName.'.trans_api_id=khitomer_api.api_id', 'INNER');
		
		if($transDateFrom!='')
			$this->db->where(''.$this->tblName.'.payment_date >=', $transDateFrom);
		if($transDateTo!='')
			$this->db->where(''.$this->tblName.'.payment_date <=', $transDateTo);
		
		$this->db->order_by(''.$this->tblName.'.payment_date', 'DESC');
		$this->db->limit($limit, $start);
			
        $result = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $result;
    }
	//------------count Total Transactions----------
    public function countTotalTransactions($transDateFrom='', $transDateTo=''){
        $this->db->select('*');
		$this->db->from($this->tblName);
		
		if($transDateFrom!='')
			$this->db->where('payment_date >=', $transDateFrom);
		if($transDateTo!='')
			$this->db->where('payment_date <=', $transDateTo);
		
		$this->db->order_by('payment_date', 'DESC');
        $result = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $result->num_rows();
    }
	
	//------------get all transactions for report----------
    public function getTransactionsReport(){
        $this->db->select(''.$this->tblName.'.*, users.first_name, users.last_name, users.company_name');
		$this->db->from($this->tblName);
		$this->db->join('users', 'users.user_id = '.$this->tblName.'.user_id', 'INNER');
		$this->db->order_by(''.$this->tblName.'.payment_date', 'DESC');
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

}
