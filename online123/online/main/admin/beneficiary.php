<?php include('header.php'); 
ob_start();
?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="#">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">beneficiary</a>

					</li>

				</ul>

			</div>

			

			

			<div class="row-fluid sortable">	

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2> Beneficiary Data </h2>

						<div class="box-icon">

							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>

						</div>

					</div>

					<div class="box-content">
<!--
                    <form action="" name="search" method="post">

                    <div class="form-actions">

               		  <input type="text" name="act_number" placeholder="Account Number" required /><br />

					  <button type="submit" class="btn btn-primary" name="get_transaction">Get Statement</button>

					</div>

                    </form>
-->
						<table class="table table-bordered table-striped table-condensed">

							  <thead>

								  <tr>

                                  	  <th>Beneficiary Name</th>

									  <th> Beneficiary Address</th>

                                      <th>Beneficiary country</th>

                                      <th>Beneficiary Account no</th>

									  <th>Beneficiary Bank name</th>

									  <th>Beneficiary Bank Address</th>

                                        <th>Beneficiary Swift</th>
                                        <th>Beneficiary sort code</th>
                                        <th>Beneficiary Added By</th>
								  </tr>

							  </thead> 

                              <?php

							//  if(isset($_REQUEST['get_transaction'])) {

							  $transaction_details = mysql_query("SELECT * FROM business_user");

							  while($transaction_details_fetch = mysql_fetch_array($transaction_details)) {

							  

							  ?>  

							  <tbody>

								<tr>

                                	<td><?php echo $transaction_details_fetch['name']; ?></td>

									<td><?php echo $transaction_details_fetch['address']; ?></td>

                                    <td><?php echo $transaction_details_fetch['country']; ?></td>

                                    <td><?php echo $transaction_details_fetch['account_no']; ?></td>

									<td class="center"><?php echo $transaction_details_fetch['bank_name']; ?></td>

									<td class="center"><?php echo $transaction_details_fetch['bank_address']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['swift']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['sort_code']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['added_by']; ?></td>
									 


									?>
</td>
								</tr>

							  </tbody>

                              <?php }// }?>

						 </table>  

						  

					</div>

				</div><!--/span-->

			</div><!--/row-->

    

<?php include('footer.php'); ?>

