<?php

require_once("includes/connection.php");

ob_start();

header("Content-Type:text/xml");



echo '<?xml version="1.0" encoding="UTF-8"?><Response>';



if(!$_SESSION[cust_password])

$_SESSION[token] = $Digits;



//$sql = "SELECT * FROM `transaction` WHERE `id` = '$_SESSION[transaction_id]' AND `number`='$_SESSION[token]'";

$sql = mysql_query("SELECT * FROM `transaction` WHERE `id` = '$_SESSION[transaction_id]' AND `number`='$_SESSION[token]'");

$fetch = mysql_fetch_object($sql);

/********************************ADMIN EMAIL*************************************/

$admin_email = mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));

$admin_email = $admin_email->email;

/********************************ADMIN EMAIL*************************************/

//$scr_key=$fetch->secretkey;

$rows = mysql_num_rows($sql);



$sql_acc = mysql_query("select * from act_holder_details where cust_act_number='".$fetch->act_number."'");





$fetch_acc = mysql_fetch_object($sql_acc);



$sql_acc1 = mysql_query("select * from act_holder_details where cust_act_number='".$_SESSION['act_number']."'");



$fetch_acc1 = mysql_fetch_object($sql_acc1);

$rows = mysql_num_rows($sql_acc1);

//if(strcmp($secretkey,$scr_key)==0)

if($rows>0){

	

	 $to=$fetch_acc1->cust_mail;

	 

	 $AvailableBalance=($fetch->present_balance - $fetch->debited);

	$time=date('h:i A');

$subject="Your Transaction Details";

 



$massege=    " 

<html>

<head>

<title>Transaction Notification</title>

<Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

</head>

<body>          

<table>

<h1>Dear   ($fetch_acc1->cust_name;)</h1>

<h2>Trexlore Bank eLectronic Notification Service (TeNS)</h2>

<p>We wish to inform you that a debited transaction occurred on your account with us.</p>

<p>The details of this transaction are shown below:</p>

<h3>Transaction Notification</h3>

<tr>

<td>Account Number  :       $fetch_acc1->cust_act_number</td>

</tr>

<tr>

<td>Transaction Location   $fetch->branch_add:</td>

</tr>

<tr>

<td>Description  :          Transferd</td>

</tr>

<tr>

<td>Amount  :                $fetch->debited AED</td>

</tr>

<tr>

<td>Value Date  :           $fetch->transaction_date</td>

</tr>



<tr>

<td>Document Number:         $fetch->transaction_id</td>

</tr>

<tr><td>The balances on this account as at  $time  are as follows;</td></tr>

<tr>

<td>Current Balance  :      $fetch->present_balance AED</td>

</tr>

<tr>

<td>Available Balance  :    $fetch->present_balance AED</td>

</tr>

<tr><td>Thank you for choosing Baharain Investment bank</td></tr>

<tr><td>Your Internet Banking user ID and password, ATM card number and PIN are confidential and should never be disclosed to anyone</td></tr>

<tr><td>NB:</td></tr>

<tr><td>Our notification service sent this mail to you using a default setting and the information you supplied to us when your account was opened.</td></tr>

<tr><td>If you wish to limit the type of mails you receive or the email address(es) in use, please send an email to us by clicking on the link below:

</td></tr>	

</table>

</body>

</html>

"; 

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

 $headers .= 'From: '.$admin_email."\r\n";// From

mail($to, $subject, $massege,$headers);





	echo $id;

	$sql=mysql_query("update transaction set status='1' where id='".$id."'");

	

	echo '<Say voice="woman">Your token is valid and your transfer has been approved for processing</Say>';

	echo '<Redirect> ipin.php </Redirect>';



}

else

{

	echo '<Say voice="woman">Your token is incorrect, please enter correct token or contact accounts department, For further assistance</Say>';

	echo '<Redirect> transaction.php </Redirect>';

}



?>

</Response>