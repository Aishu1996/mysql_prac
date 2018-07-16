<?php
require 'core.php';
require 'mysql_part1.php';
if(!loggedin())
{
	if( isset($_POST['username'])&&
		isset($_POST['password'])&&
		isset($_POST['password_again'])&&
		isset($_POST['firstname'])&&
		isset($_POST['surname']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_again = $_POST['password_again'];

		//we need a version of password which is md5 encrypted
		$password_hash = md5($password);
		$firstname = $_POST['firstname'];
		$surname = $_POST['surname'];

		if(!empty($username) &&!empty($password) &&!empty($password_again) &&!empty($firstname) &&!empty($surname))
		{
			//compare the two passwords

			if($password!=$password_again)
			{
				echo 'password do not match';
			}
			else
			{
			 //starts the registeration process
				$query = "SELECT `username` FROM `users` WHERE `username`='$username'";
				//now run the query
				$query_run = mysql_query($query);
				//now count the amount of rows
				if(@mysql_num_rows($query_run)==1)
				{
					echo 'The username already exists';
				}
				else
				{
					$query = "INSERT INTO `users` VALUES('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."')";

					if($query_run = mysql_query($query))
					{
						echo 'successfully registered!';
					}
					else
					{
						echo 'sorry we couldnt register u this time';
					}
				}
			}
		}
		else
		{
			echo 'please fill all fields. All fields are required';
		}
	}





	






?>
	
<form action="register.php" method="POST">
	Username: <input type="text" name="username" value="<?php echo @$username; ?>"><br><br>
	Password: <input type="password" name="password"><br><br>
	Password again: <input type="password" name="password_again"><br><br>
	Firstname: <input type="text" name="firstname" value="<?php echo @$firstname; ?>"><br><br>
	Surname: <input type="text" name="surname" value="<?php echo @$surname; ?>"><br><br>
	<input type="submit" value="Register"><br><br>
</form>	

<?php	
}
else if(loggedin())
{
	echo 'U are already registered and logged in!';
}

?>