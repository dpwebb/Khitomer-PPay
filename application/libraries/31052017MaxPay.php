<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MaxPay {

    private $CI;
    private $api_url;
    private $merchantno;
    private $secertskey;

    public function __construct() {
        $this->CI = &get_instance();
    }

    function doTransaction($userData, $apiInfo){
		//getPrint($userData); exit;
        if($apiInfo->api_mode=='live'){
			$this->api_url		= $apiInfo->api_live_url;
			$this->merchantno	= $apiInfo->api_live_user;
			$this->secertskey	= $apiInfo->api_live_key;
		}else{
			$this->api_url		= $apiInfo->api_sandbox_url;
			$this->merchantno	= $apiInfo->api_sandbox_user;
			$this->secertskey	= $apiInfo->api_sandbox_key;
		}
		//getPrint($userData); exit;
		$payingAmount 	= number_format($userData['amount'],2);
		$cardNumber		= preg_replace('/\s+/', '', $userData['cardnumber']);
		$expiryMonth	= $userData['expmonth'];
		$expiryYear		= $userData['expyear'];
		$cardCVV		= $userData['cardCVV'];
		$customerID		= $userData['affiliate_customer_id'];
		$ipAddress		= $_SERVER['REMOTE_ADDR'];
		$countryCode	= $userData['countryCode'];
		$stateCode		= $userData['stateCode'];
		
		$postData = array();
					
		$postData['api_version']			= 1;
		$postData['merchant_account']		= $this->merchantno;
		$postData['merchant_password']		= $this->secertskey;
		$postData['transaction_unique_id']	= mt_rand(1,99).mt_rand(1,999999);
		$postData['transaction_type'] 		= "SALE";
		$postData['amount']					= $payingAmount;
		$postData['currency']				= $userData['currency'];
		$postData['card_number']			= $cardNumber;
		$postData['card_exp_month']			= $expiryMonth;
		$postData['card_exp_year']			= $expiryYear;
		$postData['cvv']					= $cardCVV;
		$postData['first_name'] 			= $userData['billing_first_name'];
		$postData['last_name'] 				= $userData['billing_last_name'];
		$postData['card_holder'] 			= $userData['billing_first_name'].' '.$userData['billing_last_name'];
		$postData['address'] 				= $userData['billing_address_1'];
		$postData['city'] 					= $userData['billing_city_name'];
		$postData['state'] 					= $stateCode;
		$postData['zip'] 					= $userData['billing_zip_code'];
		$postData['country'] 				= $countryCode;
		$postData['user_phone'] 			= $userData['billing_phone_no'];
		$postData['user_email'] 			= $userData['billing_email'];
		$postData['user_ip'] 				= $_SERVER['SERVER_ADDR'];//$_SERVER['REMOTE_ADDR'];
		$postData['merchant_affiliate_id'] 	= $userData['affiliate_customer_id'];
		$postData['merchant_product_name'] 	= $userData['order_description'];
		
		//getPrint($postData); exit;
		
        $ch = curl_init($this->api_url);
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($postData));
		curl_setopt($ch,CURLOPT_HTTPHEADER,array("Content-Type: application/json"));
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
		/*echo '<pre>';
		print_r(json_decode($response));
		echo '</pre>';
		exit;*/

    }



}
