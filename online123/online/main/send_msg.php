<?php include('header.php'); 
if(isset($_REQUEST['send']))
{
$msg = $_REQUEST['msg'];
if($msg=="") {
$alert = "Please Write a Message!";
}
else {
$date = date("Y.m.d");
$sender = $_SESSION['act_number'];
$receiver = "Customer Service";
$send_msg = mysql_query("insert into msg (msg,date,sender,receiver) values('".$msg."','".$date."','".$sender."','".$receiver."')");
if($send_msg) 
{
echo "<script>window.location = 'view_msg.php?alert=1';</script>";
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
						<a href="#">Create Message</a>
					</li>
				</ul>
			</div>
			<?php include "menu.php";?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white" data-original-title>
						<h2 style="color:white;font-size:40px;font-wight:bold"><!--i class="icon-edit"></i--> Send Message To Customer Service</h2>
						<div style="clear: none; float: right; height: 18px; margin: -32px 2px 0;">
						<a href="send_msg.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning asd_button">Send Another Message</a>
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->
							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white">
                    
					
						<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
						  <fieldset>
							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->
							<div class="control-group">
							  <label class="control-label" for="date01"></label>
							 <div class="controls">
                             <span style="color:#FF0000">
								  <?php
								  if(isset($alert))
								  {
								  echo $alert;
								  }
								  ?>
                                  </span>
								</div>
							</div>
                            
							<div class="control-group">
							  <label class="control-label" for="date01">To</label>
							 <div class="controls">
								  <input class="input-xlarge focused" id="focusedInput" type="text" value="Customer Service" disabled="disabled">
								</div>
							</div>	
							
							     
							<div class="control-group">
							  <label class="control-label" for="textarea2">Please Type Your Message</label>
							  <div class="controls">
                              <textarea class="cleditor" name="msg" id="textarea2" rows="3" cols="50"></textarea>
							  </div>
							</div>
							
							
							<div class="form-actions" style="background: rgba(0, 0, 0, 0);;padding:15px;color:white">
							  <button type="submit" class="btn btn-primary" name="send">Send Message</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					
					</div>
				</div><!--/span-->

			</div><!--/row-->



    
<?php include('footer.php'); ?>
