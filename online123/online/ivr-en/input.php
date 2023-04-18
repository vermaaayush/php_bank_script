<?php

require_once("includes/connection.php");

ob_start();

header("Content-Type:text/xml");



echo '<?xml version="1.0" encoding="UTF-8"?><Response>';

switch($Digits){



	case 0 :

	

	?>

    <Say voice="woman">Thanks for using Trexlore Bank Telephone Service, Good-Bye.</Say>

	<Hangup/>

	<?php

	break;

	

	case 1 :



	for ($i=1; $i<=3; $i++) { ?>

    <Gather action="userid.php" finishOnKey="#">

      <Say voice="woman">Please enter your USER ID, followed by the Pound key.</Say>

    </Gather>

    <?php } ?>

    <Say voice="woman">You have exceeded your time-out limit. Good Bye. </Say>

    <Hangup/>

    <?php

	

	break;

	

	case 2 :

	

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
     
    <Say voice="woman">All Our customer service agents are currently busy, please try again later</Say>

    <Dial>+2348052347915</Dial>
    
    <Say>Goodbye</Say>

    <Hangup/>

    <?php

	

	break;



	case 3 :

	?><Redirect> index.php </Redirect><?php

	break;

	

	default :

	

	for ($i=1; $i<=3; $i++) { ?>

    <Gather action="input.php" numDigits="1">

      <Say voice="woman">Please enter a valid input.</Say>

    </Gather>

   	<Say voice="woman">Sorry, I didn't get your response.</Say>

    <?php } ?>

    <Say voice="woman">You have exceeded your time-out limit. Good Bye. </Say>

    <Hangup/>

    <?php

	

}

?>

</Response>