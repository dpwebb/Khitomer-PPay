<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Public_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('admin/users_model');
		$this->data['activeClass']	= 'users';
		isUserLogin();
    }
	
	public function index(){
		$this->data['usersListing']	= $this->users_model->getAllUsers();
		//getPrint($this->data['usersListing']->result()); exit;
		$this->data['contents']		= 'admin/users/list';
		$this->load->view('template', $this->data);
	}
	
	public function updatestatus(){
		$status	= $this->uri->segment(4);
		$userID	= $this->uri->segment(5);
		$updateUser['status'] = $status;
		$this->common_model->updateData('users', $updateUser, array('user_id'=>$userID));
		
		$userInfo	= $this->users_model->getUserDetail(array('user_id'=>$userID));
		$this->data['first_name']	= $userInfo->first_name;
		$this->data['last_name']	= $userInfo->last_name;
		
		
		if($status==1){
			//Email to be sent to user	
			$subjectTitle = 'Affiliate Account Approved by Khitomer Consultancy Limited';
			$this->sendEmail('user_account_approval', $subjectTitle, $this->data, $this->data['site_name'], $this->data['no_reply_email'], $userInfo->email);
			$this->session->set_flashdata('message', 'User has been unblocked.');
		}else{
			//Email to be sent to user
			$subjectTitle = 'Your KCL Gateway Account has been SUSPENDED';
			//$subjectTitle = 'Affiliate Account Approved by Khitomer Consultancy Limited';
			$this->sendEmail('user_account_suspension', $subjectTitle, $this->data, $this->data['site_name'], $this->data['no_reply_email'], $userInfo->email);
			
			$this->session->set_flashdata('message', 'User has been blocked.');
		}
		
		
		redirect('admin/users/');
	}
	
	public function generateApiKey(){
		$userID	= $this->uri->segment(4);
		$keyInfo = $this->users_model->getUserAPIKey($userID);	
		
		if(isset($keyInfo['id'])){
			$this->session->set_flashdata('message', 'This "'.$keyInfo['key'].'" Api Key already exists.');
		}else{
			$this->session->set_flashdata('message', 'User Api Key has been generated.');
		}
		redirect('admin/users/');
	}
	
	public function adduser(){
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required');
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[confirmpassword]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[6]');
		if ($this->form_validation->run() == false){
			$this->data['contents'] = 'admin/users/adduser';
			$this->load->view('template', $this->data);
		}else{
			$insertData['first_name']	= $this->input->post('first_name');
			$insertData['last_name']	= $this->input->post('last_name');
			$insertData['company_name']	= $this->input->post('company_name');
			$insertData['job_title']	= $this->input->post('job_title');
			$insertData['email']		= $this->input->post('email');
			$insertData['mobile_no']	= $this->input->post('mobile_no');
			$insertData['password']		= md5($this->input->post('password'));
			$insertData['status']		= 1;
			$insertData['date_joined']	= date('Y-m-d H:i:s');
			$this->common_model->insertData('users', $insertData);
			
			$this->session->set_flashdata('message', 'New User has been added successfully.');
			redirect('admin/users');
		}
	}
	public function edituser(){
		$this->data['userID']	= $userID	= $this->uri->segment(4);
		$this->data['userInfo']	= $this->common_model->getDetailInfo('users', 'user_id='.$userID);
		
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
			$this->data['contents'] = 'admin/users/edituser';
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
						
			$this->session->set_flashdata('message', 'Your Information has been updated.');
			redirect('admin/users/');
		}
	}
	public function paymentprocessor(){
		$this->data['userID']	= $userID	= $this->uri->segment(4);
		$this->data['userInfo']	= $this->common_model->getDetailInfo('users', 'user_id='.$userID);
		$this->data['apiList']	= getAPIList();
		//getPrint($this->data['apiList']); exit;
		$k = 1;
		$this->form_validation->set_rules('userID', 'User ID', 'trim|required');
		foreach($this->data['apiList'] as $row){
			$this->form_validation->set_rules('api_list_sort_order_'.$k, '', '');
			$k++;
		}
		//getPrint($data['country']);
		if ($this->form_validation->run() == false){
			$this->data['contents'] = 'admin/users/paymentprocessor';
			$this->load->view('template', $this->data);
		}else{
			//getPrint($_POST); exit;
			$this->common_model->deleteData('user_api_list', array('api_list_user_id'=>$userID));
			$k = 1;
			$insertData['api_list_user_id'] = $userID;
			foreach($this->data['apiList'] as $row){
				if($this->input->post('api_list_sort_order_'.$k)!=''){
					$insertData['api_list_sort_order']	= $this->input->post('api_list_sort_order_'.$k);
					$insertData['api_list_api_id']		= $this->input->post('api_list_api_id_'.$k);
					$this->common_model->insertData('user_api_list', $insertData);
				}
					
				$k++;
			}
			$this->session->set_flashdata('message', 'Your Information has been updated.');
			redirect('admin/users/');
		}
	}
	
	public function processpayment(){
		$this->data['userID'] = $userID	= $this->uri->segment(4);
		/*$getApiList	=  $this->users_model->getUserAPI($userID);
		getPrint($getApiList); exit;*/
		
		/*ini_set('display_startup_errors', 1);
		ini_set('display_errors', 1);
		error_reporting(-1);*/
		
		
		//billing information
		$this->form_validation->set_rules('billing_first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('billing_last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('billing_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('billing_phone_no', 'Phone No', 'trim|required');
		$this->form_validation->set_rules('billing_address_1', 'Address 1', 'trim|required');
		$this->form_validation->set_rules('billing_address_2', '', '');
		$this->form_validation->set_rules('billing_city_name', 'City Name', 'trim|required');
		$this->form_validation->set_rules('billing_zip_code', 'Zip Code', 'trim|required');
		$this->form_validation->set_rules('billing_country_id', 'County', 'trim|required');
		$this->form_validation->set_rules('billing_state_id', 'State', 'trim|required');
		
		//billing information
		$this->form_validation->set_rules('shipping_first_name', '', '');
		$this->form_validation->set_rules('shipping_last_name', '', '');
		$this->form_validation->set_rules('shipping_address_1', '', '');
		$this->form_validation->set_rules('shipping_address_2', '', '');
		$this->form_validation->set_rules('shipping_city_name', '', '');
		$this->form_validation->set_rules('shipping_zip_code', '', '');
		$this->form_validation->set_rules('shipping_country_id', '', '');
		$this->form_validation->set_rules('shipping_state_id', '', '');
		
		
		
		
		/*$this->form_validation->set_rules('transaction_type', 'Type of Transaction', 'trim|required');*/
		$this->form_validation->set_rules('affiliate_customer_id', 'Affiliate Reference Customer ID', 'trim|required');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
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
			$this->data['billing_states']	= getstateslist(1);
		}
		$this->data['country']	= getCountryList();
		if($this->input->post('shipping_country_id')!=''){
			$this->data['shipping_states']	= getstateslist($this->input->post('shipping_country_id'));
		}else{
			$this->data['shipping_states']	= getstateslist(1);
		}
		$this->data['currency']	= getCurrencyList();
		$this->data['cards']	= getCardsList();
		
		//getPrint($data['country']);
		if ($this->form_validation->run() == false){
			$this->data['contents'] = 'admin/users/processpayment';
			$this->load->view('template', $this->data);
		}else{
			//getPrint($_POST); exit;
			$payingAmount 	= number_format($this->input->post('amount'),2);
			$cardNumber		= preg_replace('/\s+/', '', $this->input->post('cardnumber'));
			$expiryMonth	= $this->input->post('expmonth');
			$expiryYear		= $this->input->post('expyear');
			$cardCVV		= $this->input->post('cardCVV');
			
			$getApiList	=  $this->users_model->getUserAPI($userID);
			//getPrint($getApiList);exit;
			$transDone	= 0;
			$nameOfApiForTrans	= '';
			$transApiID			= '';
			foreach($getApiList as $apiInfo){
				if($apiInfo->api_name=='NMI' && $transDone == 0){
					$expiryDate		= $expiryMonth.substr($expiryYear,-2,2);
					//getPrint($row); exit;
					$this->load->library('gwapi');
					$this->gwapi->setLogin($apiInfo);
					$this->gwapi->setBilling($_POST, $this->session->userdata('companyName'));
					$this->gwapi->setShipping($_POST, $this->session->userdata('companyName'));
					$this->gwapi->setOrder($_POST);
					$apiResponse = $this->gwapi->doSale($payingAmount,$cardNumber, $expiryDate, $cardCVV);
					//getPrint($apiResponse); exit;
					//getPrint($this->gwapi->responses);
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;
					if($apiResponse['response']==2)
						$transDone == 0;
					elseif($apiResponse['response']==1){
						$transDone == 1;
						break;
					}
					//exit;
				}elseif($apiInfo->api_name=='PayToo' && $transDone == 0){
					$this->load->library('paytoo');
                    $apiResponse = $this->paytoo->doTransaction($_POST, $apiInfo);
					//getPrint($apiResponse); exit;
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;	
					if($apiResponse->status=='ERROR')
						$transDone == 0;
					elseif($apiResponse->status=='OK'){
						$transDone == 1;
						break;
					}
				}elseif($apiInfo->api_name=='Maxpay' && $transDone == 0){
					$this->load->library('maxpay');
                    $apiResponse = $this->maxpay->doTransaction($_POST, $apiInfo);
					getPrint($apiResponse); exit;
					$nameOfApiForTrans	= $apiInfo->api_name;
					$transApiID			= $apiInfo->api_id;	
					if($apiResponse->status=='ERROR')
						$transDone == 0;
					elseif($apiResponse->status=='OK'){
						$transDone == 1;
						break;
					}
				}elseif($apiInfo->api_name=='Msfunding' && $transDone == 0){
					$this->load->library('MsFunding');
                    $this->msfunding->processPayments($_POST, $apiInfo, $this->session->userdata('userID'));
					exit;
				}
			}
			
			$customerID		= $this->input->post('affiliate_customer_id');
			$ipAddress		= $_SERVER['REMOTE_ADDR'];
			$countryCode	= getColumnValue('country', 'iso_code_2', $where='country_id='.$this->input->post('billing_country_id'));
			$stateCode		= getColumnValue('states', 'code', $where='state_id='.$this->input->post('billing_state_id'));
			
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
			
			/*$transData['transaction_type']		= $this->input->post('transaction_type');*/
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
			}
			
			//$transData['transaction_status']	= $curlResponse->status;
			//$transData['transaction_msg']		= $curlResponse->data->orderInfo;
			$transData['modified_by']			= $this->session->userdata('userID');
			$transData['payment_date']			= date('Y-m-d H:i:s');
			$this->common_model->insertData('transactions', $transData);
			
			//exit;
			
			redirect('admin/transactions');
		}
	}
	
}
