<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {


    public function __construct() {
        parent::__construct();
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
		//getPrint($apiResult); exit;
		//echo $this->db->last_query(); exit;
    }

}
