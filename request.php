<?php


/*//set API Token
$apiToken   = "21616a2ec1a491de5de5adff8950b841";
//set API Base URL
$apiBaseUrl = "https://portal.bright-speed.com";*/

$apiToken   = "21616a2ec1a491de5de5adff8950b841";

$postData = array();
$postData['SOURCE']				= 50;
$postData['FIRSTNAME'] 			= 'Danial';
$postData['LASTNAME']			= 'Brian';
$postData['MIDDLEINITIAL']		= '';
$postData['COMPANYOR2NDNAME']	= '';
$postData['CHECKAGE']			= TRUE;
$postData['ADDRESS'] 			= '2418 Friendship Church Rd';
$postData['CITY']				= 'Boone';
$postData['STATE']				= 'NC';
$postData['ZIPCODE']			= "28607";
$postData['EMAIL']				= 'hafeez.iqbal@gmail.com';
$postData['PHONENUMBER']		= '';
$postData['OTHERPHONENUMBER']	= '';
$postData['EMPLOYEENUMBER']		= '';
$postData['ABANUMBER']			= '000000000';
$postData['ACCOUNTNUMBER']		= '1111';
$postData['AMOUNT']				= 19.99;
$postData['BANKNAME']			= '';//Name of customer's bank.

$postData['BANKADDRESS']		= '';
$postData['BANKCITY']			= '';//City of customer's bank.
$postData['BANKSTATE']			= '';//State of customer's bank. Must to be 2 character abbreviation.
$postData['BANKZIPCODE']		= '';
$postData['BANKPHONE']			= '';
$postData['BANKFAX']			= '';
$postData['CHECKNUMBER']		= '';
$postData['TRANSITNUM']			= '';
$postData['DEPOSITDATE']		= '';
$postData['POSTBACKURL']		= '';

/*echo '<pre>';
print_r($postData);
echo '</pre>';
exit;*/
//our Api Endpoint URL
$url = 'https://portal.bright-speed.com/api/v1/payments/transaction';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $apiToken.":".$apiToken);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
$response = curl_exec($ch);
curl_close($ch);

echo '<pre>';
print_r(json_decode($response));
echo '</pre>';
