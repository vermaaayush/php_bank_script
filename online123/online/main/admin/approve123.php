<?php 

mysql_connect("nbbvicom.fatcowmysql.com","naijavoy_octanig","@bank$");

mysql_select_db("naijavoy_bank");





print_r($_REQUEST['hid']);

	

$r=mysql_query("SELECT * FROM transaction where `id`='".$_POST['hid']."'");

$fetch=mysql_fetch_object($r);

if($fetch->status==1)

{ 

//$sql = mysql_query("UPDATE transaction SET status='0' where `id`='".$_POST['hid']."'");

$sql = mysql_query("UPDATE transaction SET status='1' where `id`='".$_POST['hid']."'");

}

else

{

$sql = mysql_query("UPDATE transaction SET status='1' where `id`='".$_POST['hid']."'");

}

















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

















	/*chdir("..");

	include("config/admin-includes.php");

	chdir("ajax");

	$con=new DBConnection(host,user,pass,db);

	$conObj=$con->connectDB();

	

$sql = mysql_query("UPDATE `latest_list` SET `aprove`='1' where `id`='".$_POST['hid']."'");*/

//echo $_POST['hid'];

//$r=mysql_query("SELECT * FROM latest_list where `id`='".$_POST['hid']."'");

//$fetch=mysql_fetch_object($r);

//$to=$fetch->email_address;

//$subject="thanks to contact us";

//$Secret_Key=substr(uniqid(),0,8);

//$sql1=mysql_query("UPDATE `latest_list` SET `secretkey`='".$Secret_Key."' where `id`='".$_POST['hid']."'");

//$massege="Your submition is approved";

//$massege="Your submition is approved.Your secret key is ".$Secret_Key." .";

//if(mail($to, $subject, $massege))

	//{

	//echo 'Mail sent after approvation from admin, while updation the respective secret key is to be entered';	

	//}else{ echo "Mail Not Send";	

//}	

?>

