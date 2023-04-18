<?php
include("conn.php");
$id = $_REQUEST['id'];
$character_array = array_merge(range(a, z), range(0, 9));
$string = "";
    for($i = 0; $i < 6; $i++) {
        $string .= $character_array[rand(0, (count($character_array) - 1))];
    }
$update_card = mysql_query("update card set status = 'issued', card_number = '".$string."' where id = '".$id."'");
echo "<script>window.location = 'debit_card_stat.php';</script>";
?>