<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Welcome</a> <span class="divider"> <?php
						if(!isset($_SESSION['username'])) {
						echo $get_details['cust_name']; ?>
						<img src="admin/img/account_data/<?php echo $get_details[cust_act_number]."_".$get_details[cust_photo]; ?>" width="40" height="40" style="margin-left:10px;" />
						
						<?php }
						else 
						{
						?>
                        admin
                        <?php } ?></span>
					</li>
					
				</ul>
			</div>
            
            <div class="menu">
            <table width="500" border="0" cellspacing="4" cellpadding="4">
  				<tr>   
    			<td><a href="dashboard.php">Accounts&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>
    			<td><a href="request_card_view.php">Cards&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>
    			<td><a href="request_chequebook_view.php">Chequebook&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>
    			<td><a href="fund_transfer.php">Fund Transfer&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>  
                <td><a href="send_msg.php">Message&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>  
 			 	</tr>
				</table>
			</div>
            
            <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Account Summery </h2>
						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">
						<!--<a href="pages.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add New</a>-->
							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
                    <?php
					$get_data = mysql_query("select * from act_holder_details where cust_act_number = '".$_SESSION['act_number']."'");
					?>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Account Number</th>
								  <th>Account Name</th>
                                  <th>Branch</th>
                                  <th>Account Type</th>
                                  <th>Account Balance</th>
                                  <th>Statement</th>
							  </tr>
						  </thead> 
                          <?php while($get_data_fetch = mysql_fetch_array($get_data)) { ?>  
						  <tbody>
							<tr>
								<td><?php echo $get_data_fetch['cust_act_number']; ?></td>
                                <td><?php echo $get_data_fetch['cust_name']; ?></td>
                                <td><?php echo $get_data_fetch['cust_branch_name']; ?></td>
                                <td><?php echo $get_data_fetch['cust_atc_type']; ?></td>
                                <td>
								<?php 
								$get_blnc = mysql_fetch_array(mysql_query("select * from transaction where act_number = '".$_SESSION['act_number']."' order by id desc limit 1"));
								echo $get_blnc[present_balance]; ?></td>
                                <td><a href="cust_mini_statement.php?act_number=<?php echo $get_data_fetch['cust_act_number']; ?>">Mini Statement</a></td>
							</tr>
						 </tbody>
                         <?php } ?>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>

				  

		  
       
<?php include('footer.php'); ?>
