<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paytoo {
	
	public $CI;
    public $api_url;
    public $merchantno;
    public $secertskey;
	
	public function __construct(){
        $this->CI = &get_instance();
		$this->CI->load->library('PaytooAccountType');
		$this->CI->load->library('PaytooCreditCardType');
    }
	
	function doTransaction($userData, $apiInfo){
		//getPrint($userData); exit;
		//getPrint($apiInfo); exit;
		/*getPrint($this->CI->paytooaccounttype);
		getPrint($this->CI->paytoocreditcardtype);
		*/
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
		
		$opts = array(
        'ssl'   => array(
                'verify_peer'          => false,
                'allow_self-signed' => true,                        
                'ciphers' => "SHA1"
            )
        );
        $streamContext = stream_context_create($opts);

$params = array(    
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS,                
            'stream_context'     => $streamContext,
            'cache_wsdl' => NULL,                    
        );
		if($apiInfo->api_mode=='live')
			$payToo			= new SoapClient($this->api_url, $params);
		else
			$payToo			= new SoapClient($this->api_url);
		
		$payTooLogin	= $payToo->auth($this->merchantno, $this->secertskey);
		/*$PaytooCreditCard 	= array(
								'cc_type'=>$userData['card_type'],
								'cc_number'=>(int)$userData['cardnumber'],
								'cc_exp_month'=>$userData['expmonth'],
								'cc_exp_year'=>$userData['expyear'],
								'cc_cvv'=>$userData['cardCVV']
							  );*/
		/*echo '<pre>';
		print_r($payTooLogin);
		echo '</pre>';
		exit;*/
		
		$this->CI->paytoocreditcardtype->cc_type 		= $userData['card_type']; // mandatory
		$this->CI->paytoocreditcardtype->cc_holder_name = $userData['billing_first_name'].' '.$userData['billing_last_name']; // mandatory
		$this->CI->paytoocreditcardtype->cc_number 		= (int)$userData['cardnumber']; // mandatory
		$this->CI->paytoocreditcardtype->cc_cvv 		= $userData['cardCVV']; // mandatory
		$this->CI->paytoocreditcardtype->cc_month 		= $userData['expmonth']; // mandatory
		$this->CI->paytoocreditcardtype->cc_year 		= $userData['expyear']; // mandatory
		/*$PaytooAccount	 	= array(
								'email'=>$userData['billing_email'],
								'firstname'=>$userData['billing_first_name'],
								'lastname'=>$userData['billing_last_name'],
								'address'=>$userData['billing_address_1'],
								'city'=>$userData['billing_city_name'],
								'state'=>$stateCode,
								'zipcode'=>$userData['billing_zip_code'],
								'country'=>$countryCode,
								'cellphone'=>$userData['billing_phone_no']
							  );*/
		$this->CI->paytooaccounttype->email		= $userData['billing_email']; // mandatory
		$this->CI->paytooaccounttype->firstname = $userData['billing_first_name']; // mandatory
		$this->CI->paytooaccounttype->lastname	= $userData['billing_last_name']; // mandatory
		$this->CI->paytooaccounttype->registered_phone	= $userData['billing_phone_no']; // 
		$this->CI->paytooaccounttype->address	= $userData['billing_address_1'];
		$this->CI->paytooaccounttype->city		= $userData['billing_city_name'];
		$this->CI->paytooaccounttype->zipcode	= $userData['billing_zip_code'];
		$this->CI->paytooaccounttype->state		= $stateCode;
		$this->CI->paytooaccounttype->country	= $countryCode;
		
		/*getPrint($this->CI->paytooaccounttype);
		getPrint($this->CI->paytoocreditcardtype);;
		exit;*/
		
		$amount				= number_format($userData['amount'],2);
		$currency			= $userData['currency'];
		$ref_id				= $userData['order_number'];
		$description		= $userData['order_description'];
		$addinfo			= '';
		$documents			= '';
		
		//echo $currency; 
		
		$payTooResponse = $payToo->CreditCardSingleTransaction($this->CI->paytoocreditcardtype, $this->CI->paytooaccounttype, $amount,$currency, $ref_id,$description, $addinfo, $documents);
		//getPrint($payTooLogin); 
		//getPrint($payTooResponse); exit;
		
		return $payTooResponse;
		
		
		
	}
}
