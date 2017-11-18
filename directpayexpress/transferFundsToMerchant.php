<?php

include('includes/config.php');

$directPayExpress = new DirectPayExpress(API_USERNAME, API_PASSWORD, API_URL);

// enable debug output
$directPayExpress->debug();


$fromDpxAccountNumber = ''; // example: 100000
$amount = ''; // example 6.00
$dpxResponse = $directPayExpress->transferFundsToMerchant(112462, 6.00);

print_r($dpxResponse);