<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="confirm.css">
<script src="confirm.js"></script>
</head>
<body>
<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>
</div>


</body>
</html>


<?php require_once('../Connections/bnkconn.php'); ?>

<?php
$isufficent =0;
ob_start();
sleep(5);
if (!isset($_SESSION)) {

  session_start();

}

$MM_authorizedUsers = "";

$MM_donotCheckaccess = "true";



// *** Restrict Access To Page: Grant or deny access to this page

function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 

  // For security, start by assuming the visitor is NOT authorized. 

  $isValid = False; 



  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 

  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 

  if (!empty($UserName)) { 

    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 

    // Parse the strings into arrays. 

    $arrUsers = Explode(",", $strUsers); 

    $arrGroups = Explode(",", $strGroups); 

    if (in_array($UserName, $arrUsers)) { 

      $isValid = true; 

    } 

    // Or, you may restrict access to only certain users based on their username. 

    if (in_array($UserGroup, $arrGroups)) { 

      $isValid = true; 

    } 

    if (($strUsers == "") && true) { 

      $isValid = true; 

    } 

  } 

  return $isValid; 

}



$MM_restrictGoTo = "index.php";

if (!((isset($_SESSION['username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['username'], $_SESSION['MM_UserGroup'])))) {   

  $MM_qsChar = "?";

  $MM_referrer = $_SERVER['PHP_SELF'];

  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";

  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 

  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];

  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);

  header("Location: ". $MM_restrictGoTo); 

  exit;

}

?>

<?php

if (!function_exists("GetSQLValueString")) {

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 

{

  if (PHP_VERSION < 6) {

    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  }



  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);



  switch ($theType) {

    case "text":

      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

      break;    

    case "long":

    case "int":

      $theValue = ($theValue != "") ? intval($theValue) : "NULL";

      break;

    case "double":

      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";

      break;

    case "date":

      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

      break;

    case "defined":

      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;

      break;

  }

  return $theValue;

}

}


session_start();
$colname_prinacc = "-1";

if (isset($_SESSION['act_number'])) {

  $colname_prinacc = $_SESSION['act_number'];

}

mysql_select_db($database_bnkconn, $bnkconn);

$query_prinacc = sprintf("SELECT * FROM `transaction` WHERE act_number = %s ORDER BY id DESC", GetSQLValueString($colname_prinacc, "text"));

$prinacc = mysql_query($query_prinacc, $bnkconn) or die(mysql_error());

$row_prinacc = mysql_fetch_assoc($prinacc);

$totalRows_prinacc = mysql_num_rows($prinacc);

 





include('header.php'); 
$act_number = $_SESSION['act_number']; 
$status_check=mysql_fetch_object(mysql_query("SELECT `account_transfer`,`transfer_page_message`,`currency` FROM `act_holder_details` WHERE `cust_act_number`='".$act_number."'")); 

$currency=$status_check->currency;
if( $currency=="USD")
{
$currency ="$";
}
elseif($currency ="GBP")
{
$currency="€";
}

if(isset($_REQUEST['transfer'])) {
                                                  if($status_check->account_transfer==0){
                                                      header('Location: transfer_suspended.php');
                                                       
                                                  }

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

$number=$_REQUEST['number'];



/* transaction record in senders account */

/* present fund amount */



$sender_act_number = $_SESSION['act_number']; 

//echo "select max(id) as id from transaction where act_number = '".$sender_act_number."'";exit;

$sender_latest_data = mysql_fetch_array(mysql_query("select max(id) as id from transaction where act_number = '".$sender_act_number."'"));

$present_balance = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$sender_act_number."' and id = '".$sender_latest_data[0]."'"));

$sender_name=mysql_fetch_object(mysql_query("SELECT `cust_name` FROM `act_holder_details` WHERE `cust_act_number`='".$sender_act_number."'"));

$cust_name=$sender_name->cust_name;

$now_balance_sender = $present_balance['present_balance']-$amount;
$_SESSION["balance_sender"] = $now_balance_sender;
$_SESSION["balance_sender_account"] = $sender_act_number;

 if( $present_balance['present_balance'] > $amount){
     
$transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$present_balance['present_balance']."','".$branch_name."','".$branch_add."','".$cust_name."','Debited','0')");

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

	$sql_insert_balance=mysql_query("INSERT INTO `cust_act_details` (`cust_name` ,`cust_act_no` ,`cust_balance` ,`cust_currency`) VALUES ('".$cust_name."','".$sender_act_number."','".$now_balance_sender."','".$currency."');");

	

}



