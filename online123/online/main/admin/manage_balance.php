<?php 
include('../sms/sms_alerts.php');
include('header.php');
session_start();

if($_REQUEST['mode']=="debit") {
    $bal_type= $_REQUEST['bal_type'];
     $ministatment= $_REQUEST['show'];
     echo $ministatment;
  //  exit();
    

$cust_act_number = $_REQUEST['cust_act_number'];//echo $cust_act_number;
$amount = $_REQUEST['amount'];
$description= $_REQUEST['description'];
$date= $_REQUEST['date'];
//$currency=$_REQUEST['currency'];
$present_blnc_fetch = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$cust_act_number."' order by id desc limit 1"));
$present_blnc = $present_blnc_fetch[present_balance] - $amount;
$character_array = array_merge(range(a, z), range(0, 9));
$string = "";
    for($i = 0; $i < 6; $i++) {
        $string .= $character_array[rand(0, (count($character_array) - 1))];
    }
  
$transaction_id = $string;
$date = $_REQUEST['date'];
$admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;
if($bal_type=="availablbalance")
    {
        if($ministatment=='no')
        {
 $add_transaction = mysql_query("insert into transaction (act_number,transaction_id,transaction_date,debited,present_balance,description,status) values('".$cust_act_number."','".$transaction_id."','".$date."','".$amount."','".$present_blnc."','".$description."','4') ");
$id=mysql_insert_id();

}
else
{
    $add_transaction = mysql_query("insert into transaction (act_number,transaction_id,transaction_date,debited,present_balance,description,status,mini_statment) values('".$cust_act_number."','".$transaction_id."','".$date."','".$amount."','".$present_blnc."','".$description."','4','0') ");
$id=mysql_insert_id();
//echo $id;
   
}
}


/**********************Customer Balance Manage******************************/
$sql_balance_manage="SELECT `cust_act_no` FROM `cust_act_details` WHERE `cust_act_no` ='".$cust_act_number."'";
$sender_name=mysql_fetch_object(mysql_query("SELECT `cust_name` FROM `act_holder_details` WHERE `cust_act_number`='".$cust_act_number."'"));
$cust_name=$sender_name->cust_name;
$qry_balance_manage=mysql_query($sql_balance_manage);
$row_balance_manage=mysql_num_rows($qry_balance_manage);
$fetch_balance_manage=mysql_fetch_object($qry_balance_manage);

if($row_balance_manage>0)
{
    if($bal_type=="Ledgerbalance")
    {
        $sender_led=mysql_fetch_object(mysql_query("SELECT `led_bal` FROM `cust_act_details` WHERE `cust_act_no`='".$cust_act_number."'"));
$led=$sender_led->led_bal;
        
        $p = $led - $amount;
  $sql_update_balance=mysql_query("UPDATE `cust_act_details` SET `led_bal` = '".$p."' WHERE `cust_act_no` ='".$cust_act_number."';");
    }
  else
  {
      $present_blnc = $present_blnc_fetch[present_balance] - $amount;
  $sql_update_balance=mysql_query("UPDATE `cust_act_details` SET `cust_balance` = '".$present_blnc."' WHERE `cust_act_no` ='".$cust_act_number."';");
  }
}
else
{
  $present_blnc = $present_blnc_fetch[present_balance] - $amount;
  $sql_insert_balance=mysql_query("INSERT INTO `cust_act_details` (`cust_name` ,`cust_act_no` ,`cust_balance` ,`cust_currency`) VALUES ('".$cust_name."','".$cust_act_number."','".$present_blnc."','". $_SESSION['currency']."');");
  
}

