<?php

include("conn.php");

$user_id = $_REQUEST['id'];

$delete_user = mysql_query("delete from user where id = $user_id");

if($delete_user)

{

header("location:view_user.php?msg=1");

}

else 

{

header("location:view_user.php?msg=0");

}

?>