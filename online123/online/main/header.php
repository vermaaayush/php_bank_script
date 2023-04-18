<?php require_once('../Connections/bnkconn.php'); ?>
<?php
session_start();
include("conn.php");
//include('sms/sms_alerts.php');

if(!isset($_SESSION["username"]) && !isset($_SESSION['act_number'])) {

header("location:index.php");

}

$get_details = mysql_fetch_array(mysql_query("SELECT * FROM act_holder_details WHERE cust_act_number = '".$_SESSION['act_number']."'"));

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


?>

<!DOCTYPE html>

<html lang="en">


<head>

  

  <meta charset="utf-8">

  <title>Customer Console</title>
  <Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="">
        
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    
    <META HTTP-EQUIV="Expires" CONTENT="-1">

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1, maximum-scale=1, width=device-width" name="viewport">
    <link href="stylesheets/application.css?1325743336" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/ui-progress-bar.css?1325742643" media="screen" rel="stylesheet" type="text/css" />
    <script src="javascripts/application.js?1325742642" type="text/javascript"></script>

  <!-- The styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="css/global_all.css" type="text/css" rel="stylesheet" media="all">
          
        <link href="../css/bar.css" rel="stylesheet" type="text/css">

    <link href="css/standard_all.css" type="text/css" rel="stylesheet" media="all">

    <link href="css/global_print.css" type="text/css" rel="stylesheet" media="print">

    <link href="css/standard_print.css" type="text/css" rel="stylesheet" media="print">

    <link href="css/global_screen.css" type="text/css" rel="stylesheet" media="screen">

    <link href="css/standard_screen.css" type="text/css" rel="stylesheet" media="screen">

          <link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">



    <script type="text/javascript" src="js/common.js"></script>

    <script type="text/javascript" src="js/pm_fp.js"></script>    



  <!-- The fav icon -->

  <link rel="shortcut icon" href="img/favicon.ico">

    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>

<style>
    .av_head{color:white;font-weight: bold;font-style: initial;text-align: center;opacity:2;}
    .av_headbox{background-color:rgba(0, 0, 0, 0.5);margin-left:28%;width:40%;padding:25px;}
    .av_menu{margin-top:15px;background-color:rgba(0, 0, 0, 0.5);padding:7px;height:30px;}
    .av_tb_p{color:white;font-size:20px;text-align:center;margin-top:5px;}
    .av_imagebox{margin-top:50px;background-color:rgba(0, 0, 0, 0.5);padding:5px;height:auto;width:70%;margin-left:15%;}
    
     .av_headx ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
}

.av_headx li {
  float: right;
}

.av_headx li  {
  display: block;
  color: #5a5a5a;
  text-align: center;
  padding: 18px 25px;
  text-decoration: none;
  font-size: 20px;
  margin-right:2%;
  font-family: "Trebuchet MS";
}

 @media screen and (max-width: 550px) {
  #right_part {width:100%;}
  #left_part {width:100%;}
  
  #menu_toggle {display: none;}
  
  #button_toggle  {display:block;}
  
  #logo_toggle {width:50%;}
  
 
}

 @media screen and (min-width: 550px) {

  
  #logo_toggle {width:20%;}
  
  #button_toggle  {display:none;}
}






</style>
</head>

<body >
    
