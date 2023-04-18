<?php
// *** Logout the current user.
$logoutGoTo = "http://trexlorebk.com/online/main/index.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['username']);
unset($_SESSION['MM_UserGroup']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
