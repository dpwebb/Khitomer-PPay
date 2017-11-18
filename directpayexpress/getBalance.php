<?php

include('includes/config.php');

$directPayExpress = new DirectPayExpress(API_USERNAME, API_PASSWORD, API_URL);

// enable debug output
$directPayExpress->debug();

$dpxAccountNumber = '120155'; // example: 100000
$dpxResponse = $directPayExpress->getBalance($dpxAccountNumber);

echo '<pre>';
print_r($dpxResponse);
echo '</pre>';