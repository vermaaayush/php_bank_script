<?php 
session_start();
include('header.php'); 

// Getting the transfer enabled or disabled ,added on 19 dec 2018 
$act_number = $_SESSION['act_number']; 
$status_check=mysql_fetch_object(mysql_query("SELECT `account_transfer`,`transfer_page_message` FROM `act_holder_details` WHERE `cust_act_number`='".$act_number."'"));




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

$branch_add = $_REQUEST['branch_add'];

$cust_name=$_REQUEST['cust_name'];



/* transaction record in senders account */

/* present fund amount */



$sender_act_number = $_SESSION['act_number']; 

//echo "select max(id) as id from transaction where act_number = '".$sender_act_number."'";exit;

$sender_latest_data = mysql_fetch_array(mysql_query("select max(id) as id from transaction where act_number = '".$sender_act_number."'"));

$present_balance = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$sender_act_number."' and id = '".$sender_latest_data[0]."'"));



$now_balance_sender = $present_balance['present_balance']-$amount;

$transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','Debited','0')");

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



if(mail($to,$subject,$message,$headers)){

	//echo 'Mail Sent';

	echo "<script type=\"text/javascript\">

location.href = \"success_page.php?amount=$amount&acc=$act_number&ban_name=$bank_name&brnch_nm=$branch_name&br_add=$branch_add&b_code=$ifsc_code&cus_nm=$cust_name\";

</script>";

	?>

	<!--

	<script language="javascript" type="application/javascript">

window.location.href= 'success_page.php?amount=$amount&acc_numb=$act_number'

</script>-->

<?	//header('Location: success_page.php'); 

	//exit;	

	}else{ echo "Mail Not Sent";	exit;	

}

	





}

?>

<style type="text/css">

mid {

	text-align: center;

}

.red {

	color: #F00;

}

</style>







			<div >

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Fund Transfer</a>

					</li>

				</ul>

			</div>

            

            			<?php include "menu.php";?>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white" data-original-title>

						<h2 style="color:white;font-size:40px;font-wight:bold"><i class="icon-edit"></i>Instant Funds Transfer Request</h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<!--<a href="viewpages.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">View Pages</a>-->

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">
                                                
					  <div class="form-actions" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white"><br />
                                            


					    <form id="form1" name="form1" method="post" action="fund_transferin.php">

					      <button type="submit" value="submit" class="btn btn-primary" name="get_transaction">Transfer to Trexlore Bank A/C</button>

				        </form>

					    <form id="form2" name="form2" method="post" action="fund_transferx.php">

					      <button type="submit" value="submit" class="btn btn-primary" name="get_transaction">Transfer to Other Banks (Instant)</button>

					    </form>
                        <form id="form2" name="form2" method="post" action="Pending_transactions.php">

					      <button type="submit" value="submit" class="btn btn-primary" name="get_transaction">Resume Pending Transfers</button>

					    </form>

					  </div>

					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

