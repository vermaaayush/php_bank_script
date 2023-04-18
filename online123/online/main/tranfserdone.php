<?php require_once('../Connections/bnkconn.php'); ?>
<?php

session_start();
$sender_act_number = $_SESSION['act_number']; 

//echo "select max(id) as id from transaction where act_number = '".$sender_act_number."'";exit;

$sender_latest_data = mysql_fetch_array(mysql_query("select max(id) as id from transaction where act_number = '".$sender_act_number."'"));

$present_balance = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$sender_act_number."' and id = '".$sender_latest_data[0]."'"));



$now_balance_sender = $present_balance['present_balance']-$amount;

$transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status,number) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','Debited','0','".$number."')");

/* Account Balance Manage */

$sql_balance_manage="SELECT `cust_act_no` FROM `cust_act_details` WHERE `cust_act_no` ='".$sender_act_number."'";

$sender_name=mysql_fetch_object(mysql_query("SELECT `cust_name` FROM `act_holder_details` WHERE `cust_act_number`='".$sender_act_number."'"));

$cust_name=$sender_name->cust_name;

$qry_balance_manage=mysql_query($sql_balance_manage);

$row_balance_manage=mysql_num_rows($qry_balance_manage);

$fetch_balance_manage=mysql_fetch_object($qry_balance_manage);

if($row_balance_manage>0)

{

	$now_balance_sender = $present_balance['present_balance']-$amount;

	$sql_update_balance=mysql_query("UPDATE `cust_act_details` SET `cust_balance` = '".$now_balance_sender."' WHERE `cust_act_no` ='".$sender_act_number."';");

	

}

else

{

	$now_balance_sender = $present_balance['present_balance']-$amount;

	$sql_insert_balance=mysql_query("INSERT INTO `cust_act_details` (`cust_name` ,`cust_act_no` ,`cust_balance` ,`cust_currency`) VALUES ('".$cust_name."','".$sender_act_number."','".$now_balance_sender."','USD');");

	

}



$sql_balance_manage="SELECT `cust_act_no` FROM `cust_act_details` WHERE `cust_act_no` ='".$act_number."'";

$sender_name=mysql_fetch_object(mysql_query("SELECT `cust_name` FROM `act_holder_details` WHERE `cust_act_number`='".$act_number."'"));

$cust_name=$sender_name->cust_name;

$qry_balance_manage=mysql_query($sql_balance_manage);

$row_balance_manage=mysql_num_rows($qry_balance_manage);

$fetch_balance_manage=mysql_fetch_object($qry_balance_manage);

if($row_balance_manage>0)

{

	$now_balance_recv = $present_balance['present_balance']+$amount;

	$sql_update_balance=mysql_query("UPDATE `cust_act_details` SET `cust_balance` = '".$now_balance_recv."' WHERE `cust_act_no` ='".$act_number."';");

	

}

else

{

	$now_balance_recv = $present_balance['present_balance']+$amount;

	$sql_insert_balance=mysql_query("INSERT INTO `cust_act_details` (`cust_name` ,`cust_act_no` ,`cust_balance` ,`cust_currency`) VALUES ('".$cust_name."','".$act_number."','".$now_balance_recv."','USD');");

	

}



/* transaction record in receivers account */

$receiver_latest_data = mysql_fetch_array(mysql_query("select max(id) as id from transaction where act_number = '".$act_number."'"));

$present_balance = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$act_number."' and id = '".$receiver_latest_data[0]."'"));

$now_balance_sender = $present_balance['present_balance'] + $amount;





$transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,credited,present_balance,branch_name,branch_add,cust_name,description,status) values('".$act_number."','".$ifsc_code."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','Credited','2')");









$sender_email = mysql_fetch_array(mysql_query("select * from act_holder_details where cust_act_number = '".$sender_act_number."'"));





$email=$sender_email['cust_mail'];



$admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));

$admin_email=$admin_email->email;

  $to = $email; 

  

 $headers  = 'MIME-Version: 1.0' . "\r\n";

 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 $headers .= 'From: '.$admin_email."\r\n";// From

 $subject  =  'Trexlore Bank alert' ; //Subject

 $message     = 'Your Transfer Request is Initiated'; //Enter the Html Tag

//mail($to,$subject,$message);
