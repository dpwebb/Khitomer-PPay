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
        $this->db->select('SUM(amount) as totalBalance');
		$this->db->from('transactions');
		$this->db->where('transaction_status', $transStatus);
		if($transStatus=='ERROR')
			$this->db->or_where('transaction_status', 'DECLINED');
			
        return $this->db->get()->row()->totalBalance;
    }

}
