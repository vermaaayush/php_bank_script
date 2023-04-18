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

$MM_restrictGoTo = "http://trexlorebk.com/online/main/index.php";
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

$maxRows_transa = 20;
$pageNum_transa = 0;
if (isset($_GET['pageNum_transa'])) {
  $pageNum_transa = $_GET['pageNum_transa'];
}
$startRow_transa = $pageNum_transa * $maxRows_transa;

$colname_transa = "-1";
if (isset($_SESSION['act_number'])) {
  $colname_transa = $_SESSION['act_number'];
}
mysql_select_db($database_bnkconn, $bnkconn);
$query_transa = sprintf("SELECT * FROM `transaction` WHERE act_number = %s ORDER BY id DESC", GetSQLValueString($colname_transa, "text"));
$query_limit_transa = sprintf("%s LIMIT %d, %d", $query_transa, $startRow_transa, $maxRows_transa);
$transa = mysql_query($query_limit_transa, $bnkconn) or die(mysql_error());
$row_transa = mysql_fetch_assoc($transa);

if (isset($_GET['totalRows_transa'])) {
  $totalRows_transa = $_GET['totalRows_transa'];
} else {
  $all_transa = mysql_query($query_transa);
  $totalRows_transa = mysql_num_rows($all_transa);
}
$totalPages_transa = ceil($totalRows_transa/$maxRows_transa)-1;
?>
<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Mini Statement</a>
					</li>
				</ul>
			</div>
			<?php include "menu.php";?>
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white" data-original-title>
						<h2 style="color:white;font-size:40px;font-wight:bold"> Mini Statement </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round" ><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white">
                    <form action="cust_mini_statement.php" name="search" method="post">
                    <div class="form-actions" style="background: rgba(0, 0, 0, 0);;padding:15px;color:white"><br />
                    </div>
                    </form>
						<?php do { ?>
					    <table width="100%" class="table table-bordered table-striped table-condensed asd_dashboard" >
						    <thead>
						      <tr>
						        <th width="16%">Account Number</th>
						        <th width="17%">Transaction ID</th>
						        <th width="12%">Debited</th>
						        <th width="13%">Credited</th>
						        <th width="19%">Date Of Transaction</th>
						        <th width="23%">Balance</th>
						        </tr>
						      </thead> 
						    <tbody>
						      <tr>
						        <td><?php echo $row_transa['act_number']; ?></td>
						        <td><?php echo $row_transa['transaction_id']; ?></td>
						        <td><?php echo number_format($row_transa['debited'],2,'.',','); ?></td>
						        <td><?php echo number_format($row_transa['credited'],2,'.',','); ?></td>
						        <td class="center"><?php echo date('l, F d, Y',strtotime($row_transa['transaction_date'])); ?></td>
						        <td class="center"><?php echo number_format($row_transa['present_balance'],2,'.',','); ?></td>
					          </tr>
						      </tbody>
						    <tbody>
						      </tbody>
					    </table>
						  <?php } while ($row_transa = mysql_fetch_assoc($transa)); ?>  
						 
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php'); ?>
<?php
mysql_free_result($transa);
?>
