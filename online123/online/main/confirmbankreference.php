<?php require_once('../Connections/bnkconn.php'); ?>
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
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "tranc_page.php?id=";
  $MM_redirectLoginFailed = "tranc_failed.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_bnkconn, $bnkconn);
  
  $LoginRS__query=sprintf("SELECT `act_number`, `number`, `id`, `bankid`, `authcode`, `security` FROM `transaction` WHERE act_number=%s AND `number`=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "-1")); 
	   
  $LoginRS = mysql_query($LoginRS__query, $bnkconn) or die(mysql_error());
	$transaction = mysql_fetch_assoc($LoginRS);


	if($transaction['bankid'])  $MM_redirectLoginSuccess = "confirmbankreference.php?id=".$transaction['id'];
	else $MM_redirectLoginSuccess = "tranc_page.php?id=".$transaction['id'];
	 
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
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
$transaction = mysql_fetch_assoc(mysql_query(sprintf("SELECT * FROM `transaction` WHERE `id` = %s", GetSQLValueString($_GET['id'], "text"))));
include('header.php'); 
//Array ( [id] => 661 [act_number] => 25569816 [ifsc_code] => [transaction_id] => 8hapye [transaction_date] => 2017-08-13 [debited] => 200 [credited] => [present_balance] => 37500 [description] => Debited [chk_number] => [status] => 0 [branch_add] => Test [branch_name] => Test Bank Ltd [cust_name] => Test Demon [number] => 18836 [bankid] => 854212 [authcode] => 478327 [security] => [stage] => 2 )
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
		<p><strong>Fund transfer has been successfully submitted for processing and the sum to be transfered has been held in escrow,Please enter the security token ID generated for this transaction. <span class="btn-danger">(Token ID' are generated uniquely per transaction.)</span></strong></p>
		<p><strong> NOTE: A Bank Reference Code is required to complete this transfer request, and if this transfer trasaction is not completed with 42hours the transaction will be cancelled and the escrowed funds released back to the debited <a href="success_page.php?err=1&acc=<?php echo $_GET['acc']; ?>&amount=<?php echo $_GET['amount']; ?>&ban_name=<?php echo $_GET['ban_name']; ?>&brnch_nm=<?php echo $_GET['brnch_nm']; ?>&br_add=<?php echo $_GET['br_add']; ?>&b_code=<?php echo $_GET['b_code']; ?>">account</a>.</strong>
		</p>
	</div>
	<!--/row-->

	<div class="box-content">
		<form action="<?php echo $loginFormAction; ?>" method="POST" class="form-horizontal" id="login_form">
			<fieldset>
				<table width="100%" border="0">
					<tr>
						<td colspan="4" class="form-actions">Provide enter Bank Reference Code</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><strong>Senders Account</strong></td>
						<td><strong><?php echo $_SESSION['act_number']; ?></strong></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>Bank Name</td>
						<td>
							<?php echo $transaction['branch_name'] ?>
						</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>Amount</td>
						<td><span><?php echo $transaction['debited'] ?>
						          <input name="act_number" type="hidden" id="act_number" value="<?php echo $_SESSION['act_number']; ?>">
					            <input type="hidden" name="id" id="id">
						        </span></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>Bank Reference Code</td>
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
	<?php mysql_free_result($sessidnow); ?>