/**********************Customer Balance Manage******************************/
if($add_transaction) {
$msg = "Account Successfuly Debited with ".$amount.  $_SESSION['currency'];



$sql_acc1=mysql_query("select * from act_holder_details where `cust_act_number`='".$_REQUEST['cust_act_number']."'");
$sql_acc=mysql_query("select * from  transaction where id='".$id."'");
$fetch_acc=mysql_fetch_object($sql_acc);
$fetch_acc1=mysql_fetch_object($sql_acc1);
$rows=mysql_num_rows($sql_acc1);
if($rows>0)
{
  
   $date=date();
   $to=$fetch_acc1->cust_mail;
   $phone=$fetch_acc1->cust_phone;
   $countrycode=$fetch_acc1->cust_countrycode;
  $avb_bal=($fetch_acc->present_balance-$amount);
  $time=date('h:i A');
$subject="Trexlore Bank alert [Debit: $amount]";
$currency= $_SESSION['currency'];
$massege= "
<style type='text/css'>
h4{font-family:Calibri, Tahoma, Geneva, sans-serif;}
table{font-family:Calibri, Tahoma, Geneva, sans-serif;font-size:13px;color:#666666;text-align:justify;}
td{text-align:justify;}
a{font-family:Calibri, Tahoma, Geneva, sans-serif;color:#FF6600;text-decoration:none;}
</style>
    <table border='0' cellpadding='0' cellspacing='0' width='689'>
      <tbody>
        <tr>
          <td colspan='10' height='97'><div align='right'><img src='http://trexlorebk.com/logo.png'></div></td>
        </tr>
        <tr>
          <td colspan='2'>&nbsp;</td>
          <td colspan='8'><div align='right'>".date('d-M-Y')."</div></td>
        </tr>
        <tr>
          <td colspan='10'>Dear &nbsp; <b> $fetch_acc1->cust_name </b></td>
        </tr>
        <tr>
          <td colspan='10'></td>
        </tr>
        <tr>
          <td colspan='10'><u>
            <h4>Trexlore Bank Electronic Notification Service (UBSENS)</h4>
            </u></td>
        </tr>
        <tr>
          <td colspan='10'></td>
        </tr>
        <tr>
          <td colspan='10'>We wish to inform you that a Debit transaction occurred on your account with us.</td>
        </tr>
        <tr>
          <td colspan='10'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan='10'> The details of this transaction are shown below: </td>
        </tr>
        <tr>
          <td colspan='10'></td>
        </tr>
        <tr>
          <td colspan='10'><u>
            <h4>Transaction Notification</h4>
            </u></td>
        </tr>
        <tr>
          <td width='130'> Account Number </td>
          <td width='10'> :</td>
          <td colspan='8' width='549'> $fetch_acc1->cust_act_number </td>
        </tr>
        <tr>
          <td width='130'> Transaction Location </td>
          <td> :</td>
          <td colspan='8'> Corporate H/O </td>
        </tr>
        <tr>
          <td height='19' width='130'> Description</td>
          <td> :</td>
          <td colspan='8'> Transaction [Debit: $amount  $currency]</td>
        </tr>
        <tr>
          <td width='130'> Amount</td>
          <td> :</td>
          <td colspan='8'> $amount  $currency </td>
        </tr>
        <tr>
          <td width='130'> Value Date </td>
          <td> :</td>
          <td colspan='8'> $fetch_acc->transaction_date </td>
        </tr>
        <tr>
          <td width='130'> Remarks</td>
          <td> :</td>
          <td colspan='8'> Customer Service </td>
        </tr>
        <tr>
          <td width='130'> Time of Transaction </td>
          <td> :</td>
          <td colspan='8'> --:--</td>
        </tr>
        <tr>
          <td width='130'> Document Number </td>
          <td> :</td>
          <td colspan='8'> $fetch_acc->transaction_id </td>
        </tr>
        <tr>
          <td colspan='10'><br></td>
        </tr>
        <tr>
          <td colspan='5'>The balances on this account as at&nbsp; 04:59 PM &nbsp;are as follows;</td>
        </tr>
        <tr>
          <td colspan='10'></td>
        </tr>
        <tr>
          <td width='130'> Current Balance </td>
          <td><div align='center'> :</div></td>
          <td colspan='8'> $fetch_acc->present_balance  $currency </td>
        </tr>
        <tr>
          <td width='130'> Available Balance </td>
          <td><div align='center'> :</div></td>
          <td colspan='8'> $fetch_acc->present_balance  $currency </td>
        </tr>
        <tr>
          <td colspan='10'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan='10'> Thank you for choosing Trexlore Bank</td>
        </tr>
        <tr>
          <td colspan='10'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan='10' height='19'><table border='0' width='100%'>
              <tbody>
                <tr>
                  <td rowspan='3' width='10'>&nbsp;</td>
                  <td height='4%' width='454'><div>'Your Internet Banking user ID and password, ATM card number and PIN are confidential and should never be disclosed to anyone'.<br>
                    </div></td>
                </tr>
                <tr>
                  <td height='10'>Kindly log on to our website <a rel='nofollow' target='_blank' href='http://trexlorebk.com/'>unionbtrust.com</a> OR <br>
                    Email us info@trexlorebk.com</td>
                </tr>
                <tr>
                  <td height='40%' valign='top'><b>NB:</b><br>
                    Our notification service sent this mail to you using a default setting and the information you supplied to us when your account was opened.<br>
                    If you wish to limit the type of mails you receive or the email address(es) in use, please send an email to us by clicking on the link below:<br>
                    <a rel='nofollow' ymailto='mailto:alphateam@enizbnkas.com' target='_blank' href='mailto:alphateam@enizbnkas.com'>Send a Mail to Trexlore Bank Electronic Notification Service (UBSENS)</a></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
      </tbody>
    </table>
"; 
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: '.$admin_email."\r\n";// From
mail($to, $subject, $massege, $headers);
/*
$sid = "AC96156b8e489dc2784e2207917e741110"; 
$token = "e127eaa3e14fbfb8dcc16a97f8f42f69"; 
$client = new Services_Twilio($sid, $token);
$message = $client->account->sms_messages->create("+17083407214", "+$countrycode$phone", "Dear $fetch_acc1->cust_name, Trexlore Bank alert, Account Debited: $amount $currency. Available Balance: $fetch_acc->present_balance $currency. Thank you for choosing Trexlore Bank.", array());
$message->sid;

*/

$msg= "Dear $fetch_acc1->cust_name, Trexlore Bank alert, Account Debited: $amount $currency. Available Balance: $fetch_acc->present_balance $currency. Thank you for choosing Trexlore Bank.";
balance_alert(+$countrycode,$phone,$msg);


//$url = "http://smsmobile24.com/components/com_smsreseller/smsapi.php?username=emekau2002&password=kurrupt80&sender=@@DAB DEBIT@@&recipient=@@$countrycode$phone@@&message=@@Trexlore Bank alert [Debit: $amount USD]@@";
//$ch = curl_init($url);
//curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//$output = curl_exec($ch);       
//curl_close($ch);
//
//
//$src = '<?xml version="1.0" encoding="UTF-8">   
//<SMS>
//<operations> 
//<operation>SEND</operation>
//</operations>
//<authentification>   
//<username>emekau2002@yahoo.com</username>  
//<password>kurrupt80</password>  
//</authentification>  
//<message>
//<sender>DAB-DEBIT</sender>   
//<text>Trexlore Bank alert [Debit: $amount USD]</text>  
//</message>   
//<numbers>
//<number messageID=
//"msg11"
//>$phone</number>
//</numbers>   
//</SMS>'; 
//    
// 
//$Curl = curl_init();   
//$CurlOptions = array( CURLOPT_URL=>'http://atompark.com/members/sms/xml.php', 
//            CURLOPT_FOLLOWLOCATION=>false,  
//            CURLOPT_POST=>true, 
//            CURLOPT_HEADER=>false,  
//            CURLOPT_RETURNTRANSFER=>true,   
//            CURLOPT_CONNECTTIMEOUT=>15, 
//            CURLOPT_TIMEOUT=>100,   
//            CURLOPT_POSTFIELDS=> array('XML'=>$src)
//          ); 
//curl_setopt_array($Curl,$CurlOptions);
//$Result = curl_exec($Curl);   

}
else
{
  echo'Inval';
  //echo "Please Check Your Secret Key";  
}




}
}

if($_REQUEST['mode']=="credit") {
     $bal_type= $_REQUEST['bal_type'];
      $ministatment= $_REQUEST['show'];
$cust_act_number = $_REQUEST['cust_act_number'];
$amount = $_REQUEST['amount'];
$present_blnc_fetch = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$cust_act_number."' order by id desc limit 1"));
$present_blnc = $present_blnc_fetch[present_balance] + $amount;

