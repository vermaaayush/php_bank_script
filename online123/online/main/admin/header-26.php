<?php

include("conn.php");

if(!isset($_SESSION["username"]) && !isset($_SESSION['act_number'])) {

header("location:index.php");

}

$get_details = mysql_fetch_array(mysql_query("SELECT * FROM act_holder_details WHERE cust_act_number = '".$_SESSION['act_number']."'"));

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

    <link href='css/custom.style.css' rel='stylesheet'>



	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->

	<!--[if lt IE 9]>

	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

	<![endif]-->



	<!-- The fav icon -->

	<link rel="shortcut icon" href="img/favicon.ico">

		

</head>

<body>

	<!-- topbar starts -->

	<div class="navbar">

		<div class="navbar-inner">

			<div class="container-fluid">

				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

				</a>

				<a class="brand" href="dashboard.php"> <!--<img alt="Logo" src="img/logo20.png" /> --><span></span></a>

				

				<!-- user dropdown starts -->

				<div class="btn-group pull-right" >

					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">

						<i class="icon-user"></i><span class="hidden-phone">

                        <?php

						if(!isset($_SESSION['username'])) {

						echo $get_details['cust_name'];

						}

						else 

						{

						?>

                        admin

                        <?php } ?> 

                         

                         </span>

						<span class="caret"></span>					</a>

					<ul class="dropdown-menu">

						<li><a href="#">Profile</a></li>

						<li class="divider"></li>

						<li><a href="logout.php">Logout</a></li>

					</ul>

				</div>

				<!-- user dropdown ends -->

				

				<div class="top-nav nav-collapse">

					<ul class="nav">

                    <span style="float:left; margin-left:-185px;"><img src="img/short_logo.png" width="58" height="57" alt="slogo"></span><span style="float:left; margin-left:-116px;"><img src="img/bank_letter.png" width="200" height="52" alt="letter"></s

						>

						<!--<li>

							<form class="navbar-search pull-left">

								<input placeholder="Search" class="search-query span2" name="query" type="text">

							</form>

						</li>-->

					</ul>

				</div><!--/.nav-collapse -->

			</div>

		</div>

	</div>

	<!-- topbar ends -->

	

	<div class="container-fluid">

		<div class="row-fluid">

		

		

			<!-- left menu starts -->

			<div class="span2 main-menu-span">

				<div class="well nav-collapse sidebar-nav">

                <?php

				if(isset($_SESSION['username'])) { /* Admin Menu  */

				?>

					<ul class="nav nav-tabs nav-stacked main-menu">

						<li class="nav-header hidden-tablet">Admin Menu</li>

						<li><a class="ajax-link" href="dashboard.php"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>                        

                        <li class="nav-header hidden-tablet"> Admin Panel </li>

                        <!--<li><a class="ajax-link" href="open_account.php"><i class="icon-edit"></i><span class="hidden-tablet"> Open Account </span></a></li>-->

                        <li><a class="ajax-link" href="view_type.php"><i class="icon-edit"></i><span class="hidden-tablet"> Account Type </span></a></li>

                        <li><a class="ajax-link" href="view_branch.php"><i class="icon-edit"></i><span class="hidden-tablet"> Branch create </span></a></li>

                        <!--<li><a class="ajax-link" href="view_user.php"><i class="icon-edit"></i><span class="hidden-tablet"> User </span></a></li>-->

                        <li class="nav-header hidden-tablet">Account</li>

                        <li><a class="ajax-link" href="view_act_holder.php"><i class="icon-edit"></i><span class="hidden-tablet"> Account Holder Details </span></a></li>

                        <!--<li><a class="ajax-link" href="fund_transfer.php"><i class="icon-edit"></i><span class="hidden-tablet"> Fund Transfer </span></a></li>-->

                        <li><a class="ajax-link" href="transaction_details.php"><i class="icon-edit"></i><span class="hidden-tablet"> Transaction Details </span></a></li>

                        <li><a class="ajax-link" href="statement.php"><i class="icon-edit"></i><span class="hidden-tablet"> Statement </span></a></li>

                        <li><a class="ajax-link" href="mini_statement.php"><i class="icon-edit"></i><span class="hidden-tablet"> Mini Statement </span></a></li>

                        <li class="nav-header hidden-tablet">Transaction</li>

                        <li><a class="ajax-link" href="current_act_transaction.php"><i class="icon-edit"></i><span class="hidden-tablet"> Current Account </span></a></li>

                        <li><a class="ajax-link" href="savings_act_transaction.php"><i class="icon-edit"></i><span class="hidden-tablet"> Savings Account </span></a></li>

                        <li class="nav-header hidden-tablet"> Current and saving </li>

                        <li><a class="ajax-link" href="current_act_details.php"><i class="icon-edit"></i><span class="hidden-tablet"> Current Details </span></a></li>

                        <li><a class="ajax-link" href="savings_act_details.php"><i class="icon-edit"></i><span class="hidden-tablet"> Savings Details </span></a></li>

                        <li class="nav-header hidden-tablet"> Reports </li>

                        <li><a class="ajax-link" href="bank_report.php"><i class="icon-edit"></i><span class="hidden-tablet"> Branch wise </span></a></li>

                        <li><a class="ajax-link" href="account_report.php"><i class="icon-edit"></i><span class="hidden-tablet"> Account wise </span></a></li>

                        <li><a class="ajax-link" href="customer_report.php"><i class="icon-edit"></i><span class="hidden-tablet"> Customer wise </span></a></li>

                        <!--<li><a class="ajax-link" href="#"><i class="icon-edit"></i><span class="hidden-tablet"> Transaction wise </span></a></li>-->

                        <li><a class="ajax-link" href="transaction_report.php"><i class="icon-edit"></i><span class="hidden-tablet"> Transaction wise </span></a></li>

                        <li class="nav-header hidden-tablet"> Cheque </li>

                        <li><a class="ajax-link" href="issue_cheque_view.php"><i class="icon-edit"></i><span class="hidden-tablet"> Issue Cheque </span></a></li>

                        <li><a class="ajax-link" href="chequebook_view.php"><i class="icon-edit"></i><span class="hidden-tablet"> Cheque Book </span></a></li>

                        <li class="nav-header hidden-tablet"> Issue Cards </li>

                        <li><a class="ajax-link" href="debit_card_stat.php"><i class="icon-edit"></i><span class="hidden-tablet"> Debit Card </span></a></li>

                        <li><a class="ajax-link" href="credit_card_stat.php"><i class="icon-edit"></i><span class="hidden-tablet"> Credit Card </span></a></li>

                        <li class="nav-header hidden-tablet"> Balance </li>

                        <li><a class="ajax-link" href="manage_balance.php"><i class="icon-edit"></i><span class="hidden-tablet"> Manage Account Balance </span></a></li>

                        

					</ul>

                <?php } ?>

               

                <?php

				if(isset($_SESSION['act_number'])) { /* Custmore Menu */

				?>

                    <ul class="nav nav-tabs nav-stacked main-menu">

						<li class="nav-header hidden-tablet">Customer Panel</li>

						<li><a class="ajax-link" href="cust_home.php"><i class="icon-home"></i><span class="hidden-tablet"> Home </span></a></li>

						

                        <li class="nav-header hidden-tablet">Account</li>

                        <li><a class="ajax-link" href="act_details.php"><i class="icon-edit"></i><span class="hidden-tablet"> Account Holder Details </span></a></li>

                        <li><a class="ajax-link" href="fund_transfer.php"><i class="icon-edit"></i><span class="hidden-tablet"> Fund Transfer </span></a></li>

                        <li><a class="ajax-link" href="cust_transaction_details.php"><i class="icon-edit"></i><span class="hidden-tablet"> Transaction Details </span></a></li>

                        <li><a class="ajax-link" href="cust_statement.php"><i class="icon-edit"></i><span class="hidden-tablet"> Statement </span></a></li>

                        <li><a class="ajax-link" href="cust_mini_statement.php"><i class="icon-edit"></i><span class="hidden-tablet"> Mini Statement </span></a></li>

                        <li class="nav-header hidden-tablet">Cheque</li>

                        <li><a class="ajax-link" href="issue_cheque_view.php"><i class="icon-edit"></i><span class="hidden-tablet"> Issue Cheque </span></a></li>

                        <li><a class="ajax-link" href="request_chequebook_view.php"><i class="icon-edit"></i><span class="hidden-tablet"> Request Cheque Book </span></a></li>

                        <li class="nav-header hidden-tablet">Card</li>

                        <li><a class="ajax-link" href="request_card_view.php"><i class="icon-edit"></i><span class="hidden-tablet"> Request Card </span></a></li>

                       

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

			<!-- content starts -->

			

