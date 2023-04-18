<?php
require_once("includes/connection.php");
ob_start();
header("Content-Type:text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?><Response>';

	$_SESSION[start] = $Digits - 1;
	$sql = "SELECT * FROM `transaction` WHERE `act_number` = '$_SESSION[cust_act_number]' AND status='0' ORDER BY `id` DESC LIMIT $_SESSION[start],1";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);
	$_SESSION[transaction_id] = $row[id];
?>
    <?php for ($i=1; $i<=3; $i++) { ?>
    <Gather action="token.php" finishOnKey="#">
      <Say voice="woman">Enter your TOKEN NUMBER, followed by the Pound key.</Say>
    </Gather>
    <Say voice="woman">Sorry, I didn't get your SECRET PIN.</Say>
    <?php } ?>
    <Say voice="woman">You have exceeded your time-out limit. Good Bye.</Say>
    <Hangup/>
</Response>