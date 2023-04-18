<?php 

session_start();

if(isset($_SESSION["username"]))

{

include('header.php');

$unread_msg_count = mysql_num_rows(mysql_query("select * from msg where reply_id=''"));

$msg_count = mysql_num_rows(mysql_query("select * from msg where reply_id=''"));

?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="#">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Dashboard</a>

					</li>

				</ul>

			</div>

			<div class="sortable row-fluid">

				<!--<a data-rel="tooltip" title="6 new members." class="well span3 top-block" href="#">

					<span class="icon32 icon-red icon-user"></span>

					<div>Total Members</div>

					<div>507</div>

					<span class="notification">6</span>				</a>-->



				<!--<a data-rel="tooltip" title="4 new pro members." class="well span3 top-block" href="#">

					<span class="icon32 icon-color icon-star-on"></span>

					<div>Pro Members</div>

					<div>228</div>

					<span class="notification green">4</span>			  </a>

-->

				<!--<a data-rel="tooltip" title="$34 new sales." class="well span3 top-block" href="#">

					<span class="icon32 icon-color icon-cart"></span>

					<div>Sales</div>

					<div>$13320</div>

					<span class="notification yellow">$34</span>				</a>-->

				

				<a data-rel="tooltip" title="<?php echo $msg_count; ?> messages." class="well span3 top-block" href="view_msg.php">

					<span class="icon32 icon-color icon-envelope-closed"></span>

					<div>Messages</div>

					<div><?php echo $msg_count; ?></div>

					<span class="notification red"><?php echo $unread_msg_count; ?></span>				</a>

			</div>

			

			<div class="row-fluid">

				<div class="box span12">

					<div class="box-header well">

						<h2><i class="icon-info-sign"></i> Welcome</h2>

						<!--<div class="box-icon">

							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>

							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>

						</div>-->

					</div>

					<div class="box-content">

						

						<p><b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

						

						

						

						<div class="clearfix"></div>

					</div>

				</div>

			</div>



				  



		  

       

<?php include('footer.php'); }

else

{

header("location:../admin/index.php");	

}

?>