$sql_balance_manage="SELECT `cust_act_no` FROM `cust_act_details` WHERE `cust_act_no` ='".$act_number."'";

$sender_name=mysql_fetch_object(mysql_query("SELECT `cust_name` FROM `act_holder_details` WHERE `cust_act_number`='".$act_number."'"));

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

	$sql_insert_balance=mysql_query("INSERT INTO `cust_act_details` (`cust_name` ,`cust_act_no` ,`cust_balance` ,`cust_currency`) VALUES ('".$cust_name."','".$act_number."','".$now_balance_recv."','".$currency."');");

	

}



/* transaction record in receivers account */

$receiver_latest_data = mysql_fetch_array(mysql_query("select max(id) as id from transaction where act_number = '".$act_number."'"));

$present_balance = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$act_number."' and id = '".$receiver_latest_data[0]."'"));

$now_balance_sender2 = $present_balance['present_balance'] + $amount;

session_start();

$_SESSION["balance_receiver"] =$now_balance_sender2;
$_SESSION["balance_receiver_account"] = $act_number; 

$transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,credited,present_balance,branch_name,branch_add,cust_name,description,status) values('".$act_number."','".$ifsc_code."','".$transaction_id."','".$date."','".$amount."','".$present_balance['present_balance']."','".$branch_name."','".$branch_add."','".$cust_name."','Credited','0')");









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

	$_SESSION["okk"] =1;
	?>

	

	<script language="javascript" type="application/javascript">

window.location.href= 'confirmsuccess.php'

</script>

<?	//header('Location: success_page.php'); 

	//exit;	

	}else{ echo "Mail Not Sent";	exit;	

}
}
else
{
    $isufficent =1;
}
	





}

?>

<style type="text/css">

.red {	color: #F00;

}
.transfer_table td {color:white;}
</style>