$character_array = array_merge(range(a, z), range(0, 9));
$string = "";
    for($i = 0; $i < 6; $i++) {
        $string .= $character_array[rand(0, (count($character_array) - 1))];
    }
  $currency= $_SESSION['currency'];
$transaction_id = $string;
$date = $_REQUEST['date'];
$admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;
$description= $_REQUEST['description'];
if($bal_type=="availablbalance"){
     if($ministatment=='no')
        {
 $add_transaction = mysql_query("insert into transaction (act_number,transaction_id,transaction_date,credited,present_balance,description,status) values('".$cust_act_number."','".$transaction_id."','".$date."','".$amount."','".$present_blnc."','".$description."','4') ");
$id=mysql_insert_id();
}
else
{
  
$add_transaction = mysql_query("insert into transaction (act_number,transaction_id,transaction_date,credited,present_balance,description,status,mini_statment) values('".$cust_act_number."','".$transaction_id."','".$date."','".$amount."','".$present_blnc."','".$description."','4','0') ");
$id=mysql_insert_id();
 
}
}
/**********************Customer Balance Manage******************************/
$sql_balance_manage="SELECT `cust_act_no` FROM `cust_act_details` WHERE `cust_act_no` ='".$cust_act_number."'";
$sender_name=mysql_fetch_object(mysql_query("SELECT `cust_name` FROM `act_holder_details` WHERE `cust_act_number`='".$cust_act_number."'"));
$cust_name=$sender_name->cust_name;
$qry_balance_manage=mysql_query($sql_balance_manage);
$row_balance_manage=mysql_num_rows($qry_balance_manage);
$fetch_balance_manage=mysql_fetch_object($qry_balance_manage);
if($row_balance_manage>0)
{
    if($bal_type=="Ledgerbalance")
    {
        $sender_led=mysql_fetch_object(mysql_query("SELECT `led_bal` FROM `cust_act_details` WHERE `cust_act_no`='".$cust_act_number."'"));
$led=$sender_led->led_bal;
        
        $p = $led + $amount;
  $sql_update_balance=mysql_query("UPDATE `cust_act_details` SET `led_bal` = '".$p."' WHERE `cust_act_no` ='".$cust_act_number."';");
    }
    else{
  $present_blnc = $present_blnc_fetch[present_balance] + $amount;
  $sql_update_balance=mysql_query("UPDATE `cust_act_details` SET `cust_balance` = '".$present_blnc."' WHERE `cust_act_no` ='".$cust_act_number."';");
    }
}
else
{
  $present_blnc = $present_blnc_fetch[present_balance] + $amount;
  $sql_insert_balance=mysql_query("INSERT INTO `cust_act_details` (`cust_name` ,`cust_act_no` ,`cust_balance` ,`cust_currency`) VALUES ('".$cust_name."','".$cust_act_number."','".$present_blnc."','".$currency."');");
  
}