<script>
function myFunction() {
  var x = document.getElementById("menu_toggle");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

  <div class="container-fluid">

    <div class="row-fluid">

    

    

      <!-- left menu starts --><!--/span-->

      <!-- left menu ends -->

      

      <noscript>

      </noscript>

      

    <!--  <div id="content" class="span10">-->
  <div id="content" class="">
      <!-- content starts -->

      
    <div style="width: 100%;margin-top:10px" class="av_headx">
        <div style="float: left;"   id="logo_toggle">
             <a style="padding:0;margin-left:7%" href="index.php"><img src="logo.png" alt="[bank]" width="" height="50" border="0" /></a>
             
             
             
        </div>
        <div style="float:left;width: 78%" id="menu_toggle">
            
          <?php
          $get_data = mysql_query("select * from act_holder_details where cust_act_number = '".$_SESSION['act_number']."'");
          $get_data_fetch = mysql_fetch_array($get_data);
          $sql_led=mysql_query("select * from cust_act_details where `cust_act_no`='".$_SESSION['act_number']."'");
           $led_balance=mysql_fetch_array($get_data);
          ?>

             <ul>
               
               
               
               <li style="font-family:Trebuchet MS;font-size:15px"><a style="font-family:Times New Roman, Times, serif" class="logout" href="logout.php">Sign Out</a></li>
               <li style="font-family:Trebuchet MS;font-size:15px"><img src="admin/img/account_data/<?php echo $get_details[cust_act_number]."_".$get_details[cust_photo]; ?>" width="30" height="30" style=";border-radius: 50%;"/><?php
                             if(isset($_SESSION['username'])) {
                                echo $get_details['cust_name']; ?>
            
                              <?php }
                                 else 
                               {
                                   ?>
                                    admin
                                    <?php } ?></li>
              <li style="font-family:Trebuchet MS;font-size:15px"><span style="color: #03A9F4">Account no:</span><br><span><?php echo $get_data_fetch['cust_act_number']; ?></span></li>
               <li style="font-family:Trebuchet MS;font-size:15px"><span style="color: #53c28c">Balance:</span><br><span><?php echo number_format($row_acc['present_balance'],2,'.',','); ?></span></li>
               <li style="font-family:Trebuchet MS;font-size:15px">Dashboard</li>
               
             
            
             </ul>
             
           
        </div>
             
           <div style="float:right;" id="button_toggle">
               <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>  
           </div> 
            
    </div>

<!-- topbar ends -->

  

  <div class="container-fluid" >

    <div class="row-fluid" >

    

    

      <!-- left menu starts -->

      <div class="span2 " id="right_part">

        <div class="nav-collapse sidebar-nav" >


               

                <?php

        //echo $_SESSION['act_number'];exit;

        if(isset($_SESSION['act_number'])) { /* Custmore Menu */

        ?>

                    <ul class="nav main-menu" >

            <!--<li class="nav-header hidden-tablet">Customer Panel</li>-->

            <li><a class="ajax-link" href="dashboard.php"><span class="hidden-tablet" style="font-family:Trebuchet MS;font-size:15px"> Accounts </span></a></li>

            

                      <!--<li class="nav-header hidden-tablet">Account</li>-->

                        <li><a class="ajax-link" href="act_details.php"><span class="hidden-tablet" style="font-family:Trebuchet MS;font-size:15px"> Profile</span></a></li>
                        
                        <li><a class="ajax-link" href="fund_transfer.php"><span class="hidden-tablet" style="font-family:Trebuchet MS;font-size:15px"> Fund Transfer</span></a></li>
                        <!--<li><a class="ajax-link" href="fund_transfer.php"><i class="icon-edit"></i><span class="hidden-tablet"> Fund Transfer </span></a></li>-->

                        <li><a class="ajax-link" href="cust_transaction_details.php"><span class="hidden-tablet" style="font-family:Trebuchet MS;font-size:15px"> Transfers</span></a></li>

                        <li><a class="ajax-link" href="cust_statement.php"><span class="hidden-tablet" style="font-family:Trebuchet MS;font-size:15px"> Statement </span></a></li>

                        <li><a class="ajax-link" href="cust_mini_statement.php"><span class="hidden-tablet" style="font-family:Trebuchet MS;font-size:15px"> References</span></a></li>

                       <!-- <li class="nav-header hidden-tablet">Cheque</li>-->

                        <li><a class="ajax-link" href="request_chequebook_view.php"><span class="hidden-tablet" style="font-family:Trebuchet MS;font-size:15px"> Cheque</span></a></li>
                        
                        <li><a class="ajax-link" href="send_msg.php"><span class="hidden-tablet" style="font-family:Trebuchet MS;font-size:15px"> Customer Care</span></a></li>

                        <li><a class="ajax-link" href="Pending_transactions.php"><span class="hidden-tablet" style="font-family:Trebuchet MS;font-size:15px"> Pending Transfer</span></a></li>

                        <!--<li class="nav-header hidden-tablet">Card</li>-->

                        <!--<li><a class="ajax-link" href="request_card_view.php"><i class="icon-edit"></i><span class="hidden-tablet"> Request Card </span></a></li>-->

                        <!--<li class="nav-header hidden-tablet">Send Message To ADMIN</li>-->

                        <!--<li><a class="ajax-link" href="view_msg.php"><i class="icon-edit"></i><span class="hidden-tablet"> Send Message </span></a></li>-->

                       

          </ul>

        <?php } ?>  

        </div><!--/.well -->

      </div><!--/span-->

      <!-- left menu ends -->

      

      <noscript>

        <div class="alert alert-block span10">

          <h4 class="alert-heading">Warning!</h4>

          <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>

        </div>

      </noscript>

      

  




			<div id="content" class="span10"  id="left_part">
