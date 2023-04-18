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



	



	$sql = "SELECT * FROM `cust_act_details` WHERE `cust_act_no` = '$_SESSION[cust_act_number]'";



	$res = mysql_query($sql);



	$row = mysql_fetch_assoc($res);



	?>



	<Say voice="woman"> Your current Account Balance is <?php echo $row[cust_balance].' '.$row[cust_currency]; ?></Say><Pause length="1" />



	<Say voice="woman"> Repeat, Your current Account Balance is <?php echo $row[cust_balance].' '.$row[cust_currency]; ?></Say><Pause length="1" />



    <?php for ($i=1; $i<=3; $i++) { ?>



    <Gather action="account.php" numDigits="1">



      <Say voice="woman"> To listen this annoncement again, Press 1</Say>



      <Say voice="woman"> To go back to the MAIN MENU, press the star key</Say>



	  <Say voice="woman"> To quite from this service, Press 0 </Say>



    </Gather>



    <Say voice="woman">Sorry, I didn't get your response.</Say>



	<?php } ?>



    <Say voice="woman">You have exceeded your time-out limits. Good-Bye.</Say>



	<Hangup/>



	<?php



	break;







	



	case 2 :



	



	?>



	<Say voice="woman"> Please select the transaction from the following options</Say><Pause length="1" />



	<Say voice="woman"> Repeat, Your current Account Balance is <?php echo $row[cust_balance].' '.$row[cust_currency]; ?></Say><Pause length="1" />



    <?php for ($i=1; $i<=3; $i++){ ?>	 



    <Gather action="transaction.php" numDigits="1">



	<?php



	$sql = "SELECT * FROM `transaction` WHERE `act_number` = '$_SESSION[cust_act_number]' AND status='0' ORDER BY `id` DESC LIMIT 9";



	$res = mysql_query($sql);



	while($row = mysql_fetch_assoc($res)){ ?>



      <Say voice="woman"> For Transaction ID - <?php echo implode(', ',str_split($row[transaction_id])); ?>, Press <?php echo ++$sl; ?></Say>



    <?php } unset($sl); ?>  



    </Gather>



    <Say voice="woman">Sorry, I didn't get your response.</Say>



	<?php } ?>



    <Say voice="woman">You have exceeded your time-out limits. Good-Bye.</Say>



	<Hangup/>



	<?php



	break;







	



	case 3 :



	



	$sql = "SELECT * FROM `transaction` WHERE `act_number` = '$_SESSION[cust_act_number]' ORDER BY `id` DESC";



	$res = mysql_query($sql);



	$row = mysql_fetch_assoc($res);



	?>



	<Say voice="woman"> Your Account is <?php if($row[debited]) echo 'debited'; else echo 'credited'; ?> with amount <?php echo $row[debited].$row[credited]; ?>, and your current Account balance is <?php echo $row[present_balance]; ?></Say><Pause length="1" />



	<Say voice="woman"> Repeat, Your Account is <?php if($row[debited]) echo 'debited'; else echo 'credited'; ?> with amount <?php echo $row[debited].$row[credited]; ?>, and your current Account balance is <?php echo $row[present_balance]; ?></Say><Pause length="1" />



    <?php for ($i=1; $i<=3; $i++) { ?>



    <Gather action="account.php" numDigits="1">



      <Say voice="woman"> To listen this annoncement again, Press 3</Say>



      <Say voice="woman"> To go back to the MAIN MENU, press the star key</Say>



	  <Say voice="woman"> To quite from this service, Press 0 </Say>



    </Gather>



    <Say voice="woman">Sorry, I didn't get your response.</Say>



	<?php } ?>



    <Say voice="woman">You have exceeded your time-out limits. Good-Bye.</Say>



	<Hangup/>



	<?php 



	break;











	case 4 :



	



	for ($i=1; $i<=3; $i++) { ?>



    <Gather action="cheque.php" numDigits="1">



	  <Say voice="woman"> Please note that for requesting a cheque book, there will attract a service charge, to proceed with your request for a Cheque Book, Press 1</Say>



      <Say voice="woman"> To go back to the MAIN MENU, press the star key</Say>



	  <Say voice="woman"> To quite from this service, Press 0 </Say>



    </Gather>



    <Say voice="woman">Sorry, I didn't get your response.</Say>



	<?php } ?>



    <Say voice="woman">You have exceeded your time-out limits. Good-Bye.</Say>



	<Hangup/>



	<?php 



	break;











	case 5 :



	



	for ($i=1; $i<=3; $i++) { ?>



    <Gather action="atm.php" numDigits="1">



	  <Say voice="woman"> Please note that for requesting a ATM Card, there will attract a service charge, to proceed with your request for a ATM Card, Press 1</Say>



      <Say voice="woman"> To go back to the MAIN MENU, press the star key</Say>



	  <Say voice="woman"> To quite from this service, Press 0 </Say>



    </Gather>



    <Say voice="woman">Sorry, I didn't get your response.</Say>



	<?php } ?>



    <Say voice="woman">You have exceeded your time-out limits. Good-Bye.</Say>



	<Hangup/>



	<?php 



	break;











	case 6 :



	



	?>



    <Say voice="woman">Your call is being transfered. Please wait while i connect you.</Say>



    <Pause length="1" />



    <Say voice="woman"> Hello, Thank you for calling the Customer Care service of Trexlore Bank Telephone Service </Say>



    <Say voice="woman"> Please note that this call may be monitored for quality and training purposes </Say>



    <Say voice="woman"> A Customer Agent will be with you shortly. please hold </Say>



    <Play>http://trexlorebk.com/ivr-en/includes/welcome.mp3</Play>



    <Play>http://trexlorebk.com/ivr-en/includes/welcome.mp3</Play>

    

        <Play>http://trexlorebk.com/ivr-en/includes/welcome.mp3</Play>



    <Play>http://trexlorebk.com/ivr-en/includes/welcome.mp3</Play>





    <Play>http://trexlorebk.com/ivr-en/includes/welcome.mp3</Play>



    <Play>http://trexlorebk.com/ivr-en/includes/welcome.mp3</Play>





    <Play>http://trexlorebk.com/ivr-en/includes/welcome.mp3</Play>



    <Play>http://trexlorebk.com/ivr-en/includes/welcome.mp3</Play>





    <Play>http://trexlorebk.com/ivr-en/includes/welcome.mp3</Play>



    <Play>http://trexlorebk.com/ivr-en/includes/welcome.mp3</Play>



    <dial>+447404569704</dial>

    

    <Say voice="woman"> We are sorry all customer care agents are busy at this time, your call is important to us, please call back again or email info at b f s b i - B a h a m a s dot com ! Thank you for your time </Say>



    <Hangup/>



    <?php



	



	break;







	



	case 7:



	?>



    <Redirect> ipin.php </Redirect>



	<?php







	break;







	



	case 0 :



	



	?>



    <Say voice="woman">Thanks for using Trexlore Bank Telephone Service, Good-Bye.</Say>



	<Hangup/>



	<?php



	break;







	default :



	



	?>



    <Redirect> ipin.php </Redirect>



	<?php



}



?>



</Response>