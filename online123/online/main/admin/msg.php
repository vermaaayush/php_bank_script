<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../Services/Twilio.php');

$sid = "AC96156b8e489dc2784e2207917e741110"; 
$token = "e127eaa3e14fbfb8dcc16a97f8f42f69"; 
$client = new Services_Twilio($sid, $token);
$message = $client->account->sms_messages->create("+17083407214", "+923447073363", "Hello", array());
//$message->sid;
