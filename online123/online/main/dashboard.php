<?php require_once('../Connections/bnkconn.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
if(!isset (	$_SESSION['custid']))
{
    unset ($_SESSION['username']);
    	header('Location: index.php');
    
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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


 
session_start();
 
include "conn.php";
//$userid=$_REQUEST['userid'];

$sql=mysql_query("select * from act_holder_details where `user_id`='".$_SESSION["username"]."'");
$get_details=mysql_fetch_assoc($sql);
$_SESSION['act_number']=$get_details['cust_act_number'];
$currency=$get_details['currency'];
$cust_bank_account_status = $get_details['cust_bank_account_status'];
if($currency=="")
{
  $currency="USD";
}
$_SESSION['currency']=$currency;
?>

		<script type="text/javascript" type="application/javascript">
		<style type="text/css">
		.we {
	text-align: right;
}
        </style>
		
        function bank_trf()
		{
			window.location.href= 'fund_transfer.php'

		}
        </script>
        <?php

//include('sms/sms_alerts.php');

if(!isset($_SESSION["username"]) && !isset($_SESSION['act_number'])) {

header("location:index.php");

}

$get_details = mysql_fetch_array(mysql_query("SELECT * FROM act_holder_details WHERE cust_act_number = '".$_SESSION['act_number']."'"));

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
    .av_imagebox{margin-top:90px;background-color:rgba(0, 0, 0, 0.5);padding:5px;height:auto;width:70%;margin-left:15%;}
    
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




    
</style>
</head>

<body>

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
        <div style="float: left;width: 20%" >
             <a style="padding:0;margin-left:7%" href="index.php"><img src="logo.png" alt="[bank]" width="" height="50" border="0" /></a>
        </div>
        <div style="float:left;width: 78%">
          <?php
          $get_data = mysql_query("select * from act_holder_details where cust_act_number = '".$_SESSION['act_number']."'");
          $get_data_fetch = mysql_fetch_array($get_data);
          $sql_led=mysql_query("select * from cust_act_details where `cust_act_no`='".$_SESSION['act_number']."'");
           $led_balance=mysql_fetch_array($get_data);
          ?>

             <ul>
               
               
               
               <li style="font-family:Trebuchet MS;font-size:15px"><a href="logout.php">Sign Out</a></li>
               <li style="font-family:Trebuchet MS;font-size:15px"><img src="admin/img/account_data/<?php echo $get_details[cust_act_number]."_".$get_details[cust_photo]; ?>" width="25" height="25" style=";border-radius: 50%;"/><?php
                             if(isset($_SESSION['username'])) {
                                echo $get_details['cust_name']; ?>
            
                              <?php }
                                 else 
                               {
                                   ?>
                                    admin
                                    <?php } ?></li>
               <li style="font-family:Trebuchet MS;font-size:15px"><span>Account no:</span><br><span><?php echo $get_data_fetch['cust_act_number']; ?></span></li>
               <li style="font-family:Trebuchet MS;font-size:15px"><span>Balance:</span><br><span>$<?php echo number_format($row_acc['present_balance'],2,'.',','); ?></span></li>
               <li style="font-family:Trebuchet MS;font-size:15px">Dashboard</li>
               
             
            
             </ul>
        </div>
             
             
            
    </div>

<!-- topbar ends -->

  

  <div class="container-fluid" >

    <div class="row-fluid" >

    

    

      <!-- left menu starts -->

      <div class="span2 " >

        <div class="nav-collapse sidebar-nav" >


               

                <?php

        //echo $_SESSION['act_number'];exit;

        if(isset($_SESSION['act_number'])) { /* Custmore Menu */

        ?>

<ul class="nav   main-menu" >

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

      

      <div id="content" class="span10">

		    
            </div>
            

     <!--make by avi-->      		
				<div class="box span12" style="width:83%; margin:0 0 0 16px;height:600px;margin-top:-25px;">
                   
				    <div style="background-image: url('bg-image.jpg');height:90%;  background-position: center; background-repeat: no-repeat; background-size: cover;opacity: 0.9;padding:2%;" >
				      <!-- content -->
				      
				     
				      <p  style="text-align: right;color:black;font-weight: bold"> <?php echo date("F j, Y, g:i a");   ?></p>
				      <?php include "menu.php";?>
				       <!-- content end --> 
				       
				       <div class="av_imagebox">
                <h1 style="text-align: center;color:white;font-family:Times New Roman, Times, serif;">Trexlore Bank ACCOUNT DASHBOARD</h1>
				           <h3><h3 style="text-align: center;color:#39d4b5" class="av_head">WELCOME, <?php
                             if(isset($_SESSION['username'])) {
                                echo $get_details['cust_name']; ?>
            
                              <?php }
                                 else 
                               {
                                   ?>
                                    admin
                                    <?php } ?>
                        </h3></h3>
                        <h4 style="text-align: center;color:white;font-family:Times New Roman, Times, serif;">A lovely day it is today.</h4>

				           
				            <?php  if($cust_bank_account_status=='Suspended' 
					|| $cust_bank_account_status=='Blocked' ){?>
					<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
   <h3 style='color:red'>
				    <?php
				    if($cust_bank_account_status=="Blocked")
				    {
				      echo "Account is Blocked";  
				    }
				    else if($cust_bank_account_status=="Suspended"){
				        echo "Account is  Restricted"; 
				    }?>
				    
			</h3>
</div>
<?php } ?>







				       </div>
				       				
				       
				    <div class="box-content" style="margin-top:100px" style="background: rgba(0, 0, 0, 0.5);padding:15px;color:white">
                    <?php
          $get_data = mysql_query("select * from act_holder_details where cust_act_number = '".$_SESSION['act_number']."'");
          ?>
                    <table width="50%" class="table table-striped table-bordered bootstrap-datatable datatable asd_dashboard">
                      <thead>
                        <tr>
                          <th width="27%">Account Number</th>
                          <th width="47%">Account Name</th>
                          <th width="26%">Statement</th>
                        </tr>
                      </thead>
                      <?php while($get_data_fetch = mysql_fetch_array($get_data)) { ?>
                      <tbody>
                        <tr>
                          <td><?php echo $get_data_fetch['cust_act_number']; ?></td>
                          <td><?php echo $get_data_fetch['cust_name']; ?></td>
                          <td><a href="dashboardv.php?act_number=<?php echo $get_data_fetch['cust_act_number']; ?>">View Balance</a>
                        <?php  if($cust_bank_account_status=="Active")
                        {
                            echo "<strong style='color:blue; margin-left:40px'>Active</strong>";
                            
                        }
                        
                        ?>
                          </td>
                        </tr>
                        
                      </tbody>
                      <?php } ?>
                    </table>
          </div>
               
            </div>
      
        </div><!--/span-->
      <!--/span-->
			
	<!--make by avi-->

				  
<div style="margin-top:50px"> <?php include('footer.php'); 
mysql_free_result($acc);
?>
        <?php
mysql_free_result($user);
?></div>
		  
       
       
