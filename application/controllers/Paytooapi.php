<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paytooapi extends Public_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('test_model');
    }
	
	public function index(){
		
		$records = $this->common_model->getAll('addresses');
		$recordInfo = $records->row();
		getPrint(json_decode($recordInfo->transaction_complete_response));
		exit;
		$getApiList	= $this->test_model->getUserAPI(2, 'cc');
		//getPrint($getApiList[0]); exit;
		
		$customerInfo['billing_first_name']		= 'David';
    	$customerInfo['billing_last_name']		= 'P Webb';
		$customerInfo['billing_email']			= 'hafeez.iqbal@gmail.com'; //'dw@khitomer.ca';
		$customerInfo['billing_phone_no']		= '+16479273305';
		$customerInfo['billing_address_1']		= '270 Scarlett Road';
		$customerInfo['billing_address_2']		= '';
		$customerInfo['billing_city_name']		= 'York';
		$customerInfo['billing_state_id']		= 3613;
		$customerInfo['billing_country_id']		= 223;
		$customerInfo['billing_zip_code'] 		= 'M6N4X7';
		$customerInfo['Samebillingshipping']	= 1;
		$customerInfo['shipping_first_name']	= 'David';
		$customerInfo['shipping_last_name'] 	= 'P Webb';
		$customerInfo['shipping_address_1'] 	= '270 Scarlett Road';
		$customerInfo['shipping_address_2'] 	= ''; 
		$customerInfo['shipping_city_name'] 	= 'York';
		$customerInfo['shipping_state_id']		= 3613;
		$customerInfo['shipping_country_id'] 	= 223;
		$customerInfo['shipping_zip_code']		= 'M6N4X7';
		$customerInfo['currency']				= 'USD';
		$customerInfo['affiliate_customer_id']	= '';
		$customerInfo['order_number']			= 4325345;
		$customerInfo['order_description']		= 'test order';
		$customerInfo['card_type']				= 'VISA';
		$customerInfo['cardnumber']				= 4444333322221111; //4514011612713808;
		$customerInfo['expmonth']				= 10; //03;
		$customerInfo['expyear']				= 2020; //2018;
		$customerInfo['cardCVV']				= 123; //184;
		$customerInfo['amount']					= 10.99;
		$customerInfo['countryCode']			= 'CA';
		$customerInfo['stateCode'] 				= 'ON';
		
		$this->load->library('paytoo');
		//getPrint($this->paytoo); exit;
        $apiResponse = $this->paytoo->doTransaction($customerInfo, $getApiList[0]);
		
		$PaytooRequest = json_decode(json_encode($apiResponse->PaytooRequest), True);
		//getPrint($PaytooRequest['key']);
		//echo $PaytooRequest['key'];
		//getPrint(json_encode($apiResponse));
		//getPrint(json_decode(json_encode($apiResponse)));
		
		$insert['transaction_complete_response'] = json_encode($apiResponse);
		
		$this->common_model->insertData('addresses', $insert);
		$records = $this->common_model->getAll('addresses');
		getPrint($records->result());
	}

}
