<?php 

session_start();

if(isset($_SESSION["username"]))

{

include('header.php');

include('conn.php');

$unread_msg_count = mysql_num_rows(mysql_query("select * from msg where reply_id=''"));

$msg_count = mysql_num_rows(mysql_query("select * from msg where reply_id=''"));





if(isset($_REQUEST['change']))

{

$sql=mysql_query("UPDATE admin SET `email`='".$_REQUEST['admin_email']."' where id=1");

}



if(isset($_REQUEST['submit']))

{

	$new_pass=$_REQUEST['n_pass'];

	$com_pass=$_REQUEST['cn_pass'];

	if(strcmp($new_pass,$com_pass)==0)

	{

      $sql_pass=mysql_query("UPDATE admin SET `password`='".$new_pass."' where id=1");

	}

	else

	{

		echo "Please Check Your Confirm Password";	

	}

}

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

					<span class="notification red"><?php echo $unread_msg_count; ?></span></a>

			</div>

            <div class="row-fluid">

            <?php

			

            $sql_email=mysql_query("select * from admin where id=1");

			$fetch_email=mysql_fetch_object($sql_email);

			

			?>

            <form name="frm" method="post"> 

             <table width="459">

             <tr>

             <td width="228" style="font-size:18px;font-weight:bold;">Admin Email Id:</td>

             <td width="219"><input type="text" required="required" value="<?php echo $fetch_email->email?>" name="admin_email" id="admin_email" /></td>

             </tr>

             <tr>

             <td colspan="2" align="right"><input type="submit" name="change" value="Change" /></td>

             </tr>

             </table>

             </form>

              <form name="frm1" method="post">

             <table>

             <tr>

             <td></td>

             <td></td>

             </tr>

             <tr>

             <td valign="top" style="font-size:18px;font-weight:bold;" rowspan="3">Change Admin Password</td>

             <td>

             <table>

             

             <tr>

             <td width="6">&nbsp;</td>

             

             <td width="154"><input placeholder="New Password" required="required" type="text" name="n_pass" id="n_pass" /></td>

             </tr>

             <tr>

             <td>&nbsp;</td>

             

             <td><input placeholder="Confirm New Password" required="required" type="text" name="cn_pass" id="cn_pass" /></td>

             </tr>

             </table>

             </td>

             </tr>

             <td></td>

             <tr>

             <td align="right"><input type="submit" name="submit" id="submit" value="SAVE"/></td>

             </tr>

             </table>

            </form>

            </div>

<?php include('footer.php'); }

else

{

header("location:../admin/index.php");	

}

?>

