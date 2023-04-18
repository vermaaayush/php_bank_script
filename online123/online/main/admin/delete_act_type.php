<?php

include("conn.php");

$type_id = $_REQUEST['id'];

$delete_type = mysql_query("delete from account_type where id = $type_id");

if($delete_type)

{

header("location:view_type.php?msg=1");

}

else 

{

header("location:view_type.php?msg=0");

}

?>