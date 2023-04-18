<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="confirm.css">
<script src="confirm.js"></script>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
     function add_commas(number){
    //remove any existing commas...
    number=number.replace(/,/g, "");
    //start putting in new commas...
    number = '' + number;
    if (number.length > 3) {
        var mod = number.length % 3;
        var output = (mod > 0 ? (number.substring(0,mod)) : '');
        for (i=0 ; i < Math.floor(number.length / 3); i++) {
            if ((mod == 0) && (i == 0))
                output += number.substring(mod+ 3 * i, mod + 3 * i + 3);
            else
                output+= ',' + number.substring(mod + 3 * i, mod + 3 * i + 3);
        }
        return (output);
    }
    else return number;
}
      

    </script>

<style>
    input{font-size: 30px;}
</style>
    <script>
        $('input.number').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });
});
    </script>
       <style>
        .transfer_table td {color:white;}
        
        
    </style>
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
ob_start();
sleep(4);
session_start();
  mysql_select_db($database_bnkconn, $bnkconn);
  $sender = mysql_fetch_array(mysql_query("select * from act_holder_details where cust_act_number = '".$_SESSION['act_number']."'"));

$currency=$sender['currency'];




///echo $currency;

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
  $page=0;
  
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

// Getting the transfer enabled or disabled ,added on 19 dec 2018 
$act_number = $_SESSION['act_number']; 
$status_check=mysql_fetch_object(mysql_query("SELECT `account_transfer`,`transfer_page_message` FROM `act_holder_details` WHERE `cust_act_number`='".$act_number."'")); 
 $isufficent=0;
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
$_SESSION['rec']=$act_number;
$bank_name = $_REQUEST['bank_name'];
$branch_name = $_REQUEST['branch_name'];
$purpose = $_REQUEST['purpose'];
$ifsc_code = $_REQUEST['ifsc_code'];
$_SESSION['ifsc']=$ifsc_code;

$amount = $_REQUEST['amount'];
//$account_amount = $_REQUEST['amt'];
//var_dump($aacount_amount);

$amount = intval(preg_replace('/[^\d.]/', '', $amount));
//echo $amount;
//exit();
$branch_add = $_REQUEST['branch_add'];
$cust_name=$_REQUEST['cust_name'];
$_SESSION['cust_name']=$cust_name;
$number=$_REQUEST['number'];
$branch=$_REQUEST['branch_add'];
$swift=$_REQUEST['swift'];
$_SESSION['branch']=$branch_add;
$_SESSION['branch_name']=$branch_name;
$address=$_REQUEST['address'];
$prinacc22=$_REQUEST['prinacc22'];



$_SESSION['t_id']=$transaction_id;
$_SESSION['idd']=$id;
$authcode=rand(100000,999999999);
$bankid=rand(100000,999999999);
$s_code=rand(100000,999999999);
/* transaction record in senders account */
/* present fund amount */
mysql_select_db($database_bnkconn, $bnkconn);
$sender_act_number = $_SESSION['act_number']; 
//echo "select max(id) as id from transaction where act_number = '".$sender_act_number."'";exit;
$sender_latest_data = mysql_fetch_array(mysql_query("select max(id) as id from transaction where act_number = '".$sender_act_number."' "));
$present_balance = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$sender_act_number."' and id = '".$sender_latest_data[0]."' "));

$beneficiary = mysql_query("insert into business_user (name,address,country,account_no,bank_name,bank_address,swift,sort_code,added_by) values('".$cust_name."', '".$address."','".$prinacc22."','".$act_number."','".$branch_name."','".$branch."','".$swift."','".$ifsc_code."','".$_SESSION["username"]."')");
  if($present_balance['present_balance'] >= $amount ){
$now_balance_sender = $present_balance['present_balance'];

$sender_name=mysql_fetch_object(mysql_query("SELECT `cust_name`, `bankidreq`, `authcodereq`, `clearancereq` FROM `act_holder_details` WHERE `cust_act_number`='".$sender_act_number."'"));
$cust_name=$sender_name->cust_name;
$currency=$sender_name->currency;
//echo $currency;


if($sender_name->bankidreq=="1" && $sender_name->authcodereq="1" && $sender_name->clearancereq=="1") $transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status,number,bankid,authcode,security,stage) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','".$purpose."','0','".$number."','".rand(100000,999999)."','".rand(100000,999999)."','".rand(100000,999999)."',0)");

