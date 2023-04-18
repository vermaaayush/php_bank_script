<?php
require_once("includes/connection.php");
ob_start();
header("Content-Type:text/xml");

echo '<?xml version="1.0" encoding="UTF-8"?><Response>';

switch($Digits){
	
	case '*':
	?>
    <Redirect> ipin.php </Redirect>
	<?php

	break;
	
	case 1 :
	
	$sql = "INSERT INTO `card` (`cust_act_number`) VALUES ('$_SESSION[cust_act_number]')";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);
	?>
	<Say voice="woman">Your request has been registered</Say>
    <Redirect> ipin.php </Redirect>
	<?php 
	break;
}
?>
</Response>