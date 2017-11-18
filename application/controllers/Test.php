<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions


class Test extends Public_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('test_model');
    }
	
	public function index(){
		$getApiList	= $this->test_model->getUserAPI(2, 'ach');
		getPrint($getApiList[0]); //exit;
		$this->load->library('DirectPayExpress');
		$this->directpayexpress->setCredentials($getApiList[0]);
		$expressData = array();
		$expressData['external_order_id']	= '54373';
		$expressData['phone_number']		= '+19052673355';
		$expressData['email'] 				= 'hafeez.iqbal@gmail.com';
		$expressData['first_name']			= 'hafeez';
		$expressData['last_name']			= 'iqbal';
		$expressData['amount']				= 10.50;
		$expressData['type']				= 'generic';
		$expressData['description'] 		= 'paying for pc services';
		$expressData['redirectUrl'] 		= 'https://www.khitomer.ca/payment/users/directPayExpress/';
		$expressData['callbackUrl'] 		= 'https://www.khitomer.ca/payment/users/directPayExpress/';
		$expressData['recurring'] 			= 0;
		$expressData['send_sms'] 			= 0;
		$expressData['mid'] 				= '';
		
		$dpxResponse = $this->directpayexpress->createOrder($expressData);
		getPrint($dpxResponse); exit;
	}

}
