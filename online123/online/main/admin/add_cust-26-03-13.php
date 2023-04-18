<?php include('header.php'); 

$number = mt_rand(100000000,999999999);

$number1 = mt_rand(100000000,999999999);

if(isset($_REQUEST['add_user'])) {

$cust_name = $_REQUEST['cust_name'];

$user_id = $_REQUEST['user_id'];

$customer_id = $_REQUEST['customer_id'];

$cust_sex = $_REQUEST['cust_sex']; 

$cust_mail = $_REQUEST['cust_mail'];

$cust_phone = $_REQUEST['cust_phone'];

$cust_password = $_REQUEST['cust_password'];

$cust_address = $_REQUEST['cust_address'];

$cust_branch_name = $_REQUEST['cust_branch_name'];

$act_number = $_REQUEST['act_number'];

$act_type = $_REQUEST['act_type'];

$joining_date = date("m.d.Y");



$cust_photo = $_FILES['cust_photo']['name'];

move_uploaded_file($_FILES['cust_photo']['tmp_name'],"img/account_data/".$act_number."_".$cust_photo);

$digital_signature = $_FILES['digital_signature']['name'];

move_uploaded_file($_FILES['digital_signature']['tmp_name'],"img/account_data/digital_signature/".$digital_signature);

$finger_print = $_FILES['finger_print']['name'];

move_uploaded_file($_FILES['finger_print']['tmp_name'],"img/account_data/finger_print/".$finger_print);

$scanning_documents = $_FILES['scanning_documents']['name'];

move_uploaded_file($_FILES['scanning_documents']['tmp_name'],"img/account_data/scanning_documents/".$scanning_documents);



$insert_cust = mysql_query("insert into act_holder_details (cust_name,cust_photo,cust_sex,cust_mail,cust_phone,cust_password,cust_address,cust_branch_name,cust_act_number,cust_atc_type,joining_date,digital_signature,finger_print,scanning_documents,user_id,customer_id) values('".$cust_name."','".$cust_photo."','".$cust_sex."','".$cust_mail."','".$cust_phone."','".$cust_password."','".$cust_address."','".$cust_branch_name."','".$act_number."','".$act_type."','".$joining_date."','".$digital_signature."','".$finger_print."','".$scanning_documents."','".$user_id."','".$customer_id."')");



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

						<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

							<div class="control-group">

							  <label class="control-label" for="date01">User ID</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" name="user_id" readonly="readonly" required value="<?php echo $number; ?>">

								</div>

							</div>	

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">Customer ID</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" name="customer_id" readonly="readonly" required value="<?php echo $number1; ?>">

								</div>

							</div>

                            

                    				

                            <div class="control-group">

							  <label class="control-label" for="date01">Customer Name</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="cust_name" required>

								</div>

							</div>	

                            

                            <div class="control-group">

							  <label class="control-label" for="fileInput"> customer photograph </label>

							  <div class="controls">

								<input class="input-file uniform_on" id="fileInput" type="file" name="cust_photo">

							  </div>

							</div>

							

							<div class="control-group">

							  <label class="control-label" for="date01"> Sex</label>

							 <div class="controls">

								  <label class="radio">

									<input type="radio" name="cust_sex" id="optionsRadios1" value="male" required> Male

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

								  <input class="input-xlarge focused" id="focusedInput" type="email" value="" name="cust_mail" required>

								</div>

							</div>	

                            

                            <div class="control-group">

							  <label class="control-label" for="date01"> Phone Number</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="cust_phone" required>

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">Password</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="password" value="" name="cust_password" required>

								</div>

							</div>	

                            

							<div class="control-group">

							  <label class="control-label" for="date01"> Address</label>

							 <div class="controls">

								  <textarea class="autogrow" name="cust_address" required></textarea>

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

                            

                            <div class="control-group">

							  <label class="control-label" for="typeahead"> Branch Name </label>

							  <div class="controls">

								  <select id="selectError3" name="cust_branch_name" class="cust_branch_name">

                                  <?php

								  $bank_details = mysql_query("SELECT * FROM bank_details");

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

							  <label class="control-label" for="date01"> Account Number </label>

							 <div class="controls">

                             	  <input class="form-row text-right" id="password" type="text" value="" name="act_number" required>

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

