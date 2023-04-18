<?php include('header.php'); 

?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="#">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Account Report</a>

					</li>

				</ul>

			</div>

			

			

			<div class="row-fluid sortable">	

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2>Account Report</h2>

						<div class="box-icon">

							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>

						</div>

					</div>

					<div class="box-content">

                    <form action="<?php $_SERVER['PHP_SELF']?>" name="search" method="post">

                    <div class="form-actions">

                      <select id="selectError3" name="cust_number" required>

                      <option value="">--SELECT--</option>

                        <?php

					    $account = mysql_query("SELECT DISTINCT cust_act_number FROM act_holder_details");

					    while($account_fetch = mysql_fetch_array($account)) {

						?>

					  <option value="<?php echo $account_fetch['cust_act_number']; ?>"><?php echo $account_fetch['cust_act_number']; ?></option>

						 <?php

						 }

						 ?>	

					  </select><br />

               		  <button type="submit" class="btn btn-primary" name="get_transaction">Get Details</button>

					</div>

                    </form>

						<table class="table table-bordered table-striped table-condensed">

							  <thead>

								  <tr>

                                	  <th>Transaction ID</th>

                                  	  <th>Transaction Date</th>

                                      <th>Account Holder Name</th>

                                      <th>Account Number</th>

									  <th>Debited</th>

                                      <th>Credited</th>

                                      <th>Balance</th>

								  </tr>

							  </thead> 

                              <?php

							  if(isset($_REQUEST['get_transaction'])) {

							  $transaction_details = mysql_query("SELECT act.*,trans.* FROM act_holder_details act,transaction trans WHERE act.cust_act_number = trans.act_number AND act.cust_act_number = '".$_REQUEST['cust_number']."' ");

							  while($transaction_details_fetch = mysql_fetch_array($transaction_details)) {

							  

							  ?>  

							  <tbody>

								<tr>

                                	<td><?php echo $transaction_details_fetch['transaction_id']; ?></td>

									<td><?php echo $transaction_details_fetch['transaction_date']; ?></td>

                                    <td class="center"><?php echo $transaction_details_fetch['cust_name']; ?></td>

                                    <td class="center"><?php echo $transaction_details_fetch['cust_act_number']; ?></td>

                                    <td class="center"><?php echo $transaction_details_fetch['debited']; ?></td>

                                    <td class="center"><?php echo $transaction_details_fetch['credited']; ?></td> 

                                    <td class="center"><?php echo $transaction_details_fetch['present_balance']; ?></td> 

								</tr>

							  </tbody>

                              <?php } }?>

						 </table>  

						 <!--<div class="pagination pagination-centered">

						  <ul>

							<li><a href="#">Prev</a></li>

							<li class="active">

							  <a href="#">1</a>

							</li>

							<li><a href="#">2</a></li>

							<li><a href="#">3</a></li>

							<li><a href="#">4</a></li>

							<li><a href="#">Next</a></li>

						  </ul>

						</div>   -->  

					</div>

				</div><!--/span-->

			</div><!--/row-->

    

<?php include('footer.php'); ?>