else if($sender_name->bankidreq=="1" && $sender_name->authcodereq=="1")  $transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status,number,bankid,authcode,stage) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','".$purpose."','0','".$number."','".rand(100000,999999)."','".rand(100000,999999)."',0)");

else if($sender_name->bankidreq=="1" && $sender_name->clearancereq=="1")  $transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status,number,bankid,security,stage) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','".$purpose."','0','".$number."','".rand(100000,999999)."','".rand(100000,999999)."',0)");
else if($sender_name->authcodereq=="1" && $sender_name->clearancereq=="1")  $transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status,number,authcode,security,stage) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','".$purpose."','0','".$number."','".rand(100000,999999)."','".rand(100000,999999)."',0)");
else if($sender_name->authcodereq=="0" && $sender_name->clearancereq=="0" && $sender_name->bankidreq=="0")  $transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status,number,stage) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','".$purpose."','0','".$number."',0)");
else if($sender_name->bankidreq=="1")  $transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status,number,bankid,stage) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','".$purpose."','0','".$number."','".rand(100000,999999)."',0)");
else if($sender_name->authcodereq=="1")  $transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status,number,authcode,stage) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','".$purpose."','0','".$number."','".rand(100000,999999)."',0)");
else if($sender_name->clearancereq=="1")  $transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status,number,security,stage) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','".$purpose."','0','".$number."','".rand(100000,999999)."',0)");

else $transaction_record_sender = mysql_query("insert into transaction (act_number,ifsc_code,transaction_id,transaction_date,debited,present_balance,branch_name,branch_add,cust_name,description,status,number,bankid,authcode,security,stage) values('".$sender_act_number."','".$get_details['ifcs_code']."','".$transaction_id."','".$date."','".$amount."','".$now_balance_sender."','".$branch_name."','".$branch_add."','".$cust_name."','".$purpose."','0','".$number."','".$bankid."','".$authcode."','".$s_code."',0)"); 







$sender_email = mysql_fetch_array(mysql_query("select * from act_holder_details where cust_act_number = '".$sender_act_number."'"));

$email=$sender_email['cust_mail'];
//echo $sender_email ;
$admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;
  $to = $email; 
  $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
 $headers .= 'From: '.$admin_email."\r\n";// From;
 $subject  =  'Trexlore Bank alert' ; //Subject
 $message  = 'Your Transfer Request is Initiated'; //Enter the Html Tag
//mail($to,$subject,$message);

