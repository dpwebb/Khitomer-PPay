<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';


class Transactions extends REST_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->library('format');
		$this->load->model('api/transactions_model');
    }
	
	public function Process_post(){
		$merchantId			= $this->post('merchantid');
		$merchantKey     	= $this->post('merchant_key');
		$merchantPassword   = $this->post('merchant_password');
		
		$authentication = $this->transactions_model->verifyApiCredentials($merchantId, $merchantKey, $merchantPassword);
		
		$apiData['billing_first_name'] 		= $this->post('first_name');
		$apiData['billing_last_name'] 		= $this->post('last_name');
		$apiData['billing_email'] 			= $this->post('user_email');
		$apiData['billing_phone_no'] 		= $this->post('user_phone');
		$apiData['billing_address_1'] 		= $this->post('address1');
		$apiData['billing_address_2'] 		= $this->post('address2');
		$apiData['billing_city_name'] 		= $this->post('city');
		$apiData['billing_zip_code'] 		= $this->post('zip');
		
		$apiData['countryCode'] 			= $this->post('country');
		$apiData['stateCode'] 				= $this->post('state');
		
		$apiData['affiliate_customer_id']	= $this->post('affiliate_customer_id');
		$apiData['currency']				= $this->post('currency');
		$apiData['order_number']			= $this->post('order_number');
		$apiData['order_description']		= $this->post('order_description');
		$apiData['card_type']				= $this->post('card_type');
		$apiData['cardnumber']				= preg_replace('/\s+/', '', $this->post('card_number'));
		$apiData['expmonth']				= $this->post('card_exp_month');
		$apiData['expyear']					= $this->post('card_exp_year');
		$apiData['cardCVV']					= $this->post('cvv');
		$apiData['amount']					= $this->post('amount');
		$apiData['user_ip'] 				= $this->post('user_ip');
		
		
		if($authentication==true){
			$getApiList	= $this->transactions_model->getUserAPI($merchantId, 'cc');
			$userInfo	= $this->transactions_model->getUserInfo($merchantId);
			/*$message = array(
						'status' => $merchantId,
						'message' => json_encode($getApiList)
					);
			$this->set_response($message, REST_Controller::HTTP_OK);
			exit;*/
			
			$payingAmount 	= number_format($apiData['amount'],2);
			$cardNumber		= $apiData['cardnumber'];
			$expiryMonth	= $apiData['expmonth'];
			$expiryYear		= $apiData['expyear'];
			$cardCVV		= $apiData['cardCVV'];
			
			$transDone			= 0;
			$nameOfApiForTrans	= '';
			$transApiID			= '';
			
			foreach($getApiList as $apiInfo){
				if($apiInfo->api_name=='NMI' && $transDone == 0){
					$expiryDate		= $expiryMonth.substr($expiryYear,-2,2);
					$billingInfo	= userBillingInfo($apiData, true);
					$shippingInfo	= userShippingInfo($apiData, true);
					$this->load->library('gwapi');
					$this->gwapi->setLogin($apiInfo);
					$this->gwapi->setBilling($billingInfo, $userInfo->company_name);
					$this->gwapi->setShipping($shippingInfo, $userInfo->company_name);
					$this->gwapi->setOrder($_POST);
					$apiResponse = $this->gwapi->doSale($payingAmount,$cardNumber, $expiryDate, $cardCVV);
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;
					$transactionMode	= $apiInfo->api_mode;
					if($apiResponse['response']==2)
						$transDone == 0;
					elseif($apiResponse['response']==1){
						$transDone == 1;
						break;
					}
				}elseif($apiInfo->api_name=='PayToo' && $transDone == 0){
					$this->load->library('paytoo');
                    $apiResponse = $this->paytoo->doTransaction($_POST, $apiInfo);
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;	
					$transactionMode	= $apiInfo->api_mode;
					if($apiResponse->status=='ERROR')
						$transDone == 0;
					elseif($apiResponse->status=='OK'){
						$transDone == 1;
						break;
					}
				}elseif($apiInfo->api_name=='Maxpay' && $transDone == 0){
					$this->load->library('maxPay');
                    $apiResponse = $this->maxpay->doTransaction($apiData, $apiInfo);
					$apiResponse = json_decode($apiResponse);
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;	
					$transactionMode	= $apiInfo->api_mode;
					if($apiResponse->status=='decline')
						$transDone == 0;
					elseif($apiResponse->status=='success'){
						$transDone == 1;
						break;
					}
				}elseif($apiInfo->api_name=='Msfunding' && $transDone == 0){
					$this->load->library('MsFunding');
                    $this->msfunding->processPayments($_POST, $apiInfo, $this->session->userdata('userID'));
					exit;
				}
			}
			$ipAddress		= $apiData['user_ip'];
			
			// transaction log
			$transData['user_id']			= $merchantId;
			//billing information
			$transData['billing_first_name']= $apiData['billing_first_name'];
			$transData['billing_last_name']	= $apiData['billing_last_name'];
			$transData['billing_email']		= $apiData['billing_email'];
			$transData['billing_phone_no']	= $apiData['billing_phone_no'];
			$transData['billing_address_1']	= $apiData['billing_address_1'];
			$transData['billing_address_2']	= $apiData['billing_address_2'];
			$transData['billing_city_name']	= $apiData['billing_city_name'];
			$transData['billing_zip_code']	= $apiData['billing_zip_code'];
			$transData['billing_country_code']	= $apiData['countryCode'];
			$transData['billing_state_code']	= $apiData['stateCode'];
			
			
			$transData['transaction_mode']		= $transactionMode;
			$transData['transaction_type']		= 'cc';
			$transData['transaction_from_api']	= 1;
			$transData['affiliate_customer_id']	= $apiData['affiliate_customer_id'];;
			$transData['currency']				= $apiData['currency'];
			$transData['order_number']			= $apiData['order_number'];
			$transData['order_description']		= $apiData['order_description'];
			
			$transData['card_type']				= $apiData['card_type'];
			$transData['card_number']			= $this->_ccMasking($apiData['cardnumber']);
			$transData['expiry_date']			= $apiData['expmonth'].'/'.$apiData['expyear'];
			$transData['security_code']			= $apiData['cardCVV'];
			$transData['amount']				= $apiData['amount'];
			$transData['ipaddress']				= $ipAddress;
			$transData['trans_api_id']			= $transApiID;
			if($nameOfApiForTrans=='NMI'){
				$transData['transaction_id']		= $apiResponse['transactionid'];
				if($apiResponse['response']==1)
					$transData['transaction_status'] = 'APPROVED';
				if($apiResponse['response']==2)
					$transData['transaction_status'] = 'DECLINED';
				if($apiResponse['response']==2)
					$transData['transaction_status'] = 'ERROR';
					
				$transData['transaction_msg']		= $apiResponse['responsetext'];
				
				$this->session->set_flashdata('message', $transData['transaction_msg']);
			}elseif($nameOfApiForTrans=='PayToo'){
				$transData['transaction_status'] = $apiResponse->status;
				if($apiResponse->status=='OK'){
					$transData['transaction_id']		= $apiResponse->tr_id;
					$transData['transaction_msg']		= $apiResponse->request_status;
				}else{
					$transData['transaction_msg']		= $apiResponse->msg;
				}
				$this->session->set_flashdata('message', $apiResponse->msg);
			}elseif($nameOfApiForTrans=='Maxpay'){
				$transData['transaction_status'] = $apiResponse->status;
				if($apiResponse->status=='success'){
					$transData['transaction_id']		= $apiResponse->reference;
					$transData['transaction_msg']		= $apiResponse->message;
				}else{
					$transData['transaction_id']		= $apiResponse->reference;
					$transData['transaction_msg']		= $apiResponse->message;
				}
				$this->session->set_flashdata('message', $apiResponse->message);
			}
			$transData['system_transaction_status']	= strtolower($transData['transaction_status']);
			$transData['modified_by']			= $merchantId;
			$transData['payment_date']			= date('Y-m-d H:i:s');
			
			$transID = $this->transactions_model->insertTransactions(array_filter($transData));
			
			$message = array(
				'transaction_id' => $transID,
				'transaction_status' => $transData['transaction_status'],
				'transaction_reference' => $transData['transaction_id'],
				'message' => $transData['transaction_msg']
			);
			
			$this->set_response($message, REST_Controller::HTTP_OK);		
			
		}else{
			$message = array(
				'status' => 'DECLINED',
				'message' => 'Invalid API Information'
			);
			$this->set_response($message, REST_Controller::HTTP_NON_AUTHORITATIVE_INFORMATION);
		}
    }

	private function _ccMasking($number, $maskingCharacter = '*') {
		return chunk_split(str_repeat($maskingCharacter, strlen($number) - 4) . substr($number, -4), 4, ' ');
	}

}
