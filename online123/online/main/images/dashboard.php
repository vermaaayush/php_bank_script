<?php 
session_start();
include('header.php'); 
include "conn.php";
//$userid=$_REQUEST['userid'];

$sql=mysql_query("select * from act_holder_details where `user_id`='".$_SESSION["username"]."'");
$get_details=mysql_fetch_assoc($sql);
$_SESSION['act_number']=$get_details['cust_act_number'];
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.2.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.2.css" media="screen" />
 	<link rel="stylesheet" href="style.css" />
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script>

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Welcome </a> <span class="divider"> <?php
						if(isset($_SESSION['username'])) {
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
    			<td><a id="various1" href="#inline1" title="Lorem ipsum dolor sit amet">Fund Transfer&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                <!--<a href="fund_transfer.php">Fund Transfer&nbsp;&nbsp;&nbsp;&nbsp;|</a>-->
                
                </td>  
                <td><a href="send_msg.php">Message&nbsp;&nbsp;&nbsp;&nbsp;|</a></td>  
 			 	</tr>
				</table>
                <div style="display: none;">
		<div id="inline1" style="width:400px;height:100px;overflow:auto;">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis mi eu elit tempor facilisis id et neque. Nulla sit amet sem sapien. Vestibulum imperdiet porta ante ac ornare. Nulla et lorem eu nibh adipiscing ultricies nec at lacus. Cras laoreet ultricies sem, at blandit mi eleifend aliquam. Nunc enim ipsum, vehicula non pretium varius, cursus ac tortor. Vivamus fringilla congue laoreet. Quisque ultrices sodales orci, quis rhoncus justo auctor in. Phasellus dui eros, bibendum eu feugiat ornare, faucibus eu mi. Nunc aliquet tempus sem, id aliquam diam varius ac. Maecenas nisl nunc, molestie vitae eleifend vel, iaculis sed magna. Aenean tempus lacus vitae orci posuere porttitor eget non felis. Donec lectus elit, aliquam nec eleifend sit amet, vestibulum sed nunc.
		</div>
	</div>
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
                                  <th>Account Balance (USD)</th>
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
								
								if(isset($get_blnc[present_balance]))
								{
								
								
								echo $get_blnc[present_balance]; 
								
								
								
								
								?>
                                
                                <?php }?>
                                
                                </td>
                                <td><a href="cust_mini_statement.php?act_number=<?php echo $get_data_fetch['cust_act_number']; ?>">Mini Statement</a></td>
							</tr>
						 </tbody>
                         <?php } ?>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>

				  

		  
       
<?php include('footer.php'); ?>
