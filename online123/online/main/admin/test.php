<?php

include("conn.php");

if(isset($_POST['Submit']))

{

	$u = $_POST['textfield'];

	$p = md5($_POST['textfield2']);

	mysql_query("Insert into admin(id,username,password,email,status) values('','$u','$p','joydip.hazra@kreativefingers.com','1')");

}

?>

<form name="form1" method="post" action="">

  <p>

    <input type="text" name="textfield">

</p>

  <p>

    <input type="password" name="textfield2">

</p>

  <p>

    <input type="submit" name="Submit" value="Submit">

  </p>

</form>



