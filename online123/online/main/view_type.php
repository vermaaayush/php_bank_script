<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="dashboard.php">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Account Type</a>
					</li>
				</ul>
			</div>
			
             <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Manage Account Type </h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
						<a href="add_account_type.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add Type</a>
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
								  <th>Account Type</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
							$act_type_data = mysql_query("SELECT * FROM account_type");
							while($act_type_data_fetch = mysql_fetch_array($act_type_data)) {
							?>
                           <tr>
								<td><?php echo $act_type_data_fetch['type_name'];?></td>
								<!--<td class="center">2012/02/01</td>
								<td class="center">Admin</td>-->
								<td class="center">
									<!--<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										View                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
									-->
                                    <a class="btn btn-danger" href="delete_act_type.php?id=<?php echo $act_type_data_fetch['id']; ?>">
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
