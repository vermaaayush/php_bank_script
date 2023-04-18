<?php 

echo $hid=$_REQUEST['hid'];

echo $number=$_REQUEST['number'];exit;

$sender_email = mysql_fetch_array(mysql_query("select * from act_holder_details where cust_act_number = '".$fetch->act_number."'"));

$email=$sender_email['cust_mail'];









 $to = $email; 

 $headers  = 'MIME-Version: 1.0' . "\r\n";

 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 $headers .= 'From: '.$_REQUEST['visitormail'] . "\r\n";// From

 $subject  =  'Trexlore Bank alert' ; //Subject

 $message     = 'Money Deposited To Your Account'; //Enter the Html Tag



if(mail($to,$subject,$message)){

	echo 'mail send ';

	exit;	

	}else{ echo "Mail Not Send";	exit;	

}







?>