<?php
require 'mysql_part1.php';
?>

<form action="sql2.php" method="GET">
	Choose a food type:
	<select name="uh">
		<option value="u">Unhealthy</option>
		<option value="h">Healthy</option>
	</select><br><br>
	<input type="submit" value="Submit"><br><br>	

<?php

if(isset($_GET['uh']) &&!empty($_GET['uh']))
{
	 $uh = strtolower($_GET['uh']);

		if($uh=='u'||$uh=='h')
		{

				$query = " SELECT `food`, `calories` FROM `food` WHERE `healthy_unhealthy`='$uh' ORDER BY `id` DESC";
				if($query_run = mysql_query($query))
				{
					if(mysql_num_rows($query_run)==NULL)
					{
						echo 'No such records!'.'<br>';
					}	
					else
					{
						while($query_row = mysql_fetch_assoc($query_run))			// Fetch a result row as an associative array. 
						{
							$food = $query_row['food'];
							$calories = $query_row['calories'];

							echo $food.' has '.$calories.' calories.<br>';
						}
					}	
				}
				else
				{
					echo mysql_error();
				}
		}
		else
		{
			echo 'must be u or h';
		}		
}


?>

