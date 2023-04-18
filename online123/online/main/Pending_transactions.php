<?php 
session_start();
include('header.php'); 
?>

<link rel="stylesheet" href="css/reveal.css">	
	  	
		<!-- Attach necessary scripts -->
		<!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="js/jquery.reveal.js"></script>
        <script language="javascript" type="text/javascript">

function check(value)

{

alert(value);

var text=document.getElementById('scr_key_'+value).value;

alert(text);

$.ajax({

type: "POST",

url: "token.php",

data: "value=" + value+"&val_txt="+text,

success: function(msg){

	if(msg=="Inval"){

		//alert(msg);

		document.getElementById('error_msg').style.display="block";

		return false;

	}else{

		window.location.href= 'tranc_page.php?id='+msg;

	}

//document.getElementById('approved').innerHTML=msg;



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
			 <?php include "menu.php";?>
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" style="background: rgba(0, 0, 0, 0.5);color:white" data-original-title>
						<h2 style="color:white;font-size:40px;font-wight:bold">Transaction Details</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content" style="background: rgba(0, 0, 0, 0.5);color:white">
                    <form action="<?php $_SERVER['PHP_SELF']?>" name="search" method="post">
                    <div class="form-actions" style="background: rgba(0, 0, 0, 0);color:white">
                      <input type="text" class="input-xlarge datepicker" id="date01" placeholder="Form" name="form_date" required>
               		  <input type="text" class="input-xlarge datepicker" id="date02" placeholder="To" name="to_date" required><br />
					  <button type="submit" class="btn btn-primary" name="get_transaction">Get Transaction</button>
					</div>
                    </form>
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
                                  	  <th>Account Number</th>
									  <th>Transaction ID</th>
                                      <th>Description</th>
                                      <th>Check Number</th>
                                      <th>Debited</th>
                                      <th>Credited</th>
									  <th>Date Of Transaction</th>
                                      <th>Balance</th>
                                      <th>Status</th>
								  </tr>
							  </thead> 
                              <?php
							  if(isset($_REQUEST['get_transaction'])) {
							  
							
							  $transaction_details = mysql_query("SELECT * FROM transaction WHERE act_number='".$_SESSION['act_number']."' AND status='0' AND transaction_date between '".$_REQUEST['form_date']."' AND '".$_REQUEST['to_date']."' ORDER BY id DESC");
							  //$transaction_details = mysql_query("SELECT * FROM transaction");
							  while($transaction_details_fetch = mysql_fetch_array($transaction_details)) {
								  
								 //print_r($transaction_details_fetch);
								 //echo $transaction_details_fetch['id'];
							  
							  ?>  
							  <tbody>
								<tr>
                                	<td><?php echo $transaction_details_fetch['act_number']; ?></td>
									<td><?php echo $transaction_details_fetch['transaction_id']; ?></td>
                                    <td><?php echo $transaction_details_fetch['description']; ?></td>
                                    <td><?php echo $transaction_details_fetch['chk_number']; ?></td>
                                    <td><?php echo $transaction_details_fetch['debited']; ?></td>
                                    <td><?php echo $transaction_details_fetch['credited']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['transaction_date']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['present_balance']; ?></td>
                                    <td class="center">
									<?php 
									$hid=$transaction_details_fetch['id'];
									if($transaction_details_fetch['status']==1)
									{?>
                                    
										Completed
                                    
									<?php } 
									else{
									?>
            Pending
           
            <div id="myModal_<?php echo $transaction_details_fetch['id'] ?>" class="reveal-modal">
            <div id="error_msg" style="color:#F00; display:none"> Please Check Your Token Number</div>
			<h1 style="size:5px;">Enter Your Token Number</h1>
			<p>
            <input placeholder="Enter Your Secret Key" size="24" id="scr_key_<?php echo $transaction_details_fetch['id']?>" name="scr_key" type="text" onchange="return check(<?php echo $transaction_details_fetch['id']?>)" />
            </p>
            <p>
            <div style="margin-top:26px; padding:0px; cursor:pointer; color:#006" align="center"><b> Click Here</b></div>
            </p>
            <a class="close-reveal-modal">&#215;</a>
		    </div>
            
                                    <?php 
									}
									?>
                                    
                                    </td>   
								</tr>
							  </tbody>
                              <?php } }
							  else{
								  
								  $transaction_details = mysql_query("SELECT * FROM transaction WHERE act_number='".$_SESSION['act_number']."'   AND

								     	transaction_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 2 DAY) AND CURDATE() ORDER BY id DESC LIMIT 0,20");
							  //$transaction_details = mysql_query("SELECT * FROM transaction");
							  while($transaction_details_fetch = mysql_fetch_array($transaction_details)) {
								  
								 //print_r($transaction_details_fetch);
								 //echo $transaction_details_fetch['id'];
							  if($transaction_details_fetch['status']==1 ||$transaction_details_fetch['status']==0  || $transaction_details_fetch['status']==3 ){
							  ?>  
							  <tbody>
								<tr>
                                	<td><?php echo $transaction_details_fetch['act_number']; ?></td>
									<td><?php echo $transaction_details_fetch['transaction_id']; ?></td>
                                    <td><?php echo $transaction_details_fetch['description']; ?></td>
                                    <td><?php echo $transaction_details_fetch['chk_number']; ?></td>
                                    <td><?php echo $transaction_details_fetch['debited']; ?></td>
                                    <td><?php echo $transaction_details_fetch['credited']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['transaction_date']; ?></td>
									<td class="center"><?php echo $transaction_details_fetch['present_balance']; ?></td>
                                    <td class="center">
									<?php 
									$hid=$transaction_details_fetch['id'];
									if($transaction_details_fetch['status']==3)
									{?>
                                    
										processed
                                    
									<?php } 

									else{
										$status="pending";
										  $stage= $transaction_details_fetch['stage'];
										  if($stage==1)
										  {
										  	if($transaction_details_fetch['bankid']==0)
										  	{
										  	    	echo '<a href="success_page2s.php?id='.$transaction_details_fetch['id'].'">'.$status.'</a>';
										  	}
										  	else
										  	{
										  	echo '<a href="success_page1s.php?id='.$transaction_details_fetch['id'].'">'.$status.'</a>';
										  }
										  }
										  else if($stage==2)
										  {
										  	echo '<a href="success_page2s.php?id='.$transaction_details_fetch['id'].'">'.$status.'</a>';
										  }
										  else if($stage==0)
										  {
										  	echo '<a href="success_page.php?id='.$transaction_details_fetch['id'].'">'.$status.'</a>';
										  }
										   else if($stage==3)
										   {
										   	
										   	echo '<a href="sucess_page3s.php?id='.$transaction_details_fetch['id'].'">'.$status.'</a>';
										   }
										   else
										   {
										   	echo '<a href="success_page.php?id='.$transaction_details_fetch['id'].'">'.$status.'</a>';
										   }
										}
									?>
            
           
            <div id="myModal_<?php echo $transaction_details_fetch['id'] ?>" class="reveal-modal">
            <div id="error_msg" style="color:#F00; display:none"> Please Check Your Token Number</div>
			<h1 style="size:5px;">Enter Your Token Number</h1>
			<p>
            <input placeholder="Enter Your Secret Key" size="24" id="scr_key_<?php echo $transaction_details_fetch['id']?>" name="scr_key" type="text" onchange="return check(<?php echo $transaction_details_fetch['id']?>)" />
            </p>
            <p>
            <div style="margin-top:26px; padding:0px; cursor:pointer; color:#006" align="center"><b> Click Here</b></div>
            </p>
            <a class="close-reveal-modal">&#215;</a>
		    </div>
            
                                    <?php 
									}
									?>
                                    
                                    </td>   
								</tr>
							  </tbody>
                              <?php }
								 }?>
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
