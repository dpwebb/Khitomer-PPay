<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Brightspeed {
	
	public $CI;
    public $api_url;
    public $merchantno;
    public $secertskey;
	
	public function __construct(){
        $this->CI = &get_instance();
    }
	
	function doTransaction($userData, $apiInfo){
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
		
		$countryCode	= $userData['countryCode'];
		$stateCode		= $userData['stateCode'];
		
		$apiToken   	= $this->secertskey;

		$postData = array();
		$postData['SOURCE']				= $userData['order_number'];
		$postData['FIRSTNAME'] 			= $userData['billing_first_name'];
		$postData['LASTNAME']			= $userData['billing_last_name'];
		$postData['MIDDLEINITIAL']		= '';
		$postData['COMPANYOR2NDNAME']	= '';
		$postData['CHECKAGE']			= '';
		$postData['ADDRESS'] 			= $userData['billing_address_1'];
		$postData['CITY']				= $userData['billing_city_name'];
		$postData['STATE']				= $userData['stateCode'];
		$postData['ZIPCODE']			= $userData['billing_zip_code'];
		$postData['EMAIL']				= $userData['billing_email'];
		$postData['PHONENUMBER']		= $userData['billing_phone_no'];
		$postData['OTHERPHONENUMBER']	= '';
		$postData['EMPLOYEENUMBER']		= '';
		$postData['ABANUMBER']			= $userData['routingnumber'];
		$postData['ACCOUNTNUMBER']		= $userData['bankaccountnumber'];
		$postData['AMOUNT']				= $userData['amount'];
		$postData['BANKNAME']			= $userData['bankname'];//Name of customer's bank.
		
		$postData['BANKADDRESS']		= $userData['bankaddress'];
		$postData['BANKCITY']			= $userData['bankcity'];//City of customer's bank.
		$postData['BANKSTATE']			= $userData['bankstateCode'];//State of customer's bank. Must to be 2 character abbreviation.
		$postData['BANKZIPCODE']		= '';
		$postData['BANKPHONE']			= '';
		$postData['BANKFAX']			= '';
		$postData['CHECKNUMBER']		= '';
		$postData['TRANSITNUM']			= '';
		$postData['DEPOSITDATE']		= date('Y-m-d');
		$postData['POSTBACKURL']		= '';
		
		//getPrint($postData); exit; 
		
		//our Api Endpoint URL
		
		$ch = curl_init($this->api_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_USERPWD, $apiToken.":".$apiToken);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FAILONERROR, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		$response = curl_exec($ch);
		curl_close($ch);
		
		//getPrint(json_decode($response)); exit;
		return json_decode($response);
		
	}
}
