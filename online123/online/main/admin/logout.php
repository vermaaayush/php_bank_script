<?php
session_start();
if(isset($_SESSION["username"])) {
session_unset($_SESSION["username"]);
header("location:index.php");
}
if(isset($_SESSION['act_number'])) {
session_unset($_SESSION['act_number']);
header("location:../index.php");
}
?>