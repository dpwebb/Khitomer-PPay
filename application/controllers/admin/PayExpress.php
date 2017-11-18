<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payexpress extends Public_Controller {
	
	public function __construct(){
        parent::__construct();
    }
	
	public function index(){
		$this->db->select('*');
		$this->db->from('khitomer_api');
		$this->db->where('api_id', 5);
		$result		= $this->db->get();
		$apiInfo	= $result->row();
		//getPrint($apiInfo);
		$this->load->library('DirectPayExpress');
		$this->directpayexpress->setCredentials($apiInfo);
		$postData = array();
		
		$postData['external_order_id']	= 8845327;
		$postData['phone_number']		= '+16479273305';
		$postData['email'] 				= 'hafeez.iqbal@gmail.com';
		$postData['first_name']			= 'hafeez';
		$postData['last_name']			= 'iqbal';
		$postData['amount']				= '10.50';
		$postData['type']				= 'generic';
		$postData['description'] 		= 'test order';
		$postData['redirectUrl'] 		= '';
		$postData['callbackUrl'] 		= '';
		$postData['recurring'] 			= 0;
		$postData['send_sms'] 			= 0;
		$postData['mid'] 				= '';
		
		$dpxResponse = $this->directpayexpress->createOrder($postData);
		
		getPrint($dpxResponse);
		
	}
}
