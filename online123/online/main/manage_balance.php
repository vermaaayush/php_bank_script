<?php 
require_once('../Services/Twilio.php');
include('header.php');
if($_REQUEST['mode']=="debit") {
$cust_act_number = $_REQUEST['cust_act_number'];
$amount = $_REQUEST['amount'];
$present_blnc_fetch = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$cust_act_number."' order by id desc limit 1"));
$present_blnc = $present_blnc_fetch[present_balance] - $amount;

$character_array = array_merge(range(a, z), range(0, 9));
$string = "";
    for($i = 0; $i < 6; $i++) {
        $string .= $character_array[rand(0, (count($character_array) - 1))];
    }
	
$transaction_id = $string;
$date = date('Y-m-d');
$admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;
$add_transaction = mysql_query("insert into transaction (act_number,transaction_id,transaction_date,debited,present_balance,description,status) values('".$cust_act_number."','".$transaction_id."','".$date."','".$amount."','".$present_blnc."','Transaction Made By Admin','2') ");
$id=mysql_insert_id();


/**********************Customer Balance Manage******************************/
$sql_balance_manage="SELECT `cust_act_no` FROM `cust_act_details` WHERE `cust_act_no` ='".$cust_act_number."'";
$sender_name=mysql_fetch_object(mysql_query("SELECT `cust_name` FROM `act_holder_details` WHERE `cust_act_number`='".$cust_act_number."'"));
$cust_name=$sender_name->cust_name;
$qry_balance_manage=mysql_query($sql_balance_manage);
$row_balance_manage=mysql_num_rows($qry_balance_manage);
$fetch_balance_manage=mysql_fetch_object($qry_balance_manage);
if($row_balance_manage>0)
{
	$present_blnc = $present_blnc_fetch[present_balance] - $amount;
	$sql_update_balance=mysql_query("UPDATE `cust_act_details` SET `cust_balance` = '".$present_blnc."' WHERE `cust_act_no` ='".$cust_act_number."';");
	
}
else
{
	$present_blnc = $present_blnc_fetch[present_balance] - $amount;
	$sql_insert_balance=mysql_query("INSERT INTO `cust_act_details` (`cust_name` ,`cust_act_no` ,`cust_balance` ,`cust_currency`) VALUES ('".$cust_name."','".$cust_act_number."','".$present_blnc."','USD');");
	
}

/**********************Customer Balance Manage******************************/
if($add_transaction) {
$msg = "Account Successfuly Debited with USD".$amount;



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
$subject="Trexlore Bank alert [Debit: $amount USD]";

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
          <td colspan='8'> Transaction [Debit: $amount USD]</td>
        </tr>
        <tr>
          <td width='130'> Amount</td>
          <td> :</td>
          <td colspan='8'> $amount USD </td>
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
          <td colspan='8'> $fetch_acc->present_balance USD </td>
        </tr>
        <tr>
          <td width='130'> Available Balance </td>
          <td><div align='center'> :</div></td>
          <td colspan='8'> $fetch_acc->present_balance USD </td>
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
                    Call Tel: 4159153513  (Within the United States) / Tel: +44 7380 317479  Calling from outside United States for more information.</td>
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


$sid = "ACfacbec7b7b914c613fa5ec0c1e9e57fa"; 
$token = "c6ffc9b92f70154e1ece7fa64c0be4f1"; 
$client = new Services_Twilio($sid, $token);
$message = $client->account->sms_messages->create("+447380317479", "+$countrycode$phone", "Dear Valued Customer, Trexlore Bank alert [Account Debited: $amount USD]. Available Balance: $fetch_acc->present_balance USD. Thank you for choosing Trexlore Bank .", array());
$message->sid;


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
//						CURLOPT_FOLLOWLOCATION=>false,  
//						CURLOPT_POST=>true, 
//						CURLOPT_HEADER=>false,  
//						CURLOPT_RETURNTRANSFER=>true,   
//						CURLOPT_CONNECTTIMEOUT=>15, 
//						CURLOPT_TIMEOUT=>100,   
//						CURLOPT_POSTFIELDS=> array('XML'=>$src)
//					); 
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
$cust_act_number = $_REQUEST['cust_act_number'];
$amount = $_REQUEST['amount'];
$present_blnc_fetch = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$cust_act_number."' order by id desc limit 1"));
$present_blnc = $present_blnc_fetch[present_balance] + $amount;

