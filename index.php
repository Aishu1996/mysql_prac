<?php
require 'core.php';
require 'mysql_part1.php';

if(loggedin())
{	

	$firstname = getuserfield('firstname');
	$surname = getuserfield('surname');
	echo 'you are logged in, '.$firstname.' '.$surname.'<a href="logout.php">Log out</a><br>';
	//echo @getuserfield('firstname');
}
else
{
	include 'login_form.php';
}

?>