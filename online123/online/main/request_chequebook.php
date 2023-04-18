<?php require_once('../Connections/bnkconn.php'); ?>
<?php
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

$colname_cheque = "-1";
if (isset($_SESSION['act_number'])) {
  $colname_cheque = $_SESSION['act_number'];
}
mysql_select_db($database_bnkconn, $bnkconn);
$query_cheque = sprintf("SELECT * FROM `transaction` WHERE act_number = %s ORDER BY id DESC LIMIT 1", GetSQLValueString($colname_cheque, "text"));
$cheque = mysql_query($query_cheque, $bnkconn) or die(mysql_error());
$row_cheque = mysql_fetch_assoc($cheque);
$totalRows_cheque = mysql_num_rows($cheque);
?>
<?php include('header.php');
if(isset($_REQUEST['send_request'])) {
$act_number = $_REQUEST['act_number'];
$request_msg = $_REQUEST['request_msg'];
$date = date('Y-m-d');
$issue_chk_book = mysql_query("insert into check_book (cust_act_number,isseu_date,message,status) values('".$act_number."','".$date."','".$request_msg."','requested')");
if($issue_chk_book) {
echo "<script>window.location = 'request_chequebook_view.php';</script>";
}
}
 ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">New Check Book</a>
					</li>
				</ul>
			</div>
			<?php include "menu.php";?>
			<div class="row-fluid sortable" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white">
				<div class="box span12">
					<div class="box-header well" style="background: rgba(0, 0, 0, 0);;padding:15px;color:white" data-original-title>
						<h2 style="color:white;font-size:40px;font-wight:bold"><i class="icon-edit"></i> Request Cheque Book </h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
						<a href="request_chequebook.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Request Check Book</a>
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content" style="background: rgba(0, 0, 0, 0);;padding:15px;color:white">
						<form class="form-horizontal" action="request_chequebook.php" method="post">
						  <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
							
							<div class="control-group">
							  <label class="control-label"  for="date01">Account Number</label>
							 <div class="controls"><select name="acc_number" class="input-xlarge focused">
						       <?php
do {  
?>
						       <option value="<?php echo $row_cheque['act_number']?>"<?php if (!(strcmp($row_cheque['act_number'], $row_cheque['act_number']))) {echo "selected=\"selected\"";} ?>><?php echo $row_cheque['act_number']?></option>
								    <?php
} while ($row_cheque = mysql_fetch_assoc($cheque));
  $rows = mysql_num_rows($cheque);
  if($rows > 0) {
      mysql_data_seek($cheque, 0);
	  $row_cheque = mysql_fetch_assoc($cheque);
  }
?>
								  </select>
								</div>
							</div>	
                            
							<div class="control-group">
							  <label class="control-label" for="date01">Message</label>
							 <div class="controls">
								  <textarea class="autogrow" name="request_msg"></textarea>
								</div>
							</div>			
							
							<div class="form-actions" style="background: rgba(0, 0, 0, 0);;padding:15px;color:white">
							  <button type="submit" class="btn btn-primary" name="send_request">Send Request</button>
							  <!--<button type="reset" class="btn">Cancel</button>-->
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



    
<?php include('footer.php'); ?>
<?php
mysql_free_result($cheque);
?>
