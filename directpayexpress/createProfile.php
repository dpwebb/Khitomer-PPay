<?php

include('includes/config.php');

$directPayExpress = new DirectPayExpress(API_USERNAME, API_PASSWORD, API_URL);

// enable debug output
$directPayExpress->debug();


$dpxResponse = $directPayExpress->createProfile(array(
    'profileType'   => 3, // 99.99% of the time this will always be 3. DPX would tell you otherwise
    'account_type_id' => 1, // US Visa program = 1
    'username'      => '', // Must be unique in the DPX system
    'first_name'    => "",
    'last_name'     => '',
    'email'         => '',
    'address'       => '',
    'city'          => '',
    'state_prov'    => 27, // numeric values, please see the API document on the values you should use. Note: There is a API call to get states if you want to use that.
    'country'       => 'US', // 2 Character ISO code
    'ssn'           => '', // SSN number - required for US programs
    'dob'           => '', // Date of Birth - required for US programs in YYYY-MM-DD format
    'postal_code'   => '',
    'phone'         => '',
    'test_mode'     => true // If you set this to true, we will completly bypass iCare, this way it will not send out a physical card and go through the KYC process.
));

print_r($dpxResponse);
