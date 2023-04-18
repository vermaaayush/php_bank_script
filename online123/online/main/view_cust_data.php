<?php include('header.php');
$cust_id = $_REQUEST['id']; 
$cust_data_fetch = mysql_fetch_array(mysql_query("SELECT * FROM act_holder_details WHERE id = '".$cust_id."'"));
?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Edit Customer</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Edit Customer </h2>
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
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_name];?>" name="cust_name">
								</div>
							</div>	
							
							<div class="control-group">
							  <label class="control-label" for="date01"> Sex</label>
							 <div class="controls">
								  <label class="radio">
									<input type="radio" name="cust_sex" id="optionsRadios1" <?php if($cust_data_fetch[cust_sex]=="male") { ?> checked="checked" <?php } ?> value="male"> Male
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="cust_sex" id="optionsRadios2"  <?php if($cust_data_fetch[cust_sex]=="female") { ?> checked="checked" <?php } ?> value="female"> Female
								  </label>
								</div>
							</div>	
							
                            <div class="control-group">
							  <label class="control-label" for="date01"> Mail ID</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_mail];?>" name="cust_mail">
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01"> Phone Number</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_phone];?>" name="cust_phone">
								</div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">Password</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_password];?>" name="cust_password">
								</div>
							</div>	
                            
							<div class="control-group">
							  <label class="control-label" for="date01"> Address</label>
							 <div class="controls">
								  <textarea class="autogrow" name="cust_address"><?php echo $cust_data_fetch[cust_address];?></textarea>
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
									<option <?php if($bank_name_fetch['bank_name']==$cust_data_fetch['cust_bank_name']) {?> selected="selected" <?php } ?>value="<?php echo $bank_name_fetch['bank_name']; ?>"><?php echo $bank_name_fetch['bank_name']; ?></option>
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
                                  <?php
								  if($cust_data_fetch['cust_branch_name'] != "") {
								  $branch_details = mysql_query("SELECT * FROM bank_details WHERE bank_name = '".$cust_data_fetch['cust_bank_name']."'");
								  while($branch_details_fetch = mysql_fetch_array($branch_details)) {
								  ?>
                                  <option <?php if($cust_data_fetch['cust_branch_name']==$branch_details_fetch['branch_name']) {?> selected="selected" <?php } ?>value="<?php echo $branch_details_fetch['branch_name']; ?>"><?php echo $branch_details_fetch['branch_name']; ?></option>
                                  <?php } } else { ?>
									<option selected="selected">--Select Branch--</option>
                                  <?php } ?>
								  </select>
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01"> Account Number </label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_act_number];?>" name="act_number">
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
									<option <?php if($cust_data_fetch['cust_atc_type']==$act_type_fetch['type_name']) {?> selected="selected" <?php } ?> value="<?php echo $act_type_fetch['type_name']; ?>"><?php echo $act_type_fetch['type_name']; ?></option>
								  <?php } ?>
								  </select>
								</div>
							</div>	
							
							<div class="form-actions">
							  <a href="view_act_holder.php" class="btn">Back</a>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



    
<?php include('footer.php'); ?>
