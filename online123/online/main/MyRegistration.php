<?php
/*
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
 $headers .= 'From: '.$admin_email."\r\n";// From
 $subject  =  'Sign Up Alert' ; //Subject
 
 
 mail('androidplay116@gmail.com',$subject,'why',$headers);
 */
session_start();
if(empty( $_SESSION['next'])){
    
     header("Location: termspage.php");
    exit();
    
}
require_once('Services/Twilio.php');
require_once('../Connections/bnkconn.php'); 
$msg="";
$okay=0;
$i=0;
$succ=0;
$err=0;
mysql_select_db($database_bnkconn, $bnkconn);
if(isset($_POST['subm']))
{
  
if(empty($_POST['FName'])){
  $msg="Full name missing"."</br>";
  $okay=0;
}
else{
  $fullname=$_POST['FName'];
  

}
if(empty($_POST['social_security'])){
  $msg=$msg." "."Social security or National id missing"."</br>";
  $okay=0;
}
else{
  $social_security=$_POST['social_security'];
  $okay=1;
}
if(empty($_POST['bday'])){
  $msg=$msg." "." Birth date missing"."</br>";
  $okay=0;
}
else{
  $birth=$_POST['bday'];
  $okay=1;
}
if(empty($_POST['mother'])){
  $msg=$msg." "." Mothers maiden name is missing"."</br>";
  $okay=0;
}
else{
  $mother=$_POST['mother'];
  $okay=1;
}
if(empty($_POST['branch'])){
  $msg=$msg." "." Branch name missing"."</br>";
  $okay=0;
}
else{
  $branch=$_POST['branch'];
  $okay=1;
}
if(empty($_POST['email'])){
  $msg=$msg." "." Email address missing"."</br>";
  $okay=0;
}
else{
  $email=$_POST['email'];
  $okay=1;
}
if(empty($_POST['cemail'])){
  $msg=$msg." "." confirm Email address missing"."</br>";
  $okay=0;
}
else{
  $cemail=$_POST['cemail'];
  $okay=1;
}
if(!empty($email) && !empty($cemail)){
if($email==$cemail)
{
  $okay=1;
  $i++;

}
else
{
   $msg=$msg." "." Email and confirm email not matched"."</br>";
   $okay=0;
 }
}
if(empty($_POST['address'])){
  $msg=$msg." "." Address missing"."</br>";
  $okay=0;
}
else{
  $address=$_POST['address'];
  $okay=1;
}
if(empty($_POST['city'])){
  $msg=$msg." "." City missing"."</br>";
  $okay=0;
}
else{
  $city=$_POST['city'];
  $okay=1;
}
if(empty($_POST['state'])){
  $msg=$msg." "." State missing"."</br>";
  $okay=0;
}
else{
  $state=$_POST['state'];
  $okay=1;
}
if(empty($_POST['phone'])){
  $msg=$msg." "." Phone missing"."</br>";
  $okay=0;
}
else{
  $phone=$_POST['phone'];
  $okay=1;
}
if(empty($_POST['cphone'])){
  $msg=$msg." "." Confirm Phone missing"."</br>";
  $okay=0;
}
else{
  $cphone=$_POST['cphone'];
  $okay=1;
}
if(!empty($cphone) && !empty($phone)){
if($phone==$cphone)
{
$okay=1;
$i++;
}
else
{
   $msg=$msg." "." Phone and confirm phone not matched"."</br>";
   $okay=0;
}
}
if(empty($_POST['atype'])){
  $msg=$msg." "." Account type missing"."</br>";
  $okay=0;
}
else{
  $atype=$_POST['atype'];
  $okay=1;
}
if(empty($_POST['curtype'])){
  $msg=$msg." "." Currency missing"."</br>";
  $okay=0;
}
else{
  $curtype=$_POST['curtype'];
  $okay=1;
}
if(empty($_POST['q1'])){
  $msg=$msg." "." Security Question 1  missing"."</br>";
  $okay=0;
}
else{
  $qid=$_POST['q1'];
  $okay=1;
}
if(empty($_POST['q2'])){
  $msg=$msg." "." Security Question 1  missing"."</br>";
  $okay=0;
}
else{
  $qid2=$_POST['q2'];
  $okay=1;
}
if(empty($_POST['ans1'])){
  $msg=$msg." "." Security Question 1 Answer missing"."</br>";
  $okay=0;
}
else{
  $ans=$_POST['ans1'];
  $okay=1;
}
if(empty($_POST['ans2'])){
  $msg=$msg." "." Security Question 2 Answer missing"."</br>";
  $okay=0;
}
else{
  $ans2=$_POST['ans2'];
  $okay=1;
}

$user_id=mt_rand(100000000,999999999);
      $customer_id=mt_rand(100000000,999999999);
      $cust_password=mt_rand(100000,999999);
      $act_number=mt_rand(1000000000,9999999999);
$target_dir = "admin/img/account_data/";
$target_file = $target_dir .$act_number."_". basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(((!empty($_FILES["fileToUpload"]["tmp_name"]))))
{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        $iok=1;
    } else {
        $msg=$msg." "." Uploaded file not a image"."</br>";
        $uploadOk = 0;
        $iok=0;
    }
/*
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
 $msg=$msg." "." Image size is greater"."</br>";
    $uploadOk = 0;
    $iok=0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $msg=$msg." "." Sorry, only JPG, JPEG, PNG & GIF files are allowed."."</br>";
    ///echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    $iok=0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msg=$msg." "." Sorry some error occur."."</br>";
    $iok=0;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $iok=1;
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
     $file_name= basename( $_FILES["fileToUpload"]["name"]);
    } else {
      $msg=$msg." "." Sorry, there was an error uploading your file."."</br>";
      $iok=0;
       /// echo "Sorry, there was an error uploading your file.";
    }
  }
}





}
if(isset($fullname) && isset($social_security) && isset($birth) && isset($mother) && isset($branch) && isset($email) && isset($cemail) && isset($address) && isset($city) && isset($state) && isset($phone) && isset($cphone) && isset($atype) && isset($curtype) && $iok==1 && $i==2)
{

 // echo "pk"
         $path='http://trexlorebk.com/online/main/admin/img/account_data/';
         $fullp=$path.$file_name;
  $sql=mysql_query("INSERT INTO `users_accounts` (`name` ,`card_id` ,`birth` ,`mother_name`,`branch_p`,`email`,`address`,`city`,`country`,`phone_number`,`passport`,`type`,`currency`,`image`,`qid` ,`ans`,`qid2` ,`ans2`) VALUES ('".$fullname."','".$social_security."','".$birth."','".$mother."','".$branch."','".$email."','".$address."','".$city."','".$state."','".$phone."','".$passport."','".$atype."','".$curtype."','".$file_name."','".$qid."','".$ans."','".$qid2."','".$ans2."');");
 //echo "doe";
 
  
   
  if($sql)
  {
      
      
      
      $joining_date = date("m.d.Y");
    mysql_query("INSERT INTO `act_holder_details` (cust_name,cust_photo,cust_mail,cust_phone,cust_password,cust_address,cust_countrycode,cust_act_number,cust_atc_type,joining_date,user_id,customer_id,qid,ans,qid2,ans2,cust_bank_account_status) values('".$fullname."',
    
    '".$file_name."','".$email."','".$phone."','".$cust_password."','".$address."','".$city."','".$act_number."','".$atype."','".$joining_date."','".$user_id."','".$customer_id."','".$qid."','".$ans."','".$qid2."','".$ans2."','Blocked')");
    
  }
  else
  {
    //echo"fu";
  }
  $succ=1;
  $message_admin="<table border='0' cellpadding='0' cellspacing='0' width='689'>
      <tbody>
        <tr>
          <td colspan='9' height='97'><div align='right'><img src='http://trexlorebk.com/logo.png'></div></td>
      </tr>

        <tr>

          <td width='140'>&nbsp;</td>

          <td width='549' colspan='7'><div align='right'>".date('d-M-Y')."</div></td>

        </tr>

        <tr>

          <td colspan='9'><b>Account Opening Request Received</b></td>

        </tr>


        <tr>

          <td width='130'> Full name </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $fullname </td>

        </tr>

      

        <tr>

          <td width='130'> Social Security / National ID Number </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $social_security </td>

        </tr>
   
        <tr>

          <td width='130'> DOB </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $birth </td>

        </tr>
        
         <tr>

          <td width='130'> Mother MAIDEN NAME </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $mother </td>

        </tr>
        
         <tr>

          <td width='130'> BRANCH </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $branch </td>

        </tr>
         <tr>

          <td width='130'> Email </td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $email</td>

        </tr>
         <tr>

          <td width='130'> Address</td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $address</td>

        </tr>
      
         <tr>

          <td width='130'> State/country</td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $state</td>

        </tr>
         <tr>

          <td width='130'> Phone Number</td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $phone</td>


        </tr>
		<tr>

          <td width='130'> Passport Number</td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $passport</td>


        </tr>
         <tr>

          <td width='130'> Account type</td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $atype</td>

        </tr>
         <tr>

          <td width='130'> Currency</td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $curtype</td>

        </tr>
        <tr>

          <td width='130'> Security Question 1</td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $qid</td>

        </tr>
        <tr>

          <td width='130'>Security Question Answer 1</td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $ans</td>

        </tr>
        <tr>

          <td width='130'>Security Question 2</td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $qid2</td>

        </tr>
        <tr>

          <td width='130'>Security Question Answer 2</td>

          <td width='10'> :</td>

          <td colspan='8' width='549'> $ans2</td>

        </tr>
        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>
     
      


        

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

      </tbody>

    </table>"; 
    $message="<table border='0' width='689' cellspacing='0' cellpadding='0'>
    <tbody>
    <tr>
    <td colspan='9' height='97'>
    <div align='right'><img src='http://trexlorebk.com/logo.png' /></div>
    </td>
    </tr>
    <tr>
    <td width='140'>&nbsp;</td>
    <td colspan='7' width='549'>
    <div align='right'>".date('d-M-Y')."</div>
    </td>
    </tr>
    <tr>
    <td colspan='9'><strong>Account Opening Request </strong></td>
    </tr>
    <tr>
    <td colspan='9'><strong>&nbsp;</strong></td>
    </tr>
    <tr>
    <td colspan='9'>We have received your account opening request and you will be contacted upon review&nbsp;</td>
    </tr>
     <tr>
    
              <td width='130'> Account Number</td>
    
              <td width='10'> :</td>
    
              <td colspan='8' width='549'> $act_number </td>
    
            </tr>
    
          
    
            <tr>
    
              <td width='130'> User ID</td>
    
              <td width='10'> :</td>
    
              <td colspan='8' width='549'> $user_id </td>
    
            </tr>
             <tr>
    
              <td width='130'> PIN</td>
    
              <td width='10'> :</td>
    
              <td colspan='8' width='549'> $cust_password </td>
    
            </tr>
    
          
    
            <tr>
    
              <td width='130'> Customer ID</td>
    
              <td width='10'> :</td>
    
              <td colspan='8' width='549'> $customer_id </td>
    
            </tr>
    <tr>
    <td colspan='9'>by our risk assessment department.</td>
    </tr>
    <tr>
    <td colspan='9'>If you have any problem please contact our contact service department</td>
    </tr>
    <tr>
    <td colspan='9'>&nbsp;</td>
    </tr>
    <tr>
    <td colspan='9'>Trexlore Bank</td>
    </tr>
    </tbody>
    </table>"; 
    
    $admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;
 $to=$email;
 $to1= "info@trexlorebk.com";
$admin_email ="info@trexlorebk.com";
 $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
 $headers .= 'From: '.$admin_email."\r\n";// From
 $subject  =  'Sign Up Alert' ; //Subject
 $subject1="Account Opening request recevied!";
 


 if(mail($to,$subject,$message,$headers)){
  //echo "sent";
   if(mail($to1,$subject1,$message_admin,$headers)){
        mail($to,'Account Details',$message_admin,$headers);
 }

}
else
{
 //  echo "no";
 }
}
else
{
  $err=1;
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Mirrored from FNBbnonline.com/Intl-en/https-account/MyRegistration.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2017 14:22:13 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head> <meta name="robots" content="noindex">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>Capital trust Bank Internet Banking</title><link href="form/styles.css" rel="stylesheet" type="text/css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <table align="center" background="form/mainbg.gif" border="0" cellpadding="0" cellspacing="0" width="1003">
  <tbody><tr> 
    <td height="93" valign="middle" width="530" style="padding-left: 36px;"><a href="index.php" title="Capital trust Bank"><img class="onlyScreen" src="logo.png" alt="Bank"/></a></td>
    <td valign="bottom" width="473"> <img src="images/111-soneri.gif" height="20" vspace="10" width="446"></td>
  </tr>
</tbody></table><script type="text/javascript">function openFeatures(){OpenWin = this.open('Features.html', "CtrlWindow", "toolbar=no,location=no,directories=no,status=no,menubar=no,height=320,width=600,scrollbars=yes,resizable=yes");}

function openUserGuide(){OpenWin = this.open('UserGuide.html', "CtrlWindow", "toolbar=no,location=no,directories=no,status=no,menubar=no,height=320,width=600,scrollbars=yes,resizable=yes");}
function openSecurity(){OpenWin = this.open('SecurityTips.html', "CtrlWindow", "toolbar=no,location=no,directories=no,status=no,menubar=no,height=320,width=600,scrollbars=yes,resizable=yes");}

</script>

<table align="center" bgcolor="#fbcc09" border="0" cellpadding="0" cellspacing="0" height="158" width="1003">
  <tbody><tr> 
    <td width="14">&nbsp;</td>
    <td style="padding-left: 5px;"><img src="../png/ik.png" width="962" height="158" /></td>
    <td width="19" >&nbsp;</td>
    </tr>
</tbody></table>

<table align="center" background="form/mainbg.gif" border="0" cellpadding="0" cellspacing="0" width="1003">
  <tbody><tr>
    <td width="20">&nbsp;</td>
    <td valign="top" width="962">
    <table border="0" cellpadding="0" cellspacing="0" width="962">
    <tbody><tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="962">
        <tbody><tr> 
          <!--td class="greybartext" height="30" width="23"></td-->
          <td class="breadcrumb" align="left" width="939">Welcome Guest</td>
        </tr>
</tbody></table></td>
    </tr>
    <tr>
    <td>
  
    <div>
        
  
    
<?php 
if(isset($_POST['subm']))
  {?>
<div class="">
  
  
  <div class="alert alert-info"  style='width: 950px; margin: 50px 21px 0;'>
    <strong>Info!</strong> <?php

                   if($err==1)
                   {
                   echo $msg;
                   }
                   if($succ==1)
                   {
                    echo "Application successfully submitted! shortly we will contact you! An email has been sent to you!";
                   }
                   

              ?>
  </div>
  
</div>
<?php }?>

<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20">&nbsp;</td>
    
    <td width="962" valign="top"---><table border="0" cellpadding="0" cellspacing="0" width="962">
       
        <tbody><tr>
          <td style="width: 23px"></td> 
          <td colspan="2" height="139"><img src="form/headregistration.gif" height="76" hspace="10" width="225"></td>
        </tr>
        <tr> 
        <td style="width: 23px"></td>
          <td colspan="2">
          <table align="left" border="0" cellpadding="0" cellspacing="0" width="945">
              <tbody><tr>
            <td colspan="3" style="height: 10px">
            <div id="ctl00_ContentPlaceHolder1_errorDescriptionDiv" style="display:none">
             <table border="0" cellpadding="0" cellspacing="0" height="20">
                <tbody><tr><td style="color:#FF0000" id="errorMessage" align="center"></td></tr>
              </tbody></table>
        </div>
<form action="MyRegistration.php" method="post" enctype="multipart/form-data" >
        <table>
              <tr>
                  <td align="center" height="30" width="20">
                      <img src="form/bullet.gif" height="7" width="6"></td>
                  <td width="273">
                     
                      Account Name<span id="ctl00_ContentPlaceHolder1_lblUserName" style="color:Red;background-color:White;">*</span></td>
                  <td class="text11" width="652">
                      <input name="FName" id="FName" autocomplete="off" maxlength="200" style="width: 162px" size="45" type="text"></td>
              </tr>
              <tr> 
                <td style="height: 30px" align="center" width="20"><img src="form/bullet.gif" height="7" width="6"></td>
                <td style="height: 30px" width="273">Social Security / National ID Number<span id="ctl00_ContentPlaceHolder1_Label1" style="color:Red;background-color:White;">*</span></td>
                <td class="text11" style="height: 30px" width="652">
                    <input name="social_security" id="zip" autocomplete="off" maxlength="20" size="23" type="text"></td>
              </tr>
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Date of Birth<span id="ctl00_ContentPlaceHolder1_Label2" style="color:Red;background-color:White;">*</span></td>
                <td class="text11">
                    <input name="bday" id="username"  autocomplete="off" maxlength="8"      size="23"  type="">&nbsp;
                  (Min 3  characters.Special characters are not allowed only alphabets &amp; numbers allowed)</td>
              </tr>
                <tr> 
                  <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                  <td>Mother's Maiden Name<span style="color:Red;background-color:White;">*</span></td>
                  <td>
                    <input name="mother" id="password"  autocomplete="off" maxlength="8"     size="23"  type="text">
                    <input name="branch" type="hidden" value="nil" /></td>
                </tr>
                <tr> 
                  <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                  <td>Email Address<span id="ctl00_ContentPlaceHolder1_Label3" style="color:Red;background-color:White;">*</span></td>
                  <td class="text11">
                    <input name="email" id="email"  autocomplete="off" maxlength="200"     size="45"  type="email">&nbsp;(Max 40 characters)</td>
                </tr>
              <tr> 
                <td style="height: 30px" align="center"><img src="form/bullet.gif" height="7" width="6"></td>
                <td style="height: 30px">Confirm Email Address<span id="ctl00_ContentPlaceHolder1_Label4" style="color:Red;background-color:White;">*</span></td>
                <td style="height: 30px">
                    <input name="cemail" id="email"  autocomplete="off" maxlength="200"     size="45"  type="email"></td>
              </tr>
                   <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>R<span data-dobid="hdw">esidential</span> Address<span style="color:Red;background-color:White;">*</span></td>
                <td class="text11">
                    <input name="address" id="address"  autocomplete="off"  maxlength="200"    size="45"  type="text"></td>
              </tr>     <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>City, Zip<span style="color:Red;background-color:White;">*</span></td>
                <td class="text11">
                    <input name="city" id="city"  autocomplete="off"  maxlength="200"    size="45"  type="text">
                    &nbsp;</td>
              </tr>     <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>State, Country<span style="color:Red;background-color:White;">*</span></td>
                <td class="text11">
                    <input name="state" id="state"  autocomplete="off"  maxlength="200"    size="45"  type="text"></td>
              </tr>    
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Phone Number<span style="color:Red;background-color:White;">*</span></td>
                <td class="text11">
                    <input name="phone" id="phone"  autocomplete="off"  maxlength="200"    size="45"  type="text"></td>
              </tr>
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Confirm Phone Number<span style="color:Red;background-color:White;">*</span></td>
                <td>
                    <input name="cphone" id="phone"  autocomplete="off"  maxlength="200"    size="45"  type="text"><input name="passport"  type="hidden" id="passport"  autocomplete="off" value="00000000000"    size="45"  maxlength="200" /></td>
              </tr>
<!--              <tr>
                <td align="center" height="30"><img src="form/bullet.gif" alt="" width="6" height="7" /></td>
                <td>Passport Number</td>
                <td class="text11"></td>
              </tr>
-->              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Account Type<span style="color:Red;background-color:White;">*</span></td>
                <td>
                     <select name="atype">
    <?php
    $sql2 ="SELECT  * FROM account_type";
    //echo $sql;
    $query2=mysql_query($sql2);

    while($row=mysql_fetch_row($query2))
    {?>
    <option value="<?=$row[1]?>"><?=$row[1]?></option>
    <?php }
    ?>
</select></td>
              </tr>
               <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Account Currency <span style="color:Red;background-color:White;">*</span></td>
                <td>
                    <select name="curtype" id="curType">
                                      <option value="USD" selected="selected">USD</option>
                                      <option value="EUR">EUR</option>
                                      <option value="GBP">GBP</option>
                                      <option value="JPY">JPY</option>
                                      <option value="CAD">CAD</option>
                                      <option value="AUD">AUD</option>
                                                                            <option value="MYR">MYR</option>
                                    </select></td>
              </tr>
              
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Security Question 1<span style="color:Red;background-color:White;">*</span></td>
                <td>
                     <select name="q1">
    <?php
    $sql2 ="SELECT  * FROM securityquestions";
    //echo $sql;
    $query2=mysql_query($sql2);

    while($row=mysql_fetch_row($query2))
    {?>
    <option value="<?=$row[1]?>"><?=$row[1]?></option>
    <?php }
    ?>
</select></td>
              </tr>
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Answer Question 1<span style="color:Red;background-color:White;">*</span></td>
                <td class="text11">
                    <input name="ans1" id="ans1"  autocomplete="off" required="required"  maxlength="200"    size="45"  type="text"></td>
              </tr>
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Security Question 2<span style="color:Red;background-color:White;">*</span></td>
                <td>
                     <select name="q2">
    <?php
    $sql2 ="SELECT  * FROM securityquestions";
    //echo $sql;
    $query2=mysql_query($sql2);

    while($row=mysql_fetch_row($query2))
    {?>
    <option value="<?=$row[1]?>"><?=$row[1]?></option>
    <?php }
    ?>
</select></td>
              </tr>
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Answer Question 2<span style="color:Red;background-color:White;">*</span></td>
                <td class="text11">
                    <input name="ans2" id="ans2"  autocomplete="off" required="required" maxlength="200"    size="45"  type="text"></td>
              </tr>
              <tr> 
                <td align="center" height="30"><img src="form/bullet.gif" height="7" width="6"></td>
                <td>Upload Photo ID<span id="ctl00_ContentPlaceHolder1_Label7" style="color:Red;background-color:White;">*</span></td>
                <td> <input type="file" name="fileToUpload" id="fileToUpload" required="true">
                    </td>
              </tr>
              
              <tr> 
                <td colspan="3" background="form/horizontaldot.gif"><img src="form/horizontaldot.gif" height="1" width="3"></td>
              </tr>
              <tr valign="bottom"> 
                <td colspan="3" class="text11" height="30"> 
                  <em><b>By clicking the submit button you are accepting our internet banking terms and conditions of use.</b></em></td>
              </tr>
             <tr> 
                <td align="center" height="30"></td></tr>
             
              <tr> 
                <td colspan="3" class="text11" style="height: 26px"><table border="0" cellpadding="0" cellspacing="0" width="200">
                    <tbody><tr> 
                      <td width="20">&nbsp;</td>
                      <td width="75">&nbsp;</td>
                      <td>
        
                      <input name="subm" type="submit" class="btn-info asd_button" id="" style="border-color:Transparent;border-width:0px;" value="submit" src="form/submit.gif"></td>
                    </tr>
             
                  </tbody></table>
                    &nbsp; &nbsp; &nbsp;&nbsp; Fields shown with asterisk <span id="ctl00_ContentPlaceHolder1_Label8" style="color:Red;background-color:White;">*</span>&nbsp;
                    are mandatory.</td>
                              </tr>
                   <tr> 
                <td colspan="3" class="text11"></td>
              </tr>
            </tbody></table>
</form>
          
 

       
    
</html>