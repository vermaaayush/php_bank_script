<?php

include("conn.php");

if($_REQUEST['mode']=="stop")

{

$change_mode = mysql_query("update cheque set cheque_status = 'inactive' where cust_act_number = '".$_SESSION['act_number']."'");

echo "<script>window.location = 'cust_cheque_details.php';</script>";

}

if($_REQUEST['mode']=="widraw")

{

$change_mode = mysql_query("delete from cheque where cust_act_number = '".$_SESSION['act_number']."'");

echo "<script>window.location = 'cust_cheque_details.php';</script>";

}

if($_REQUEST['mode']=="reissue")

{

$change_mode = mysql_query("update cheque set cheque_status = 'pending' where cust_act_number = '".$_SESSION['act_number']."'");

echo "<script>window.location = 'cust_cheque_details.php';</script>";

}

if($_REQUEST['mode']=="active")

{

$change_mode = mysql_query("update cheque set cheque_status = 'active' where cust_act_number = '".$_REQUEST['id']."'");

echo "<script>window.location = 'cheque_stat.php';</script>";

}

if($_REQUEST['mode']=="inactive")

{

$change_mode = mysql_query("update cheque set cheque_status = 'inactive' where cust_act_number = '".$_REQUEST['id']."'");

echo "<script>window.location = 'cheque_stat.php';</script>";

}

if($_REQUEST['mode']=="banned")

{

$change_mode = mysql_query("update cheque set cheque_status = 'banned' where cust_act_number = '".$_REQUEST['id']."'");

echo "<script>window.location = 'cheque_stat.php';</script>";

}

?>