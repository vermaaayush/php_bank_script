<?php include('header.php'); ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Bank</a>

					</li>

				</ul>

			</div>

			

             <div class="row-fluid sortable">		

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-user"></i> Bank List </h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="add_bank.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add Bank</a>

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

                     <?php 

					if($_REQUEST['msg']=="1")

					{

					?>

					<div class="alert alert-success">

							<button type="button" class="close" data-dismiss="alert">&Chi;</button>

							<?php echo "DELETE SUCCESSFULL"; ?>

					</div>

					<?php

                    }

					?>

                    <?php 

					if($_REQUEST['msg']=="0")

					{

					?>

					<div class="alert alert-error">

							<button type="button" class="close" data-dismiss="alert">&Chi;</button>

							<?php echo "DELETE NOT SUCESSFULL"; ?>

					</div>

					<?php

                    }

					?>

						<table class="table table-striped table-bordered bootstrap-datatable datatable">

						  <thead>

							  <tr>

								  <th>Bank Name</th>

                                  <th>Actions</th>

							  </tr>

						  </thead>   

						  <tbody>

							<?php

							$bank_data = mysql_query("SELECT * FROM bank_details");

							while($bank_data_fetch = mysql_fetch_array($bank_data)) {

							?>

                           <tr>

								<td><?php echo $bank_data_fetch['bank_name'];?></td>

                                <!--<td class="center">2012/02/01</td>

								<td class="center">Admin</td>-->

								<td class="center">

									<a class="btn btn-success" href="view_bank_details.php?id=<?php echo $bank_data_fetch['id']; ?>">

										<i class="icon-zoom-in icon-white"></i>  

										View                                            

									</a>

									<a class="btn btn-info" href="edit_bank.php?id=<?php echo $bank_data_fetch['id']; ?>">

										<i class="icon-edit icon-white"></i>  

										Edit                                            

									</a>

									<a class="btn btn-danger" href="delete_bank.php?id=<?php echo $bank_data_fetch['id']; ?>">

										<i class="icon-trash icon-white"></i> 

										Delete

									</a>

								</td>

							</tr>

							<?php } ?>

						

						  </tbody>

					  </table>            

					</div>

				</div><!--/span-->

			

			</div>





    

<?php include('footer.php'); ?>

