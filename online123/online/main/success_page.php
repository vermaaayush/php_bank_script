<?php 
ob_start();
require_once('sms/sms_alerts.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1, maximum-scale=1, width=device-width" name="viewport">
    <link href="../stylesheets/application.css?1325743336" media="screen" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/ui-progress-bar.css?1325742643" media="screen" rel="stylesheet" type="text/css" />
    <script src="../javascripts/application.js?1325742642" type="text/javascript"></script>
        <link href="../stylesheets/application.css?1325743336" media="screen" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/ui-progress-bar.css?1325742643" media="screen" rel="stylesheet" type="text/css" />
        <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
  <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <style type="text/css">
    .index #container #stage .intro article {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
    .index table tr td {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size: 12px;
}
    .index #container #stage .intro #sub table tr td strong {
  font-weight: bold;
}
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 14;
  -moz-border-radius: 14;
  border-radius: 14px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 40px 10px 40px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

.btnt {
  background: #d93455;
  background-image: -webkit-linear-gradient(top, #d93455, #c20808);
  background-image: -moz-linear-gradient(top, #d93455, #c20808);
  background-image: -ms-linear-gradient(top, #d93455, #c20808);
  background-image: -o-linear-gradient(top, #d93455, #c20808);
  background-image: linear-gradient(to bottom, #d93455, #c20808);
  -webkit-border-radius: 14;
  -moz-border-radius: 14;
  border-radius: 14px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 40px 10px 40px;
  text-decoration: none;
}

.btnt:hover {
  background: #420e1d;
  background-image: -webkit-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: -moz-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: -ms-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: -o-linear-gradient(top, #420e1d, #ff0d0d);
  background-image: linear-gradient(to bottom, #420e1d, #ff0d0d);
  text-decoration: none;
}
    </style>
  </head>

<?php 
ob_start();
session_start();
//require_once('Services/Twilio.php');
require_once('../Connections/bnkconn.php'); ?>
<?php
///echo $acc
$msg="";
$i=0;
mysql_select_db($database_bnkconn, $bnkconn);
$sql2="SELECT * FROM act_holder_details WHERE cust_act_number='".$_SESSION['act_number']."'";
      // mysql_select_db('usmetro65');
        $detailsget = mysql_query($sql2);
         while($dt = mysql_fetch_array($detailsget)) {
          $bnkid=$dt["bankidreq"];
          $authid=$dt["authcodereq"];
            $email=$dt["cust_mail"];
          $cust_name=$dt["cust_name"];
          $s_code=$dt["clearancereq"];
          $number=$dt["number"];
          $countrycode = $dt["cust_countrycode"];
          $phone = $dt["cust_phone"];
        }
if (isset($_GET['amount'])) {
    //  echo  $_SESSION['idforproc'];
        $_SESSION['amount']=$_GET['amount'];

          $sql3 = "SELECT * FROM transaction WHERE id ='". $_SESSION['idforproc']. "'";
     //  mysql_select_db('usmetro65');
        $detailsgett = mysql_query($sql3);
         while($dtt = mysql_fetch_array($detailsgett)) {
          $account=$dtt["act_number"];
           $number=$dtt['number'];
         //  echo $number;
         $msg= "Dear $fetch_acc1->cust_name, Trexlore Bank Transfer alert.Your Transfer Token ID for this Transaction is   $number . Thank you for choosing Trexlore Bank.";
balance_alert(+$countrycode,$phone,$msg);
          
         }


        }
if (isset($_GET['id'])) {
       /// echo $_GET['id'];
  $idtocheck=$_GET['id'];
  $_SESSION['accountn']=$idtocheck;
  $acc=$_SESSION['accountn'];
  $_SESSION['idforproc']=$acc;
     $sql3 = "SELECT * FROM transaction WHERE id ='". $_SESSION['idforproc']. "'";
     //  mysql_select_db('usmetro65');
        $detailsgett = mysql_query($sql3);
         while($dtt = mysql_fetch_array($detailsgett)) {
          $account=$dtt["act_number"];
           $number=$dtt['number'];
          
         }
    }
$msgshow="";

$loginFormAction = $_SERVER['PHP_SELF'];
$acc=$_SESSION['accountn'];
///echo $acc;
/*
$sql2="SELECT * FROM act_holder_details WHERE cust_act_number='".$_SESSION['act_number']."'";
       //mysql_select_db('usmetro65');
        $detailsget = mysql_query($sql2);
         while($dt = mysql_fetch_array($detailsget)) {
          $bnkid=$dt["bankidreq"];
          $authid=$dt["authcodereq"];
            $email=$dt["cust_mail"];
          $cust_name=$dt["cust_name"];
          $s_code=$dt["clearancereq"];
          $authemail=$dt["authemail"];

         }

*/

         $admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;
//echo $email;
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

          <td colspan='9'>Token requesting account information</td>

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

          <td width='130'> Token ID </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $number </td>

        </tr>
        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>
 <tr>

          <td colspan='9'>&nbsp;</td>

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
if($number!="")
 {
if(mail($to,$subject,$message,$headers)){

$i=1;
$msg= "Token ID has been sent to your email on file, please retrieve and enter to proceed!";
}
}
  
//if(isset($_POST['number'])){
if(isset($_POST['number']))
{
$sql2="SELECT * FROM act_holder_details WHERE cust_act_number='".$_SESSION['act_number']."'";
      // mysql_select_db('usmetro65');
        $detailsget = mysql_query($sql2);
         while($dt = mysql_fetch_array($detailsget)) {
          $bnkid=$dt["bankidreq"];
          $_SESSION['bankidcheck']=$bnkid;
          $authid=$dt["authcodereq"];
          $_SESSION['authidcheck']=$authid;
            $email=$dt["cust_mail"];
          $cust_name=$dt["cust_name"];
          $s_code=$dt["clearancereq"];
          $_SESSION['scodecheck']=$s_code;
          $authemail=$dt["authemail"];
        //  echo $bnkid;
           $bankidget=$_POST['number'];
         }
      // }
          // echo $bankidget;
           //echo $_SESSION['idforproc'];
  mysql_select_db($database_bnkconn, $bnkconn);
  $sql = "SELECT * FROM transaction WHERE id  ='". $_SESSION['idforproc']. "'";
  $res1 = mysql_query($sql, $bnkconn) or die(mysql_error());
while($row = mysql_fetch_array($res1)) {
 $authcode=$row['number'];
}
 ///echo $authcode;
if($authcode==$_POST['number'])
{
//echo $authcode;  echo $acc;
  $page=1;
   $update_bank_data = mysql_query("UPDATE transaction SET stage = '".$page."'
         WHERE id = '".$acc."'");
header('Location: confirm.php');
       }
else
{
  $i=2;
  $msg="Wrong Token ID please try again";
  //   echo $row['stage'];
  
}
}
include('header.php'); 
?>
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
    
    <p><strong> NOTE: Token Number is required to complete this transfer request, if this transaction is not completed within 42hours the transaction will be cancelled and the funds will be released back to the debited account.
    </p>
  </div>
  <!--/row-->
<?php
if($i==1)
{
  echo '<p style="color:red">'.$msg.'</p>';
}
if ($i==2) {
   echo '<p style="color:red">'.$msg.'</p>';
}

?>
 <body class="index">
    <div id="container">
      <header>
      </header>
      <div id="stage">
        <section class="work">
          <h3> Your transfer request is currently being processed</h3>
          <div class="ui-progress-bar ui-container" id="progress_bar">
            <div class="ui-progress" style="width: 10%;">
              <span class="ui-label" style="display:none;">
                Initiating Interbank Swift Transfer
                <b class="value">30%</b>
              </span>
            </div>
          </div>
        </section>
        <section class="intro" style="">
          <article>
            <h2>ERROR CODE 547: Swift Transfer Interrupted</h2>
            <p>
              The transfer process has been suspended, please provide your Token Number in other to proceed with this transfer.
            </p>
            <p>
              Please if you have any problem, do not hesitate to contact your account officer.
            </p>
            <p>
              <i>Trexlore Bank Internet Banking service.</i>
            </p>
            <p>
          <form action="success_page.php" method="post"  id="sb"><table width="70%" border="0">
  <tr>
    <td><strong>Token Id</strong></td>
    <td><span id="codetx"><input name="number" text" id="code" size="30"><span class="textfieldRequiredMsg">Token id</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.<span></span></span></span></td>
    <td>&nbsp;</td>
  </tr>
</table>

            </p>
           <div class="download">
            <ol class="links"><table width="41%" border="0">
  <tr>
    <td><input type="submit" name="sub" id="sub" value="Complete Transfer" class="btn"></td>
    <td><input type="submit" name="sub" id="sub" value="Cancel Transaction" class="btnt"></td>
  </tr>
</table>
            </ol>
            <ol class="links">
            </ol>
          </div><input name="static" type="hidden" id="static" value="playme"></form>
        </section>
        <!--<section class="compatibility" style="display: none;">
          <h2>Compatibility</h2>
          <ol class="browsers">
            <li class="browser" id="chrome">
              <p>Google Chrome 12+</p>
            </li>
            <li class="browser" id="firefox">
              <p>Firefox 5+</p>
            </li>
            <li class="browser" id="safari">
              <p>Safari 5+</p>
            </li>
            <li class="browser" id="opera">
              <p>Opera 11+</p>
            </li>
            <li class="browser" id="ie">
              <p>Internet Explorer 9+</p>
            </li>
          </ol>
          <article>
            <p>
              This progress bar will work in the latest version of all major browsers to provide full compatibility with animation, gradients, and shadows, and degrade gracefully in older versions, however
              <abbr title="Your Mileage May Vary">YMMV</abbr>
            </p>
          </article>
        </section>-->
        <!--<section class="wild" style="display: none;">
          <h2>
            In the wild
            <span>Who's using it?</span>
          </h2>
          <ol class="users">
            <li class="user" id="sparrow">
              <a rel="nofollow" href="http://sprw.me/comingsoon/">Sparrow for iPhone</a>
            </li>
            <li class="user" id="test_pilot">
              <a href="http://testpilot.me">TestPilot CI</a>
            </li>
            <li class="user" id="add">
              <a rel="twipsy" title="I'm using this!" href="https://github.com/ivanvanderbyl/ui-progress-bar/issues/new?title=[INSERT+PROJECT]+is+using+this">I'm using it!</a>
            </li>
          </ol>
        </section>-->
      </div>
      <script>
        //<![CDATA[
          $(function() {
            App.init();  
          });
        //]]>
      </script>
      
  </div>
  </body>


  <?php include('footer.php');
  ob_start();
exit(); ?>