<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** print data with formating * */
function getPrint($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

//-----------get Cloumn Name-------------
function getColumnValue($tblName, $colName, $where){
    $CI = & get_instance();
    if ($where != ''){
        $SqlExec = "SELECT * FROM ".$tblName." WHERE ".$where."";
    }else{
        $SqlExec = "SELECT * FROM ".$tblName."";
    }
    $result = $CI->db->query($SqlExec);

    if ($result->num_rows()){
        $result = $result->row()->$colName;
    }else{
        $result = false;
    }
    return $result;
}


/* get Country List */
function getCountryList(){
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('country');
    $CI->db->where('country.status', 1);
	$CI->db->order_by('country.name', 'ASC');
    $result = $CI->db->get();
    return $result->result();
}

/* get cities name */
function getStatesList($countryID){
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('states');
    $CI->db->where('states.country_id', $countryID);
	$CI->db->where('states.status', 1);
	$CI->db->order_by('states.name', 'ASC');
    return $CI->db->get();
}

/* get API List */
function getAPIList(){
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('khitomer_api');
    $CI->db->where('khitomer_api.api_status ', 1);
	$CI->db->order_by('khitomer_api.api_sort_order  ', 'ASC');
    $result = $CI->db->get();
    return $result->result();
}
/* get Currency List */
function getCurrencyList(){
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('currency');
    $CI->db->where('currency.currency_status', 1);
    $result = $CI->db->get();
    return $result->result();
}

/* get Currency List */
function getCardsList(){
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('card');
    $CI->db->where('card.card_status', 1);
    $result = $CI->db->get();
    return $result->result();
}

function ccMasking($number, $maskingCharacter = '*') {
	return chunk_split(str_repeat($maskingCharacter, strlen($number) - 4) . substr($number, -4), 4, ' ');
}

function userBillingInfo($userData, $fromApi=false){
	
	$billingInfo = array();
	$billingInfo['firstname']	= $userData['billing_first_name'];
	$billingInfo['lastname']	= $userData['billing_last_name'];
	$billingInfo['address1']	= $userData['billing_address_1'];
	$billingInfo['address2']	= $userData['billing_address_2'];
	$billingInfo['city']		= $userData['billing_city_name'];
	$billingInfo['zip']   		= $userData['billing_zip_code'];
	$billingInfo['phone']		= $userData['billing_phone_no'];
	$billingInfo['email']		= $userData['billing_email'];
	
	if($fromApi==false){
		$countryCode= getColumnValue('country', 'iso_code_3', $where='country_id='.$userData['billing_country_id']);
		$stateCode	= getColumnValue('states', 'code', $where='state_id='.$userData['billing_state_id']);
		if($stateCode!=false)
			$billingInfo['stateCode']	= $stateCode;
		else
			$billingInfo['stateCode']	= '';
		if($countryCode!=false)
			$billingInfo['countryCode']= $countryCode;
		else
			$billingInfo['countryCode']= '';
	}else{
		$billingInfo['stateCode']	= $userData['stateCode'];
		$billingInfo['countryCode']	= $userData['countryCode'];
	}
	

	
	
	
	/*echo '<pre>';
	print_r($billingInfo);
	echo '</pre>';
	exit;*/
	return $billingInfo;
}
function userShippingInfo($userData, $fromApi=false){
	
	$shippingInfo = array();
	
	if($fromApi==false){
		$countryCode= getColumnValue('country', 'iso_code_3', $where='country_id='.$userData['shipping_country_id']);
		$stateCode	= getColumnValue('states', 'code', $where='state_id='.$userData['shipping_state_id']);
		$shippingInfo['firstname'] = $userData['shipping_first_name'];
		$shippingInfo['lastname']  = $userData['shipping_last_name'];
		$shippingInfo['address1']  = $userData['shipping_address_1'];
		$shippingInfo['address2']  = $userData['shipping_address_2'];
		$shippingInfo['zip']       = $userData['shipping_zip_code'];
		$shippingInfo['city']      = $userData['shipping_city_name'];
		if($stateCode!=false)
			$shippingInfo['stateCode']	= $stateCode;
		else
			$shippingInfo['stateCode']  = '';
		if($countryCode!=false)
			$shippingInfo['countryCode']= $countryCode;
		else
			$shippingInfo['countryCode']= '';
	}else{
		$shippingInfo['firstname']	= $userData['billing_first_name'];
		$shippingInfo['lastname']	= $userData['billing_last_name'];
		$shippingInfo['address1']	= $userData['billing_address_1'];
		$shippingInfo['address2']	= $userData['billing_address_2'];
		$shippingInfo['zip']   		= $userData['billing_zip_code'];
		$shippingInfo['city']		= $userData['billing_city_name'];
		$shippingInfo['stateCode']	= $userData['billing_first_name'];
		$shippingInfo['countryCode']= $userData['billing_first_name'];
	}
		
	/*echo '<pre>';
	print_r($shippingInfo);
	echo '</pre>';
	exit;*/
	return $shippingInfo;
}