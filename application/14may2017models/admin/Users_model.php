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
    public function getAllUsers(){
        $this->db->select('*');
		$this->db->from($this->tblName);
		$this->db->where('user_type!=', 'admin');
		$this->db->order_by('date_joined', 'DESC');
        return $this->db->get();
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
