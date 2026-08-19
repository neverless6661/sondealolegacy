<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname = "34.55.77.19";
$database = "base1";
$username = "sondeadmin";
$password = "srk142536";
$conexion = mysql_connect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
?>