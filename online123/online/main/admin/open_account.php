<?php include('header.php'); 

if(isset($_REQUEST['open_acct'])) {

$act_number = $_REQUEST['act_number'];

$branch_name = $_REQUEST['branch_name'];

$digital_signature = $_FILES['digital_signature']['name'];

move_uploaded_file($_FILES['digital_signature']['tmp_name'],"img/account_data/digital_signature/".$digital_signature);

$finger_print = $_FILES['finger_print']['name'];

move_uploaded_file($_FILES['finger_print']['tmp_name'],"img/account_data/finger_print/".$finger_print);

$scanning_documents = $_FILES['scanning_documents']['name'];

move_uploaded_file($_FILES['scanning_documents']['tmp_name'],"img/account_data/scanning_documents/".$scanning_documents);



$open_account = mysql_query("insert into account (act_number,digital_signature,finger_print,scanning_documents,branch_name) values('".$act_number."','".$digital_signature."','".$finger_print."','".$scanning_documents."','".$branch_name."')");

}



?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Open Account</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Open Account</h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="open_account.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Open Account</a>

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<form class="form-horizontal" name="open_act" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

							<div class="control-group">

							  <label class="control-label" for="typeahead"> Branch Name </label>

							  <div class="controls">

								  <select id="selectError3" name="branch_name">

                                  <?php

								  $get_branch = mysql_query("select * from bank_details");

								  while($get_branch_fetch = mysql_fetch_array($get_branch)) {

								  ?>

									<option><?php echo $get_branch_fetch['branch_name'];?></option>

                                  <?php } ?>

								  </select>

								</div>

							</div>

							

                            <div class="control-group">

							  <label class="control-label" for="date01">Account Number</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" name="act_number" type="text" value="">

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="fileInput"> Digital Signature </label>

							  <div class="controls">

								<input class="input-file uniform_on" id="fileInput" type="file" name="digital_signature">

							  </div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="fileInput"> Finger Print </label>

							  <div class="controls">

								<input class="input-file uniform_on" id="fileInput" type="file" name="finger_print">

							  </div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="fileInput"> Scanning Documents </label>

							  <div class="controls">

								<input class="input-file uniform_on" id="fileInput" type="file" name="scanning_documents">

							  </div>

							</div>          

							

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary" name="open_acct">Open Account</button>

							  <button type="reset" class="btn">Cancel</button>

							</div>

						  </fieldset>

						</form>   



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

