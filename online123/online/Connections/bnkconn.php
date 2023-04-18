<?php

# FileName="Connection_php_mysql.htm"

# Type="MYSQL"

# HTTP="true"

$hostname_bnkconn = "localhost";

$database_bnkconn = "cilfpbct_db";

$username_bnkconn = "cilfpbct_db";

$password_bnkconn = "cilfpbct_db";

$bnkconn = mysql_pconnect($hostname_bnkconn, $username_bnkconn, $password_bnkconn) or trigger_error(mysql_error(),E_USER_ERROR); 

?>