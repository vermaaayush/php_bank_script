<?php include('header.php');

if(isset($_REQUEST['add_type'])) {

$act_type = $_REQUEST['act_type'];

$insert_type = mysql_query("insert into account_type (type_name) values('".$act_type."')");

if($insert_type) {

echo "<script>window.location = 'view_type.php';</script>";

}

}

?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Account Type</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Account Type </h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="add_account_type.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add Type</a>

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" name="add_type_frm">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

							<div class="control-group">

							  <label class="control-label" for="date01">Account Type</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="act_type" required>

								</div>

							</div>	

							

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary" name="add_type">Add Account</button>

							  <button type="reset" class="btn">Cancel</button>

							</div>

						  </fieldset>

						</form>   



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