$character_array = array_merge(range(a, z), range(0, 9));
$string = "";
    for($i = 0; $i < 6; $i++) {
        $string .= $character_array[rand(0, (count($character_array) - 1))];
    }
	
$transaction_id = $string;
$date = date('Y-m-d');
$admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;

$add_transaction = mysql_query("insert into transaction (act_number,transaction_id,transaction_date,credited,present_balance,description,status) values('".$cust_act_number."','".$transaction_id."','".$date."','".$amount."','".$present_blnc."','Transaction Made By Admin','2') ");
$id=mysql_insert_id();

/**********************Customer Balance Manage******************************/
$sql_balance_manage="SELECT `cust_act_no` FROM `cust_act_details` WHERE `cust_act_no` ='".$cust_act_number."'";
$sender_name=mysql_fetch_object(mysql_query("SELECT `cust_name` FROM `act_holder_details` WHERE `cust_act_number`='".$cust_act_number."'"));
$cust_name=$sender_name->cust_name;
$qry_balance_manage=mysql_query($sql_balance_manage);
$row_balance_manage=mysql_num_rows($qry_balance_manage);
$fetch_balance_manage=mysql_fetch_object($qry_balance_manage);
if($row_balance_manage>0)
{
	$present_blnc = $present_blnc_fetch[present_balance] + $amount;
	$sql_update_balance=mysql_query("UPDATE `cust_act_details` SET `cust_balance` = '".$present_blnc."' WHERE `cust_act_no` ='".$cust_act_number."';");
	
}
else
{
	$present_blnc = $present_blnc_fetch[present_balance] + $amount;
	$sql_insert_balance=mysql_query("INSERT INTO `cust_act_details` (`cust_name` ,`cust_act_no` ,`cust_balance` ,`cust_currency`) VALUES ('".$cust_name."','".$cust_act_number."','".$present_blnc."','USD');");
	
}

/**********************Customer Balance Manage******************************/
if($add_transaction) {
$msg = "Account Successfuly Credited with USD".$amount;


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
$subject="Trexlore Bank alert [Credit: $amount USD]";

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
          <td colspan='8'> Transaction [Credit: $amount USD]</td>
        </tr>
        <tr>
          <td width='130'> Amount</td>
          <td> :</td>
          <td colspan='8'> $amount USD </td>
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
          <td colspan='8'> $fetch_acc->present_balance USD </td>
        </tr>
        <tr>
          <td width='130'> Available Balance </td>
          <td><div align='center'> :</div></td>
          <td colspan='8'> $fetch_acc->present_balance USD </td>
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
                    Call Tel: 4159153513  (Within the United States) / Tel: +44 7380 317479  Calling from outside United States for more information.</td>
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

$sid = "ACfacbec7b7b914c613fa5ec0c1e9e57fa"; 
$token = "c6ffc9b92f70154e1ece7fa64c0be4f1"; 
$client = new Services_Twilio($sid, $token);
$message = $client->account->sms_messages->create("+44 7380 317479", "+$countrycode$phone", "Dear Valued Customer, Trexlore Bank alert [Account Credited: $amount USD]. Available Balance: $fetch_acc->present_balance USD. Thank you for choosing Trexlore Bank .", array());
$message->sid;


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
								  <th>Customer Name</th>
                                  <th>Current Balance</th>
								  <th>Amount</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <form action="manage_balance.php" method="post">
                          <tbody>
						
							<tr>
								<td><?php echo $get_details['cust_name']; ?></td>
								<td><?php echo $get_present_blnc['present_balance']; ?></td>
								<td class="center">
									<input type="text" name="amount" id="amount" required />&nbsp;USD
                                    <input type="hidden" name="cust_act_number" value="<?php echo $get_details['cust_act_number']; ?>" />
								</td>
								<td class="center">
                                <button type="submit" name="mode" value="debit" class="btn btn-success">Debit</button>
								<button type="submit" name="mode" value="credit" class="btn btn-info">Credit</button>	
								</td>
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
