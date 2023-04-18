<?php 

require_once('../Connections/bnkconn.php'); 
require_once('Services/Twilio.php');
session_start();
$sql2="SELECT * FROM act_holder_details WHERE cust_act_number='".$_SESSION['act_number']."'";
    	 mysql_select_db('rockusen_db');
        $detailsget = mysql_query($sql2);
         while($dt = mysql_fetch_array($detailsget)) {
         	$bnkid=$dt["bankidreq"];
         	$authid=$dt["authcodereq"];
         	$s_code=$dt["clearancereq"];
         	$email=$dt["cust_mail"];
         	$cust_name=$dt["cust_name"];
         	$cemail=$dt["cemail"];

         }
       //  echo $cemail;
$dbhost = 'localhost';
         $dbuser = 'profxrgg';
         $dbpass = 'rockusen_db';
         $connn = mysql_connect($dbhost, $dbuser, $dbpass);
         if(! $connn ) {
            die('Could not connect: ' . mysql_error());
         }
      ///   echo 'Connected successfully';
        // mysql_close($conn);
      
	if (isset($_GET['amount'])) {
      //  echo  $_SESSION['idforproc'];
        $_SESSION['amount']=$_GET['amount'];
       
        $_SESSION['account']=$_GET['acc'];
        $_SESSION['b_name']= $_GET['ban_name'];
        $query1="INSERT INTO tranferdetails (id,b_account,bank_name,amount) values('".$_SESSION['idforproc']."','". $_SESSION['account']."','".$_SESSION['b_name']."','".$_SESSION['amount']."')";
           mysql_select_db('rockusen_db');
        $retval = mysql_query($query1);

         $sql3 = "SELECT * FROM transaction WHERE id ='". $_SESSION['idforproc']. "'";
    	 mysql_select_db('rockusen_db');
        $detailsgett = mysql_query($sql3);
         while($dtt = mysql_fetch_array($detailsgett)) {
         	$account=$dtt["act_number"];
         	 $tokenid=$dtt['number'];
         	// echo $account;

         	
         }
        
        
    }
     if(isset($_GET['id']))
    {
    	 $sql="SELECT * FROM tranferdetails WHERE id='".$_GET['id']."'";
    	 mysql_select_db('rockusen_db');
        $getdata = mysql_query($sql);
         while($row = mysql_fetch_array($getdata)) {
         	$amount= $row['amount'];
         	$bann_name=$row['bank_name'];
         	$bank_address= $row['b_account'];
         	break;
         }
                 $sql3 = "SELECT * FROM transaction WHERE id ='". $_GET['id']. "'";
    	 mysql_select_db('rockusen_db');
        $detailsgett = mysql_query($sql3);
         while($dtt = mysql_fetch_array($detailsgett)) {
         	$account=$dtt["act_number"];
         	 $tokenid=$dtt['number'];

         	
         }
        
    }
  //  echo $amount;
    $admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;
  $to = $email; 
  

 $message="<style type='text/css'>
