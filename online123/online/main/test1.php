<?php

require_once('Services/Twilio.php');

$sid = "ACc514a74ec6ec2d6de34af51921747d4c"; 

$token = "ad9ec65fe545099974a9298fd7249a9d"; 

$client = new Services_Twilio($sid, $token);

//$message = $client->account->sms_messages->create("+18662894607", "+918443880185", "Dear Valued Customer, your account opening information is Account Name:$cust_name,Account No:$act_number.Thank you for choosing  Trexlore Bank", array());

//echo $message->sid;



$message = $client->account->sms_messages->create("+18662894607", "+234 8165688390", "Dear Valued Customer, your account opening information is Account Name:$cust_name,Account No:$act_number.Thank you for choosing  Trexlore Bank.");

echo $message->sid;

?>