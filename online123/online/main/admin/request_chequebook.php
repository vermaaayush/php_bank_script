<?php include('header.php');

if(isset($_REQUEST['send_request'])) {

$act_number = $_REQUEST['act_number'];

$request_msg = $_REQUEST['request_msg'];

$date = date('Y-m-d');

$issue_chk_book = mysql_query("insert into check_book (cust_act_number,isseu_date,message,status) values('".$act_number."','".$date."','".$request_msg."','requested')");

if($issue_chk_book) {

echo "<script>window.location = 'request_chequebook_view.php';</script>";

}

}

 ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">New Check Book</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Request Check Book </h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="request_chequebook.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Request Check Book</a>

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<form class="form-horizontal" action="" method="post">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

							

							<div class="control-group">

							  <label class="control-label" for="date01">Account Number</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" name="act_number">

								</div>

							</div>	

                            

							<div class="control-group">

							  <label class="control-label" for="date01">Message</label>

							 <div class="controls">

								  <textarea class="autogrow" name="request_msg"></textarea>

								</div>

							</div>			

							

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary" name="send_request">Send Request</button>

							  <!--<button type="reset" class="btn">Cancel</button>-->

							</div>

						  </fieldset>

						</form>   



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

