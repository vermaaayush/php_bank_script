<?php include('header.php');
$cust_id = $_REQUEST['id']; 
$cust_data_fetch = mysql_fetch_array(mysql_query("SELECT * FROM act_holder_details WHERE cust_act_number = '".$_SESSION['act_number']."'"));
?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#"> Customer Details </a>
					</li>
				</ul>
			</div>
			 <?php include "menu.php";?>
			<div class="row-fluid sortable">
				<div class="box span12" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white">
					<div class="box-header well" style="background: rgba(0, 0, 0, 0.5);color:white" data-original-title>
						<h2 style="color:white;font-size:40px;font-wight:bold"><!--i class="icon-edit"></i--><?php echo $get_details['cust_name']; ?>'s Account Profile</h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;"></div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" style="color:white" action="edit_cust.php" method="get">
						  <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
							
							<div class="control-group">
							  <label class="control-label" for="date01"> Name</label>
							 <div class="controls">
								  <input name="cust_name" type="text" class="input-xlarge focused" id="focusedInput" value="<?php echo $cust_data_fetch[cust_name];?>" readonly="readonly">
								</div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="date01"> customer photograph </label>
							 <div class="controls">
								  <img src="admin/img/account_data/<?php echo $cust_data_fetch[cust_act_number]."_".$cust_data_fetch[cust_photo]; ?>" width="70" height="70" />
								</div>
							</div>	
                            
                            
							<div class="control-group">
							  <label class="control-label" for="date01"> Sex  </label>
							 <div class="controls">
<?php echo $cust_data_fetch[cust_sex];?>								  <div style="clear:both"></div>
								</div>
							</div>	
							
                            <div class="control-group">
							  <label class="control-label" for="date01"> Mail ID</label>
							 <div class="controls">
								  <input name="cust_mail" type="text" class="input-xlarge focused" id="focusedInput" value="<?php echo $cust_data_fetch[cust_mail];?>" readonly="readonly">
								</div>
							</div>	
                            
                            <div class="control-group">
							  <label class="control-label" for="date01"> Phone Number</label>
							 <div class="controls">
								  <input name="cust_phone" type="text" class="input-xlarge focused" id="focusedInput" value="<?php echo $cust_data_fetch[cust_phone];?>" readonly="readonly">
								</div>
							</div>
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">Password</label>
							 <div class="controls">
								  <input name="cust_password" type="password" class="input-xlarge focused" id="focusedInput" value="<?php echo $cust_data_fetch[cust_password];?>" readonly="readonly">
								</div>
							</div>	
                            
							<div class="control-group">
							  <label class="control-label" for="date01"> Address</label>
							 <div class="controls">
								  <textarea name="cust_address" readonly="readonly" class="autogrow"><?php echo $cust_data_fetch[cust_address];?></textarea>
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
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $cust_data_fetch[cust_atc_type];?>" name="act_type" readonly="readonly" >
								</div>
							</div>	
							<input type ="hidden" name="id"  value="<?php echo $cust_data_fetch[id];?>"
							<div class="form-actions">
                                                          <input type ="submit" value= "Edit page" class="asd_button">
							  
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



    
<?php include('footer.php'); ?>
