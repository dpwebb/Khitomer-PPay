<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Virtualterminal extends Public_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('admin/virtualterminal_model');
		$this->data['activeClass']	= 'virtualterminal';
		isUserLogin();
    }
	
	public function index(){
		
		$this->data['apiCredentials'] = $this->virtualterminal_model->getAdminApiCredentials('3');
		//getPrint($this->data['apiCredentials']); exit;
		
		//billing information
		$this->form_validation->set_rules('billing_first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('billing_last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('billing_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('billing_phone_no', 'Phone No', 'trim|required');
		$this->form_validation->set_rules('billing_address_1', 'Address 1', 'trim|required');
		$this->form_validation->set_rules('billing_address_2', '', '');
		$this->form_validation->set_rules('billing_city_name', 'City Name', 'trim|required');
		$this->form_validation->set_rules('billing_zip_code', 'Zip Code', 'trim|required');
		$this->form_validation->set_rules('billing_country', 'County', 'trim|required');
		$this->form_validation->set_rules('billing_state', 'State', 'trim|required');
		
		
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
		if($this->input->post('billing_country')!=''){
			$this->data['billing_states']	= getstateslist($this->input->post('billing_country'));
		}else{
			$this->data['billing_states']	= getstateslist(1);
		}
	
		$this->data['currency']	= getCurrencyList();
		$this->data['cards']	= getCardsList();
		
		//getPrint($data['country']);
		if ($this->form_validation->run() == false){
			$this->data['contents']	= 'admin/virtualterminal/api';
			$this->load->view('template', $this->data);
		}else{
			
			$countryCode	= getColumnValue('country', 'iso_code_3', $where='country_id='.$this->input->post('billing_country'));
			$stateCode		= getColumnValue('states', 'code', $where='state_id='.$this->input->post('billing_state'));

			
			$postData = array();

			$postData['merchantid']				= $this->input->post('merchantId'); //merchant id
			$postData['merchant_key']			= $this->input->post('merchantKey'); //merchant key
			$postData['merchant_password']		= $this->input->post('merchantPassword'); //merchant password
			
			$postData['first_name'] 			= $this->input->post('billing_first_name');
			$postData['last_name'] 				= $this->input->post('billing_last_name');
			$postData['user_email'] 			= $this->input->post('billing_email');
			$postData['user_phone'] 			= $this->input->post('billing_phone_no');
			$postData['address1'] 				= $this->input->post('billing_address_1');
			$postData['address2'] 				= $this->input->post('billing_address_2');
			$postData['city'] 					= $this->input->post('billing_city_name');
			$postData['zip'] 					= $this->input->post('billing_zip_code');
			$postData['country'] 				= $countryCode;
			$postData['state'] 					= $stateCode;
			
			$postData['affiliate_customer_id']  = $this->input->post('affiliate_customer_id');
			$postData['currency']				= $this->input->post('currency');
			$postData['order_number']			= $this->input->post('order_number');
			$postData['order_description']		= $this->input->post('order_description');
			$postData['card_type']				= $this->input->post('card_type');
			$postData['card_number']			= $this->input->post('cardnumber');
			$postData['card_exp_month']			= $this->input->post('expmonth');
			$postData['card_exp_year']			= $this->input->post('expyear');
			$postData['cvv']					= $this->input->post('cardCVV');
			$postData['amount']					= $this->input->post('amount');
			$postData['user_ip'] 				= $_SERVER['REMOTE_ADDR'];
			
			//getPrint($postData); exit;
			
			$url = 'https://www.khitomer.ca/payment/api/transactions/process';
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FAILONERROR, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
			$response = curl_exec($ch);
			curl_close($ch);
			
			$response = json_decode($response);
			//echo $output;
			getPrint($response); exit;
			$this->session->set_flashdata('message', $response->message);
			redirect('admin/virtualterminal/');
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
}
