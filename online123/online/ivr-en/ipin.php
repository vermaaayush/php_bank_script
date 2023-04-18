<?php
require_once("includes/connection.php");
ob_start();
header("Content-Type:text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?><Response>';

if(!$_SESSION[cust_password])
$_SESSION[cust_password] = $Digits;

$sql = "SELECT * FROM `act_holder_details` WHERE `user_id` = '$_SESSION[user_id]' AND `cust_password` = '$_SESSION[cust_password]'";
$res = mysql_query($sql);
$num = mysql_num_rows($res);

if($num){
	$row = mysql_fetch_assoc($res);
	$_SESSION[cust_password] = $row[cust_password];
	$_SESSION[cust_act_number] = $row[cust_act_number];
?>
<Say voice="woman"> Welcome back <?php echo $row[cust_name];?>, </Say>
<?php for ($i=1; $i<=3; $i++) { ?>
<Gather action="account.php" numDigits="1">
  <Say voice="woman"> To check your Account Balance, press 1 </Say>
  <Say voice="woman"> For Online Transfer requests, press 2 </Say>
  <Say voice="woman"> To check your Last Transaction, press 3 </Say>
  <Say voice="woman"> For request a Cheque Book, press 4 </Say>
  <Say voice="woman"> For request a ATM Card, press 5 </Say>
  <Say voice="woman"> To contact Customer Service, press 6 </Say>
  <Say voice="woman"> To listen this menu again, press 7 </Say>
  <Say voice="woman"> To quite from this service, Press 0 </Say>
</Gather>
<Say voice="woman">Sorry, I didn't get your response.</Say>
<?php } ?>
<Say voice="woman">You have exceeded your time-out limits. Good-Bye.</Say>
<Hangup/>
<?php } else { 
for ($i=1; $i<=3; $i++) {
?>
<Gather action="ipin.php" finishOnKey="#">
  <Say voice="woman">The SECRET PIN you entered is invalid.</Say>
  <Say voice="woman">Please re-enter your PERSONAL SECRET PIN, followed by the Pound key </Say>
</Gather>
<?php } ?>
<Say voice="woman">You have exceeded your time-out limit. Good Bye. </Say>
<Hangup/>
<?php } ?>
</Response>