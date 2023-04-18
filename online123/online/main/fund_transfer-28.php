<?php 

include('header.php'); 





if(isset($_REQUEST['transfer'])) {



$character_array = array_merge(range(a, z), range(0, 9));

$string = "";

    for($i = 0; $i < 6; $i++) {

        $string .= $character_array[rand(0, (count($character_array) - 1))];

    }

	

$transaction_id = $string;

$date = date('Y-m-d');

$act_number = $_REQUEST['act_number'];

$bank_name = $_REQUEST['bank_name'];

$branch_name = $_REQUEST['branch_name'];

$ifsc_code = $_REQUEST['ifsc_code'];

$amount = $_REQUEST['amount'];



/* transaction record in senders account */

/* present fund amount */

 $sender_act_number = $_SESSION['act_number']; 



$sender_latest_data = mysql_fetch_array(mysql_query("select max(id) as id from transaction where act_number = '".$sender_act_number."'"));

$present_balance = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$sender_act_number."' and id = '".$sender_latest_data[0]."'"));

$now_balance_sender = $present_balance['present_balance'] - $amount;

$transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."')");

/* transaction record in receivers account */

$receiver_latest_data = mysql_fetch_array(mysql_query("select max(id) as id from transaction where act_number = '".$act_number."'"));

$present_balance = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$act_number."' and id = '".$receiver_latest_data[0]."'"));

$now_balance_sender = $present_balance['present_balance'] + $amount;

$transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,credited,present_balance) values('".$act_number."','".$ifsc_code."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."')");







$sender_email = mysql_fetch_array(mysql_query("select * from act_holder_details where cust_act_number = '".$sender_act_number."'"));





$email=$sender_email['cust_mail'];





 $to = $email; 

 $headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 $headers .= 'From: '.$_REQUEST['visitormail'] . "\r\n";// From

  $subject  =  'Trexlore Bank alert' ; //Subject

 $message     = 'Money Deposited To This['; //Enter the Html Tag

 $message .= $act_number;

 $message .= ']Account Number';

mail($to,$subject,$message);



}

?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Fund Transfer</a>

					</li>

				</ul>

			</div>

			<div class="menu">

            <table width="500" border="0" cellspacing="4" cellpadding="4">

  				<tr>   

    			<td><a href="dashboard.php">Accounts&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>

    			<td><a href="request_card_view.php">Cards&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>

    			<td><a href="request_chequebook_view.php">Chequebook&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>

    			<td><a href="fund_transfer.php">Fund Transfer&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>  

                <td><a href="send_msg.php">Message&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>  

 			 	</tr>

				</table>

			</div>

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Fund Transfer </h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<!--<a href="viewpages.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">View Pages</a>-->

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<form class="form-horizontal" action="fund_transfer-28.php" method="post">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

							

							<div class="control-group">

							  <label class="control-label" for="date01">Account Number</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="act_number" name="act_number" type="text" value="" required>

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="typeahead"> Bank Name </label>

							  <div class="controls">

                              	  <input class="input-xlarge focused" id="act_number" name="bank_name" type="text" value="" required>

								  

								</div>

							</div>	

                            

                            <div class="control-group">

							  <label class="control-label" for="typeahead"> Branch Name </label>

							  <div class="controls">

                              	<input class="input-xlarge focused" id="act_number" name="branch_name" type="text" value="" required>

								</div>

							</div>	

                            

                            <div class="control-group">

							  <label class="control-label" for="typeahead"> Branch Address </label>

							  <div class="controls">

                              	<input class="input-xlarge focused" id="act_number" name="branch_add" type="text" value="" required>

								</div>

							</div>

                            <div class="control-group">

							  <label class="control-label" for="date01">Bank Code</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="ifsc_code" name="ifsc_code" type="text" value="" required>

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">Amount</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="amount" name="amount" type="text" value="" required>

								</div>

							</div>			

							

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary" name="transfer">Transfer</button>

							  <button type="reset" class="btn">Cancel</button>

							</div>

						  </fieldset>

						</form>   



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

