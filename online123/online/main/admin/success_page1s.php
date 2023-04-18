<?php 
ob_start();
require_once('Services/Twilio.php');
require_once('../Connections/bnkconn.php');?>
<?php
$msgshow="";
session_start();
if (isset($_GET['id'])) {
       /// echo $_GET['id'];
	$idtocheck=$_GET['id'];
	$_SESSION['accountn']=$idtocheck;
    }

$loginFormAction = $_SERVER['PHP_SELF'];
$acc=$_SESSION['accountn'];
///echo $acc;

$sql2="SELECT * FROM act_holder_details WHERE cust_act_number='".$_SESSION['act_number']."'";
    	 mysql_select_db('rockusen_db');
        $detailsget = mysql_query($sql2);
         while($dt = mysql_fetch_array($detailsget)) {
         	$bnkid=$dt["bankidreq"];
         	$authid=$dt["authcodereq"];
         	$s_code=$dt["clearancereq"];
         	$email=$dt["cust_mail"];
         	$cust_name=$dt["cust_name"];
         	$cemail=$dt["cemail"];

         }
        // echo $cemail;
          $sql3 = "SELECT * FROM transaction WHERE id ='". $_SESSION['accountn']. "'";
    	 mysql_select_db('rockusen_db');
        $detailsgett = mysql_query($sql3);
         while($dtt = mysql_fetch_array($detailsgett)) {
         	$account=$dtt["act_number"];
         	 $bankid=$dtt['bankid'];
         	
         }

         $admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;
  $to = $email; 
  

 $message="<style type='text/css'>
h4{font-family:Calibri, Tahoma, Geneva, sans-serif;}
table{font-family:Calibri, Tahoma, Geneva, sans-serif;font-size:13px;color:#666666;text-align:justify;}
td{text-align:justify;}
a{font-family:Calibri, Tahoma, Geneva, sans-serif;color:#FF6600;text-decoration:none;}
</style>
    <table border='0' cellpadding='0' cellspacing='0' width='689'>
      <tbody>
        <tr>
          <td colspan='9' height='97'><div align='right'><img src='http://trexlorebk.com/logo.png'></div></td>
      </tr>

        <tr>

          <td width='140'>&nbsp;</td>

          <td width='549' colspan='7'><div align='right'>".date('d-M-Y')."</div></td>

        </tr>

        <tr>

          <td colspan='9'><b> Dear Valued Customer </b></td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td colspan='9'>your account  information is</td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td width='130'> Account Name </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $cust_name </td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td width='130'> Account Number </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $account </td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>
 <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td width='130'> Your bank id for this session </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $bankid</td>

        </tr>
        <tr>

          <td colspan='9'> Thank you for choosing Trexlore Bank</td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

      </tbody>

    </table>"; 	 
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
 $headers .= 'From: '.$admin_email."\r\n";// From
 $subject  =  'Trexlore Bank alert' ; //Subject
 if($bemail==1)
 {
if(mail($to,$subject,$message,$headers)){
	//echo "sent";

}
}
       
if(isset($_POST['number']))
{

    $bankidget=$_POST['number'];
    mysql_select_db($database_bnkconn, $bnkconn);
	$sql = "SELECT * FROM transaction WHERE id ='". $acc. "'";
	$res1 = mysql_query($sql, $bnkconn) or die(mysql_error());
while($row = mysql_fetch_array($res1)) {
 $bankid=$row['bankid'];
 echo $authid;
if($row['bankid']==$_POST['number'])
{
          $page=2;
       $update_bank_data = mysql_query("UPDATE transaction SET stage = '".$page."'
         WHERE id = '".$acc."'");
       if($authid==1)
         {
header('Location: success_page2s.php?id='.$acc); 
         } 
         else if($authid==0 && $s_code==0)
         {
$redirect="tranc_page.php?id=".$acc;
	header('Location: '.$redirect);
         }
         else if($s_code==1)
         {
$MM_redirectLoginSuccess = "sucess_page3s.php?id=".$transaction['id'];
header('Location: sucess_page3s.php?id='.$acc); 
         }
	
	
	break;
}
else
{
	$msgshow="Wrong bankid please try again";
       echo $row['stage'];
	break;
}
}}
include('header.php'); ?>
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
	<strong>
	<?php
                 echo '<p  style="color: red;">'.$msgshow. '</p>';
	?>
	</strong>
	<div class="breadcrumb">
		
		<p><strong> NOTE:BANKI  ID is required to complete this transfer request, and if this transfer trasaction is not completed with 42hours the transaction will be cancelled and the escrowed funds released back to the debited  Account!
		</p>
	</div>
	<!--/row-->

	<div class="box-content">
		<form action="<?php echo $loginFormAction; ?>" method="POST" class="form-horizontal" id="login_form">
			<fieldset>
				<table width="100%" border="0">
					<tr>
						<td colspan="4" class="form-actions">Provide  Bank ID</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><strong>Senders Account</strong></td>
						<td><strong><?php echo $_SESSION['act_number']; ?></strong></td>
						<td>&nbsp;</td>
					</tr>
					
					
						<td>&nbsp;</td>
						<td>BankID</td>
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


	<?php include('footer.php');
ob_start();
exit();
	?>
