<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'mydatabase';

if(mysql_connect($mysql_host, $mysql_user, $mysql_pass) && mysql_select_db($mysql_db))
{
	echo 'connection established...database connected successfully!'.'<br>';
}
else
{
	echo 'not connected'.'<br>';
}

/*if(mysql_select_db($mysql_db))
{
	echo 'db connected!';
}
else
{
	echo 'not connected';
}*/

?>