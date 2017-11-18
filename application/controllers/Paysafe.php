<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions


class Paysafe extends Public_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('test_model');
    }
	
	public function index(){
		$getApiList	= $this->test_model->getUserAPI(2, 'cc');
		//getPrint($getApiList); exit;
		/*$this->load->library('paysafe/paysafeapiclient');
		$this->paysafeapiclient->verifyCredentials($getApiList[0]);*/
		//echo phpinfo(); exit;
		
		$paysafeApiKeyId				= 'test_hafeez';
    	$paysafeApiKeySecret			= $getApiList[0]->api_sandbox_key;
    	$paysafeAccountNumber			= $getApiList[0]->api_sandbox_user;
    	$currencyCode					= 'USD'; // for example: CAD
    	$currencyBaseUnitsMultiplier	= 1; // for example: 100
		
		require_once(APPPATH.'third_party/paysafe.php');
		//exit;
		use Paysafe\PaysafeApiClient;
		use Paysafe\Environment;
		use Paysafe\CardPayments\Authorization;
		
		/*require_once(APPPATH.'third_party/paysafe/PaysafeApiClient.php');
		require_once(APPPATH.'third_party/paysafe/Environment.php');
		require_once(APPPATH.'third_party/paysafe/CardPayments/Authorization.php');
		
		require_once(APPPATH.'third_party/paysafe/PaysafeException.php');
		$PaysafeException = new PaysafeException();*/
		
		$client = new PaysafeApiClient($paysafeApiKeyId, $paysafeApiKeySecret, Environment::TEST, $paysafeAccountNumber);
		getPrint($client); exit;
		$customerInfo = array(
			 'merchantRefNum' => uniqid(date('Ymd-')),
			 'amount' => 10 * $currencyBaseUnitsMultiplier,
			 'settleWithAuth' => true,
			 'card' => array(
				  'cardNum' => 4111111111111111,
				  'cvv' => 123,
				  'cardExpiry' => array(
						'month' => 05,
						'year' => 2018
				 )
			 ),
			 'billingDetails' => array(
				  'street' => '270 Scarlett Rd, 311',
				  'city' => 'Alberta',
				  'state' => 'AB',
				  'country' => 'CA',
				  'zip' => 'M6N 4X7'
		));
		$auth = $client->cardPaymentService()->authorize(new Authorization($customerInfo));
		getPrint($auth); exit;
		die('Payment successful! ID: ' . $auth->id);
	}

}
