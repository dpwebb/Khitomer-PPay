<?php

$postData = array();

$postData['merchantid']			= 2;
$postData['merchant_key']		= 'o4844cwks000ocw4404c080oow4ww42';
$postData['merchant_password']	= 'e10adc3949ba59abbe56e057f20f883e';//e10adc3949ba59abbe56e057f20f883e

$postData['first_name'] 			= "Hafeez";
$postData['last_name'] 				= "Iqbal";
$postData['user_email'] 			= "hafeez.iqbal@gmail.com";
$postData['user_phone'] 			= "6479273305";
$postData['address1'] 				= "270 Scarlett Rd, 311";
$postData['address2'] 				= "";
$postData['city'] 					= "Alberta";
$postData['zip'] 					= "M6N 4X7";
$postData['country'] 				= 'CAN';
$postData['state'] 					= 'AB';

$postData['affiliate_customer_id']  = '878478';
$postData['currency']				= "USD";
$postData['order_number']			= '5245';
$postData['order_description']		= 'i am testing';
$postData['card_type']				= 'VISA'; //MC
$postData['card_number']			= "4111111111111111";
$postData['card_exp_month']			= "05";
$postData['card_exp_year']			= "2018";
$postData['cvv']					= "123";
$postData['amount']					= 10.50;
$postData['user_ip'] 				= $_SERVER['REMOTE_ADDR']; //'39.53.246.123';


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

//echo $output;
echo '<pre>';
print_r(json_decode($response));
echo '</pre>';

?>










