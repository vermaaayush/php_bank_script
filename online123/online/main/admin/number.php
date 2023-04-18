<?php require_once('../../Connections/bnkconn.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE ``transaction`` SET `number`=%s WHERE id=%s",
                       GetSQLValueString($_POST['number'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_bnkconn, $bnkconn);
  $Result1 = mysql_query($updateSQL, $bnkconn) or die(mysql_error());

  $updateGoTo = "transaction_details.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <label for="number"></label>
  <input type="text" name="number" id="number" />
  <input type="text" name="id" id="id" />
  <input type="hidden" name="MM_update" value="form1" />
</form>
<?php
include "conn.php";
echo $number=rand(10,1000000);
//echo "UPDATE transaction SET number='".$number."' where id='".$_REQUEST['id']."'"; exit;
$sql_number="UPDATE transaction SET number='".$number."' where id='".$_REQUEST['id']."'";
$rs_num=mysql_query($sql_number);
?>
