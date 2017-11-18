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

}
