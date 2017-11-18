<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
	//------------Total Users----------
    public function getTotalUsers(){
        $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_type!=', 'admin');
        return $this->db->get()->num_rows();
    }
	//------------Total Transactions----------
    public function getTotalTransactions(){
        $this->db->select('*');
		$this->db->from('transactions');
        return $this->db->get()->num_rows();
    }
	//------------Total Apis----------
    public function getTotalApis(){
        $this->db->select('*');
		$this->db->from('khitomer_api');
        return $this->db->get()->num_rows();
    }
	
	//------------All Time Transactios History----------
    public function getAllTimeTransactions($transactionStatus){
		
		$this->db->select('SUM(amount) AS totalBalanceUSD, currency AS currencyUSD');
		$this->db->from('transactions');
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		
		$this->db->where('currency', 'USD');
		$resultUSD = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceGBP, currency AS currencyGBP');
		$this->db->from('transactions');
		if($transactionStatus!='others')
			$this->db->where('system_transaction_status', $transactionStatus);
		else
			$this->db->where('system_transaction_status', NULL);
		$this->db->where('currency', 'GBP');
		$resultGBP = $this->db->get()->row();
		
		$this->db->select('SUM(amount) AS totalBalanceEUR, currency AS currencyEUR');
		$this->db->from('transactions');
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
    public function getTransactionsByToday($transactionStatus){
		
		$currentDate = date('Y-m-d'); //, strtotime("-1 days")
		
		$this->db->select('SUM(amount) AS totalBalanceUSD, currency AS currencyUSD');
		$this->db->from('transactions');
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
    public function getTransactionsByLastWeek($transactionStatus){
		
		$currentDate = date('Y-m-d');
		$lastWeekDate = date('Y-m-d', strtotime("-7 days"));
		
		$this->db->select('SUM(amount) AS totalBalanceUSD, currency AS currencyUSD');
		$this->db->from('transactions');
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
	
	//------------count user transactions balance----------
    public function countTotalBalance($transStatus){

		$sqlCommand = "SELECT SUM(`amount`) as totalBalance FROM `transactions` WHERE ";
		
		//decline,declined,error,Others
		if($transStatus=='error' || $transStatus=='declined'){
			$sqlCommand .=" `system_transaction_status`='decline' OR `system_transaction_status`='declined' OR `system_transaction_status` ='error' OR `system_transaction_status` IS NULL";
		}
		
		//approved,completed,success,ok,cleared
		if($transStatus=='success' || $transStatus=='approved'){
			$sqlCommand .=" `system_transaction_status`='approved' OR `system_transaction_status`='completed' OR`system_transaction_status`='success' OR `system_transaction_status`='ok' OR `system_transaction_status`='cleared'";
		}
		
		//pending, processing
		if($transStatus=='pending'){
			$sqlCommand .=" `system_transaction_status`='pending' OR `system_transaction_status`='processing'";
		}
		
		//expired
		if($transStatus=='expired'){
			$sqlCommand .=" `system_transaction_status`='expired'";
		}
		
		//rejected
		if($transStatus=='rejected'){
			$sqlCommand .=" `system_transaction_status`='rejected'";
		}
		
		//refunded
		if($transStatus=='refunded'){
			$sqlCommand .=" `system_transaction_status`='refunded'";
		}
		//echo $sqlCommand; exit;
		$result		= $this->db->query($sqlCommand);
			
        return $result->row()->totalBalance;
			
        return $this->db->get()->row()->totalBalance;
    }

}
