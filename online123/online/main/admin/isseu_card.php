<?php include('header.php');

if(isset($_REQUEST['issue'])) {

$act_number = $_REQUEST['act_number'];

$card_type = $_REQUEST['card_type'];

$issue_date = str_replace('/','-',$_REQUEST['issue_date']);

$card_number = $_REQUEST['card_number'];



$insert_card = mysql_query("insert into card (cust_act_number,card_number,card_type,date,status) values('".$act_number."','".$card_number."','".$card_type."','".$issue_date."','issue')");

}





 ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Issue Card</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Issue New Card </h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="isseu_card.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning"> Issue New Card </a>

						</div>

					</div>

					<div class="box-content">

						<form class="form-horizontal" method="post" action="">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

                            

                            <div class="control-group">

							  <label class="control-label"> Account Number </label>

							  <div class="controls">

                             	  <select id="selectError3" name="act_number">

                                  	<option value="">--SELECT--</option>

                                      <?php

									  $account_number_sql = mysql_query("SELECT * FROM act_holder_details");

									  while($account_number = mysql_fetch_array($account_number_sql)) {

									  ?>

									<option value="<?php echo $account_number['cust_act_number'];?>"><?php echo $account_number['cust_act_number'];?></option>

									  <?php } ?>

								  </select>

								</div>

							</div>

                            

							<div class="control-group">

							  <label class="control-label"> Card Type </label>

							  <div class="controls">

								  <select id="selectError3" name="card_type">

                                  	<option value="">--SELECT--</option>

									<option value="debit">Debit</option>

									<option value="credit">Credit</option>

								  </select>

								</div>

							</div>

							<div class="control-group">

							  <label class="control-label" for="date01">Issue Date</label>

							  <div class="controls">

								<input type="text" class="input-xlarge datepicker" id="date01" name="issue_date">

							  </div>

							</div>

							

                            <div class="control-group">

							  <label class="control-label">Card Number</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="password" type="text" name="card_number">

                                  &nbsp;

                                  <a href="#" title="Auto Generate Password" data-rel="tooltip" class="btn btn-warning link-password" id="generate">

                                Generate Password

                                </a>

								</div>

							</div>	

							

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary" name="issue">Issue Card</button>

							  <button type="reset" class="btn">Cancel</button>

							</div>

						  </fieldset>

						</form>   



					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

