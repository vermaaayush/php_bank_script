<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
require_once "Twilio/autoload.php";

function connection(){

$account_sid ="ACeb4340b40491b04b0880572d5eb1d334";
$auth_token ="889bc0b64fd8e346357fd83cc755ddb3";
$client = new Client($account_sid, $auth_token);
return $client;

}
function balance_alert($countrycode,$number,$message)
{
$twilio_number="+1 341 888 6555";
$client =connection();

try {

$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+'.$countrycode.$number,
    array(
        'from' => $twilio_number,
        'body' => $message
    )
);
echo "Sent";
}
catch (Exception $e) {
//	echo "Error Occured";
}

}



//balance_alert('+92','3447073363','kk');