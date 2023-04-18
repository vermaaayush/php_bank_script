<?php include('header.php'); 
?>
<script type="application/javascript" language="javascript">
function approve(hid)
{
//alert(hid);
$.ajax({
type: "POST",
url: "approve123.php",
data: "hid=" + hid,
success: function(msg){
//alert(msg);
location.reload();

}
});
return false;
}
function get_numbertest(id)
{
	$.ajax({
	type: "POST",
	url: "number.php",
	data: "id=" + id,
	success: function(msg){
	//alert(msg);
	
	document.getElementById('number_'+id).value=msg;
	}
	});
	return false;
	
}

function send_mail(hid)
{
alert(hid);
$.ajax({
type: "POST",
url: "sendmail.php",
data: "hid=" + hid,
success: function(msg){
//alert(msg);

document.getElementById('show_msg').innerHTML=msg;
}
});
return false;
}
</script>



			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Transactions</a>
					</li>
				</ul>
			</div>
			<div id="show_msg" align="center" style="font-size:16px; color:#F00; font-weight:bold"></div>
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>Transaction Details</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                    <form action="<?php $_SERVER['PHP_SELF']?>" name="search" method="post">
                    <div class="form-actions">
                      <input type="text" class="input-xlarge datepicker" id="date01" placeholder="Form" name="form_date" required>
               		  <input type="text" class="input-xlarge datepicker" id="date02" placeholder="To" name="to_date" required><br />

                      <input type="hidden" name="today" value="<?php $date = date('Y-m-d'); ?>" />
               		  <!--<input type="text" name="act_number" id="act_number" placeholder="Account Number"  /><br />-->
					  <button type="submit" class="btn btn-primary" name="get_transaction">Get Transaction</button>
					</div>
                    </form>
                    
                    
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
                                  	  <th>Account Number</th>
									  <th>Customer Name</th>
                                      <th>Debited(USD)</th>
                                      <th>Credited(USD)</th>
									  <th>Date Of Transaction</th>
                                      <th>Token Number</th>
                                      <th>Status</th>
                                      <th>Send Mail</th>
									  <th>Balance(USD)</th>
								  </tr>
							  </thead> 
                              <?php
							  if(isset($_REQUEST['get_transaction'])) {
								  
							  $transaction_details = mysql_query("SELECT * FROM transaction WHERE status!='2' AND transaction_date between '".$_REQUEST['form_date']."' AND '".$_REQUEST['to_date']."' ORDER BY id DESC");
							  
							  while($transaction_details_fetch = mysql_fetch_array($transaction_details)) 
							  {
							  
							  ?>  
							  <tbody>
								<tr>
                                	<td><?php echo $transaction_details_fetch['act_number']; ?></td>
									<td><?php echo $transaction_details_fetch['cust_name']; ?></td>
                                    <td><?php echo $transaction_details_fetch['debited']; ?></td>
                                    <td><?php echo $transaction_details_fetch['credited']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['transaction_date']; ?></td>
									<td class="center">
                                    <?php if($transaction_details_fetch['status']==0){?>
									<input type="text" name="number" id="number_<?=$transaction_details_fetch['id'];?>" style="width:77px" />
                                    <input type="submit" onclick="return get_numbertest('<?=$transaction_details_fetch['id'];?>')" value="Get Number" name="get_number" id="get_number" />
                                    <?php }else{?>
                                    Transaction Completed
                                    <?php }?>
                                    </td>
                                    
                                <td>  <?php if($transaction_details_fetch['status']==1)
								{$hid=$transaction_details_fetch['id']; ?>
                                <!--<a href="#" onclick="return approve('<?=$hid?>');"/>-->Completed<!--</a>-->
                                
                                <?php }else{ ?>
                                
                                <!--<a href="#" onclick="return approve('<?=$transaction_details_fetch['id']?>');"/>-->Pending<!--</a>-->
                                
                                
                                <?php  }?></td>
                                 <td class="center">
                                  <?php if($transaction_details_fetch['status']==0){?>
									<input type="submit" onclick="return send_mail('<?=$transaction_details_fetch['id'];?>')" value="Send Mail" name="get_number" id="get_number" />
                                    <?php }?>
                                  </td>   
                                    
                                    <td class="center"><?php echo $transaction_details_fetch['present_balance']; ?></td>  
								</tr>
							  </tbody>
                              <?php } }
							  else
							  {
								  
							   $transaction_details1 = mysql_query("SELECT * FROM transaction WHERE status!='2' ORDER BY id DESC");
							  
							  while($transaction_details_fetch1 = mysql_fetch_array($transaction_details1)) {
							  ?>
                              
                              <tbody>
								<tr>
                                	<td><?php echo $transaction_details_fetch1['act_number']; ?></td>
									<td><?php echo $transaction_details_fetch1['cust_name']; ?></td>
                                    <td><?php echo $transaction_details_fetch1['debited']; ?></td>
                                    <td><?php echo $transaction_details_fetch1['credited']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch1['transaction_date']; ?></td>
									<td class="center">
									<?php if($transaction_details_fetch1['status']==0){?>
									<input type="text" name="number" id="number_<?=$transaction_details_fetch['id'];?>" style="width:77px" />
                                    <input type="submit" onclick="return get_numbertest('<?=$transaction_details_fetch['id'];?>')" value="Get Number" name="get_number" id="get_number" />
                                    <?php }else{?>
                                    Transaction Completed
                                    <?php }?>
                                    </td>
                                    
                                <td>  <?php if($transaction_details_fetch1['status']==1){$hid=$transaction_details_fetch1['id']; ?>
                                <!--<a href="#" onclick="return approve('<?=$hid?>');"/>-->Completed<!--</a>-->
                                
                                <?php }else{ ?>
                                
                                <!--<a href="#" onclick="return approve('<?=$transaction_details_fetch1['id']?>');"/>-->Pending<!--</a>-->
                                
                                
                                <?php  }?></td>
                                 
                                 <td class="center">
                                 <?php if($transaction_details_fetch1['status']==0){?>
									<input type="submit" onclick="return send_mail('<?=$transaction_details_fetch1['id'];?>')" value="Send Mail" name="get_number" id="get_number" />
                                    <?php }?>
                                  </td>   
                                    
                                    <td class="center"><?php echo $transaction_details_fetch1['present_balance']; ?></td>  
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
