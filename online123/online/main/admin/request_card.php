<?php include('header.php'); 

if(isset($_REQUEST['request_card'])) {

$card_type = $_REQUEST['card_type'];

$msg = $_REQUEST['msg'];

$date = date('Y-m-d');





$insert_request = mysql_query("insert into card (cust_act_number,card_type,date,status,message) values('".$_SESSION['act_number']."','".$card_type."','".$date."','requested','".$msg."')");



if($insert_request) {

echo "<script>window.location = 'request_card_view.php';</script>";

}

}



?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Request Card</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Request New Card</h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="request_card.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Request Card</a>

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

							  <label class="control-label" for="typeahead"> Card Type </label>

							  <div class="controls">

								  <select id="selectError3" name="card_type">

                                  	<option value="">--SELECT--</option>

									<option value="debit">Debit</option>

									<option value="credit">Credit</option>

								  </select>

								</div>

							</div>

							

							

							<div class="control-group">

							  <label class="control-label" for="date01">message</label>

							 <div class="controls">

								  <textarea class="autogrow" name="msg"></textarea>

								</div>

							</div>	

							

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary" name="request_card">Request Card</button>

							  <button type="reset" class="btn">Cancel</button>

							</div>

						  </fieldset>

						</form>   



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

