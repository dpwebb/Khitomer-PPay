<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brightapi extends Public_Controller {
	
	public function __construct(){
        parent::__construct();
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
    }
	
	public function index(){
		require_once APPPATH."/third_party/brightspeed/ApiRequest.php";
		require_once APPPATH."/third_party/brightspeed/ApiResponse.php";
		require_once APPPATH."/third_party/brightspeed/ApiWrapper.php";
		require_once APPPATH."/third_party/brightspeed/BrightSpeed.php";
		require_once APPPATH."/third_party/brightspeed/CurlClient.php";
		require_once APPPATH."/third_party/brightspeed/BaseTransaction.php";
		require_once APPPATH."/third_party/brightspeed/Transaction.php";
		require_once APPPATH."/third_party/brightspeed/Subscription.php";
		
		
		//set API Token
		$apiToken   = "21616a2ec1a491de5de5adff8950b841";
		//set API Base URL
		$apiBaseUrl = "https://portal.bright-speed.com";
		
		$api = new apiWrapper($apiToken, $apiBaseUrl);
		$transaction = new Transaction();
		
		getPrint($api);
		/*$postData = array();
		
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
		
		getPrint($dpxResponse);*/
		
	}
}
