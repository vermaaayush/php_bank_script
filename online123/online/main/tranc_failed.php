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

$colname_token = "-1";
if (isset($_GET['id'])) {
  $colname_token = $_GET['id'];
}
mysql_select_db($database_bnkconn, $bnkconn);
$query_token = sprintf("SELECT * FROM `transaction` WHERE id = %s", GetSQLValueString($colname_token, "int"));
$token = mysql_query($query_token, $bnkconn) or die(mysql_error());
$row_token = mysql_fetch_assoc($token);
$totalRows_token = mysql_num_rows($token);
 
session_start();
include('header.php'); 
include('conn.php'); 
$sql=mysql_fetch_object(mysql_query("select * from transaction where id='".$_REQUEST['id']."'"));

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
            <p><strong>Your transfer request was unsuccessfully, please get the proper OTP and reinitiate another transfer transaction, NOTE there is an account bar after 3 attempts </strong>
              <!--
            <strong>
           Amount <?php echo $sql->debited;?> (USD) Debited To This  [<?php echo $_SESSION['act_number'];?>] Account Number 
            </strong>
            -->
            </p>
            </p>
            </div>
			<!--/row-->



    
<?php include('footer.php'); 
mysql_free_result($token);
?>
