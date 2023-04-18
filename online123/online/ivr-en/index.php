<?php



require_once("includes/connection.php");



ob_start();



header("Content-Type:text/xml");



echo '<?xml version="1.0" encoding="UTF-8"?><Response>';



$_SESSION = $_REQUEST;



?>



<Play>http://trexlorebk.com/ivr-en/includes/pp.wav</Play>



<Play>http://trexlorebk.com/ivr-en/includes/pp.wav</Play>



<Say voice="woman">Welcome to Trexlore Bank Telephone Service.</Say>



<?php 	



	$sql = "SELECT * FROM `act_holder_details` WHERE `cust_phone` = '$From'";



	$res = mysql_query($sql);



	$row = mysql_fetch_assoc($res);



if(!$row){ ?>



<Say voice="woman">Sorry, this telephone number is not register with any bank account.</Say>



<?php }  for ($i=1; $i<=3; $i++) { ?>



<Gather action="input.php" numDigits="1">



  <Say voice="woman"> To access your account features such as checking account balance, Initiate local and inter Bank Transfer, Request cheque and ATM, Press 1</Say>



  <Say voice="woman"> If you dont have your login details and would like to contact customer service to acquire one, Press 2 </Say>



  <Say voice="woman"> To listen this menu again, press 3 </Say>



  <Say voice="woman"> To quite from this service, Press 0 </Say>



</Gather>



<Say voice="woman">Sorry, I didn't get your response.</Say>



<?php } ?>



<Say>You have exceeded your time-out limit. Good Bye.</Say>



<Hangup/>



</Response>