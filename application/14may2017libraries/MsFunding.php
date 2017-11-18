<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MsFunding {

    public $CI;
    public $api_url;
    public $merchantno;
    public $secertskey;

    public function __construct() {
        $this->CI = &get_instance();
		
    }

    /**
     * Function to process payments
     * 
     * @return array
     */
	function processPayments($userData, $apiInfo, $userID){
		//echo $_POST['amount'];
		//getPrint($userData); exit;
		//getPrint($apiInfo); exit;
		if($apiInfo->api_mode=='live'){
			$this->api_url		= $apiInfo->api_live_url;
			$this->merchantno	= $apiInfo->api_live_user;
			$this->secertskey	= $apiInfo->api_live_key;
		}else{
			$this->api_url		= $apiInfo->api_sandbox_url;
			$this->merchantno	= $apiInfo->api_sandbox_user;
			$this->secertskey	= $apiInfo->api_sandbox_key;
		}
		/*echo $this->api_url;
		echo $this->merchantno;
		echo $this->secertskey;
		exit;*/
		$payingAmount 	= number_format($userData['amount'],2);
		$cardNumber		= preg_replace('/\s+/', '', $userData['cardnumber']);
		$expiryMonth	= $userData['expmonth'];
		$expiryYear		= $userData['expyear'];
		$cardCVV		= $userData['cardCVV'];
		$customerID		= $userData['affiliate_customer_id'];
		$ipAddress		= $_SERVER['REMOTE_ADDR'];
		$countryCode	= getColumnValue('country', 'iso_code_2', $where='country_id='.$userData['billing_country_id']);
		$stateCode		= getColumnValue('states', 'code', $where='state_id='.$userData['billing_state_id']);
		
		$postData = array(
					"merchantno" => $this->merchantno,
					"secertskey"=> $this->secertskey,
					"amount" => $payingAmount, 
					"card_number" => $cardNumber,
					"expiration_date" =>$expiryMonth,
					"expiration_year" => $expiryYear,
					"security_code" => $cardCVV,
					"fname" => $userData['billing_first_name'],
					"lname" => $userData['billing_last_name'],
					"customerID" => $customerID,
					"email" => $userData['billing_email'],
					"ip" => $ipAddress,
					"mobile_no" => $userData['billing_phone_no'],
					"country" => $countryCode,
					"state" => $stateCode,
					"city" => $userData['billing_city_name'],
					"address" => $userData['billing_address_1'],
					"zip" => $userData['billing_zip_code'],
				);		
		//getPrint($postData); exit;			
		$ch = curl_init($this->api_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FAILONERROR, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		$output = curl_exec($ch);
		curl_close($ch);
		
		$curlResponse = json_decode($output);
		//getPrint($curlResponse); exit;
		// transaction log
		$transData['user_id']			= $userID;
		//billing information
		$transData['billing_first_name']= $userData['billing_first_name'];
		$transData['billing_last_name']	= $userData['billing_last_name'];
		$transData['billing_email']		= $userData['billing_email'];
		$transData['billing_phone_no']	= $userData['billing_phone_no'];
		$transData['billing_address_1']	= $userData['billing_address_1'];
		$transData['billing_address_2']	= $userData['billing_address_2'];
		$transData['billing_city_name']	= $userData['billing_city_name'];
		$transData['billing_zip_code']	= $userData['billing_zip_code'];
		$transData['billing_country_id']= $userData['billing_country_id'];
		$transData['billing_state_id']	= $userData['billing_state_id'];
		
		//shipping information
		if($userData['shipping_first_name']!='')
			$transData['shipping_first_name']	= $userData['shipping_first_name'];
		if($userData['shipping_last_name']!='')
			$transData['shipping_last_name']	= $userData['shipping_last_name'];
		if($userData['shipping_address_1']!='')
			$transData['shipping_address_1']	= $userData['shipping_address_1'];
		if($userData['shipping_address_2']!='')
			$transData['shipping_address_2']	= $userData['shipping_address_2'];
		if($userData['shipping_city_name']!='')
			$transData['shipping_city_name']	= $userData['shipping_city_name'];
		if($userData['shipping_zip_code']!='')
			$transData['shipping_zip_code']		= $userData['shipping_zip_code'];
		if($userData['shipping_country_id']!='')
			$transData['shipping_country_id']	= $userData['shipping_country_id'];
		if($userData['shipping_state_id']!='')
			$transData['shipping_state_id']		= $userData['shipping_state_id'];
		
		
		$transData['transaction_type']		= $userData['transaction_type'];
		$transData['affiliate_customer_id']	= $userData['affiliate_customer_id'];
		$transData['currency']				= $userData['currency'];
		$transData['order_number']			= $userData['order_number'];
		$transData['order_description']		= $userData['order_description'];
		
		$transData['card_number']			= ccMasking($cardNumber);
		$transData['expiry_date']			= $expiryMonth.'/'.$expiryYear;
		$transData['security_code']			= $cardCVV;
		$transData['amount']				= $payingAmount;
		$transData['ipaddress']				= $ipAddress;
		$transData['trans_api_id']			= $apiInfo->api_id;
		$transData['transaction_status']	= $curlResponse->status;
		$transData['transaction_msg']		= $curlResponse->data->orderInfo;
		$transData['modified_by']			= $this->CI->session->userdata('userID');
		$transData['payment_date']			= date('Y-m-d H:i:s');
		$this->CI->common_model->insertData('transactions', $transData);
		return $curlResponse;
	}


}
