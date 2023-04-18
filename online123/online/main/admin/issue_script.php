<?php

include("conn.php");

if(!isset($_REQUEST['mode'])) {

$character_array = array_merge(range(a, z), range(0, 9));

$string = "";

    for($i = 0; $i < 6; $i++) {

        $string .= $character_array[rand(0, (count($character_array) - 1))];

    }

	

$update_chkbook = mysql_query("update check_book set cust_chkbook_number = '".$string."', status = 'issued' where id = '".$_REQUEST['id']."'");

if($update_chkbook) {

echo "<script>window.location = 'chequebook_view.php';</script>";

}

}

if(isset($_REQUEST['mode'])) {

$update_request = mysql_query("update check_book set status = 'cancel' where id = '".$_REQUEST['id']."'");

if($update_request) {

echo "<script>window.location = 'request_chequebook_view.php';</script>";

}

}

?>