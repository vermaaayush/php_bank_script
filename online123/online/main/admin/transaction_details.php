<?php require_once('../../Connections/bnkconn.php'); ?>
<?php


mysql_select_db($database_bnkconn, $bnkconn);
  if (isset($_GET['id'])) {
  	$idtocheck=$_GET['id'];
  	$status=4;
  	//echo $idtocheck;
	 $update_bank_data = mysql_query("UPDATE transaction SET status = '".$status."'
         WHERE id = '".$idtocheck."'");
	 if($update_bank_data)
	 {
	 //	echo "done";
	 }
	 else
	 {
	 //	echo "mmm";
	 }
  	}
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


$query_trans = "SELECT * FROM `transaction` where cust_name !=''  ORDER BY id DESC";
$trans = mysql_query($query_trans, $bnkconn) or die(mysql_error());
$row_trans = mysql_fetch_assoc($trans);
$totalRows_trans = mysql_num_rows($trans);
include('header.php'); 
?>
	<div>
		<ul class="breadcrumb">
			<li>
				<a href="#">Home</a> <span class="divider">/</span>
			</li>
			<li>
				<a href="#">Transactions</a>
			</li>
		</ul>
	</div>
	<div id="show_msg" align="center" style="font-size:16px; color:#F00; font-weight:bold"></div>

	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>Transaction Details</h2>
				<div class="box-icon">
					<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
					<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form action="" name="search" method="post">
					<div class="form-actions">
						<input type="text" class="input-xlarge datepicker" id="date01" placeholder="Form" name="form_date" required>
						<input type="text" class="input-xlarge datepicker" id="date02" placeholder="To" name="to_date" required><br />
						<!--<input type="text" name="act_number" id="act_number" placeholder="Account Number"  /><br />-->
						<button type="submit" class="btn btn-primary" name="get_transaction">Get Transaction</button>
					</div>
				</form>
				<table class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th>Account Number</th>
							<th>Customer Name</th>
							<th>Debited(USD)</th>
							<th>Credited(USD)</th>
							<th>Date Of Transaction</th>
							<th>Token Number</th>
							<th><abbr title="Bank Identification">IRS Clearance Code</abbr></th>
							<th><abbr title="Authorisation Code">Bank verication <br />
						    code</abbr></th>
							<th><abbr title="Security Clearance">Security <br />
						    Clearance Code</abbr></th>
							<th>Status</th>
							<th>Balance(USD)</th>
						</tr>
					</thead>
					<tbody>
						<?php do { ?>
						<tr>
							<td>
								<?php echo $row_trans['act_number']; ?>
							</td>
							<td>
								<?php echo $row_trans['cust_name']; ?>
							</td>
							<td>
								<?php echo $row_trans['debited']; ?>
							</td>
							<td>
								<?php echo $row_trans['credited']; ?>
							</td>
							<td class="center">
								<?php echo date('F d, Y',strtotime($row_trans['transaction_date'])); ?>
							</td>
							<td class="center">
								<?php echo $row_trans['number']; ?>
							</td>
							<td class="center">
								<?php echo $row_trans['bankid']; ?>
							</td>
							<td class="center">
								<?php echo $row_trans['authcode']; ?>
							</td>
							<td class="center">
								<?php echo $row_trans['security']; ?>
							</td>
							<td>
								<?php 
								$status=$row_trans['status'];
								$link_address=$row_trans['id'];
                                    if($status==3)
                                    {
                                     echo '<a href="transaction_details.php?id=' . $link_address . '">Processed</a>';
                                    }
                                    else if($status==4)
                                    {
                                         echo '<a style="color:green" href="#">Completed</a>';
                                    }
                                    else
                                    {
                                    	echo "pending";
                                    }
							


								 ?>
							</td>
							<td class="center">
								<?php echo $row_trans['present_balance']; ?>
							</td>
						</tr>
						<?php } while ($row_trans = mysql_fetch_assoc($trans)); ?>
					</tbody>

					<tbody>
					</tbody>
				</table>



				<!--<div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>   -->
			</div>
		</div>
		<!--/span-->
	</div>
	<!--/row-->

	<?php include('footer.php'); ?>
	<?php
mysql_free_result($trans);
?>