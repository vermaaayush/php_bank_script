<?php include('header.php');
if(isset($_REQUEST['add_bank'])) {
$bank_name = $_REQUEST['bank_name'];
$branch_name = $_REQUEST['branch_name'];
$branch_code = $_REQUEST['branch_code'];
$add_bank = mysql_query("insert into bank_details (bank_name,branch_name,branch_code) values('".$bank_name."','".$branch_name."','".$branch_code."')");
if($add_bank) {
echo "<script>window.location = 'view_bank.php';</script>";
}
}
 ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Bank</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Add Bank</h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
						<a href="add_bank.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add Bank</a>
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
							  <label class="control-label" for="date01">Bank Name</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="bank_name">
								</div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">Branch Name</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="branch_name">
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">Branch Code</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="branch_code">
								</div>
							</div>
							
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="add_bank">Add Bank</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



    
<?php include('footer.php'); ?>
