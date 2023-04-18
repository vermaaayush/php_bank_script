<?php include('header.php'); ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Customer</a>

					</li>

				</ul>

			</div>

			

             <div class="row-fluid sortable">		

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-user"></i> View Customer </h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="add_cust.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add Customer</a>

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

                    <form action="<?php $_SERVER['PHP_SELF']?>" name="search" method="post">

                    <div class="form-actions">

               		  <select id="selectError3" name="branch_name">

                      <?php 

					  $get_branch = mysql_query("select * from bank_details order by id desc");

					  while($get_branch_fetch = mysql_fetch_array($get_branch)) {

					  ?>

									<option value="<?php echo $get_branch_fetch[branch_name]; ?>"><?php echo $get_branch_fetch[branch_name]; ?></option>

					  <?php } ?>	

					  </select><br />

					  <button type="submit" class="btn btn-primary" name="get_details">Search</button>

					</div>

                    </form>

						<table class="table table-striped table-bordered bootstrap-datatable datatable">

                          <thead>

							  <tr>

								  <th>Bank Name</th>

								  <th>Actions</th>

							  </tr>

						  </thead>   

						  <tbody>

							<?php

							if(isset($_REQUEST['get_details'])) {

							$cust_data = mysql_query("SELECT * FROM act_holder_details where cust_branch_name = '".$_REQUEST['branch_name']."'");

							}

							else {

							$cust_data = mysql_query("SELECT * FROM act_holder_details");

							}

							while($cust_data_fetch = mysql_fetch_array($cust_data)) {

							?>

                           <tr>

								<td><?php echo $cust_data_fetch['cust_name'];?></td>

								<!--<td class="center">2012/02/01</td>

								<td class="center">Admin</td>-->

								<td class="center">

									<a class="btn btn-success" href="view_cust_data.php?id=<?php echo $cust_data_fetch['id']; ?>">

										<i class="icon-zoom-in icon-white"></i>  

										View                                            

									</a>

									<a class="btn btn-info" href="edit_cust.php?id=<?php echo $cust_data_fetch['id']; ?>">

										<i class="icon-edit icon-white"></i>  

										Edit                                            

									</a>

									

                                    <a class="btn btn-danger" href="delete_cust.php?id=<?php echo $cust_data_fetch['id']; ?>">

										<i class="icon-trash icon-white"></i> 

										Delete

									</a>
									<?php 
									if($cust_data_fetch['cust_bank_account_status']=="Blocked")
									{
									    echo "<span style='color:red'>**ACTIVATE USER (Blocked)**</span>";
									}
									
									?>
									
								

								</td>

							</tr>

							<?php } ?>

						

						  </tbody>

					  </table>            

					</div>

				</div><!--/span-->

			

			</div>





    

<?php include('footer.php'); ?>

