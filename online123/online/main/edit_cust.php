<?php include('header.php');
$cust_id = $_REQUEST['id']; 
$cust_data_fetch = mysql_fetch_array(mysql_query("SELECT * FROM act_holder_details WHERE id = '".$cust_id."'"));

if(isset($_REQUEST['update_data'])) {
$cust_name = $_REQUEST['cust_name'];
$cust_sex = $_REQUEST['cust_sex']; 
$cust_mail = $_REQUEST['cust_mail'];
$cust_phone = $_REQUEST['cust_phone'];
$cust_password = $_REQUEST['cust_password'];
$cust_address = $_REQUEST['cust_address'];
$act_number = $_REQUEST['act_number'];
$joining_date = date("m.d.Y");


if($_FILES['cust_photo']['name']!="") {
$cust_photo = $_FILES['cust_photo']['name'];
$upload = move_uploaded_file($_FILES['cust_photo']['tmp_name'],"admin/img/account_data/".$act_number."_".$cust_photo);
if($upload) {
unlink("admin/img/account_data/".$act_number."_".$cust_data_fetch[cust_photo]);
}
$update_cust = mysql_query("update act_holder_details set 
cust_name = '".$cust_name."',
cust_photo = '".$cust_photo."',
cust_sex = '".$cust_sex."',
cust_mail = '".$cust_mail."',
cust_phone = '".$cust_phone."',
cust_password = '".$cust_password."',
cust_address = '".$cust_address."',
joining_date = '".$joining_date."'
where id = '".$cust_id."'");
if($update_cust) {
echo "<script>window.location = 'act_details.php';</script>";
}
}
else {
$update_cust = mysql_query("update act_holder_details set 
cust_name = '".$cust_name."',
cust_sex = '".$cust_sex."',
cust_mail = '".$cust_mail."',
cust_phone = '".$cust_phone."',
cust_password = '".$cust_password."',
cust_address = '".$cust_address."',
joining_date = '".$joining_date."'
where id = '".$cust_id."'");

if($update_cust) {
echo "<script>window.location = 'act_details.php';</script>";
}
}
}
?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Edit Details</a>
					</li>
				</ul>
			</div>
            
           <?php include "menu.php";?>
		
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white" data-original-title>
						<h2 style="color:white;font-size:40px;font-wight:bold"><i class="icon-edit"></i> Edit Details </h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
						<!--<a href="add_cust.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add Customer</a>-->
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white">
						<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
						  <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
							
							<div class="control-group">
							  <label class="control-label" for="date01"> Name</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_name];?>" name="cust_name">
                                  </div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="fileInput"> customer photograph </label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="cust_photo"><br />
                                <img src="admin/img/account_data/<?php echo $cust_data_fetch[cust_act_number]."_".$cust_data_fetch[cust_photo];?>" width="70" height="70"/>
							  </div>
							</div>	
                            
                            
							<div class="control-group">
							  <label class="control-label" for="date01"> Sex </label>
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
								  <input class="input-xlarge focused" id="focusedInput" type="email" value="<?php echo $cust_data_fetch[cust_mail];?>" name="cust_mail">
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
								  <input class="input-xlarge focused" id="focusedInput" type="password" value="<?php echo $cust_data_fetch[cust_password];?>" name="cust_password">
								</div>
							</div>	
                            
							<div class="control-group">
							  <label class="control-label" for="date01"> Address</label>
							 <div class="controls">
								  <textarea class="autogrow" name="cust_address"><?php echo $cust_data_fetch[cust_address];?></textarea>
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="typeahead"> Branch Name </label>
							  <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_branch_name];?>" name="cust_branch_name" readonly="readonly">
							  </div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01"> Account Number </label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_act_number];?>" name="act_number" readonly="readonly">
								</div>
							</div>		
                            
                            <div class="control-group">
							  <label class="control-label" for="typeahead"> Account Type </label>
							  <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_atc_type];?>" name="act_type" readonly="readonly">
								</div>
							</div>	
							
							<div class="form-actions" style="background: rgba(0, 0, 0, 0);;padding:15px;color:white">
							  <button type="submit" class="btn btn-primary" name="update_data">Update Data</button>
							  <a href="act_details.php" class="btn">Cancel</a>
						  </fieldset>
						</form>
					</div>
				</div><!--/span-->

			</div><!--/row-->



    
<?php include('footer.php'); ?>
