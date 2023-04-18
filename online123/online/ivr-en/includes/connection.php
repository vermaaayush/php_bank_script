<?php

mysql_connect("localhost","rockusen_user","kurrupt80@");

mysql_select_db("rockusen_db");

if(!isset($_SESSION['session'])) session_start();

extract($_REQUEST);

?>