if(mail($to,$subject,$message,$headers)){
	//echo 'Mail Sent';

  
	$page=0;
	$sender_latest_data2 = mysql_fetch_array(mysql_query("select max(id) as id from transaction where act_number = '".$sender_act_number."'"));
	$_SESSION['idforproc']=$sender_latest_data2[0];
	$sender_id=mysql_fetch_object(mysql_query("SELECT * FROM transaction WHERE id ='". $sender_latest_data2[0]. "'"));
	 $sql_insert_account=mysql_query("INSERT INTO `transfer_details` (`id` ,`account`,`ifsc`,`branch`,`t_id`,`branch_name`,`cust_name`) VALUES ('".$sender_latest_data2[0]."','".$_SESSION['rec']."','".$_SESSION['ifsc']."','".$_SESSION['branch']."','".$_SESSION['t_id']."','".$_SESSION['branch_name']."','".$_SESSION['cust_name']."')");
//	echo $sender_latest_data2[0];
	//echo "hh";
	$getbankid=$sender_id->bankid;
	$getauth=$sender_id->authcode;
	$getcode=$sender_id->security;
	if($getbankid==1 && $getauth==1 && $getcode==1)
	{
$message="Your Transfer Request is Initiated . Here is your Bank-id for transfer   ".$getbankid. "Auth-code for transfer is   ".$getauth ."Security_clearance code for transfer is  ".$getcode;
}  
else
{
	$message ="Your Transfer Request is Initiated!";
	if($getbankid==1) 
	{
		$message=$message. " Your bankid is  ".$getbankid;
	}
	{
	if($getauth==1)
		$message=$message."Your Auth code is  ".$getauth;
    }
	if($getcode==1)
	{
		$message=$message."Your Security clearancer code is  ". $getcode;
	}

}

//	mail($to,$subject,$message,$headers);        ///send codes
	$page=0;
	session_start();
	 $update_bank_data = mysql_query("UPDATE transaction SET stage = '".$page."'
         WHERE id = '".$sender_latest_data2[0]."'");
	 
	echo "<script type=\"text/javascript\">
location.href = \"success_page.php?amount=$amount&acc=$act_number&ban_name=$bank_name&brnch_nm=$branch_name&br_add=$branch_add&b_code=$ifsc_code\";
</script>";

}

	else{ echo "Mail Not Sent";	exit;	
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
</style>

<?php
       if( $isufficent==1)
       {?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
   <h3 style='color:red'>
       <?php
           echo " Insufficient Fund in your account";
       
       
       ?>
       </h3>
       </div>
       <?php
       }?>
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
			      <h2>Instant Funds Transfer Request</h2>
			      <div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
			        <!--<a href="viewpages.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">View Pages</a>-->
			        <!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
			        <!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
		          </div>
		        </div>
			    <div class="box-content">
			      <div class="form-actions">
			        <div id="SERVERSIDEERROR" class="errContainerError"> 
			          <p>Please Note: Request received before 2pm (PST) will be treated same day, while those received after 2pm (GMT +2) will be treated next   business day. Processing of any request is subject to compliance with local regulations.</p>
			          <p><strong>Details of Charges per (transaction)</strong> -   Commission: 0.5% of Transaction (<strong>subject to a minimum of 10 units of the currency</strong>),  VAT: 5% of Commssion, Telex: $20  (or its equivalent in the currency being transferred).  Off Shore Charges: USD: $25, GBP: £12, Euro: <strong>€</strong>15.</p>
		                 *  Pound Sterling requires Sort Code <br />
		                 *  EURO requires IBAN_NO &amp; BIC
			          <p>Please ensure that your account is funded up to the required amount including charges to avoid your transaction being rejected.   To initiate a new request, kindly fill the form below. </p>
			          <p><span class="red"><strong>Please Note: You require a  token to complete third party transfers</strong></span><strong>.</strong></p>
		            </div>
			        <br />
			      </div>
		        </div>
		      </div>
			  <!--/span-->
</div>

<!--<div class="red">This account has been blocked for further sending funds</div>-->
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" style="background: rgba(0, 0, 0, 0.5);padding:15px;color:white" data-original-title>
						<h2>Transfer Details</h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
						<!--<a href="viewpages.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">View Pages</a>-->
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content" style="background: rgba(0, 0, 0, 0.5);color:white;padding:10px">
                    						<form class="form-horizontal" action="fund_transferx.php" method="post">
						  <fieldset class="item">

						<table width="100%" style="color:white" border="0" class="transfer_table">
						  <tr>
						    <td colspan="2"  class="form-actions" style="background: rgba(0, 0, 0, 0);color:white"><h4 style="color:white;font-size:20px;font-wight:bold">Sender Details:</h4></td>
						    <td width="2%">&nbsp;</td>
					      </tr>
						  <tr>
						    <td width="10%"><span>Account to debit for principal </span></td>
						    <td width="30%"><span class="controls">
						      <select name="prinacc" id="prinacc">
						        <?php
do {  
?>
						        <option value="<?php echo number_format($row_prinacc['present_balance'],2,'.',','); ?>"><?php echo $row_prinacc['act_number']?> --- <?php echo number_format($row_prinacc['present_balance'],2,'.',','); ?></option>
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
						      <input name="amount" type="text" required class="input-xlarge focused" onkeyup="this.value=add_commas(this.value);" id="am" value="" size="20" />
						    </span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><span>Currency</span></td>
						    <td><span class="controls">
						      <input name="currency" type="text" disabled="disabled" id="currency" value="<?php echo $currency; ?>" size="4" readonly />
						    </span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><span>Account to debit for
commission, VAT and telex charges: </span></td>
						    <td><span class="controls">
						      <select name="amt" id="">
						        <?php
do {  
?>
						        <option value="<?php echo number_format($row_prinacc['present_balance'],2,'.',','); ?>"><?php echo $row_prinacc['act_number']?> --- <?php echo number_format($row_prinacc['present_balance'],2,'.',','); ?></option>
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
						    <td colspan="2" class="form-actions" style="background: rgba(0, 0, 0, 0);color:white"><h4 style="color:white;font-size:20px;font-wight:bold">Beneficiary Details:</h4></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
					      </tr>
					      
						    <td><label for="date5">Beneficiary Name</label>						      </td>
						    <td><span class="controls">
						      <input class="input-xlarge focused" id="cust_name" name="cust_name" type="text" value="" required />
						      </span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><label for="date5">Beneficiary Address</label></td>
						    <td><span class="controls">
						      <input class="input-xlarge focused" id="address" name="address" type="text" value="" required />
						      </span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td>Beneficiary Country</td>
						    <td><label for="ben_country"></label>
						      <label for="ben_country"></label>
						      <span class="controls">
						      <select name="prinacc22" id="prinacc2">
						        <option value="" selected="selected">Country...</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote D'Ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
					        </select>
						    </span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td>Beneficiary Account No/IBAN</td>
						    <td><span class="controls">
						      <input class="input-xlarge focused" id="act_number" name="act_number" type="text" value="" required />
						      </span></td>
						    <td>&nbsp;</td>
						    
					      </tr>
						  <tr>
						    <td><span>
						      <label for="typeahead2"> Beneficiary Bank Name </label>
						      </span></td>
						    <td><span class="controls">
						      <input class="input-xlarge focused" id="branch_name" name="branch_name" type="text" value="" required />
						      </span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><span>
                            <label for="typeahead4"> Beneficiary Bank Address </label>
                            </span></td>
						    <td><span class="controls">
						      <textarea name="branch_add" required ></textarea>
						    </span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><span>
						      <label for="typeahead3"> Beneficiary Swift Code</label>
						      </span></td>
						    <td><span class="controls">
						      <input class="input-xlarge focused" id="bank_name" name="swift" type="text" value="" required />
						      </span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td>Beneficiary Bank Routing No/Sort Code</td>
						    <td><span class="controls">
						      <input class="input-xlarge focused" id="ifsc_code" name="ifsc_code" type="text" value="" required />
						    </span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td colspan="2" class="form-actions" style="background: rgba(0, 0, 0, 0);color:white;color:white;font-size:20px;font-wight:bold">Fill below if there is an Intermediary Bank?</td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><label for="typeahead5">Intermediary Bank Name:</label></td>
						    <td><span class="controls">
					        <input type="text" name="inter_bank" id="inter_bank" /></span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><label for="typeahead6">Intermediary Bank Address:</label></td>
						    <td><span class="controls">
					        <input type="text" name="inter_address" id="inter_address" /></span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><label for="typeahead6">Intermediary Bank BIC/SWIFT Code:</label></td>
						    <td><span class="controls">
					        <input type="text" name="inter_swift" id="inter_swift" /></span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><label for="typeahead6">Intermediary Bank Routing No/Sort Code:</label></td>
						    <td><label for="inter_route"></label><span class="controls">
					        <input type="text" name="inter_route" id="inter_route" /></span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><label for="typeahead6">Beneficiary Bank Account With Intermediary Bank:</label></td>
						    <td><span class="controls">
					        <input type="text" name="inter_bank2" id="inter_bank" /></span></td>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td><label for="typeahead6">Purpose of Payment:</label></td>
						    <td><label for="purpose"></label><span class="controls">
					        <textarea class="input-xlarge focused" name="purpose" id="purpose"></textarea>						      <input name="number" type="hidden" id="number" value="<?php echo(mt_rand(10000,100000));?>" /></span></td>
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
						    <td colspan="2"><div class="form-actions" style="background: rgba(0, 0, 0, 0);;padding:15px;color:white" > 
 
						      <button type="submit" class="btn btn-primary" name="transfer" onclick="Confirm.render('Are you sure you want to continue?','delete_post','post_1')">Begin Transfer Request</button>
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
