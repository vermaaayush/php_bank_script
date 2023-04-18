<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#"> Check Book</a>
					</li>
				</ul>
			</div>
			<?php include "menu.php";?>
             <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white" data-original-title>
						<h2 style="color:white;font-size:40px;font-wight:bold"><!--i class="icon-user"></i--> Check Book </h2>
						<div style="clear: none; float: right; height: 18px; margin: -32px 2px 0;">
						<a href="request_chequebook.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning asd_button">Request Check Book</a>
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content" style="background: rgba(0, 0, 0, 0.5);;padding:15px;color:white">
						<table class="table table-striped table-bordered bootstrap-datatable datatable asd_dashboard">
						  <thead>
							  <tr>
								  <th>Customer Account Number</th>
								  <th>Cheque Book Number</th>
                                  <th>Request Date</th>
								  <th>Status</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
						  $chkbook_details = mysql_query("select * from check_book where cust_act_number = '".$_SESSION['act_number']."'");
						  while($chkbook_details_fetch = mysql_fetch_array($chkbook_details)) {
						  ?>
							
							
							<tr>
								<td><?php echo $chkbook_details_fetch['cust_act_number']; ?></td>
                                <td><?php echo $chkbook_details_fetch['cust_chkbook_number']; ?></td>
                                <td><?php echo $chkbook_details_fetch['isseu_date']; ?></td>
								<td class="center">
                                <?php
								if($chkbook_details_fetch['status']=="requested") {
								?>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Requested                                            
									</a>
                                    <a class="btn btn-danger" href="issue_script.php?mode=cancel&id=<?php echo $chkbook_details_fetch['id']; ?>">
										<i class="icon-trash icon-white"></i> 
										Stop
									</a>
                                <?php 
								} 
								if($chkbook_details_fetch['status']=="issued") {
								?>
                                    <a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										Issued                                            
									</a>
                                <?php }   
                                if($chkbook_details_fetch['status']=="cancel") {
								?>
                                    <span class="label">Cancled</span>
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
