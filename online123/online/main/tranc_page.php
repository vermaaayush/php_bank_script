<?php
session_start();
include('header.php'); 
require_once('sms/sms_alerts.php');
include('conn.php');
?>
<html>
<head>
<meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1, maximum-scale=1, width=device-width" name="viewport">
    <link href="../stylesheets/application.css?1325743336" media="screen" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/ui-progress-bar.css?1325742643" media="screen" rel="stylesheet" type="text/css" />
    <script src="../javascripts/application.js?1325742642" type="text/javascript"></script>
        <link href="../stylesheets/application.css?1325743336" media="screen" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/ui-progress-bar.css?1325742643" media="screen" rel="stylesheet" type="text/css" />
    <style type="text/css">
    .index #container #stage .intro article {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
    .index table tr td {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size: 12px;
}
    .index #container #stage .intro #sub table tr td strong {
  font-weight: bold;
}
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 14;
  -moz-border-radius: 14;
  border-radius: 14px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 40px 10px 40px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

.btnt {
  background: #d93455;
  background-image: -webkit-linear-gradient(top, #d93455, #c20808);
  background-image: -moz-linear-gradient(top, #d93455, #c20808);
  background-image: -ms-linear-gradient(top, #d93455, #c20808);
  background-image: -o-linear-gradient(top, #d93455, #c20808);
  background-image: linear-gradient(to bottom, #d93455, #c20808);
  -webkit-border-radius: 14;
  -moz-border-radius: 14;
  border-radius: 14px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 40px 10px 40px;
  text-decoration: none;
}

.btnt:hover {
  background: #420e1d;
  background-image: -webkit-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: -moz-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: -ms-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: -o-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: linear-gradient(to bottom, #420e1d, #ff0d0d);
  text-decoration: none;
}
    </style>
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
  <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
</html>
<?php require_once('../Connections/bnkconn.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}

//session_start();
$sender_act_number = $_SESSION['act_number']; 
if (isset($_GET['id'])) {
       /// echo $_GET['id'];
   mysql_select_db($database_bnkconn, $bnkconn);

  $idtocheck=$_GET['id'];
  $_SESSION['accountn']=$idtocheck;
  $query_check = "SELECT * FROM `transaction` WHERE `id` ='".$idtocheck."'";
  $trans2 = mysql_query($query_check, $bnkconn) or die(mysql_error());
$row_trans2 = mysql_fetch_assoc($trans2);
$status=$row_trans2['status'];
if($status==2 || $status==1 || $status==0 || $status==3)
{
  $page=3;
  $update_stage = mysql_query("UPDATE transaction SET status = '".$page."'
         WHERE id = '".$idtocheck."'");
  $query_trans = "SELECT * FROM `transfer_details` WHERE `id` ='".$idtocheck."'";
$trans = mysql_query($query_trans, $bnkconn) or die(mysql_error());
$row_trans = mysql_fetch_assoc($trans);
    $act_number=$row_trans['account'];
    $ifsc_code=$row_trans['ifsc'];
    $branch_add=$row_trans['branch'];
    $transaction_id=$row_trans['t_id'];
    $cust_name2=$row_trans['cust_name'];
    $branch_name=$row_trans['branch_name'];
   // echo $cust_name2;
    //echo $SESSION['accountn'];
  $get_debit = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$sender_act_number."' and id = '". $idtocheck."' "));
   $debit_amount= $get_debit['debited'];
   $amount=$debit_amount;
   $balance=$get_debit['present_balance'];
   
   $r_balance=$balance-$debit_amount;
  // echo $r_balance;

   $update_bank_data = mysql_query("UPDATE transaction SET present_balance = '".$r_balance."'
         WHERE id = '".$idtocheck."'");

  /* Account Balance Manage */
$sql_balance_manage="SELECT `cust_act_no` FROM `cust_act_details` WHERE `cust_act_no` ='".$sender_act_number."'";
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
  $sql_insert_balance=mysql_query("INSERT INTO `cust_act_details` (`cust_name` ,`cust_act_no` ,`cust_balance` ,`cust_currency`) VALUES ('".$cust_name."','".$act_number."','".$now_balance_recv."','USD');");
  
}

/* transaction record in receivers account */
$receiver_latest_data = mysql_fetch_array(mysql_query("select max(id) as id from transaction where act_number = '".$act_number."'"));
$present_balance = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$act_number."' and id = '".$receiver_latest_data[0]."'"));
$now_balance_sender = $present_balance['present_balance'] + $amount;

$date = date('Y-m-d');
$transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,credited,present_balance,branch_name,branch_add,cust_name,description,status) values('".$act_number."','".$ifsc_code."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name2."','Credited','3')");
    }
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
	$acc_number = $_SESSION['acc_number']; 
    //var_dump($acc_number);
	$sql=mysql_query($con,"update transaction set status='1' WHERE act_number ='".$_SESSION['act_number']."'");

    mysqli_query( $con, $query );
    //var_dump( $query, $con->error );
    mysqli_close( $con );
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

$colname_sessidn = "-1";
if (isset($_SESSION['act_number'])) {
  $colname_sessidn = $_SESSION['act_number'];
}
mysql_select_db($database_bnkconn, $bnkconn);
$query_sessidn = sprintf("SELECT * FROM `transaction` WHERE act_number = %s ORDER BY id DESC", GetSQLValueString($colname_sessidn, "text"));
$sessidn = mysql_query($query_sessidn, $bnkconn) or die(mysql_error());
$row_sessidn = mysql_fetch_assoc($sessidn);
$totalRows_sessidn = mysql_num_rows($sessidn);

$colname_token = "-1";
if (isset($_GET['id'])) {
  $colname_token = $_GET['id'];
}
mysql_select_db($database_bnkconn, $bnkconn);
$query_token = sprintf("SELECT * FROM `transaction` WHERE id = %s", GetSQLValueString($colname_token, "int"));
$token = mysql_query($query_token, $bnkconn) or die(mysql_error());
$row_token = mysql_fetch_assoc($token);

$sql=mysql_fetch_object(mysql_query("select * from transaction where id='".$_REQUEST['id']."'"));
$msg= "Your Tranfser was successful,Thank you for banking with us.";
balance_alert(+$_SESSION['countrycode'],$_SESSION['phone'],$msg);
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
			<div class="breadcrumb">
            <p>
            <?php include "menu.php";?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<section class="work">  <h2><strong>Swift Transfer Completed.</strong></h2>

          <h3>Your transfer request has been successfully submitted, thanks for your patience</h3><br>
  <div class="ui-progress-bar ui-container" id="progress_bar">
            <div class="ui-progress" style="width: 100%;">
              <span class="ui-label" style=";">
              
                <b class="value">100%</b>
              </span>
            </div>
          </div>
        </section>
    
              <?php include('footer.php'); 


mysql_free_result($sessidn);
?>