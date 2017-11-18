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
	//Insert transactions Records
    public function insertTransactions($data){
        $this->db->insert('transactions', $data);
        return $this->db->insert_id();
    }
   

}
