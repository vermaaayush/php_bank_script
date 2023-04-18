<?php include('header.php'); 

$sender_act_number = mysql_fetch_array(mysql_query("select * from msg where id = '".$_REQUEST['id']."'"));



$reply_to = mysql_fetch_array(mysql_query("select act.*, m.* from act_holder_details act, msg m where act.cust_act_number = '".$sender_act_number['sender']."'"));



if(isset($_REQUEST['send']))

{

$msg = $_REQUEST['msg'];

$date = date("Y.m.d");

$sender = "ADMIN";

$receiver = $sender_act_number['sender'];

$send_msg = mysql_query("insert into msg (msg,date,sender,receiver,reply_id) values('".$msg."','".$date."','".$sender."','".$receiver."','".$_REQUEST['id']."')");

if($send_msg) 

{

echo "<script>window.location = 'view_msg.php?alert=1';</script>";

}

}

?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Reply Message</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Send Reply To This Message</h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<!--<a href="send_msg.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Send Another Message</a>-->

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

                    

					

						<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

							

							<div class="control-group">

							  <label class="control-label" for="date01">To</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $reply_to['cust_name']; ?>" disabled="disabled">

								</div>

							</div>	

							

							     

							<div class="control-group">

							  <label class="control-label" for="textarea2">Please Type Your Reply</label>

							  <div class="controls">

								<textarea class="cleditor" name="msg" id="textarea2" rows="3"></textarea>

							  </div>

							</div>

							

							

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary" name="send">Send Message</button>

							  <button type="reset" class="btn">Cancel</button>

							</div>

						  </fieldset>

						</form>   

					

					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

