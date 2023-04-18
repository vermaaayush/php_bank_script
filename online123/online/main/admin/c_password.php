<?php
ob_start();
include('header.php');
$a=0;
if(isset($_REQUEST['change'])) {
    

$last_password =$_REQUEST['last_password'];
$password =$_REQUEST['password'];
$confirm_password =$_REQUEST['confirm'];
$admin='admin';
$result=mysql_query("SELECT * FROM admin where username='".$admin."' and password='".$last_password."'");

  if(mysql_num_rows($result)==0){
      $a=1;
      $err=" Please check your last password";
}
else{
    
if($password!=$confirm_password)
{
    $a=1;
    $err = "Passoword and confirm password not matched";

}
else
{
    mysql_query("UPDATE admin SET password = '$password' WHERE id = 1");
    $a=1;
    $err="Password updated ! Redirecting in few seconds ........";
    session_unset($_SESSION['username']);
    header('Refresh: 2; URL=index.php');
}

}
}



 ?>





			<div>

				<ul class="breadcrumb">

					<li>

						<a href="dashboard.php">Home</a> <span class="divider">/</span>

					</li>

					<li>

						<a href="#">Password change</a>

					</li>

				</ul>

			</div>

			

			<div class="row-fluid sortable">

				<div class="box span12">

					<div class="box-header well" data-original-title>

						<h2><i class="icon-edit"></i> Password change </h2>

						<div style="clear: none; float: right; height: 18px; margin: -1px 2px 0;">

						<a href="add_branch.php" title="Add New Page" data-rel="tooltip" class="btn btn-warning">Add Branch</a>

							<!--<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>-->

							<!--<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>

							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>-->

						</div>

					</div>

					<div class="box-content">

						<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="post">

						  <fieldset>

							<!--<legend>Datepicker, Autocomplete, WYSIWYG</legend>-->

							<div class="control-group">

							  <label class="control-label" for="date01">Last Password</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="last_password" required>

								</div>

							</div>

                            

                            <div class="control-group">

							  <label class="control-label" for="date01">New password</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="password" required>

								</div>

							</div>
							<div class="control-group">

							  <label class="control-label" for="date01">Confirm password</label>

							 <div class="controls">

								  <input class="input-xlarge focused" id="focusedInput" type="text" value="" name="confirm" required>

								</div>

							</div>

							

                            
						

							<div class="form-actions">

							  <button type="submit" class="btn btn-primary" name="change">Change</button>

							  <button type="reset" class="btn">Cancel</button>

							</div>

						  </fieldset>

						</form>   
<h3>

    <?php
if($a==1)
{
    echo $err;
}

?>
</h3>


					</div>

				</div><!--/span-->



			</div><!--/row-->







    

<?php include('footer.php'); ?>

