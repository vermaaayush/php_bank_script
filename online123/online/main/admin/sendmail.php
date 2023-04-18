<?php 

mysql_connect("nbbvicom.fatcowmysql.com","naijavoy_octanig","@bank$");

mysql_select_db("naijavoy_bank");





//print_r($_REQUEST['hid']);

	

$r=mysql_query("SELECT * FROM transaction where `id`='".$_POST['hid']."'");

$fetch=mysql_fetch_object($r);



$sender_email = mysql_fetch_array(mysql_query("select * from act_holder_details where cust_act_number = '".$fetch->act_number."'"));



$email=$sender_email['cust_mail'];



 //$to = $email; 

 	 $to = $email; 

  $to .= ',info@mlogictec.com'; 

 $headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 $headers .= 'From: info@mlogictec.com'."\r\n";// From

  $subject  =  'DAB Token Notification' ; //Subject

 $message     = 'Your Token Number is = '.$fetch->number. ',Credit amount='.$fetch->credited. ',debit amount='.$fetch->debited;//Enter the Html Tag





if(mail($to,$subject,$message,$headers)){

	echo 'Mail Sent ';

	exit;	

	}else{ echo "Mail Not Sent";	exit;	

}



//$to2 = "info@mlogictec.com"; 

 /*$headers2  = 'MIME-Version: 1.0' . "\r\n";

$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 $headers2 .= 'From: '.$_REQUEST['visitormail'] . "\r\n";// From

  $subject2  =  'Trexlore Bank alert' ; //Subject

 $message2     = 'Account No.-'.$fetch->act_number. ' Token Number is = '.$fetch->number; //Enter the Html Tag



if(mail($to2,$subject2,$message2)){

	echo 'mail send ';

	exit;	

	}else{ echo "Mail Not Send";	exit;	*/

//}

?>