h4{font-family:Calibri, Tahoma, Geneva, sans-serif;}
table{font-family:Calibri, Tahoma, Geneva, sans-serif;font-size:13px;color:#666666;text-align:justify;}
td{text-align:justify;}
a{font-family:Calibri, Tahoma, Geneva, sans-serif;color:#FF6600;text-decoration:none;}
</style>
    <table border='0' cellpadding='0' cellspacing='0' width='689'>
      <tbody>
        <tr>
          <td colspan='9' height='97'><div align='right'><img src='http://trexlorebk.com/logo.png'></div></td>
      </tr>

        <tr>

          <td width='140'>&nbsp;</td>

          <td width='549' colspan='7'><div align='right'>".date('d-M-Y')."</div></td>

        </tr>

        <tr>

          <td colspan='9'><b> Dear Valued Customer </b></td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td colspan='9'>your account  information is</td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td width='130'> Account Name </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $cust_name </td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td width='130'> Account Number </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $account </td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>
 <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td width='130'> Your OTP for this session </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $tokenid</td>

        </tr>
        <tr>

          <td colspan='9'> Thank you for choosing Trexlore Bank</td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

      </tbody>

    </table>"; 	 
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
 $headers .= 'From: '.$admin_email."\r\n";// From
 $subject  =  'Trexlore Bank alert' ; //Subject
if($cemail==1)
 {
if(mail($to,$subject,$message,$headers)){
	//echo "sent";


}
}
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 8) {
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

$colname_sessidnow = "-1";
if (isset($_SESSION['act_number'])) {
  $colname_sessidnow = $_SESSION['act_number'];
}
mysql_select_db($database_bnkconn, $bnkconn);
$query_sessidnow = sprintf("SELECT * FROM `transaction` WHERE act_number = %s", GetSQLValueString($colname_sessidnow, "text"));
$sessidnow = mysql_query($query_sessidnow, $bnkconn) or die(mysql_error());
$row_sessidnow = mysql_fetch_assoc($sessidnow);
$totalRows_sessidnow = mysql_num_rows($sessidnow);

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['act_number'])) {
  $loginUsername=$_POST['act_number'];
  $password=$_POST['number'];
  $id = $_POST['id'];
  $_SESSION['accountn']=$_POST['act_number'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "tranc_page.php?id=";
  $MM_redirectLoginFailed = "tranc_failed.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_bnkconn, $bnkconn);
  
  $LoginRS__query=sprintf("SELECT act_number, `number`, `id`, `bankid`, `authcode`, `security` FROM `transaction` WHERE act_number=%s AND `number`=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "-1")); 
	   
  $LoginRS = mysql_query($LoginRS__query, $bnkconn) or die(mysql_error());
	$transaction = mysql_fetch_assoc($LoginRS);
$sql2="SELECT * FROM act_holder_details WHERE cust_act_number='".$_SESSION['act_number']."'";
    	 mysql_select_db('rockusen_db');
        $detailsget = mysql_query($sql2);
         while($dt = mysql_fetch_array($detailsget)) {
         	$bnkid=$dt["bankidreq"];
         	$authid=$dt["authcodereq"];
         	$s_code=$dt["clearancereq"];

         }
         
 
	if($transaction['bankid'])
	{
		if($bnkid==1)
         {
$MM_redirectLoginSuccess = "success_page1s.php?id=".$transaction['id'];
         } 
         else if($authid==1 && $bnkid==0)
         {
$MM_redirectLoginSuccess = "success_page2s.php?id=".$transaction['id'];
         }
         else if($s_code==1 && $authid==0 && $bnkid==0)
         {
$MM_redirectLoginSuccess = "sucess_page3s.php?id=".$transaction['id'];
         }
          
	  

	}

	else 
		{
			if($bnkid==1)
         {
$MM_redirectLoginSuccess = "success_page1s.php?id=".$transaction['id'];
         } 
         else if($authid==1 && $bnkid==0)
         {
$MM_redirectLoginSuccess = "success_page2s.php?id=".$transaction['id'];
         }
         else if($s_code==1 && $authid==0 && $bnkid==0)
         {
$MM_redirectLoginSuccess = "sucess_page3s.php?id=".$transaction['id'];
         }
		
}
	 
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['token'] = $loginUsername;
		$_SESSION['id'] = $id;
    $_SESSION['tokenGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
     $page=1;
     $idd=$transaction['id'];
       $update_bank_data = mysql_query("UPDATE transaction SET stage = '".$page."'
         WHERE id = '".$idd."'",$bnkconn);
       if($update_bank_data)
       {
       
       }
      
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
include('header.php'); 
?>
	<div>
		<ul class="breadcrumb">
			<li>
				<a href="dashboard.php">Home</a> <span class="divider">/</span>
			</li>
			<li>
				<a href="fund_transfer.php">Fund Transfer</a>
			</li>
		</ul>
	</div>
	<div class="breadcrumb">
		
		<p><strong> NOTE: A OTP is required to complete this transfer request, and if this transfer trasaction is not completed with 42hours the transaction will be cancelled and the escrowed funds released back to the debited <a href="success_page.php?err=1&acc=<?php echo $_GET['acc']; ?>&amount=<?php echo $_GET['amount']; ?>&ban_name=<?php echo $_GET['ban_name']; ?>&brnch_nm=<?php echo $_GET['brnch_nm']; ?>&br_add=<?php echo $_GET['br_add']; ?>&b_code=<?php echo $_GET['b_code']; ?>">account</a>.</strong>
		</p>
	</div>
	<!--/row-->

	<div class="box-content">
		<form action="<?php echo $loginFormAction; ?>" method="POST" class="form-horizontal" id="login_form">
			<fieldset>
				<table width="100%" border="0">
					<tr>
						<td colspan="4" class="form-actions">Provide enter transaction token ID</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><strong>Senders Account</strong></td>
						<td><strong><?php echo $_SESSION['act_number']; ?></strong></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td width="21%">&nbsp;</td>
						<td width="17%">Beneficiary Account</td>
						<td width="55%">
							<?php
							  if(isset($bank_address))
						{
							echo $bank_address;
						}



							 echo $_REQUEST['acc'] ?>
						</td>
						<td width="7%">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>Bank Name</td>
						<td>
							<?php 
                             if(isset($bann_name))
						{
							echo $bann_name;
						}

							echo $_REQUEST['ban_name'] ?>
						</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>Amount</td>
						<td><span><?php 
						if(isset($amount))
						{
							echo $amount;
						}

							echo $_REQUEST['amount'] ?>
						          <input name="act_number" type="hidden" id="act_number" value="<?php echo $_SESSION['act_number']; ?>">
					            <input type="hidden" name="id" id="id">
						        </span></td>
						
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>Token ID</td>
						<td><input type="text" name="number" id="number" required></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="4">
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" name="transfer">Confirm Transfer Request</button>
								<button type="reset" class="btn">Cancel</button>
							</div>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
				<legend></legend>

				<div class="control-group">
					<div class="controls"></div>
				</div>
				<div class="control-group">
					<div class="controls"></div>
				</div>
			</fieldset>
		</form>

	</div>


	<?php include('footer.php'); ?>
	<?php  mysql_free_result($prinacc);

         
	 ?>