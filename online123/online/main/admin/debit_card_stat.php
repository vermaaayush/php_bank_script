<?php include('header.php'); ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Debit Card Status </a>

					</li>

				</ul>

			</div>

			

             <div class="row-fluid sortable">		

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-user"></i> Manage Debit Card </h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<!--<a href="isseu_card.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning"> Issue New Card </a>-->

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<table class="table table-striped table-bordered bootstrap-datatable datatable">

						  <thead>

							  <tr>

								  <th>Account Number</th>

								  <th>Card Number</th>

                                  <th>Card Type</th>

								  <th>Status</th>

								  <th>Actions</th>

							  </tr>

						  </thead>   

						  <tbody>

						  <?php

						  $request_details = mysql_query("select * from card where card_type = 'debit'");

						  while($request_details_fetch = mysql_fetch_array($request_details)) {

						  ?>

							

							<tr>

								<td><?php echo $request_details_fetch['cust_act_number']; ?></td>

								<td><?php echo $request_details_fetch['card_number']; ?></td>

                                <td><?php echo $request_details_fetch['card_type']; ?></td>

								<td class="center">

									<?php echo $request_details_fetch['status']; ?>

								</td>

								<td class="center">

                                <?php

								if($request_details_fetch['status']=="requested") {

								?>

									<a class="btn btn-success" href="issue_card_script.php?id=<?php echo $request_details_fetch['id']; ?>">

										<i class="icon-zoom-in icon-white"></i>  

										Issue                                            

									</a>

								<?php } ?>	

								</td>

							</tr>

				         <?php } ?>

						

						  </tbody>

					  </table>            

					</div>

				</div><!--/span-->

			

			</div>





    

<?php include('footer.php'); ?>

