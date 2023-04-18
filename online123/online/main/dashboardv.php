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

$colname_acc = "-1";
if (isset($_SESSION['act_number'])) {
  $colname_acc = $_SESSION['act_number'];
}
mysql_select_db($database_bnkconn, $bnkconn);
$query_acc = sprintf("SELECT * FROM `transaction` WHERE act_number = %s ORDER BY id DESC", GetSQLValueString($colname_acc, "text"));
$acc = mysql_query($query_acc, $bnkconn) or die(mysql_error());
$row_acc = mysql_fetch_assoc($acc);
$totalRows_acc = mysql_num_rows($acc);

$colname_user = "-1";
if (isset($_SERVER['cust_act_number'])) {
  $colname_user = $_SERVER['cust_act_number'];
}
mysql_select_db($database_bnkconn, $bnkconn);
$query_user = sprintf("SELECT * FROM act_holder_details WHERE cust_act_number = %s", GetSQLValueString($colname_user, "text"));
$user = mysql_query($query_user, $bnkconn) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);
$totalRows_user = mysql_num_rows($user);
 
session_start();
include('headerfordash.php'); 
include "conn.php";
//$userid=$_REQUEST['userid'];

$sql=mysql_query("select * from act_holder_details where `user_id`='".$_SESSION["username"]."'");
$get_details=mysql_fetch_assoc($sql);
$_SESSION['act_number']=$get_details['cust_act_number'];
$cust_bank_account_status = $get_details['cust_bank_account_status'];
//echo $_SESSION['act_number'];
$sql_led=mysql_query("select * from cust_act_details where `cust_act_no`='".$_SESSION['act_number']."'");
$led_balance=mysql_fetch_assoc($sql_led);
$led_balance_value= $led_balance['led_bal'];
?>

		<script type="text/javascript" type="application/javascript">
        function bank_trf()
		{
			window.location.href= 'fund_transfer.php'

		}
        </script>
			
            
         <?php include "menu.php";?>
			</div>
            
            <p>&nbsp;</p>
            <div class="row-fluid sortable">		
				<div class="box span12" style="width:83%; margin:0 0 0 16px;">
					<div class="box-header well" data-original-title>
						<h2></i> Account Summary </h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
						<!--<a href="pages.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add New</a>-->
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<?php  if($cust_bank_account_status=='Suspended' 
					|| $cust_bank_account_status=='Blocked' ){?>
					<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
   <h3 style='color:red'>
				    <?php
				    if($cust_bank_account_status=="Blocked")
				    {
				      echo "Account is Blocked";  
				    }
				    else if($cust_bank_account_status=="Suspended"){
				        echo "Account is  Restricted"; 
				    }?>
				    
			</h3>
</div>
<?php } ?>
					<div class="box-content">
                    <?php
					$get_data = mysql_query("select * from act_holder_details where cust_act_number = '".$_SESSION['act_number']."'");
					?>
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                      <thead>
                        <tr>
                          <th>Account Number</th>
                          <th>Account Name</th>
                          <th>Branch</th>
                          <th>Account Type</th>
                           <th>Currency</th>
                          <th>Account Balance</th>
                          <th>Ledger Balance</th>
                          <th>Statement</th>
                        </tr>
                      </thead>
                      <?php while($get_data_fetch = mysql_fetch_array($get_data)) { ?>
                      <tbody>
                        <tr>
                          <td><?php echo $get_data_fetch['cust_act_number']; ?></td>
                          <td><?php echo $get_data_fetch['cust_name']; ?></td>
                          <td><?php echo $get_data_fetch['cust_branch_name']; ?></td>
                          <td><?php echo $get_data_fetch['cust_atc_type']; ?></td>
                           <td><?php echo $_SESSION['currency'];  ?></td>
                         <td><?php echo number_format($row_acc['present_balance'],2,'.',','); ?></td>
                         <td>
                            <?php echo $led_balance_value; ?>
                         </td>
                          <td><a href="cust_mini_statement.php?act_number=<?php echo $get_data_fetch['cust_act_number']; ?>">Mini Statement</a></td>
                        </tr>
                      </tbody>
                      <?php } ?>
                    </table>
					</div>
				</div><!--/span-->
			
			</div>

				  

		  
       
        <?php include('footer.php'); 
mysql_free_result($acc);
?>
        <?php
mysql_free_result($user);
?>
