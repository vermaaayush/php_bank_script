<?php
if (!isset($_SESSION)) {
  session_start();
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
<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Statement</a>
					</li>
				</ul>
			</div>
			
			<?php include "menu.php";?>
            
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white" data-original-title>
						<h2 style="color:white; font-weight:bold"> Statement </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white">
                    <form action="<?php $_SERVER['PHP_SELF']?>" name="search" method="post">
                    <div class="form-actions" style="background: rgba(0, 0, 0, 0);;padding:15px;color:white">
                      <input type="text" class="input-xlarge datepicker" id="date01" placeholder="From" name="form_date" required>
               		  <input type="text" class="input-xlarge datepicker" id="date02" placeholder="To" name="to_date" required><br />
					  <button type="submit" class="btn btn-primary" name="get_transaction">Get Transaction</button>
					</div>
                    </form>
						<table class="table table-bordered table-striped table-condensed asd_dashboard">
							  <thead>
								  <tr>
                                  	  <th>Account Number</th>
									  <th>Transaction ID</th>
									  <th>Description</th>
                                      <th>Debited</th>
                                      <th>Credited</th>
									  <th>Date Of Transaction</th>
									  <th>Balance</th>
								  </tr>
							  </thead> 
                              <?php
							  if(isset($_REQUEST['get_transaction'])) {
							  $transaction_details = mysql_query("SELECT * FROM transaction WHERE act_number = '".$_SESSION['act_number']."' AND transaction_date between '".$_REQUEST['form_date']."' AND '".$_REQUEST['to_date']."' ORDER BY id DESC");
							  while($transaction_details_fetch = mysql_fetch_array($transaction_details)) {
							  
							  ?> 
							  <tbody>
								<tr>
                                	<td><?php echo $transaction_details_fetch['act_number']; ?></td>
									<td><?php echo $transaction_details_fetch['transaction_id']; ?></td>
							        <td><?php echo $transaction_details_fetch['description']; ?></td>
                                    <td><?php echo $transaction_details_fetch['debited']; ?></td>
                                    <td><?php echo $transaction_details_fetch['credited']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['transaction_date']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['present_balance']; ?></td>  
								</tr>
							  </tbody>
                              <?php } }
							  else{
								 
								  
								  $transaction_details = mysql_query("SELECT * FROM transaction WHERE act_number = '".$_SESSION['act_number'] ."' && mini_statment='1' ORDER BY id DESC LIMIT 0,50");
							  while($transaction_details_fetch = mysql_fetch_array($transaction_details)) {
							  ?>
							 
							  <tbody>
								<tr>
                                	<td><?php echo $transaction_details_fetch['act_number']; ?></td>
									<td><?php echo $transaction_details_fetch['transaction_id']; ?></td>
									<td><?php echo $transaction_details_fetch['description']; ?></td>
                                    <td><?php echo $transaction_details_fetch['debited']; ?></td>
                                    <td><?php echo $transaction_details_fetch['credited']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['transaction_date']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['present_balance']; ?></td>  
								</tr>
							  </tbody>
                              <?php } 
								  
								  }?>
						 </table>  
						 
					</div>
				</div><!--/span-->
			</div><!--/row-->
    
<?php include('footer.php'); ?>