<?php
       if( $isufficent==1)
       {
       ?>

<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
   <h3 style='color:red'>
       <?php
           echo " Insuffecient  Fund in your account";
      ?>
       </h3>
       </div>
       <?php
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

            

            			<?php include "menu.php";?>

			

			<div class="row-fluid sortable">

			  <div class="box span12">

			    <div class="box-header well" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white" data-original-title="data-original-title">

			      <h2 style="color:white;font-size:40px;font-wight:bold"><i class="icon-edit"></i>Instant BOWFunds Transfer Request</h2>

			      <div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

			        <!--<a href="viewpages.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">View Pages</a>-->

			        <!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

			        <!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

		          </div>

		        </div>

			    <div class="box-content" >

			      <div class="form-actions">

			        <div id="SERVERSIDEERROR" class="errContainerError"> <img src="/BOW/Themes/BOW/TopTabMenu//Images/warn.gif" alt="" border="0" />

			          <p>Please ensure that your account is funded up to the required amount including charges to avoid your transaction being rejected.   To initiate a new request, kindly fill the form below. </p>

			          <p><span class="red"><strong>Please Note: You require a hardware token to complete third party transfers</strong></span><strong>.</strong></p>

		            </div>

			        <br />

			      </div>

		        </div>

		      </div>

			  <!--/span-->

</div>

			<div class="row-fluid sortable" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white">

				<div class="box span12">

					<div class="box-header well" style="background: rgba(0, 0, 0, 0);;padding:15px;color:white" data-original-title>

						<h2 style="color:white;font-size:40px;font-wight:bold"><i class="icon-edit"></i> Transfer Details</h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<!--<a href="viewpages.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">View Pages</a>-->

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

                    						<form class="form-horizontal" action="fund_transferin.php" method="post">

						  <fieldset class="item">



						<table width="100%" border="0" class="transfer_table">

						  <tr>

						    <td colspan="2"  class="form-actions" style="background: rgba(0, 0, 0, 0);color:white"><h4 style="color:white;font-size:40px;font-wight:bold">Sender Details:</h4></td>

						    <td width="2%">&nbsp;</td>

					      </tr>

						  <tr>

						    <td width="56%"><span>Account to Debit for principal </span></td>

						    <td width="42%"><span class="controls">

						      <select name="prinacc" id="prinacc">

						        <?php

do {  

?>

						        <option value="<?php echo number_format($row_prinacc['present_balance'],2,'.',','); ?>"><?php echo $row_prinacc['act_number']?> --- <?php echo $currency;  ?><?php echo number_format($row_prinacc['present_balance'],2,'.',','); ?></option>

						        <?php

} while ($row_prinacc = mysql_fetch_assoc($prinacc));

  $rows = mysql_num_rows($prinacc);

  if($rows > 0) {

      mysql_data_seek($prinacc, 0);

	  $row_prinacc = mysql_fetch_assoc($prinacc);

  }

?>

					        </select>

						    </span></td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td><span>Amount</span></td>

						    <td><span class="controls">

						      <input name="amount" type="text" required class="input-xlarge focused" id="amount" value="" size="20" />

						    </span></td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td><span>Currency</span></td>

						    <td><span class="controls">

						      <input name="currency" type="text" disabled="disabled" id="currency" value="<?php echo $status_check->currency  ?>" size="4" readonly />

						    </span></td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td><span>Account to Debit for

Commission,TAX: </span></td>

						    <td><span class="controls">

						      <select name="prinacc2" id="prinacc2">

						        <?php

do {  

?>

						        <option value="<?php echo number_format($row_prinacc['present_balance'],2,'.',','); ?>"><?php echo $row_prinacc['act_number']?> --- <?php echo $currency;  ?><?php echo number_format($row_prinacc['present_balance'],2,'.',','); ?></option>

						        <?php

} while ($row_prinacc = mysql_fetch_assoc($prinacc));

  $rows = mysql_num_rows($prinacc);

  if($rows > 0) {

      mysql_data_seek($prinacc, 0);

	  $row_prinacc = mysql_fetch_assoc($prinacc);

  }

?>

					        </select>

						    </span></td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td colspan="2" class="form-actions" style="background: rgba(0, 0, 0, 0);color:white"><h4 style="color:white;font-size:40px;font-wight:bold">Beneficiary Details:</h4></td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td>&nbsp;</td>

						    <td>&nbsp;</td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td><label for="date5">Beneficiary Name</label>						      </td>

						    <td><span class="controls">

						      <input class="input-xlarge focused" id="cust_name" name="cust_name" type="text" value="" required />

						      </span></td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td>Beneficiary Account No/IBAN</td>

						    <td><span class="controls">

						      <input class="input-xlarge focused" id="act_number3" name="act_number" type="text" value="" required />

						      <input class="input-xlarge focused" id="act_number2" name="bank_name" type="hidden" value="Trexlore Bank" required />

					        <input name="branch_add" type="hidden" required style="width:270px" value="Sanger, US" />

						    <input class="input-xlarge focused" id="ifsc_code" name="ifsc_code" type="hidden" value="BOW676FC" required />

						    <input class="input-xlarge focused" id="act_number" name="branch_name" type="hidden" value="Trexlore Bank,Sanger" required />

						    </span></td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td>&nbsp;</td>

						    <td><input name="number" type="hidden" id="number" value="<?php echo(mt_rand(10000,100000));?>" /></td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td>&nbsp;</td>

						    <td>&nbsp;</td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td>&nbsp;</td>

						    <td>&nbsp;</td>

						    <td>&nbsp;</td>

					      </tr>

						  <tr>

						    <td colspan="2"><div class="form-actions" style="background: rgba(0, 0, 0, 0);color:white">
<p id="post_1">
						      <button type="submit" class="btn btn-primary" name="transfer" onclick="Confirm.render('Are you sure you want to continue?','delete_post','post_1')">Begin Transfer Request</button>
						      
  
</p>

						      <button type="reset" class="btn">Cancel</button>

					        </div></td>

						    <td>&nbsp;</td>

					      </tr>

				      </table>

												  </fieldset>

						</form>   



							<div class="control-group">

							  <div class="controls">

  <label for="prinacc"></label>

							  </div>

						    </div>

							<div class="control-group">

							  <div class="controls"></div>

						    </div>

							<div class="control-group">:

<div class="controls">

		      <label for="currency"></label>

</div>

						    </div>

	



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

<?php

mysql_free_result($prinacc);

?>

