<?php include('header.php'); ?>
 

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Message</a>
					</li>
				</ul>
			</div>
			<?php include "menu.php";?>
             <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><!--i class="icon-user"></i--> Manage Message </h2>
						<div style="clear: none; float: right; height: 18px; margin: -32px 2px 0;">
						<a href="send_msg.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning asd_button">Send Message</a>
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
                    <?php if($_REQUEST['alert']==1) { ?>
                    <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&Chi;</button>
							<?php echo "MESSAGE SEND SUCCESSFULLY ADMIN WILL CONTACT YOU SOON!"; ?>
                    </div>
                    <?php } ?>
						<table class="table table-striped table-bordered bootstrap-datatable datatable asd_dashboard">
						  <thead>
							  <tr>
								  <th>Message</th>
								  <th>Sending Date</th>
                                  <th>Reply From Admin</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
						  $get_msg = mysql_query("SELECT * FROM msg where sender='".$_SESSION['act_number']."'");
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
							</tr>
						<?php } ?>
						
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>


    
<?php include('footer.php'); ?>
