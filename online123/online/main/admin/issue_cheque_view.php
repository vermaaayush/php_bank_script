<?php include('header.php'); ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Issued Cheque</a>

					</li>

				</ul>

			</div>

			

             <div class="row-fluid sortable">		

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-user"></i> Manage Cheque</h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="issue_cheque.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Issue Cheque</a>

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<table class="table table-striped table-bordered bootstrap-datatable datatable">

						  <thead>

							  <tr>

								  <th>Cheque Issued To</th>

                                  <th>Cheque Issued From</th>

                                  <th>Date of Issue</th>

                                  <th>Cheque Number</th>

                                  <th>Bank Name</th>

                                  <th>Branch Name</th>

                                  <th>Amount</th>

								  <th>Status</th>

								  <th>Actions</th>

							  </tr>

						  </thead>   

						  <tbody>

						  <?php

						  if(isset($_SESSION['username'])) {

						  $chk_data = mysql_query("SELECT * FROM cheque");

						  }

						  if(isset($_SESSION['act_number'])) {

						  $chk_data = mysql_query("SELECT * FROM cheque WHERE sender_act_number = '".$_SESSION['act_number']."' OR (receiver_act_number = '".$_SESSION['act_number']."' AND status != 'Cancled')");

						  }

						  while($chk_data_fetch = mysql_fetch_array($chk_data)) {

						  ?>	

							<tr>

								<td><?php echo $chk_data_fetch['receiver_act_number']; ?></td>

                                <td><?php echo $chk_data_fetch['sender_act_number']; ?></td>

                                <td><?php echo $chk_data_fetch['date']; ?></td>

                                <td><?php echo $chk_data_fetch['chk_number']; ?></td>

                                <td><?php echo $chk_data_fetch['bank_name']; ?></td>

                                <td><?php echo $chk_data_fetch['branch_name']; ?></td>

								<td class="center"><?php echo $chk_data_fetch['amount']; ?>&nbsp;USD</td>

                                <td class="center"><?php echo $chk_data_fetch['status']; ?></td>

								<td class="center">

									<?php

									if($chk_data_fetch['status']=="cancled") {

									?>

                                    <span class="label">Cancled</span>

                                    <?php } 

									elseif($chk_data_fetch['status']=="withdrawn") {

									?>

                                     <span class="label">withdrawn</span>

                                     <?php }

									 else {

									if($chk_data_fetch['receiver_act_number']==$_SESSION['act_number']) {

									?>

                                    <a class="btn btn-success" href="chk_action.php?mode=widraw&chk_no=<?php echo $chk_data_fetch['chk_number']; ?>&sender=<?php echo $chk_data_fetch['sender_act_number']; ?>&receiver=<?php echo $chk_data_fetch['receiver_act_number']; ?>">

										<i class="icon-zoom-in icon-white"></i>  

										Widraw                                            

									</a>

									<?php } else {?>

									<a class="btn btn-danger" href="chk_action.php?mode=cancel&chk_no=<?php echo $chk_data_fetch['chk_number']; ?>">

										<i class="icon-trash icon-white"></i> 

										Cancel

									</a>

                                    <?php if($chk_data_fetch['status']!="hold") { ?>

                                    <a class="btn btn-danger" href="chk_action.php?mode=hold&chk_no=<?php echo $chk_data_fetch['chk_number']; ?>">

										<i class="icon-trash icon-white"></i> 

										Hold

									</a>

                                    <?php } } } ?>

								</td>

							</tr>

				  		  <?php } ?>

						

						  </tbody>

					  </table>            

					</div>

				</div><!--/span-->

			

			</div>





    

<?php include('footer.php'); ?>

