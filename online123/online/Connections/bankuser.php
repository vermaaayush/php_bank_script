<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_bankuser = "localhost";
$database_bankuser = "cilfpbct_db";
$username_bankuser = "cilfpbct_db";
$password_bankuser = "cilfpbct_db";
$bankuser = mysql_pconnect($hostname_bankuser, $username_bankuser, $password_bankuser) or trigger_error(mysql_error(),E_USER_ERROR); 
?>