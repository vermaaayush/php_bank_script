<?php include('header.php'); 

if(isset($_REQUEST['cheque']))

{

if(!isset($_SESSION['act_number'])) {

$sender_act_number = $_REQUEST['sender_act_number'];

}

else {

$sender_act_number = $_SESSION['act_number'];

}

$receiver_act_number = $_REQUEST['receiver_act_number'];

$chk_number = $_REQUEST['chk_number'];

$bank_name = $_REQUEST['bank_name'];

$branch_name = $_REQUEST['branch_name'];

$amount = $_REQUEST['amount'];

$date = date('Y-m-d');



$insert_chk_data = mysql_query("insert into cheque (sender_act_number,receiver_act_number,date,chk_number,bank_name,branch_name,amount,status) values('".$sender_act_number."','".$receiver_act_number."','".$date."','".$chk_number."','".$bank_name."','".$branch_name."','".$amount."','issued')");



if($insert_chk_data) {

echo "<script>window.location = 'issue_cheque_view.php';</script>";

}

}



?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Issue Cheque</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Issue Cheque </h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="issue_cheque.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Issue Cheque</a>

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<form class="form-horizontal" action="" method="post">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

                            <?php

							if(!isset($_SESSION['act_number'])) {

							?>

                            <div class="control-group">

							  <label class="control-label" for="date01">Cheque Issued From</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" name="sender_act_number" required>

								</div>

							</div>	

                            <?php } ?>

                            <div class="control-group">

							  <label class="control-label" for="date01">Cheque Issued To</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" name="receiver_act_number" required>

								</div>

							</div>	

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">Cheque Number</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" name="chk_number" required>

								</div>

							</div>

                            

							<div class="control-group">

							  <label class="control-label" for="typeahead"> Branch Name </label>

							  <div class="controls">

								  <select id="selectError3" name="branch_name" class="cust_bank_name" required>

                                  <?php

								  $bank_details = mysql_query("SELECT * from bank_details");

								  while($bank_name_fetch = mysql_fetch_array($bank_details)) {

								  ?>

									<option value="<?php echo $bank_name_fetch['branch_name']; ?>"><?php echo $bank_name_fetch['branch_name']; ?></option>

								  <?php

								  }

								  ?>	

								  </select>

								</div>

							</div>	

                            

                            

							<div class="control-group">

							  <label class="control-label" for="date01">Amount</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" name="amount" required>

								</div>

							</div>

                            

                            	

							

							

							

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary" name="cheque">Issue Cheque</button>

							  <a href="issue_cheque_view.php" class="btn">Cancel</a>

							</div>

						  </fieldset>

						</form>   



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

