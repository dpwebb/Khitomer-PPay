<?php

include('includes/config.php');

$directPayExpress = new DirectPayExpress(API_USERNAME, API_PASSWORD, API_URL);

// enable debug output
$directPayExpress->debug();

$toDpxAccountNumber = ''; // example: 100000
$amount = ''; // example: 2.50
$dpxResponse = $directPayExpress->loadCard($toDpxAccountNumber, $amount);

print_r($dpxResponse);