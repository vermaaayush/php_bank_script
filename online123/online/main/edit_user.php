<?php include('header.php'); 
$user_id = $_REQUEST['id'];
$user_data = mysql_fetch_array(mysql_query("select * from user where id = '".$user_id."'"));

if(isset($_REQUEST['add_user'])) {
$user_name = $_REQUEST['user_name'];
$user_sex = $_REQUEST['user_sex'];
$user_mail = $_REQUEST['user_mail'];
$user_phone = $_REQUEST['user_phone'];
$user_password = $_REQUEST['user_password'];
$user_address = $_REQUEST['user_address'];
$joining_date = date("m.d.Y");

$insert_user = mysql_query("insert into user (user_name,user_sex,user_mail,user_phone,user_password,user_address,joining_date) values('".$user_name."','".$user_sex."','".$user_mail."','".$user_phone."','".$user_password."','".$user_address."','".$joining_date."')");
if($insert_user) {
echo "<script>window.location = 'view_user.php';</script>";
}
}
?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Add User</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Add User </h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
						<a href="add_user.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add User</a>
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
                    	<form class="form-horizontal" name="user_data" id="user_data" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
						  <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
							
							<div class="control-group">
							  <label class="control-label" for="date01">User Name</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $user_data['user_name'];?>" name="user_name">
								</div>
							</div>	
							
							<div class="control-group">
							  <label class="control-label" for="date01">Sex</label>
							 <div class="controls">
								  <label class="radio">
									<input type="radio" name="user_sex" id="optionsRadios1" value="male" <?php if($user_data['user_sex']=="male") {?> checked="checked" <?php } ?>> Male
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="user_sex" id="optionsRadios2" value="female" <?php if($user_data['user_sex']=="female") {?> checked="checked" <?php } ?>> Female
								  </label>
								</div>
							</div>	
							
                            <div class="control-group">
							  <label class="control-label" for="date01">Mail ID</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $user_data['user_mail'];?>" name="user_mail">
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">Phone Number</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $user_data['user_phone'];?>" name="user_phone">
								</div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">Password</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="password" value="<?php echo $user_data['user_password'];?>" name="user_password">
								</div>
							</div>	
                            
							<div class="control-group">
							  <label class="control-label" for="date01">Address</label>
							 <div class="controls">
								  <textarea class="autogrow" name="user_address"><?php echo $user_data['user_address'];?></textarea>
								</div>
							</div>			
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="add_user">Add User</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



    
<?php include('footer.php'); ?>