/**********************Customer Balance Manage******************************/
if($add_transaction) {
$msg = "Account Successfuly Credited $currency ".$amount;


$sql_acc1=mysql_query("select * from act_holder_details where `cust_act_number`='".$_REQUEST['cust_act_number']."'");
$sql_acc=mysql_query("select * from  transaction where id='".$id."'");
$fetch_acc=mysql_fetch_object($sql_acc);
$fetch_acc1=mysql_fetch_object($sql_acc1);
$rows=mysql_num_rows($sql_acc1);
if($rows>0)
{
  
   $date=date();
   $to=$fetch_acc1->cust_mail;
   $phone=$fetch_acc1->cust_phone;
   $countrycode=$fetch_acc1->cust_countrycode;
   $avb_bal=($fetch_acc->present_balance+$amount);
   $time=date('h:i A');
$subject="Trexlore Bank alert [Credit: $amount $currency]";

$massege=    "
<style type='text/css'>
h4{font-family:Calibri, Tahoma, Geneva, sans-serif;}
table{font-family:Calibri, Tahoma, Geneva, sans-serif;font-size:13px;color:#666666;text-align:justify;}
td{text-align:justify;}
a{font-family:Calibri, Tahoma, Geneva, sans-serif;color:#FF6600;text-decoration:none;}
</style>
    <table border='0' cellpadding='0' cellspacing='0' width='689'>
      <tbody>
        <tr>
          <td colspan='10' height='97'><div align='right'><img src='http://trexlorebk.com/logo.png'></div></td>
        </tr>
        <tr>
          <td colspan='2'>&nbsp;</td>
          <td colspan='8'><div align='right'>".date('d-M-Y')."</div></td>
        </tr>
        <tr>
          <td colspan='10'>Dear &nbsp; <b> $fetch_acc1->cust_name </b></td>
        </tr>
        <tr>
          <td colspan='10'></td>
        </tr>
        <tr>
          <td colspan='10'><u>
            <h4>Trexlore Bank Electronic Notification Service (UBSENS)</h4>
            </u></td>
        </tr>
        <tr>
          <td colspan='10'></td>
        </tr>
        <tr>
          <td colspan='10'>We wish to inform you that a Credit transaction occurred on your account with us.</td>
        </tr>
        <tr>
          <td colspan='10'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan='10'> The details of this transaction are shown below: </td>
        </tr>
        <tr>
          <td colspan='10'></td>
        </tr>
        <tr>
          <td colspan='10'><u>
            <h4>Transaction Notification</h4>
            </u></td>
        </tr>
        <tr>
          <td width='130'> Account Number </td>
          <td width='10'> :</td>
          <td colspan='8' width='549'> $fetch_acc1->cust_act_number </td>
        </tr>
        <tr>
          <td width='130'> Transaction Location </td>
          <td> :</td>
          <td colspan='8'> Corporate H/O </td>
        </tr>
        <tr>
          <td height='19' width='130'> Description</td>
          <td> :</td>
          <td colspan='8'> Transaction [Credit: $amount $currency]</td>
        </tr>
        <tr>
          <td width='130'> Amount</td>
          <td> :</td>
          <td colspan='8'> $amount $currency </td>
        </tr>
        <tr>
          <td width='130'> Value Date </td>
          <td> :</td>
          <td colspan='8'> $fetch_acc->transaction_date </td>
        </tr>
        <tr>
          <td width='130'> Remarks</td>
          <td> :</td>
          <td colspan='8'> Customer Service </td>
        </tr>
        <tr>
          <td width='130'> Time of Transaction </td
          <td> :</td>
          <td colspan='8'> --:--</td>
        </tr>
        <tr>
          <td width='130'> Document Number </td>
          <td> :</td>
          <td colspan='8'> $fetch_acc->transaction_id </td>
        </tr>
        <tr>
          <td colspan='10'><br></td>
        </tr>
        <tr>
          <td colspan='5'>The balances on this account as at&nbsp; 04:59 PM &nbsp;are as follows;</td>
        </tr>
        <tr>
          <td colspan='10'></td>
        </tr>
        <tr>
          <td width='130'> Current Balance </td>
          <td><div align='center'> :</div></td>
          <td colspan='8'> $fetch_acc->present_balance  $currency </td>
        </tr>
        <tr>
          <td width='130'> Available Balance </td>
          <td><div align='center'> :</div></td>
          <td colspan='8'> $fetch_acc->present_balance $currency </td>
        </tr>
        <tr>
          <td colspan='10'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan='10'> Thank you for choosing Trexlore Bank</td>
        </tr>
        <tr>
          <td colspan='10'>&nbsp;</td>
        </tr>
        <tr>
          <td colspan='10' height='19'><table border='0' width='100%'>
              <tbody>
                <tr>
                  <td rowspan='3' width='10'>&nbsp;</td>
                  <td height='4%' width='454'><div>'Your Internet Banking user ID and password, ATM card number and PIN are confidential and should never be disclosed to anyone'.<br>
                    </div></td>
                </tr>
                <tr>
                  <td height='10'>Kindly log on to our website <a rel='nofollow' target='_blank' href='http://trexlorebk.com/'>unionbtrust.com</a> OR <br>
                    Email us info@trexlorebk.com</td>
                </tr>
                <tr>
                  <td height='40%' valign='top'><b>NB:</b><br>
                    Our notification service sent this mail to you using a default setting and the information you supplied to us when your account was opened.<br>
                    If you wish to limit the type of mails you receive or the email address(es) in use, please send an email to us by clicking on the link below:<br>
                    <a rel='nofollow' ymailto='mailto:alphateam@enizbnkas.com' target='_blank' href='mailto:alphateam@enizbnkas.com'>Send a Mail to Trexlore Bank Electronic Notification Service (UBSENS)</a></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
      </tbody>
    </table>
";   

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
 $headers .= 'From: '.$admin_email."\r\n";// From
mail($to, $subject, $massege,$headers);
/*
$sid = "AC96156b8e489dc2784e2207917e741110"; 
$token = "e127eaa3e14fbfb8dcc16a97f8f42f69"; 
$client = new Services_Twilio($sid, $token);
$message = $client->account->sms_messages->create("+17083407214", "+$countrycode$phone", "Dear $fetch_acc1->cust_name, Trexlore Bank alert, Account Credited: $amount USD. Available Balance: $fetch_acc->present_balance $currency. Thank you for choosing Trexlore Bank.", array());
$message->sid;
*/
$msg= "Dear $fetch_acc1->cust_name, Trexlore Bank alert, Account Credited: $amount USD. Available Balance: $fetch_acc->present_balance $currency. Thank you for choosing Trexlore Bank.";
balance_alert(+$countrycode,$phone,$msg);


//$url = "http://smsmobile24.com/components/com_smsreseller/smsapi.php?username=emekau2002&password=kurrupt80&sender=@@DAB CREDIT@@&recipient=@@$countrycode$phone@@&message=@@Trexlore Bank alert [Credit: $amount USD]@@";
//$ch = curl_init($url);
//curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//$output = curl_exec($ch);       
//curl_close($ch);


}
else
{
  echo'Inval';
  //echo "Please Check Your Secret Key";  
}


}
}
?>
<style type="text/css">
.hint {
  font-size: 9px;
}
</style>


      <div>
        <ul class="breadcrumb">
          <li>
            <a href="dashboard.php">Home</a> <span class="divider">/</span>
          </li>
          <li>
            <a href="#">Manage Account Balance</a>
          </li>
        </ul>
      </div>
      
             <div class="row-fluid sortable">   
        <div class="box span12">
          <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Manage Account Balance</h2>
            <div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
            
              <!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
              <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
              <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
            </div>
          </div>
          <div class="box-content">
                    <form action="<?php $_SERVER['PHP_SELF']?>" name="search" method="post">
                    <div class="form-actions">
                    <input type="text" name="act_number" id="act_number" placeholder="Account Number" required /><br />
            <button type="submit" class="btn btn-primary" name="manage">Manage Account Balance</button>
          </div>
                    </form>
                    <?php
              if(isset($_REQUEST['manage'])) {
              $act_number = $_REQUEST['act_number'];
              $get_details = mysql_fetch_array(mysql_query("select * from act_holder_details where cust_act_number = '".$act_number."'"));
              $get_present_blnc = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$act_number."' order by id desc limit 1"));
              ?>
            <table class="table table-striped table-bordered bootstrap-datatable">
              <thead>
                <tr>
                  <th width="83">Customer Name</th>
                                  <th width="75">Current Balance</th>
                  <th width="150">Amount</th>
                  <th width="200">Description</th>
                 <th width="200">Options</th>
                  <th width="100">Date</th>
                  <th width="169">Actions</th>
                </tr>
              </thead>   
              <form action="manage_balance.php" method="post">
                          <tbody>
            
              <tr>
                <td><?php echo $get_details['cust_name']; ?></td>
                <td><?php echo $get_present_blnc['present_balance']; ?></td>
                <td class="center">
                  <input name="amount" type="text" required id="amount" size="10" />
                                    <input type="hidden" name="cust_act_number" value="<?php echo $get_details['cust_act_number']; ?>" />
                       <p><?php echo $get_details['currency']; 
                        $_SESSION['currency']=$get_details['currency']; 

                        ?> </p>
                </td>

                <td class="center"><label for="description"></label>
                  <textarea name="description" id="description" cols="45" rows="5">APPROVE INWARD TRF - B/O BOWTRANS TOM IFO JENNY R</textarea></td>
                  <td>
                       <div class="control-group">
                  <label class="control-label" for="typeahead"> Type </label>
                  <div class="controls">
                     <select id="selectError3" name="bal_type">
                       <option value = "availablbalance">Available balance</option>
                            <option value = "Ledgerbalance">Ledger balance </option>
               
                           
                        
                     </select>
                  </div>
                  <input type="checkbox" checked name="show" value="no"> appear in statement <br>
               </div>
                  </td>
                      
                 
                <td class="center"><label for="date"></label>
                  <input name="date" type="text" id="date" value="<?php echo date("Y-m-d")?>" /></td>
                <td class="center">
                                <button type="submit" name="mode" value="debit" class="btn btn-success">Debit</button>
                <button type="submit" name="mode" value="credit" class="btn btn-info">Credit</button> 
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="center"><input name="chk_number" type="hidden" id="chk_number" value="<?php
echo(mt_rand() . "<br>");
echo(mt_rand() . "<br>");
echo(mt_rand(10,100));
?> " /></td>
                <td rowspan="4" class="center"><p>*<span class="hint"> WIHDRAWAL ATM B/O BOW</span></p>
                  <p>*<span class="hint"> CASH TRANSFER B/O BOW</span></p>
                  <p>*<span class="hint"> CASH DEPOSIT B/O BOW</span></p>
                  <p class="hint">*CASH DEPOSIT SELF</p>
                  <p>*<span class="hint">APPROVE INWARD TRF -  B/O BOWTRANS TOM IFO JENNY R</span></p>
                  <p>*<span class="hint">APPROVE INWARD TRF - SWIFT INFLO B/O BOWTRANS TOM IFO PAUL KERHEEM</span></p>
                  <p class="hint">*FX PURCHASE (SPOT) via Internet Banking - KERHEEM, PAUL  - @249.62 @1.595016</p>
                  <p>*<span class="hint">C.O.T B/O BOW</span></p></td>
                <td rowspan="4" class="center">&nbsp;</td>
                <td class="center">&nbsp;</td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="center">&nbsp;</td>
                <td class="center">&nbsp;</td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="center">&nbsp;</td>
                <td class="center">&nbsp;</td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="center">&nbsp;</td>
                <td class="center">&nbsp;</td>
                </tr>
              </tbody>
                          </form>
                         <?php }
             if(isset($msg)) {
             ?>
                         <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&Chi;</button>
              <?php echo $msg; ?>
             </div>
             <?php } ?>
            </table>            
          </div>
        </div><!--/span-->
      
      </div>
<?php include('footer.php'); ?>