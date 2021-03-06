<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Public_Controller {
	public $api_url;
    public $merchantno;
    public $secertskey;
	public function __construct(){
        parent::__construct();
        $this->load->model('users_model');
		//$this->api_url = 'http://msnfunding.com/clientlogin/api/testpayment';
    }
	
	public function signin(){
		loginUser();
		//loginUser();
		//echo $this->ccMasking('4846803702218295'); exit;
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_validateUserDetail');
		//getPrint($data['country']);
		if ($this->form_validation->run() == false){
			$this->load->view('users/signin', $this->data);
		}else{
			//getPrint($this->session->all_userdata()); echo $this->session->userdata('fullName'); exit;
			if($this->session->userdata('userType')=='admin')
				redirect('admin/dashboard');
			else
				redirect('users/dashboard');
		}
		
	}
	//validate user email
    function validateUserDetail(){
        $email = $this->input->post('email');
		$password = $this->input->post('password');
        $result = $this->users_model->validateUserDetail(array('email'=>$email, 'password'=>md5($password)));
		$accountStatus = array('DORMANT','TERMINATED','ARCHIVED','CLOSED');
        if ($result->num_rows() > 0){
            $userInfo = $result->row();
			if($userInfo->status==0){
				$this->form_validation->set_message('validateUserDetail', 'Your account has not been approved by admin yet.');
            return false;
			}elseif(in_array($userInfo->user_account_status, $accountStatus)){
				$this->form_validation->set_message('validateUserDetail', 'Your account has been '.$userInfo->user_account_status.'.');
            return false;
			}else{
				$userData = array(
					'userID'=>$userInfo->user_id,
					'fullName'=>$userInfo->first_name.' '.$userInfo->last_name,
					'userEmail'=>$userInfo->email,
					'userType'=>$userInfo->user_type,
					'companyName'=>$userInfo->company_name,
					'affiliateID'=>$userInfo->merchant_affiliate_id,
					'accountStatus'=>$userInfo->user_account_status,
					'userlogin'=>true,
				);
		    	$this->session->set_userdata($userData);
				return true;
			}
        }else{
            $this->form_validation->set_message('validateUserDetail', 'Your email or password is incorrect.');
            return false;
        }
    }

	public function signup(){
		loginUser();
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('job_title', 'Job title', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		//getPrint($data['country']);
		if ($this->form_validation->run() == false){
			$this->load->view('users/signup', $this->data);
		}else{
			$userData['first_name']		= $this->data['first_name'] 	= $this->input->post('first_name');
			$userData['last_name']		= $this->data['last_name']		= $this->input->post('last_name');
			$userData['company_name']	= $this->data['company_name']	= $this->input->post('company_name');
			$userData['job_title']		= $this->data['job_title']		= $this->input->post('job_title');
			$userData['email']			= $this->data['email']			= $this->input->post('email');
			$userData['mobile_no']		= $this->data['mobile_no']		= $this->input->post('mobile_no');
			$userData['password']		= md5($this->input->post('password'));
			$userData['verified_by_email'] = 0;
			$userData['email_token'] 	= $this->data['emailToken'] = md5(uniqid(rand(), true));
			$userData['date_joined']	= date('Y-m-d H:i:s');
			$this->common_model->insertData('users', $userData);
			
			$this->data['verificationLink'] = base_url('users/verify/'.$userData['email_token']);	
									
			//Email to be sent to admin
			$subjectTitle = 'New Registration at - ' . $this->data['site_name'];
			$this->sendEmail('admin_signup', $subjectTitle, $this->data, $this->data['site_name'], $this->data['no_reply_email'], $this->data['support_email']);
			//Email to be sent to user
			$subjectTitle = 'Welcome to ' . $this->data['site_name'];
			$this->sendEmail('user_signup', $subjectTitle, $this->data, $this->data['site_name'], $this->data['no_reply_email'], $userData['email']);
			
			$this->session->set_flashdata('message', 'Thanks for registering with us!');
			redirect('users/signin');
		}
	}
	// user verification by email
	public function verify(){
		$emailToken	= $this->uri->segment(3);
		$userDetail	= $this->users_model->validateUserDetail(array('email_token'=>$emailToken));
		if(!($userDetail->num_rows())>0){
			$this->session->set_flashdata('error', 'Something went wrong, please try again to verify your account.');
			redirect('users/signup');
		}else{
			$userInfo	= $userDetail->row();
			//getPrint($userInfo); exit;
			$update['verified_by_email']	= 1;
			$this->common_model->updateData('users', $update, array('user_id'=>$userInfo->user_id));
			
			$this->data['first_name']	= $userInfo->first_name;
			$this->data['last_name']	= $userInfo->last_name;
			$this->data['company_name'] = $userInfo->company_name;
			$this->data['job_title']	= $userInfo->job_title;
			$this->data['mobile_no']	= $userInfo->mobile_no;
			$this->data['email']		= $userInfo->email;
			//Email to be sent to admin
			$subjectTitle = $userInfo->first_name.' '.$userInfo->last_name.' has verified his details';
			$this->sendEmail('user_email_verification', $subjectTitle, $this->data, $this->data['site_name'], $this->data['no_reply_email'], $this->data['support_email']);
						
			$this->load->view('users/verify', $this->data);
		}
	}
	public function dashboard(){
		isUserLogin();
		$userID	= $this->session->userdata('userID');
		$this->load->model('dashboard_model');
		$this->data['totalUsers']	= $this->users_model->getTotalUsers($userID);
		//$this->data['totalBalance']	= $this->users_model->getTotalTransactions($userID);
		$this->data['approvedBalance']	= $this->users_model->countTotalBalance($userID, 'approved');
		$this->data['pendingBalance']	= $this->users_model->countTotalBalance($userID, 'pending');
		$this->data['declinedBalance']	= $this->users_model->countTotalBalance($userID, 'error');
		$this->data['contents'] = 'users/dashboard';
		$this->load->view('template', $this->data);
		
	}
	
	//
	public function forgetpassword(){
		loginUser();
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_validateUserEmail');
		if ($this->form_validation->run() == false){
			$this->load->view('users/forgetpassword', $this->data);
		}else{
			$email = $this->input->post('email');
			$userDetail = $this->users_model->validateUserDetail(array('email'=>$email, 'user_type!='=>'admin'));
			$this->data['userDetail'] = $userDetail->row();
			$update['password_token'] = $this->data['passwordToken'] = md5($userDetail->row()->user_id);
			$this->common_model->updateData('users', $update, array('user_id'=>$userDetail->row()->user_id));
			$this->data['passwordLink'] = base_url('users/changepassword/'.$this->data['passwordToken']);
			//exit;
			//getPrint($userDetail->row()); exit;
			//Email to be sent to user
			$subjectTitle = 'Forget Password';
			$this->sendEmail('forgetpassword', $subjectTitle, $this->data, $this->data['site_name'], $this->data['no_reply_email'], $userDetail->row()->email);
			$this->session->set_flashdata('message', 'We\'ve sent a message to the email address associated with your account with instructions for resetting your password.');
			redirect('users/forgetpassword');
		}
		
	}
	//validate user Email
    function validateUserEmail(){
        $email = $this->input->post('email');
        $result = $this->users_model->validateUserDetail(array('email'=>$email, 'user_type!='=>'admin'));
        if ($result->num_rows() > 0){
           return true;
        }else{
            $this->form_validation->set_message('validateUserEmail', 'Sorry, we didn\'t find an account matching that information. Make sure you entered it correctly');
            return false;
        }
    }
	// change password
	public function changepassword(){
		loginUser();
		$this->data['passwordToken'] = $passwordToken	= $this->uri->segment(3);
		$userDetail		= $this->users_model->validateUserDetail(array('password_token'=>$passwordToken));
		if(!($userDetail->num_rows())>0){
			$this->session->set_flashdata('message', 'Your link has been expired. Again submit your request to change password.');
			redirect('users/forgetpassword');
		}
		$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		//getPrint($data['country']);
		if ($this->form_validation->run() == false){
			$this->load->view('users/changepassword', $this->data);
		}else{
			$update['password']	= md5($this->input->post('password'));
			$this->data['userDetail'] = $userDetail->row();
			$this->common_model->updateData('users', $update, array('user_id'=>$userDetail->row()->user_id));
			$this->session->set_flashdata('message', 'Your Information has been updated.');
			redirect('users/signin');
		}
		
	}
	public function processpayment(){
		
		/*ini_set('display_startup_errors', 1);
		ini_set('display_errors', 1);
		error_reporting(-1);*/
		$this->data['activeClass']	= 'processpayment';
		isUserLogin();
		$userID	= $this->session->userdata('userID');
		/*$getApiList	=  $this->users_model->getUserAPI($userID, 'cc');
		getPrint($getApiList); exit;*/
		//billing information
		$this->form_validation->set_rules('billing_first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('billing_last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('billing_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('billing_phone_no', 'Phone No', 'trim|required');
		$this->form_validation->set_rules('billing_address_1', 'Address 1', 'trim|required');
		$this->form_validation->set_rules('billing_address_2', '', '');
		$this->form_validation->set_rules('billing_city_name', 'City Name', 'trim|required');
		$this->form_validation->set_rules('billing_state_id', 'State', 'trim|required');
		$this->form_validation->set_rules('billing_country_id', 'County', 'trim|required');
		$this->form_validation->set_rules('billing_zip_code', 'Zip Code', 'trim|required');
		
		//billing information
		$this->form_validation->set_rules('shipping_first_name', '', '');
		$this->form_validation->set_rules('shipping_last_name', '', '');
		$this->form_validation->set_rules('shipping_address_1', '', '');
		$this->form_validation->set_rules('shipping_address_2', '', '');
		$this->form_validation->set_rules('shipping_city_name', '', '');
		$this->form_validation->set_rules('shipping_state_id', '', '');
		$this->form_validation->set_rules('shipping_country_id', '', '');
		$this->form_validation->set_rules('shipping_zip_code', '', '');
				
		
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
		$this->form_validation->set_rules('affiliate_customer_id', '', '');
		$this->form_validation->set_rules('order_number', 'Order Number', 'trim|required');
		$this->form_validation->set_rules('order_description', 'Order Description', 'trim|required');
		
		$this->form_validation->set_rules('card_type', 'Card Type', 'trim|required');
		$this->form_validation->set_rules('cardnumber', 'Card Number', 'trim|required');
		$this->form_validation->set_rules('expmonth', 'Expiry Month', 'trim|required');
		$this->form_validation->set_rules('expyear', 'Expiry Year', 'trim|required');
		$this->form_validation->set_rules('cardCVV', 'Security Code', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
		$this->data['country']	= getCountryList();
		if($this->input->post('billing_country_id')!=''){
			$this->data['billing_states']	= getstateslist($this->input->post('billing_country_id'));
		}else{
			$this->data['billing_states']	= getstateslist(223);
		}
		$this->data['country']	= getCountryList();
		if($this->input->post('shipping_country_id')!=''){
			$this->data['shipping_states']	= getstateslist($this->input->post('shipping_country_id'));
		}else{
			$this->data['shipping_states']	= getstateslist(223);
		}
		$this->data['currency']	= getCurrencyList();
		$this->data['cards']	= getCardsList();
		
		//getPrint($data['country']);
		if ($this->form_validation->run() == false){
			$this->data['contents'] = 'users/processpayment';
			$this->load->view('template', $this->data);
		}else{
			//getPrint($_POST); exit;
			$payingAmount 	= number_format($this->input->post('amount'),2);
			$cardNumber		= preg_replace('/\s+/', '', $this->input->post('cardnumber'));
			$expiryMonth	= $this->input->post('expmonth');
			$expiryYear		= $this->input->post('expyear');
			$cardCVV		= $this->input->post('cardCVV');
			
			$_POST['countryCode']	= getColumnValue('country', 'iso_code_3', $where='country_id='.$_POST['billing_country_id']);
			$_POST['stateCode']		= getColumnValue('states', 'code', $where='state_id='.$_POST['billing_state_id']);
			//getPrint(userShippingInfo($_POST, false)); exit;
			$getApiList	=  $this->users_model->getUserAPI($userID, 'cc');
			//getPrint($getApiList);exit;
			$transDone	= 0;
			$nameOfApiForTrans	= '';
			$transApiID			= '';
			$apiresponseCode	= ''; 
			foreach($getApiList as $apiInfo){
				if($apiInfo->api_name=='NMI' && $transDone == 0){
					$expiryDate		= $expiryMonth.substr($expiryYear,-2,2);
					//getPrint($row); exit;
					$billingInfo	= userBillingInfo($_POST, false);
					$shippingInfo	= userShippingInfo($_POST, false);
					/*getPrint($billingInfo);
					getPrint($shippingInfo);
					exit;*/
					$this->load->library('gwapi');
					$this->gwapi->setLogin($apiInfo);
					$this->gwapi->setBilling($billingInfo, $this->session->userdata('companyName'));
					$this->gwapi->setShipping($shippingInfo, $this->session->userdata('companyName'));
					$this->gwapi->setOrder($_POST);
					$apiResponse = $this->gwapi->doSale($payingAmount,$cardNumber, $expiryDate, $cardCVV);
					//getPrint($apiResponse); exit;
					//getPrint($this->gwapi->responses);
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;
					$transactionMode	= $apiInfo->api_mode;
					$apiresponseCode	= $apiresponseCode->response_code;
					if($apiResponse['response']==2)
						$transDone == 0;
					elseif($apiResponse['response']==1){
						$transDone == 1;
						break;
					}
					
					//exit;
				}elseif($apiInfo->api_name=='PayToo' && $transDone == 0){
					$_POST['countryCode']	= getColumnValue('country', 'iso_code_2', $where='country_id='.$_POST['billing_country_id']);
					$this->load->library('paytoo');
					
					if($this->input->post('currency')=='GBP' || $this->input->post('currency')=='EUR'){
						$apiInfo = $this->users_model->getUserAPIByCurrency($userID, 'cc', $this->input->post('currency'));
						//getPrint($apiInfo);
					}
					//getPrint($apiInfo);
					//exit;
					
                    $apiResponse = $this->paytoo->doTransaction($_POST, $apiInfo);
					//getPrint($apiResponse); exit;
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;	
					$transactionMode	= $apiInfo->api_mode;
					$apiresponseCode	= $apiresponseCode->response_code;
					if($apiResponse->status=='ERROR')
						$transDone == 0;
					elseif($apiResponse->status=='PENDING'){
						$transDone == 1;
						break;
					}
					/*elseif($apiResponse->status=='OK'){
						$transDone == 1;
						break;
					}*/
					
				}elseif($apiInfo->api_name=='Maxpay' && $transDone == 0){
					$this->load->library('maxPay');
                    $apiResponse = $this->maxpay->doTransaction($_POST, $apiInfo);
					$apiResponse = json_decode($apiResponse);
					//getPrint($apiResponse); exit;
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;	
					$transactionMode	= $apiInfo->api_mode;
					$apiresponseCode	= $apiresponseCode->response_code;
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
			/*echo $transDone.'<br>';
			echo $nameOfApiForTrans.'<br>';
			getPrint($apiResponse);
			exit;*/
			//if($transDone==true) {
			$ipAddress		= $_SERVER['REMOTE_ADDR'];
			/*$countryCode	= getColumnValue('country', 'iso_code_3', $where='country_id='.$this->input->post('billing_country_id'));
			$stateCode		= getColumnValue('states', 'code', $where='state_id='.$this->input->post('billing_state_id'));*/
			
			// transaction log
			$transData['user_id']			= $userID;
			//billing information
			$transData['billing_first_name']= $this->input->post('billing_first_name');
			$transData['billing_last_name']	= $this->input->post('billing_last_name');
			$transData['billing_email']		= $this->input->post('billing_email');
			$transData['billing_phone_no']	= $this->input->post('billing_phone_no');
			$transData['billing_address_1']	= $this->input->post('billing_address_1');
			$transData['billing_address_2']	= $this->input->post('billing_address_2');
			$transData['billing_city_name']	= $this->input->post('billing_city_name');
			$transData['billing_zip_code']	= $this->input->post('billing_zip_code');
			$transData['billing_country_id']= $this->input->post('billing_country_id');
			$transData['billing_state_id']	= $this->input->post('billing_state_id');
			
			//shipping information
			if($this->input->post('shipping_first_name')!='')
				$transData['shipping_first_name']	= $this->input->post('shipping_first_name');
			if($this->input->post('shipping_last_name')!='')
				$transData['shipping_last_name']	= $this->input->post('shipping_last_name');
			if($this->input->post('shipping_address_1')!='')
				$transData['shipping_address_1']	= $this->input->post('shipping_address_1');
			if($this->input->post('shipping_address_2')!='')
				$transData['shipping_address_2']	= $this->input->post('shipping_address_2');
			if($this->input->post('shipping_city_name')!='')
				$transData['shipping_city_name']	= $this->input->post('shipping_city_name');
			if($this->input->post('shipping_zip_code')!='')
				$transData['shipping_zip_code']		= $this->input->post('shipping_zip_code');
			if($this->input->post('shipping_country_id')!='')
				$transData['shipping_country_id']	= $this->input->post('shipping_country_id');
			if($this->input->post('shipping_state_id')!='')
				$transData['shipping_state_id']		= $this->input->post('shipping_state_id');
			
			
			$transData['transaction_type']		= 'cc';
			$transData['transaction_mode']		= $transactionMode;
			$transData['affiliate_customer_id']	= $this->input->post('affiliate_customer_id');
			$transData['currency']				= $this->input->post('currency');
			$transData['order_number']			= $this->input->post('order_number');
			$transData['order_description']		= $this->input->post('order_description');
			
			$transData['card_type']				= $this->input->post('card_type');
			$transData['card_number']			= ccMasking($cardNumber);
			$transData['expiry_date']			= $expiryMonth.'/'.$expiryYear;
			$transData['security_code']			= $cardCVV;
			$transData['amount']				= $payingAmount;
			$transData['ipaddress']				= $ipAddress;
			$transData['trans_api_id']			= $transApiID;
			if($nameOfApiForTrans=='NMI'){
				$transData['transaction_id']		= $apiResponse['transactionid'];
				if($apiResponse['response']==1)
					$transData['transaction_status'] = 'APPROVED';
				if($apiResponse['response']==2)
					$transData['transaction_status'] = 'DECLINED';
				if($apiResponse['response']==3)
					$transData['transaction_status'] = 'ERROR';
					
				$transData['transaction_msg']		= $apiResponse['responsetext'];
				
				$this->session->set_flashdata('message', $transData['transaction_msg']);
			}elseif($nameOfApiForTrans=='PayToo'){
				$PaytooRequest = json_decode(json_encode($apiResponse->PaytooRequest), True);
				$transData['transaction_id']			= $apiResponse->tr_id;
				$transData['transaction_request_id']	= $apiResponse->request_id;
				$transData['transaction_key']			= $PaytooRequest['key'];
				$transData['transaction_paytoo_status']	= $apiResponse->status;
				if($apiResponse->request_status=='' || $apiResponse->request_status==NULL)
					$transData['transaction_status']	= 'REFUSED';
				else
					$transData['transaction_status']	= $apiResponse->request_status;
				$transData['transaction_msg']			= $apiResponse->msg;
				$transData['transaction_complete_response']	=	json_encode($apiResponse);
				
								
				$this->session->set_flashdata('message', $apiResponse->msg);
			}elseif($nameOfApiForTrans=='Maxpay'){
				$transData['transaction_id']		= $apiResponse->reference;
				$transData['transaction_status'] = $apiResponse->status;
				if($apiResponse->status=='success'){
					$transData['transaction_msg']		= $apiResponse->message;
				}else{
					$transData['transaction_msg']		= $apiResponse->message;
				}
								
				$this->session->set_flashdata('message', $apiResponse->message);
			}
			
			$transData['system_transaction_status']	= strtolower($transData['transaction_status']);
			//$transData['transaction_msg']		= $curlResponse->data->orderInfo;
			$transData['modified_by']			= $userID;
			$transData['payment_date']			= date('Y-m-d H:i:s');
			//getPrint($transData); exit;
			/*ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);*/
			$transData['transID'] = $this->common_model->insertData('transactions', array_filter($transData));
			
			$transData['respURL']			= base_url('users/response/'.$transData['transID']);
			$transData['affiliateName']		= $this->session->userdata('fullName');
			$transData['site_name']			= $this->data['site_name'];
			$transData['paymentMethod']		= 'Credit Card';
			$transData['API_descriptor']	= $apiresponseCode;
			$transData['billingState']		= getColumnValue('states', 'name', $where='state_id='.$_POST['billing_state_id']);
			$transData['billingCountry']	= getColumnValue('country', 'name', $where='country_id='.$_POST['billing_country_id']);
			
			if($nameOfApiForTrans == 'NMI' && $transData['transaction_status'] == 'APPROVED'){
				$transData['emailLogo']			= 'Green_Arrow_Vol_5_logo.png';
				//email to customer
				$subjectTitle = 'Your transaction receipt from Priority Payout';//'Invoice From '.$this->data['site_name'];
				$this->sendEmail('invoices/invoice_nmi', $subjectTitle, $transData, $this->data['site_name'], 'support@khitomer.ca', $transData['billing_email']);
			}
			if($nameOfApiForTrans == 'Maxpay' && $transData['transaction_status'] == 'success'){
				$transData['emailLogo']	= 'PCSV_Email_Logo.png';
				//email to customer
				$subjectTitle = 'Your transaction receipt from PCSV';//'Invoice From '.$this->data['site_name'];
				$this->sendEmail('invoices/invoice_maxpay', $subjectTitle, $transData, $this->data['site_name'], 'support@khitomer.ca', $transData['billing_email']);
			}
			
			redirect('users/transactions');
			//}
			//exit;
			
			
		}
	}
	public function response(){
		$transID			= $this->uri->segment(3);
		$Customerresponse	= $this->uri->segment(4);
		
		$clientIP 	= $_SERVER['REMOTE_ADDR'];
		$geoLoc		= unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$clientIP"));
		
		$transResp['trans_id']				= $transID;
		$transResp['response']				= $Customerresponse;
		$transResp['geo_ip']				= $clientIP;
		$transResp['geo_city']				= $geoLoc['geoplugin_city'];
		$transResp['geo_countryCode']		= $geoLoc['geoplugin_countryCode'];
		$transResp['geo_country']			= $geoLoc['geoplugin_countryName'];
		$transResp['geo_lat']				= $geoLoc['geoplugin_latitude'];
		$transResp['geo_long']				= $geoLoc['geoplugin_longitude'];
		$transResp['geo_regionName']		= $geoLoc['geoplugin_regionName'];
		$transResp['geo_currencyCode']		= $geoLoc['geoplugin_currencyCode'];
		$transResp['geo_currencySymbol']	= $geoLoc['geoplugin_currencySymbol'];
		$transResp['geo_currencyConverter']	= $geoLoc['geoplugin_currencyConverter'];
		$transResp['response_date']			= date('Y-m-d');
		
		$this->common_model->insertData('transactions_response', array_filter($transResp));
		$this->load->view('users/response', $transResp);
		/*echo $clientIP;
		echo '<br>';
		getPrint($geoLoc);*/
		//$this->common_model->updateData('transactions', $trans, array('id'=>$transID));
	}
	public function paytoonotification(){
		
		$string			= '';
		$tr_id			= $_REQUEST['tr_id'];
		$request_id 	= $_REQUEST['request_id'];
		$tr_status		= $_REQUEST['tr_status'];
		$tr_currency 	= $_REQUEST['tr_currency'];
				
		$updateTrans['transaction_status']			= $tr_status;
		$updateTrans['system_transaction_status']	= $tr_status;
		if($tr_status=='completed'){
			$updateTrans['transaction_paytoo_status']	= 'OK';
			$updateTrans['transaction_msg'] 			= 'Authorized by Credit Card Holder';
		}
		/*elseif($tr_status=='rejected')
			$updateTrans['transaction_msg'] = 'CVC Declined';*/
		
		if($tr_currency=='USD'){
			$whereArr = array('trans_api_id'=>2, 'transaction_id'=>$tr_id, 'transaction_request_id'=>$request_id);
			$this->common_model->updateData('transactions', $updateTrans, $whereArr);
		}elseif($tr_currency=='GBP'){
			$whereArr = array('trans_api_id'=>7, 'transaction_id'=>$tr_id, 'transaction_request_id'=>$request_id);
			$this->common_model->updateData('transactions', $updateTrans, $whereArr);
		}elseif($tr_currency=='EUR'){
			$whereArr = array('trans_api_id'=>8, 'transaction_id'=>$tr_id, 'transaction_request_id'=>$request_id);
			$this->common_model->updateData('transactions', $updateTrans, $whereArr);
		}
		
		$transMsg = $_REQUEST['msg'];
		$string = 'tr_id:'.$tr_id.' request_id:'.$request_id.' tr_status: '.$tr_status.' tr_currency: '.$tr_currency;
		
		$to = "hafeez.iqbal@gmail.com";
		$subject = "status is";
		$txt = "here is message ".$string.' has value '.$_POST['MerchantApiResponse']['hash'].' '.$transMsg;
		$headers = "From: no-reply@khitomer.ca";
		
		mail($to,$subject,$txt,$headers);
		
		
		/*$string = '';
		$key = 'Cookies99';
		$fields = array ('request_id', 'tr_id', 'order_ref',
		'w_number', 'phone_number', 'tr_status', 'tr_amount', 'tr_currency',
		'tr_requested_amount', 'tr_requested_currency', 'tr_change_rate');
		foreach($fields as $k => $v) $string .= $_REQUEST[$v];
		$string .= $key;*/
		
		
		/*echo $clientIP;
		echo '<br>';
		getPrint($geoLoc);*/
		//$this->common_model->updateData('transactions', $trans, array('id'=>$transID));
	}
	public function achpayment(){
		isUserLogin();
		$this->data['activeClass']	= 'processpayment';
		$userID	= $this->session->userdata('userID');
		//$this->load->library('brightspeed'); getPrint($this->brightspeed); exit;
		
		/*$getApiList	=  $this->users_model->getUserAPI($userID, 'ach');
		getPrint($getApiList);
		exit;*/
		
		//billing information
		$this->form_validation->set_rules('billing_first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('billing_last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('billing_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('billing_phone_no', 'Phone No', 'trim|required');
		$this->form_validation->set_rules('billing_address_1', 'Address 1', 'trim|required');
		$this->form_validation->set_rules('billing_address_2', '', '');
		$this->form_validation->set_rules('billing_city_name', 'City Name', 'trim|required');
		$this->form_validation->set_rules('billing_state_id', 'State', 'trim|required');
		$this->form_validation->set_rules('billing_country_id', 'County', 'trim|required');
		$this->form_validation->set_rules('billing_zip_code', 'Zip Code', 'trim|required');
		
		//billing information
		$this->form_validation->set_rules('shipping_first_name', '', '');
		$this->form_validation->set_rules('shipping_last_name', '', '');
		$this->form_validation->set_rules('shipping_address_1', '', '');
		$this->form_validation->set_rules('shipping_address_2', '', '');
		$this->form_validation->set_rules('shipping_city_name', '', '');
		$this->form_validation->set_rules('shipping_state_id', '', '');
		$this->form_validation->set_rules('shipping_country_id', '', '');
		$this->form_validation->set_rules('shipping_zip_code', '', '');		
		
		/*$this->form_validation->set_rules('transaction_type', 'Type of Transaction', 'trim|required');*/
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
		$this->form_validation->set_rules('order_number', 'Order Number', 'trim|required');
		$this->form_validation->set_rules('order_description', 'Order Description', 'trim|required');
		
		$this->form_validation->set_rules('bankname', 'Bank Name', 'trim|required');
		$this->form_validation->set_rules('bankaddress', 'Bank Address', 'trim|required');
		$this->form_validation->set_rules('bankcity', 'Bank City', 'trim|required');
		$this->form_validation->set_rules('bankstate', 'Bank State', 'trim|required');
		$this->form_validation->set_rules('routingnumber', 'Routing Number', 'trim|required');
		$this->form_validation->set_rules('checknumber', 'Check Number', 'trim|required');
		$this->form_validation->set_rules('bankaccountnumber', 'Bank Account Number', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
		
		$this->data['billing_states']	= getstateslist(223);
		$this->data['shipping_states']	= getstateslist(223);
		$this->data['currency']			= getCurrencyList();
		
		//getPrint($data['country']);
		if ($this->form_validation->run() == false){
			$this->data['contents'] = 'users/processach';
			$this->load->view('template', $this->data);
		}else{
			//$achApi			= $this->users_model->getAchAPI(5);
			$getApiList	=  $this->users_model->getUserAPI($userID, 'ach');
			$payingAmount 	= number_format($this->input->post('amount'),2);
			
			$_POST['countryCode']	= getColumnValue('country', 'iso_code_3', $where='country_id='.$_POST['billing_country_id']);
			$_POST['stateCode']		= getColumnValue('states', 'code', $where='state_id='.$_POST['billing_state_id']);
			$_POST['bankstateCode']	= getColumnValue('states', 'code', $where='state_id='.$_POST['bankstate']);
			
			$transDone	= 0;
			$nameOfApiForTrans	= '';
			$transApiID			= '';
			$transactionMode	= '';
			foreach($getApiList as $apiInfo){
				//getPrint($apiInfo); exit;
				if($apiInfo->api_name=='BrightSpeed' && $transDone == 0){
					$this->load->library('brightspeed');
					$brightSpeedResponse = $this->brightspeed->doTransaction($_POST, $apiInfo);
					//getPrint($brightSpeedResponse); exit;
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;
					$transactionMode	= $apiInfo->api_mode;
					if($brightSpeedResponse->success==TRUE || $brightSpeedResponse->success==1){
						$transDone == 1;
						break;
					}else{
						$transDone == 0;
					}
				}elseif($apiInfo->api_name=='Direct Pay Express' && $transDone == 0){
					$this->load->library('DirectPayExpress');
					$this->directpayexpress->setCredentials($apiInfo);
					$expressData = array();
					$expressData['external_order_id']	= $this->input->post('order_number');
					$expressData['phone_number']		= $this->input->post('billing_phone_no');
					$expressData['email'] 				= $this->input->post('billing_email');
					$expressData['first_name']			= $this->input->post('billing_first_name');
					$expressData['last_name']			= $this->input->post('billing_last_name');
					$expressData['amount']				= $payingAmount;
					$expressData['type']				= 'generic';
					$expressData['description'] 		= $this->input->post('order_description');
					$expressData['redirectUrl'] 		= 'https://www.khitomer.ca/payment/users/directPayExpress/';
					$expressData['callbackUrl'] 		= 'https://www.khitomer.ca/payment/users/directPayExpress/';
					$expressData['recurring'] 			= 0;
					$expressData['send_sms'] 			= 0;
					$expressData['mid'] 				= '';
					$dpxResponse = $this->directpayexpress->createOrder($expressData);
					//getPrint($dpxResponse); exit;
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;
					$transactionMode	= $apiInfo->api_mode;
					if($dpxResponse['status']=='ok'){
						$transDone == 1;
						break;
					}else{
						$transDone == 0;
					}
					
				}
			}
									
			// transaction log
			$transData['user_id']			= $userID;
			//billing information
			$transData['billing_first_name']= $this->input->post('billing_first_name');
			$transData['billing_last_name']	= $this->input->post('billing_last_name');
			$transData['billing_email']		= $this->input->post('billing_email');
			$transData['billing_phone_no']	= $this->input->post('billing_phone_no');
			$transData['billing_address_1']	= $this->input->post('billing_address_1');
			$transData['billing_address_2']	= $this->input->post('billing_address_2');
			$transData['billing_city_name']	= $this->input->post('billing_city_name');
			$transData['billing_zip_code']	= $this->input->post('billing_zip_code');
			$transData['billing_country_id']= $this->input->post('billing_country_id');
			$transData['billing_state_id']	= $this->input->post('billing_state_id');
			
			//shipping information
			if($this->input->post('shipping_first_name')!='')
				$transData['shipping_first_name']	= $this->input->post('shipping_first_name');
			if($this->input->post('shipping_last_name')!='')
				$transData['shipping_last_name']	= $this->input->post('shipping_last_name');
			if($this->input->post('shipping_address_1')!='')
				$transData['shipping_address_1']	= $this->input->post('shipping_address_1');
			if($this->input->post('shipping_address_2')!='')
				$transData['shipping_address_2']	= $this->input->post('shipping_address_2');
			if($this->input->post('shipping_city_name')!='')
				$transData['shipping_city_name']	= $this->input->post('shipping_city_name');
			if($this->input->post('shipping_zip_code')!='')
				$transData['shipping_zip_code']		= $this->input->post('shipping_zip_code');
			if($this->input->post('shipping_country_id')!='')
				$transData['shipping_country_id']	= $this->input->post('shipping_country_id');
			if($this->input->post('shipping_state_id')!='')
				$transData['shipping_state_id']		= $this->input->post('shipping_state_id');
			
			
			$transData['transaction_type']		= 'echeck';
			$transData['transaction_mode']		= $transactionMode;
			$transData['currency']				= $this->input->post('currency');
			$transData['order_number']			= $this->input->post('order_number');
			$transData['order_description']		= $this->input->post('order_description');
			
			$transData['bankname']				= $this->input->post('bankname');
			$transData['bankaddress']			= $this->input->post('bankaddress');
			$transData['routingnumber']			= $this->input->post('routingnumber');
			$transData['checknumber']			= $this->input->post('checknumber');
			$transData['bankaccountnumber']		= $this->input->post('bankaccountnumber');
			$transData['amount']				= $payingAmount;
			$transData['ipaddress']				= $_SERVER['REMOTE_ADDR'];
			$transData['trans_api_id']			= $transApiID;
			
			
			
			if($nameOfApiForTrans=='BrightSpeed'){
				//getPrint($brightSpeedResponse); exit;
				if($brightSpeedResponse->success==TRUE || $brightSpeedResponse->success==1){
					$transData['transaction_status'] = 'ACCEPTED';
					
					$transDataResponse = $brightSpeedResponse->data;
					$transactionId = explode('_', $transDataResponse->TRANSACTIONID);
					$transData['transaction_id']	= $transactionId[1];
					$transData['transaction_reference_id']	= $transactionId[1];
					$transData['transaction_msg']	= $transDataResponse->STATUS;
					$this->session->set_flashdata('message', $transData['transaction_msg']);
				}else{
					$transData['transaction_status'] = 'ERROR';
					
					$transDataResponse = $brightSpeedResponse->errors;
					$transData['transaction_msg']	= $transDataResponse[0];
					$this->session->set_flashdata('message', $transData['transaction_msg']);
				}
				$transData['system_transaction_status'] = strtolower($transData['transaction_status']);
			}elseif($nameOfApiForTrans=='Direct Pay Express'){
				$transData['transaction_status'] = 'PROCESSING';
				$transData['system_transaction_status'] = strtolower($transData['transaction_status']);
				
				$transactionId = explode('-', $dpxResponse['data']['order_id']);
				$transData['transaction_id']	= $transactionId[1];
				$transData['transaction_reference_id']	= $dpxResponse['data']['transaction_reference_id'];
				$transData['transaction_msg']	= $dpxResponse['message'];
				$successMsg = 'Thank you. Your check transaction has been posted to your account. Note: The funds for this transaction are only credited to your account once the Status field shows "CLEARED".';
				$this->session->set_flashdata('message', $successMsg);
			}
			
			$transData['modified_by']			= $userID;
			$transData['payment_date']			= date('Y-m-d H:i:s');
			//getPrint($transData); exit;
			
			$transData['transID'] = $this->common_model->insertData('transactions', array_filter($transData));
			
						
			$transData['respURL']			= base_url('users/response/'.$transData['transID']);
			$transData['affiliateName']		= $this->session->userdata('fullName');
			$transData['site_name']			= $this->data['site_name'];
			$transData['paymentMethod']		= 'ACH Electronic Check';
			$transData['API_descriptor']	= $apiresponseCode;
			$transData['billingState']		= getColumnValue('states', 'name', $where='state_id='.$_POST['billing_state_id']);
			$transData['billingCountry']	= getColumnValue('country', 'name', $where='country_id='.$_POST['billing_country_id']);
			
			if($nameOfApiForTrans == 'BrightSpeed' && ($brightSpeedResponse->success==TRUE || $brightSpeedResponse->success==1)){
				$transData['emailLogo']		= 'brightspeed-logo.png';
				//email to customer
				$subjectTitle = 'Your transaction receipt from Khitomer';
				$this->sendEmail('invoices/invoice_brightspeed', $subjectTitle, $transData, $this->data['site_name'], 'support@khitomer.ca', $transData['billing_email']);
			}
			
			redirect('users/transactions');
			//$this->directpayexpress($dpxResponse);
			
		}
	}
	public function directPayExpress(){
		//getPrint($response);
		$msg = '';
		$notifyType		= $_POST['notifyType'];
		if($notifyType=='TransactionStatusChanged'){
			$externalId		= $_POST['external_reference'];
			$transactionId	= $_POST['trans_data']['transactions_id'];
			
			if($_POST['trans_status']==1)
				$updateTrans['transaction_status'] = 'cleared';
			else
				$updateTrans['transaction_status'] = 'declined';
				
			$this->common_model->updateData('transactions', $updateTrans , array('order_number'=>$externalId, 'transaction_id'=>$transactionId));
		}
		
		/*
		$externalId		= $_POST['externalId'];
		$dpx_trans_id	= $_POST['dpx_trans_id'];
		$track_id		= $_POST['track_id'];
		$trans_status	= $_POST['trans_status'];
		$response_desc	= $_POST['response_desc'];
		*/
		
		/*$msg = '';
		ob_start();
		print_r($_POST);
		$msg = ob_get_clean();
		
		// send email
		mail("hafeez.iqbal@gmail.com","My subject",$msg);*/
		
	}
	public function transactions(){
		isUserLogin();
		$this->data['activeClass']	= 'transactions';
		$userID = $this->session->userdata('userID');
		$this->data['page']			= $this->uri->segment(5);
		if($this->uri->segment(3)!='')
			$this->data['orderBy']		= $sorting['orderBy']	= $this->uri->segment(3);
		else
			$this->data['orderBy']		= $sorting['orderBy']	= 'transactionDate';
			
		if($this->uri->segment(4)!='')
			$this->data['sortOrder']	= $sorting['sortOrder']	= $this->uri->segment(4);
		else
			$this->data['sortOrder']	= $sorting['sortOrder']	= 'desc';
		
			
		if(!isset($this->data['page']) || $this->input->post('clear')=='clear'){
			$this->session->unset_userdata('transDateFrom');
			$this->session->unset_userdata('trans_date_to');
			$this->session->unset_userdata('billing_first_name');
			$this->session->unset_userdata('billing_last_name');
			$this->session->unset_userdata('trans_type');
			$this->session->unset_userdata('trans_status');
		}
		//getPrint($this->data);
		$transDateFrom	= '';
		$transDateTo	= '';
		
		if($this->input->post('trans_date_from')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('transDateFrom', $this->input->post('trans_date_from'));
			//$transDateFrom = $this->input->post('trans_date_from');
		}
		if($this->input->post('trans_date_to')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('trans_date_to', $this->input->post('trans_date_to'));
			//$transDateTo = $this->input->post('trans_date_to');
		}
		
		if($this->input->post('billing_first_name')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('billing_first_name', $this->input->post('billing_first_name'));
		}
		
		if($this->input->post('billing_last_name')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('billing_last_name', $this->input->post('billing_last_name'));
		}
		
		if($this->input->post('trans_type')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('trans_type', $this->input->post('trans_type'));
		}
		
		if($this->input->post('trans_status')!='' && $this->input->post('clear')!='clear'){
			$this->session->set_userdata('trans_status', $this->input->post('trans_status'));
		}
		
		if($this->input->post('excel')=='excel'){
			$this->downloadReport($sorting);
		}
		
		$url = base_url("users/transactions/".$this->data['orderBy'].'/'.$this->data['sortOrder'].'/');
        $totalrows = $this->users_model->countTotalTransactions($userID);
        parent::pagination_conf($this->data['page'], $url, $totalrows, 5);
		
		$this->data['listing']	= $this->users_model->getAllTransactions($sorting, $userID, 50, $this->data['page']);
		//getPrint($this->data['listing']); exit;
		$this->data['contents'] = 'users/transactions';
		$this->load->view('template', $this->data);
	}
	//ajax loading
	public function getAllTransaction(){
		//$_REQUEST['trans_date_from'].'--'.$_REQUEST['trans_date_to'];
		$userID = $this->session->userdata('userID');
		$transDateFrom	= '';
		$transDateTo	= '';
		
		if(isset($_REQUEST['trans_date_from']))
			$transDateFrom = date('Y-m-d', strtotime($_REQUEST['trans_date_from']));
			
		if(isset($_REQUEST['trans_date_to']))
			$transDateTo = date('Y-m-d', strtotime($_REQUEST['trans_date_to']));
			
		$iTotalRecords	= $this->users_model->countTotalTransactions($userID, $transDateFrom, $transDateTo);
		
		if(isset($_REQUEST['length']))
			$iDisplayLength = intval($_REQUEST['length']);
		else
			$iDisplayLength = 10;
			
		$iDisplayLength	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
		
		if(isset($_REQUEST['length']))
			$iDisplayStart	= intval($_REQUEST['start']);
		else
			$iDisplayStart = 0;
		
		$sEcho			= intval($_REQUEST['draw']);
		
		
			
		$allTransactions= $this->users_model->getAllTransactions($userID, $transDateFrom, $transDateTo,$iDisplayLength, $iDisplayStart);
		
		$records = array();
		$records["data"] = array(); 
	  
		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
	  
		foreach($allTransactions->result() as $row) {
		  /*if($row->trans_api_id==1)
			 $StateMent = 'GrnArrow8009869316';
		  elseif($row->trans_api_id==2)
			 $StateMent = 'CF MERCANTILE CAMBRIDGE';
		  else
		  	$StateMent = '';*/
		
		  $symbol = getColumnValue('currency', 'symbol_left', $where="code='$row->currency'");
		  if($symbol==false)
		 	 $symbol = getColumnValue('currency', 'symbol_right', $where="code='$row->currency'");
		
		  $records["data"][] = array(
			$symbol.$row->amount,
			$row->transaction_status,
			$row->transaction_msg,
			$row->response_code,
			date('d F, Y', strtotime($row->payment_date)),
			'<a href="'.base_url('users/gettransactiondetail/'.$row->id).'" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a>',
		 );
		 // <a href="'.base_url('users/refund/'.$row->id).'" class="btn btn-sm green btn-outline" style="margin-top:8px;"><i class="fa fa-exchange"></i> Refund</a>
		}
	  
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
		  $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
		  $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
	  
		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
		
		echo json_encode($records);
		
	}
	public function gettransactiondetail(){
		$this->data['activeClass']	= 'transactions';
		$userID 		= $this->session->userdata('userID');
		$transactionID	= $this->uri->segment(3);
		$this->data['transactionInfo']	= $this->users_model->getTransactionDetail($transactionID, $userID);
		//getPrint($this->data['transactionInfo']); exit;

		$this->data['contents'] 		= 'users/transaction_detail';
		$this->load->view('template', $this->data);
	}
	public function downloadReport($sorting){
		$userID = $this->session->userdata('userID');
		$this->load->library('excel');
		$transactionsInfo	= $this->users_model->getTransactionsReport($userID, $sorting);
		//getPrint($this->session->all_userdata()); exit;
		
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1:Z1')->getFont()
			->setSize(15)
			->setBold(true);
		$this->excel->getActiveSheet()->getStyle('AA1:AB1')->getFont()
			->setSize(15)
			->setBold(true);
		$this->excel->getActiveSheet()->setCellValue('A1', 'Payment Date');
		$this->excel->getActiveSheet()->setCellValue('B1', 'Affiliate Name'); // Company Name
		$this->excel->getActiveSheet()->setCellValue('C1', 'Amount');
		$this->excel->getActiveSheet()->setCellValue('D1', 'Currency');
		$this->excel->getActiveSheet()->setCellValue('E1', 'Status');
		$this->excel->getActiveSheet()->setCellValue('F1', 'Office Use');
		$this->excel->getActiveSheet()->setCellValue('G1', 'Processor Response Code');
		$this->excel->getActiveSheet()->setCellValue('H1', 'Descriptor');
		$this->excel->getActiveSheet()->setCellValue('I1', 'Full Name');
		$this->excel->getActiveSheet()->setCellValue('J1', 'Transaction System id');
		$this->excel->getActiveSheet()->setCellValue('K1', 'Order Number');
		$this->excel->getActiveSheet()->setCellValue('L1', 'Order Description');
		$this->excel->getActiveSheet()->setCellValue('M1', 'Order IP');
		$this->excel->getActiveSheet()->setCellValue('N1', 'First Name');
		$this->excel->getActiveSheet()->setCellValue('O1', 'Last Name');
		$this->excel->getActiveSheet()->setCellValue('P1', 'Email');
		$this->excel->getActiveSheet()->setCellValue('Q1', 'Mobile No');
		$this->excel->getActiveSheet()->setCellValue('R1', 'Address');
		$this->excel->getActiveSheet()->setCellValue('S1', 'Address 2');
		$this->excel->getActiveSheet()->setCellValue('T1', 'City Name');
		$this->excel->getActiveSheet()->setCellValue('U1', 'State');
		$this->excel->getActiveSheet()->setCellValue('V1', 'Zip Code');
		$this->excel->getActiveSheet()->setCellValue('W1', 'Country');
		$this->excel->getActiveSheet()->setCellValue('X1', 'Office Use');
		$this->excel->getActiveSheet()->setCellValue('Y1', 'Payment Type');
		$this->excel->getActiveSheet()->setCellValue('Z1', 'Card Number');
		$this->excel->getActiveSheet()->setCellValue('AA1', 'Card Expiry Date');
		$this->excel->getActiveSheet()->setCellValue('AB1', 'Entry Method');
		
		
		foreach(range('A','Z') as $columnID) {
			$this->excel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}
		$columnID = 'AA';
		$this->excel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		$columnID = 'AB';
		$this->excel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		
		$k=2;
		foreach($transactionsInfo->result() as $row){
			//$trnasactionApiName = getColumnValue('khitomer_api', 'api_name', 'api_id='.$row->trans_api_id.'');
			$ApiDescriptor	= getColumnValue('khitomer_api', 'response_code', 'api_id='.$row->trans_api_id.'');
			
			$this->excel->getActiveSheet()->setCellValue('A'.$k, date('d F, Y', strtotime($row->payment_date)));
			$this->excel->getActiveSheet()->setCellValue('B'.$k, $this->session->userdata('companyName'));
			$this->excel->getActiveSheet()->setCellValue('C'.$k, '$'.number_format($row->amount,2));
			$this->excel->getActiveSheet()->setCellValue('D'.$k, $row->currency);
			$this->excel->getActiveSheet()->setCellValue('E'.$k, $row->transaction_status);
			$this->excel->getActiveSheet()->setCellValue('F'.$k, '');
			$this->excel->getActiveSheet()->setCellValue('G'.$k, $row->transaction_msg);
			$this->excel->getActiveSheet()->setCellValue('H'.$k, @$ApiDescriptor);
			$this->excel->getActiveSheet()->setCellValue('I'.$k, $row->billing_first_name.' '.$row->billing_last_name);
			$this->excel->getActiveSheet()->setCellValue('J'.$k, $row->id);
			$this->excel->getActiveSheet()->setCellValue('K'.$k, $row->order_number);
			$this->excel->getActiveSheet()->setCellValue('L'.$k, $row->order_description);
			$this->excel->getActiveSheet()->setCellValue('M'.$k, $row->ipaddress);
			
			//$this->excel->getActiveSheet()->setCellValue('K'.$k, @$trnasactionApiName);
			
			$this->excel->getActiveSheet()->setCellValue('N'.$k, $row->billing_first_name);
			$this->excel->getActiveSheet()->setCellValue('O'.$k, $row->billing_last_name);
			$this->excel->getActiveSheet()->setCellValue('P'.$k, $row->billing_email);
			$this->excel->getActiveSheet()->setCellValue('Q'.$k, $row->billing_phone_no);
			$this->excel->getActiveSheet()->setCellValue('R'.$k, $row->billing_address_1);
			$this->excel->getActiveSheet()->setCellValue('S'.$k, $row->billing_address_2);
			$this->excel->getActiveSheet()->setCellValue('T'.$k, $row->billing_city_name);
			$this->excel->getActiveSheet()->setCellValue('U'.$k, getColumnValue('states', 'name', $where='state_id='.$row->shipping_state_id));
			$this->excel->getActiveSheet()->setCellValue('V'.$k, $row->billing_zip_code);
			$this->excel->getActiveSheet()->setCellValue('W'.$k, getColumnValue('country', 'name', $where='country_id='.$row->shipping_country_id));
			$this->excel->getActiveSheet()->setCellValue('X'.$k, '');
			$this->excel->getActiveSheet()->setCellValue('Y'.$k, $row->transaction_type);
			$this->excel->getActiveSheet()->setCellValue('Z'.$k, $row->card_number);
			$this->excel->getActiveSheet()->setCellValue('AA'.$k, $row->expiry_date);
			$this->excel->getActiveSheet()->setCellValue('AB'.$k, 'Keyed');
			$k++;
		}
		$filename	= time().'_transactions_report.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}
	
	public function refund(){
		$transId	= $this->uri->segment(3);
		$userID 	= $this->session->userdata('userID');
		$this->data['transactionInfo']	= $this->users_model->getTransactionDetail($transId, $userID);
		
		$this->form_validation->set_rules('billing_name', 'Billing Name', 'trim|required');
		if ($this->form_validation->run() == false){
			$this->data['contents'] = 'users/refund';
			$this->load->view('template', $this->data);
		}else{
		
			redirect('users/dashboard');
		}
	}
	
	public function profile(){
		isUserLogin();
		$this->data['activeClass']	= 'profile';
		//isUserLogin();
		$userID	= $this->session->userdata('userID');
		$this->data['profile']	= $this->common_model->getDetailInfo('users', 'user_id='.$userID);
		
		//getPrint($this->session->all_userdata());exit;
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required');
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		if($this->input->post('password')!=''){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		}
		//getPrint($data['country']);
		if ($this->form_validation->run() == false){
			$this->data['contents'] = 'users/profile';
			$this->load->view('template', $this->data);
		}else{
			$updateData['first_name']	= $this->input->post('first_name');
			$updateData['last_name']	= $this->input->post('last_name');
			$updateData['company_name']	= $this->input->post('company_name');
			$updateData['job_title']	= $this->input->post('job_title');
			$updateData['email']		= $this->input->post('email');
			$updateData['mobile_no']	= $this->input->post('mobile_no');
			if($this->input->post('password')!=''){
				$updateData['password']	= md5($this->input->post('password'));
			}
			
			$this->common_model->updateData('users', $updateData, array('user_id'=>$userID));
		
		    $this->session->set_userdata('fullName', $updateData['first_name'].' '.$updateData['last_name']);			
			$this->session->set_flashdata('message', 'Your Information has been updated.');
			redirect('users/profile');
		}
	}

	
	public function getstateslist(){
		$countryID	= $this->input->post('countryID');
		$states = getStatesList($countryID);
		$stateHtml = '';
		$stateHtml .= '<option value="">Select State Name</option>';
		foreach($states->result() as $row){
			$stateHtml .= '<option value="'.$row->state_id.'" '.set_select('state', $row->state_id).'>'.$row->name.'</option>';
		}
		echo $stateHtml;
	}
	public function signout(){
		$this->session->sess_destroy();
		redirect('users/signin');
	}
	
	public function echeck(){
		$achApi	= $this->users_model->getAchAPI(5);
		$this->load->library('brightspeed/BrightSpeed');
		$this->brightspeed->setApiToken('21616a2ec1a491de5de5adff8950b841');
		$this->brightspeed->setApiBaseUrl('https://portal.bright-speed.com');
		$this->load->library('brightspeed/ApiWrapper');
	}
}
