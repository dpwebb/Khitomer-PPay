<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
	
	//------------All Time Transactios History----------
    public function getAllTimeTransactions($transactionType, $transactionStatus){
		$userId	= $this->session->userdata('userID');
		
		$this->db->select('SUM(amount) AS totalBalanceUSD, currency AS currencyUSD');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		if($transactionStatus=='declined' || $transactionStatus=='decline'){
			$this->db->where_in('system_transaction_status', array('declined', 'decline'));
		}elseif($transactionStatus=='completed'){
			$this->db->where_in('system_transaction_status', array('success','completed','ok'));
		}else
			$this->db->where('system_transaction_status', $transactionStatus);
			
		$this->db->where('currency', 'USD');
		$this->db->where('transaction_type', $transactionType);
		$resultUSD = $this->db->get();
		$resultUSD = $resultUSD->row();
		//echo $this->db->last_query(); //exit;
		
		$this->db->select('SUM(amount) AS totalBalanceGBP, currency AS currencyGBP');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		if($transactionStatus=='declined' || $transactionStatus=='decline'){
			$this->db->where_in('system_transaction_status', array('declined', 'decline'));
		}elseif($transactionStatus=='completed'){
			$this->db->where_in('system_transaction_status', array('success','completed','ok'));
		}else
			$this->db->where('system_transaction_status', $transactionStatus);
		$this->db->where('currency', 'GBP');
		$this->db->where('transaction_type', $transactionType);
		$resultGBP = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceEUR, currency AS currencyEUR');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		if($transactionStatus=='declined' || $transactionStatus=='decline'){
			$this->db->where_in('system_transaction_status', array('declined', 'decline'));
		}elseif($transactionStatus=='completed'){
			$this->db->where_in('system_transaction_status', array('success','completed','ok'));
		}else
			$this->db->where('system_transaction_status', $transactionStatus);
		$this->db->where('currency', 'EUR');
		$this->db->where('transaction_type', $transactionType);
		$resultEUR = $this->db->get()->row();
		//getPrint(array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR)); exit;
		return array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR);
			
    }
	
	//------------Transactios History For Today----------
    public function getTransactionsByToday($transactionType, $transactionStatus){
		$userId	= $this->session->userdata('userID');
		$currentDate = date('Y-m-d'); //, strtotime("-1 days")
		
		$this->db->select('SUM(amount) AS totalBalanceUSD, currency AS currencyUSD');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		if($transactionStatus=='declined' || $transactionStatus=='decline'){
			$this->db->where_in('system_transaction_status', array('declined', 'decline'));
		}elseif($transactionStatus=='completed'){
			$this->db->where_in('system_transaction_status', array('success','completed','ok'));
		}else
			$this->db->where('system_transaction_status', $transactionStatus);
		$this->db->where('currency', 'USD');
		$this->db->where('DATE(payment_date) >=', $currentDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$this->db->where('transaction_type', $transactionType);
		$resultUSD = $this->db->get()->row();
		//echo $this->db->last_query(); exit;
		
		$this->db->select('SUM(amount) AS totalBalanceGBP, currency AS currencyGBP');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		if($transactionStatus=='declined' || $transactionStatus=='decline'){
			$this->db->where_in('system_transaction_status', array('declined', 'decline'));
		}elseif($transactionStatus=='completed'){
			$this->db->where_in('system_transaction_status', array('success','completed','ok'));
		}else
			$this->db->where('system_transaction_status', $transactionStatus);
		$this->db->where('currency', 'GBP');
		$this->db->where('DATE(payment_date) >=', $currentDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$this->db->where('transaction_type', $transactionType);
		$resultGBP = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceEUR, currency AS currencyEUR');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		if($transactionStatus=='declined' || $transactionStatus=='decline'){
			$this->db->where_in('system_transaction_status', array('declined', 'decline'));
		}elseif($transactionStatus=='completed'){
			$this->db->where_in('system_transaction_status', array('success','completed','ok'));
		}else
			$this->db->where('system_transaction_status', $transactionStatus);
		$this->db->where('currency', 'EUR');
		$this->db->where('DATE(payment_date) >=', $currentDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$this->db->where('transaction_type', $transactionType);
		$resultEUR = $this->db->get()->row();
		//getPrint(array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR)); exit;
		return array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR);
			
    }
	
	//------------Transactios History For Last Week----------
    public function getTransactionsByLastWeek($transactionType, $transactionStatus){
		$userId	= $this->session->userdata('userID');
		$currentDate = date('Y-m-d');
		$lastWeekDate = date('Y-m-d', strtotime("-7 days"));
		
		$this->db->select('SUM(amount) AS totalBalanceUSD, currency AS currencyUSD');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		if($transactionStatus=='declined' || $transactionStatus=='decline'){
			$this->db->where_in('system_transaction_status', array('declined', 'decline'));
		}elseif($transactionStatus=='completed'){
			$this->db->where_in('system_transaction_status', array('success','completed','ok'));
		}else
			$this->db->where('system_transaction_status', $transactionStatus);
		$this->db->where('currency', 'USD');
		$this->db->where('DATE(payment_date) >=', $lastWeekDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$this->db->where('transaction_type', $transactionType);
		$resultUSD = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceGBP, currency AS currencyGBP');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		if($transactionStatus=='declined' || $transactionStatus=='decline'){
			$this->db->where_in('system_transaction_status', array('declined', 'decline'));
		}else
			$this->db->where('system_transaction_status', $transactionStatus);
		$this->db->where('currency', 'GBP');
		$this->db->where('DATE(payment_date) >=', $lastWeekDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$this->db->where('transaction_type', $transactionType);
		$resultGBP = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceEUR, currency AS currencyEUR');
		$this->db->from('transactions');
		$this->db->where('user_id', $userId);
		if($transactionStatus=='declined' || $transactionStatus=='decline'){
			$this->db->where_in('system_transaction_status', array('declined', 'decline'));
		}elseif($transactionStatus=='completed'){
			$this->db->where_in('system_transaction_status', array('success','completed','ok'));
		}else
			$this->db->where('system_transaction_status', $transactionStatus);
		$this->db->where('currency', 'EUR');
		$this->db->where('DATE(payment_date) >=', $lastWeekDate);
		$this->db->where('DATE(payment_date) <=', $currentDate);
		$this->db->where('transaction_type', $transactionType);
		$resultEUR = $this->db->get()->row();
		//getPrint(array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR)); exit;
		return array_merge((array) $resultUSD, (array) $resultGBP, (array) $resultEUR);
			
    }
	

}
