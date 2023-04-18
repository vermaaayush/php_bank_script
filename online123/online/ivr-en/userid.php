<?php
require_once("includes/connection.php");
ob_start();
header("Content-Type:text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?><Response>';

if(!$_SESSION[user_id])
$_SESSION[user_id] = $Digits;

$sql = "SELECT * FROM `act_holder_details` WHERE `user_id` = '$_SESSION[user_id]'";
$res = mysql_query($sql);
$num = mysql_num_rows($res);

if($num){
	$row = mysql_fetch_assoc($res);
	$_SESSION[user_id] = $row[user_id];
	for($i=1; $i<=3; $i++) {
?>
    <Gather action="ipin.php" finishOnKey="#">
      <Say voice="woman">Enter your SECRET PIN of your account, followed by the Pound key.</Say>
    </Gather>
    <Say voice="woman">Sorry, I didn't get your SECRET PIN.</Say>
    <?php } ?>
    <Say voice="woman">You have exceeded your time-out limit. Good Bye.</Say>
    <Hangup/>
<?php } else { 
	for ($i=1; $i<=3; $i++) {
?>
    <Gather action="userid.php" finishOnKey="#">
      <Say voice="woman">The USER ID is invalid </Say>
      <Say voice="woman">Please re-enter your USER ID, followed by the Pound key.</Say>
    </Gather>
	<Say voice="woman">Sorry, I didn't get your response.</Say>
    <?php } ?>
    <Say voice="woman">You have exceeded your time-out limit. Good Bye. </Say>
    <Hangup/>
    <?php } ?>
</Response>