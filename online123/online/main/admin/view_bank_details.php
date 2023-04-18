<?php include('header.php'); 

$bank_id = $_REQUEST['id'];

$bank_data = mysql_fetch_array(mysql_query("select * from bank_details where id = '".$bank_id."'"));

?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">View Branch</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> View Branch Details</h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="add_branch.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add Branch</a>

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="post">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

							<div class="control-group">

							  <label class="control-label" for="date01">Branch Name</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $bank_data['branch_name']; ?>" name="branch_name">

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">Branch Code</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $bank_data['branch_code']; ?>" name="branch_code">

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">IFSC Code</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $bank_data['ifsc_code']; ?>" name="ifsc_code">

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">Branch Address</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $bank_data['branch_add']; ?>" name="branch_add">

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">Available Account Type</label>

							 <div class="controls">

                             <?php 

							 if($bank_data['available_type_id']=="both") {

							 $result = "Savings and Current";

							 }

							 if($bank_data['available_type_id']=="savings") {

							 $result = "Savings";

							 }

							 if($bank_data['available_type_id']=="current") {

							 $result = "Current";

							 }

							 ?>

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $result; ?>" name="branch_add">

								</div>

							</div>

							

							

							<div class="form-actions">

							  <a href="view_branch.php" class="btn">Back</a>

							</div>

						  </fieldset>

						</form>   



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

