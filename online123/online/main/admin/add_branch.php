<?php include('header.php');

if(isset($_REQUEST['add_bank'])) {

$branch_name = $_REQUEST['branch_name'];

$branch_code = $_REQUEST['branch_code'];

$ifsc_code = $_REQUEST['ifsc_code'];

$branch_add = $_REQUEST['branch_add'];



$savings = $_REQUEST['savings'];

$current = $_REQUEST['current'];



if($savings!="" and $current!="") {

$avail = "both";

}

if($savings!="" and $current=="") {

$avail = "savings";

}

if($savings=="" and $current!="") {

$avail = "current";

}







$add_bank = mysql_query("insert into bank_details (branch_name,branch_code,ifsc_code,branch_add,available_type_id) values('".$branch_name."','".$branch_code."','".$ifsc_code."','".$branch_add."','".$avail."')");

if($add_bank) {

echo "<script>window.location = 'view_branch.php';</script>";

}

}

 ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Add Branch</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Add Branch </h2>

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

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="branch_name" required>

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">Branch Code</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="branch_code" required>

								</div>

							</div>

							

                            <div class="control-group">

							  <label class="control-label" for="date01">IFSC Code</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="ifsc_code" required>

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">Branch Address</label>

							 <div class="controls">

                             	  <textarea class="autogrow" name="branch_add" required></textarea>

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">Available Account Type</label>

							 <div class="controls">

								  <label class="checkbox inline">

									<input type="checkbox" name="savings" id="inlineCheckbox1" value="savings" required> Savings

								  </label>

								  <label class="checkbox inline">

									<input type="checkbox" name="current" id="inlineCheckbox2" value="current"> Current

								  </label>

								</div>

							</div>		

                            

							

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary" name="add_bank">Add Branch</button>

							  <button type="reset" class="btn">Cancel</button>

							</div>

						  </fieldset>

						</form>   



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

