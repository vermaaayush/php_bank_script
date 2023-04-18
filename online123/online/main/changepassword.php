<?php
session_start();
$user_id=$_SESSION['id'];
include"connectphp.php";

$after_logout="SELECT * FROM `registration` WHERE `id`='".$user_id."'";
$after_logout_query=mysql_query($after_logout);
$after_logout_fetch=mysql_fetch_object($after_logout_query);

include "header_inner4.php";
?>
<?php
if(isset($_POST['pass_submit']))
{
	
	$passward=$_POST['newpassword'];
	
	$update_passward="UPDATE `registration` SET passward='".addslashes($passward)."' where `id`='".$user_id."'";
    mysql_query($update_passward);
	$passupdate="SELECT * FROM `registration` WHERE `id`='".$user_id."'";
	$passupdate_query=mysql_query($passupdate);
	$passupdate_fetch=mysql_fetch_object($passupdate_query);
	$to=$passupdate_fetch->user_name;
	$subject="thanks to contact us";
	$massege="your new passward is '".$passward."'";
	if(mail($to, $subject, $massege))
	{
	echo 'mail send ';	
	}
	else
	{ 
	echo "Mail Not Send";
		
}
}

?>
  <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
  <div id="container">
  <div class="panel">
   	  <div class="top_panel2">
            	<div class="formheading">
            	  <h1>My account / Change password</h1>
            	</div>
<div class="left_panel4">
               
          <div class="leftpannaltext"><strong>Settings</strong></div> 
              
              <div class="popular">
              <table width="97%" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td width="8%"style="font-family:Arial, Helvetica, sans-serif; color:#F00; font-size:12px;">  1.</td>
    <td width="92%" ><a href="personaldata.php?user_name=<?php echo $after_logout_fetch->user_name; ?>&id=<?php echo $_SESSION['id'];  ?>" style="font-family:Arial, Helvetica, sans-serif; color:#F00; font-size:12px;"> 	
Personal data</a></td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; color:#F00; font-size:12px;">2.</td>
    <td><a href="changepassword.php?user_name=<?php echo $after_logout_fetch->user_name; ?>&id=<?php echo $_SESSION['id'];  ?>"style="font-family:Arial, Helvetica, sans-serif; color:#F00; font-size:12px;">Change password</a></td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; color:#F00; font-size:12px;">3.</td>
    <td><a href="My_addresses.php"style="font-family:Arial, Helvetica, sans-serif; color:#F00; font-size:12px;"><span role="treeitem"> My addresses</span></a></td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; color:#F00; font-size:12px;">4.</a></td>
    <td><a href="My_orderhistory.php"style="font-family:Arial, Helvetica, sans-serif; color:#F00; font-size:12px;">My order history</a></td>
  </tr>
	<tr>
    <td style="font-family:Arial, Helvetica, sans-serif; color:#F00; font-size:12px;">5.</a></td>
    <td><a href="My_favouriterestaurants.php"style="font-family:Arial, Helvetica, sans-serif; color:#F00; font-size:12px;">My favourite restaurants</a></td>
  </tr>
	
</table>
              </div>
              
              	<div class="discountsinregioncontainer" style="float:left;">
 
 				<a class="customerservice1" rel="nofollow" href="#"> Any questions? </a>
				<br>
				<a class="customerservice2" rel="nofollow" href="#"> Go to the customerservice </a>
 				</div>
    
     
          
          
                
                
</div>
             <div class="addright_panel2">
               <table  border="0" cellpadding="0" cellspacing="0">
                 <tbody>
                   <tr>
                     <td colspan="5"><div>
                       <table border="0" cellspacing="0">
                       <tbody>
                         <tr>
                           <td><div id="imyaccountmain">
                             <form action="changepassword.php" method="post">
                             <table border="0" cellpadding="0" cellspacing="0">
                               <tbody>
                               <tr>
                                 <td><table border="0" cellspacing="0">
                                   <tbody>
                                     <tr>
                                       <td><div id="imyaccountmain2">
                                         <div>
                                           <h1 >Change password</h1>
                                         </div>
                                         <table border="0" cellpadding="5" cellspacing="0">
                                           <tbody>
                                             <tr>
                                               <td width="103" style="color:#069; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:left"><label for="imyaccount_newpassword">New password:</label></td>
                                               <td width="465"><div>
                                                 <div>
                                                   <div>
                                                     <input name="newpassword" value="" class="inputfield" type="password" />
                                                   </div>
                                                 </div>
                                               </div></td>
                                             </tr>
                                             <tr>
                                               <td style="color:#069; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:left"><label for="imyaccount_repeatpassword">Repeat password:</label></td>
                                               <td><div>
                                                 <div>
                                                   <div>
                                                     <input name="newpassword" value="" class="inputfield"  type="password" />
                                                   </div>
                                                 </div>
                                               </div></td>
                                             </tr>
                                             
                                             
                                             
                                             
                                             <tr>
                                               <td>   </td>
                                               <td><table border="0" cellpadding="0" cellspacing="0">
                                                 <tbody>
                                                   <tr>
                                                     <td><div>
                                                       <div>
                                                         <input name="myaccount_mailpassword" value="1" id="imyaccount_mailpassword" onclick="checkCheckbox(this);" required tabindex="1" type="checkbox" />
                                                       </div>
                                                     </div></td>
                                                     <td><p>Mail a confirmation mail containing my new <br />
															password to my emailaddress (username)</p></td>
                                                   </tr>
                                                 </tbody>
                                               </table></td>
                                             </tr>
                                             
                                             <tr>
                                               <td>   </td>
                                               <td><table border="0" cellpadding="0" cellspacing="0">
                                                 <tbody>
                                                   <tr>
                                                     <td><div>
                                                       <div>
                                                         <input name="pass_submit" type="submit" class="login_bt3" value="Change Password" style="float:right;" />
                                                       </div>
                                                     </div></td>
                                                    
                                                   </tr>
                                                 </tbody>
                                               </table></td>
                                             </tr>
                                             
                                           </tbody>
                                         </table>
                                         <div></div>
                                         <div> </div>
                                       </div></td>
                                     </tr>
                                   </tbody>
                                 </table>                                   <label for="imyaccount_newpassword"></label></td>
                               </tr>
                               </tbody>
                             </table>
                             </form>
                           </div></td>
                         </tr>
                       </tbody>
                       </table>
                     </div></td>
                     <td> </td>
                   </tr>
                 </tbody>
               </table>
             
			
             
</div>
<div class="clr"></div>
<div id="footer">
		<?php include "footer.php"; ?>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>-->
<script src="js/script.js"></script>


</body>
</html>

