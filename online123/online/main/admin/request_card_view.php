<?php include('header.php'); ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Card Details</a>

					</li>

				</ul>

			</div>

			

             <div class="row-fluid sortable">		

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-user"></i> Manage Card</h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="request_card.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Request Card</a>

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<table class="table table-striped table-bordered bootstrap-datatable datatable">

						  <thead>

							  <tr>

								  <th>Card Number</th>

                                  <th>Card Type</th>

                                  <th>Issue Date</th>

								  <th>Status</th>

								  <!--<th>Actions</th>-->

							  </tr>

						  </thead>   

						  <tbody>

						

							

                            <?php

							$card_data = mysql_query("select * from card where cust_act_number = '".$_SESSION['act_number']."'");

							while($card_data_fetch = mysql_fetch_array($card_data)) {

							?>

                            <tr>

								<td><?php echo $card_data_fetch['card_number']; ?></td>

                                <td><?php echo $card_data_fetch['card_type']; ?></td>

                                <td><?php echo $card_data_fetch['date']; ?></td>

								<td class="center">

                                <?php

								if($card_data_fetch['status']=="requested") {

								?>

									<span class="label label-warning">Pending</span>

                                <?php } 

								else {?>

                                	<span class="label label-success">Active</span>

                                <?php } ?>

								</td>

								<!--<td class="center">

									<a class="btn btn-success" href="#">

										<i class="icon-zoom-in icon-white"></i>  

										View                                            

									</a>

									<a class="btn btn-info" href="#">

										<i class="icon-edit icon-white"></i>  

										Edit                                            

									</a>

									<a class="btn btn-danger" href="#">

										<i class="icon-trash icon-white"></i> 

										Delete

									</a>

								</td>-->

							</tr>

							<?php } ?>

							

						

						  </tbody>

					  </table>            

					</div>

				</div><!--/span-->

			

			</div>





    

<?php include('footer.php'); ?>

