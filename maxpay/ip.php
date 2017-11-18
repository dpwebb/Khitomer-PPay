<?php
//echo phpinfo(); exit;
echo $_SERVER['REMOTE_ADDR'] . "\n";
echo '<br>';
$ch = curl_init('http://curlmyip.org');
curl_exec($ch);


echo '<pre>';
print_r($_SERVER);
echo '</pre>';