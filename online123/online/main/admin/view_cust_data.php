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

						<a href="add_cust.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Edit Customer</a>

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

							  <label class="control-label" for="date01">User ID</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" readonly="readonly" value="<?php echo $cust_data_fetch[user_id];?>" name="user_id">

								</div>

							</div>	

                            <div class="control-group">

							  <label class="control-label" for="date01">Customer ID</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" readonly="readonly" value="<?php echo $cust_data_fetch[customer_id];?>" name="customer_id">

								</div>

							</div>	

							<div class="control-group">

							  <label class="control-label" for="date01">Customer Name</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_name];?>" name="cust_name">

								</div>

							</div>	

							

                             <div class="control-group">

							  <label class="control-label" for="fileInput"> Customer photograph </label>

							  <div class="controls">

								<img src="img/account_data/<?php echo $cust_data_fetch[cust_act_number]."_".$cust_data_fetch[cust_photo];?>" width="70" height="70"/>

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

							  <label class="control-label" for="date01"> Mobile Number</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo '+'.$cust_data_fetch[cust_countrycode].' '.$cust_data_fetch[cust_phone];?>" name="cust_phone">

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">PIN</label>

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

							  <label class="control-label" for="fileInput"> Digital Signature </label>

							  <div class="controls">

								<img src="img/account_data/digital_signature/<?php echo $cust_data_fetch[digital_signature];?>" width="70" height="70"/>

							  </div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="fileInput"> Finger Print </label>

							  <div class="controls">

								<img src="img/account_data/finger_print/<?php echo $cust_data_fetch[finger_print];?>" width="70" height="70"/>

							  </div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="fileInput"> Scanning Documents </label>

							  <div class="controls">

								<img src="img/account_data/scanning_documents/<?php echo $cust_data_fetch[scanning_documents];?>" width="70" height="70"/>

							  </div>

							</div> 

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">  Account Number </label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_act_number];?>" name="cust_branch_name">

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01"> Branch Name </label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_branch_name];?>" name="act_number">

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

