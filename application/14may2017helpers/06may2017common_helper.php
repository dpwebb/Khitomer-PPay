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
    $result = $CI->db->get();
    return $result->result();
}

/* get cities name */
function getStatesList($countryID){
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('states');
    $CI->db->where('states.country_id', $countryID);
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