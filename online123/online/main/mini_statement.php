<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Mini Statement</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2> Mini Statement </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                    <form action="<?php $_SERVER['PHP_SELF']?>" name="search" method="post">
                    <div class="form-actions">
               		  <input type="text" name="act_number" placeholder="Account Number"  /><br />
					  <button type="submit" class="btn btn-primary" name="get_transaction">Get Mini Statement</button>
					</div>
                    </form>
						<table class="table table-bordered table-striped table-condensed asd_dashboard">
							  <thead>
								  <tr>
                                  	  <th>Account Number</th>
									  <th>Balance</th>
								  </tr>
							  </thead> 
                              <?php
							  if(isset($_REQUEST['get_transaction'])) {
							  $recent_data_id = mysql_fetch_array(mysql_query("select max(id) from transaction where act_number = '".$_REQUEST['act_number']."'"));
							  $transaction_details = mysql_query("SELECT * FROM transaction WHERE act_number = '".$_REQUEST['act_number']."' AND id = '".$recent_data_id[0]."'");
							  while($transaction_details_fetch = mysql_fetch_array($transaction_details)) {
							  
							  ?>  
							  <tbody>
								<tr>
                                	<td><?php echo $transaction_details_fetch['act_number']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['present_balance']; ?></td>  
								</tr>
							  </tbody>
                              <?php } }?>
						 </table>  
						 <!--<div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>   -->  
					</div>
				</div><!--/span-->
			</div><!--/row-->
    
<?php include('footer.php'); ?>
