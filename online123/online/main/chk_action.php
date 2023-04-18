<?php
include("conn.php");
$date = date('Y-m-d');
if($_REQUEST['mode']=="cancel") {
$update_chk = mysql_query("update cheque set status = 'cancled' where chk_number = '".$_REQUEST['chk_no']."'");
echo "<script>window.location = 'issue_cheque_view.php';</script>";
}
if($_REQUEST['mode']=="hold") {
$update_chk = mysql_query("update cheque set status = 'hold' where chk_number = '".$_REQUEST['chk_no']."'");
echo "<script>window.location = 'issue_cheque_view.php';</script>";
}
if($_REQUEST['mode']=="widraw") {
$update_chk = mysql_query("update cheque set status = 'withdrawn' where chk_number = '".$_REQUEST['chk_no']."'");
$chk_data = mysql_fetch_array(mysql_query("select * from cheque where chk_number = '".$_REQUEST['chk_no']."'"));

/* sender transaction entry */
$sender_present_blnc = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$_REQUEST['sender']."' order by id desc limit 1"));
$sender_blnc = $sender_present_blnc['present_balance'] - $chk_data['amount'];
$add_transaction_to_sender = mysql_query("insert into transaction (act_number,transaction_date,debited,present_balance,description,chk_number) values('".$sender_present_blnc['act_number']."','".$date."','".$chk_data['amount']."','".$sender_blnc."','By Check','".$_REQUEST['chk_no']."')");

/* receiver transaction entry */
$receiver_present_blnc = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$_REQUEST['receiver']."' order by id desc limit 1"));
$receiver_blnc = $receiver_present_blnc['present_balance'] + $chk_data['amount'];
$add_transaction_to_receiver = mysql_query("insert into transaction (act_number,transaction_date,credited,present_balance,description,chk_number) values('".$receiver_present_blnc['act_number']."','".$date."','".$chk_data['amount']."','".$receiver_blnc."','By Check','".$_REQUEST['chk_no']."')");

echo "<script>window.location = 'issue_cheque_view.php';</script>";

}

?>