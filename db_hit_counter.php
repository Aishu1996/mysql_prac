<?php

require 'mysql_part1.php';


 $user_ip = $_SERVER['REMOTE_ADDR'];

function ip_exists($ip)
{
	global $user_ip;
	//echo '$user_ip';
	$query = "SELECT `ip` FROM `hits_ip` WHERE `ip`='$user_ip'";
	$query_run = mysql_query($query);
	$query_num_rows = mysql_num_rows($query_run);
	if($query_num_rows==0)
	{
		return false;
	}
	elseif ($query_num_rows>=1)
	{
		return true;
	}
	
}


function ip_add($ip)
{
	$query = "INSERT INTO `hits_ip` VALUES ('$ip')";
	$query_run = mysql_query($query);
}

function update_count()
{
	$query = "SELECT `count` FROM `hits_count`";
	if($query_run = mysql_query($query))
	{
		$count = mysql_result($query_run, 0, 'count');
		$count_inc = $count + 1;

		$query_update = "UPDATE `hits_count` SET `count` = '$count_inc'";
		if($query_update_run = mysql_query($query_update))
		{
			echo 'okay';
		}
	}
	else 
	{
		
	}
}

update_count();
ip_add($user_ip);

if (ip_exists($user_ip))
{
	echo 'exists!';
}
else
{
	echo 'Doesnt exists';
}


?>