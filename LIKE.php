<?php
require 'mysql_part1.php';

if(isset($_POST['search_name']))
{
	$search_name = $_POST['search_name'];

	if(!empty($search_name))
	{
		if(strlen($search_name)>=3)
		{

			$query = "SELECT `Name` from `names` WHERE `Name` LIKE '%".mysql_real_escape_string($search_name)."%'";		
			//enclose in mysql_real_escape_string() so that mysql injection wont take place
			$query_run = mysql_query($query);

			$query_num_rows = mysql_num_rows($query_run);

			if($query_num_rows>=1)	//returns the number of rows
			{
			//now we have to display the data so use while loop & mysql_fetch_assoc function
				echo $query_num_rows.' Results found:<br>';
				while($query_row = mysql_fetch_assoc($query_run))
					{
						echo $query_row['Name'].'<br>';
					}
			}		
			else
			{
				echo 'No results found!';
			}
		}
		else
		{
			echo 'you must enter not less than 3 characters';
		}	

	}
}

?>

<form action="LIKE.php" method="POST">
	Name: <input type="text" name="search_name">
	<input type="submit" value="Search">
</form>	