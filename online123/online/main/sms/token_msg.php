<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
require_once "Twilio/autoload.php";

function connection(){
$account_sid ="AC48efbb057c8c84ee17233ce3a9543895";
$auth_token ="c6ffc9b92f70154e1ece7fa64c0be4f1";
$client = new Client($account_sid, $auth_token);
return $client;
}
function token_access($countrycode,$number,$message)
{
$twilio_number="+1 855 217 8181";
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
//echo "Sent";
}
catch (Exception $e) {
	echo "Error Occured";
}

}

function debited($countrycode,$number,$message)
{
$twilio_number="+1 855 217 8181";
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
	echo "Error Occured";
}

}

