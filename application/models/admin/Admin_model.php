<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

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
	
	//------------count user transactions balance----------
    public function countTotalBalance($transStatus){
        /*$this->db->select('SUM(amount) as totalBalance');
		$this->db->from('transactions');
		$this->db->where('transaction_status', $transStatus);
		if($transStatus=='ERROR')
			$this->db->or_where('transaction_status', 'DECLINED');*/
		$sqlCommand = "SELECT SUM(`amount`) as totalBalance FROM `transactions` WHERE ";
		if($transStatus=='error' || $transStatus=='declined'){
			$sqlCommand .=" `system_transaction_status` ='error' OR `system_transaction_status`='declined' OR `system_transaction_status`='decline' OR `system_transaction_status` IS NULL";
		}
		
		if($transStatus=='success' || $transStatus=='approved'){
			$sqlCommand .=" `system_transaction_status`='success' OR `system_transaction_status`='approved' OR `system_transaction_status`='ok'";
		}
		
		if($transStatus=='pending'){
			$sqlCommand .=" `system_transaction_status`='pending'";
		}
		//echo $sqlCommand; exit;
		$result		= $this->db->query($sqlCommand);
			
        return $result->row()->totalBalance;
			
        return $this->db->get()->row()->totalBalance;
    }

}
