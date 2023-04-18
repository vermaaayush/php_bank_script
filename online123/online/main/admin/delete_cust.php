<?php

include("conn.php");

$cust_id = $_REQUEST['id'];

$delete_cust = mysql_query("delete from act_holder_details where id = $cust_id");

if($delete_cust)

{

header("location:view_act_holder.php?msg=1");

}

else 

{

header("location:view_act_holder.php?msg=0");

}

?>