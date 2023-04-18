<?php include('header.php'); 
$bank_id = $_REQUEST['id'];
$bank_data = mysql_fetch_array(mysql_query("select * from bank_details where id = '".$bank_id."'"));

if(isset($_REQUEST['edit_bank'])) {
$bank_name = $_REQUEST['bank_name'];
$branch_name = $_REQUEST['branch_name'];
$branch_code = $_REQUEST['branch_code'];

$update_bank_data = mysql_query("UPDATE bank_details SET 
bank_name = '".$bank_name."',
branch_name = '".$branch_name."',
branch_code = '".$branch_code."'
 WHERE id = '".$bank_id."'");

if($update_bank_data) {
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
						<a href="#">View Bank</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> View Bank Details</h2>
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
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $bank_data['bank_name']; ?>" name="bank_name">
								</div>
							</div>
                            
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
							
							
							<div class="form-actions">
                              <button type="submit" class="btn btn-primary" name="edit_bank">Save changes</button>
							  <a href="view_bank.php" class="btn">Back</a>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



    
<?php include('footer.php'); ?>
