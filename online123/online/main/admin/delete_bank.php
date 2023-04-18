<?php

include("conn.php");

$bank_id = $_REQUEST['id'];

$delete_bank = mysql_query("delete from bank_details where id = $bank_id");

if($delete_bank)

{

header("location:view_branch.php?msg=1");

}

else 

{

header("location:view_branch.php?msg=0");

}

?>