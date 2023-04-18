<?php
$no_visible_elements=true;
include('conn.php');
//include('_inc.php');
?>
<?php
$globalstatus="";
if(($_POST["username"] and $_POST["password"])){
$pass_login=$_POST["password"];
//echo "SELECT * FROM admin where username='".$_POST["username"]."' and password='".$pass_login."'";
//exit;

$result=mysql_query("SELECT * FROM admin where username='".$_POST["username"]."' and password='".$pass_login."'");
  if(mysql_num_rows($result)==0)

  { 

  

	$globalstatus=0;

  }

  else

  {

	 

    $row=mysql_fetch_assoc($result);

	//echo $row[username];

	//echo $_SESSION["username"];

	$_SESSION["username"]=$row[username];	

	 //exit;

	// create SESSION  

	//header("Location:dashboard.php");

	echo "<script type=\"text/javascript\">



location.href = \"dashboard.php\";

</script>";

	

  }  //end else

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

	

	<meta charset="utf-8">

	<title>Admin Console</title>

<Meta name= "ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="">



	<!-- The styles -->

	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">

	<style type="text/css">

	  body {

		padding-bottom: 40px;

	  }

	  .sidebar-nav {

		padding: 9px 0;

	  }

	</style>

	<link href="css/bootstrap-responsive.css" rel="stylesheet">

	<link href="css/charisma-app.css" rel="stylesheet">

	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">

	<link href='css/fullcalendar.css' rel='stylesheet'>

	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>

	<link href='css/chosen.css' rel='stylesheet'>

	<link href='css/uniform.default.css' rel='stylesheet'>

	<link href='css/colorbox.css' rel='stylesheet'>

	<link href='css/jquery.cleditor.css' rel='stylesheet'>

	<link href='css/jquery.noty.css' rel='stylesheet'>

	<link href='css/noty_theme_default.css' rel='stylesheet'>

	<link href='css/elfinder.min.css' rel='stylesheet'>

	<link href='css/elfinder.theme.css' rel='stylesheet'>

	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>

	<link href='css/opa-icons.css' rel='stylesheet'>

	<link href='css/uploadify.css' rel='stylesheet'>



	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->

	<!--[if lt IE 9]>

	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

	<![endif]-->



	<!-- The fav icon -->

	<link rel="shortcut icon" href="img/favicon.ico">

</head>



			<div class="row-fluid">

				<div class="span12 center login-header">

					<h2>Welcome to Bank</h2>

				</div><!--/span-->

			</div><!--/row-->

			

			<div class="row-fluid">

				<div class="well span5 center login-box">

					<?php

					if($globalstatus=='0')

					{

					?>

					<div class="alert alert-error">

						Wrong Username or Password.

					</div>

					<?php

					}

					else

					{

					?>

					<div class="alert alert-info">

						Please login with your Username and Password.

					</div>

					<?php

					}

					?>

					

					<form class="form-horizontal" action="" method="post">

						<fieldset>

							<div class="input-prepend" title="Username" data-rel="tooltip">

								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" required value="" />

							</div>

							<div class="clearfix"></div>



							<div class="input-prepend" title="Password" data-rel="tooltip">

								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" value="" required  />

							</div>

							<div class="clearfix"></div>



							<div class="input-prepend">

							<label class="remember" for="remember"><input type="checkbox" id="remember" name="remember" />Remember me</label>

							</div>

							<div class="clearfix"></div>



							<p class="center span5">

							<button type="submit" class="btn btn-primary">Login</button>

							</p>

						</fieldset>

					</form>

				</div><!--/span-->

			</div><!--/row-->

<?php include('footer.php'); ?>