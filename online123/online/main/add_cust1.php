<?php include('header.php'); 
if(isset($_REQUEST['add_user'])) {
$cust_name = $_REQUEST['cust_name'];
$cust_sex = $_REQUEST['cust_sex']; 
$cust_mail = $_REQUEST['cust_mail'];
$cust_phone = $_REQUEST['cust_phone'];
$cust_password = $_REQUEST['cust_password'];
$cust_address = $_REQUEST['cust_address'];
$cust_bank_name = $_REQUEST['cust_bank_name'];
$cust_branch_name = $_REQUEST['cust_branch_name'];
$act_number = $_REQUEST['act_number'];
$act_type = $_REQUEST['act_type'];
$joining_date = date("m.d.Y");

$insert_cust = mysql_query("insert into act_holder_details (cust_name,cust_sex,cust_mail,cust_phone,cust_password,cust_address,cust_bank_name,cust_branch_name,cust_act_number,cust_atc_type,joining_date) values('".$cust_name."','".$cust_sex."','".$cust_mail."','".$cust_phone."','".$cust_password."','".$cust_address."','".$cust_bank_name."','".$cust_branch_name."','".$act_number."','".$act_type."','".$joining_date."')");
if($insert_cust) {
echo "<script>window.location = 'view_act_holder.php';</script>";
}
}
?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Add Customer</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Add Customer </h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
						<a href="add_cust.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add Customer</a>
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
						  <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
							
							<div class="control-group">
							  <label class="control-label" for="date01">Customer Name</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="cust_name">
								</div>
							</div>	
							
							<div class="control-group">
							  <label class="control-label" for="date01"> Sex</label>
							 <div class="controls">
								  <label class="radio">
									<input type="radio" name="cust_sex" id="optionsRadios1" value="male"> Male
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="cust_sex" id="optionsRadios2" value="female"> Female
								  </label>
								</div>
							</div>	
							
                            <div class="control-group">
							  <label class="control-label" for="date01"> Mail ID</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="cust_mail">
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01"> Phone Number</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="cust_phone">
								</div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">Password</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="password" value="" name="cust_password">
								</div>
							</div>	
                            
							<div class="control-group">
							  <label class="control-label" for="date01"> Address</label>
							 <div class="controls">
								  <textarea class="autogrow" name="cust_address"></textarea>
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="typeahead"> Bank Name </label>
							  <div class="controls">
								  <select id="selectError3" name="cust_bank_name" class="cust_bank_name">
                                  <?php
								  $bank_details = mysql_query("SELECT DISTINCT bank_name FROM bank_details");
								  while($bank_name_fetch = mysql_fetch_array($bank_details)) {
								  ?>
									<option value="<?php echo $bank_name_fetch['bank_name']; ?>"><?php echo $bank_name_fetch['bank_name']; ?></option>
								  <?php
								  }
								  ?>	
								  </select>
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="typeahead"> Branch Name </label>
							  <div class="controls">
								  <select id="selectError3" name="cust_branch_name" class="cust_branch_name">
									
								  </select>
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01"> Account Number </label>
							 <div class="controls">
                             	  <input class="form-row text-right" id="password" type="text" value="" name="act_number">
                                  &nbsp;
                                  <a href="#" title="Auto Generate Password" data-rel="tooltip" class="btn btn-warning link-password" id="generate">
                                Generate Password
                                </a>
								</div>
							</div>		
                            
                            <div class="control-group">
							  <label class="control-label" for="typeahead"> Account Type </label>
							  <div class="controls">
								  <select id="selectError3" name="act_type">
                                  <?php
								  $act_type = mysql_query("SELECT * FROM account_type");
								  while($act_type_fetch = mysql_fetch_array($act_type)) {
								  ?>
									<option value="<?php echo $act_type_fetch['type_name']; ?>"><?php echo $act_type_fetch['type_name']; ?></option>
								  <?php } ?>
								  </select>
								</div>
							</div>	
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="add_user">Add Customer</button>
							  <a href="view_act_holder.php" class="btn">Cancel</a>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



    
<?php include('footer.php'); ?>
