<?php include('header.php'); ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Messages</a>

					</li>

				</ul>

			</div>

			

             <div class="row-fluid sortable">		

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-user"></i> Manage Messages</h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<!--<a href="pages.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add New</a>-->

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<table class="table table-striped table-bordered bootstrap-datatable datatable">

						  <thead>

							  <tr>

								  <th>Message</th>

								  <th>Sending Date</th>

                                  <th>Reply</th>

                                  <th>Action</th>

							  </tr>

						  </thead>   

						  <tbody>

						  <?php

						  $get_msg = mysql_query("SELECT * FROM msg where receiver = 'Customer Service'");

						  while($get_msg_fetch = mysql_fetch_array($get_msg)) {

						  ?>

							<tr>

								<td><?php echo $get_msg_fetch['msg']; ?></td>

								<td><?php echo $get_msg_fetch['date']; ?></td>

                                <td>

                                <?php

								$get_reply = mysql_fetch_array(mysql_query("select * from msg where reply_id = '".$get_msg_fetch['id']."'"));

                                echo $get_reply['msg'];

								?>

                                </td>

                                <td>

                                <?php if($get_reply['msg']=="") { ?>

                                <a class="btn btn-success" href="msg_reply.php?id=<?php echo $get_msg_fetch[id]; ?>">

										<i class="icon-zoom-in icon-white"></i>  

										Reply                                            

								</a>

                                <?php } else {?>

                                <a class="btn btn-success" href="#">

										<i class="icon-zoom-in icon-white"></i>  

										You Already Replied                                            

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

