<?php 
ob_start();
session_start();
$acc=$_SESSION['accountn'];
$bnkid=$_SESSION['bankidcheck'];
$authid=$_SESSION['authidcheck'];
$s_code=$_SESSION['scodecheck'];

if(isset($_POST['sub'])){


  $redirect="tranc_page.php?id=". $_SESSION['sid'];
  header('Location: '.$redirect);
         
       }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1, maximum-scale=1, width=device-width" name="viewport">
    <link href="../stylesheets/application.css?1325743336" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <style>
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
  </head>

<?php
include('header.php'); 
?>
  <div>
    <ul class="breadcrumb">
      <li>
        <a href="dashboard.php">Home</a> <span class="divider">/</span>
      </li>
      <li>
        <a href="confirm.php">verfication</a>
      </li>
    </ul>
  </div>
  
     <div class="alert success">
  <span class="" style="color: black"></span>  
  <strong><h2>Success!</strong> </h2> <h3>Security
Clearance Code Cleared successfully! </h3>
</div>
<form action="final_confirm.php" method="post">

  <td><input style="float:right" class="w3-button w3-blue" type="submit" name="sub" id="sub" value="Next" class="btn"></td>
</form>
      
  </div>
  </body>


  <?php include('footer.php');
  ob_start();
exit(); ?>