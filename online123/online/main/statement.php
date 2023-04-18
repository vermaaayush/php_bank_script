<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Statement</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2> Statement </h2>
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
					  <button type="submit" class="btn btn-primary" name="get_transaction">Get Statement</button>
					</div>
                    </form>
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
                                  	  <th>Account Number</th>
									  <th>Transaction ID</th>
                                      <th>Debited</th>
                                      <th>Credited</th>
									  <th>Date Of Transaction</th>
									  <th>Balance</th>
								  </tr>
							  </thead> 
                              <?php
							  if(isset($_REQUEST['get_transaction'])) {
							  $transaction_details = mysql_query("SELECT * FROM transaction WHERE act_number = '".$_REQUEST['act_number']."'");
							  while($transaction_details_fetch = mysql_fetch_array($transaction_details)) {
							  
							  ?>  
							  <tbody>
								<tr>
                                	<td><?php echo $transaction_details_fetch['act_number']; ?></td>
									<td><?php echo $transaction_details_fetch['transaction_id']; ?></td>
                                    <td><?php echo $transaction_details_fetch['debited']; ?></td>
                                    <td><?php echo $transaction_details_fetch['credited']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['transaction_date']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['present_balance']; ?></td>  
								</tr>
							  </tbody>
                              <?php } }?>
						 </table>  
						  
					</div>
				</div><!--/span-->
			</div><!--/row-->
    
<?php include('footer.php'); ?>
