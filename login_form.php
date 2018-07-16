<?php
	if(isset($_POST['username'])&&isset($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_hash = md5($password);
		if(!empty($username) &&!empty($password))
		{
			$query = "SELECT `id` FROM `users` WHERE `username`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($password_hash)."'";
			if($query_run = mysql_query($query))
			{
				$query_num_rows = mysql_num_rows($query_run);
				if($query_num_rows==0)
				{

					echo 'invalid username password combination';
				}
				else if ($query_num_rows==1) 
				{
					echo $user_id = mysql_result($query_run, 0, 'id');		//will display the id of the user in the database..
					$_SESSION['user_id'] = $user_id;
					header('Location: index.php');
				}
			}
			else
			{
				echo 'not run';
			}
		}
		else
		{
			echo 'u must supply a username and passsword';
		}
	}
?>

<form action="<?php echo $current_file; ?>" method="POST">

	Username: <input type="text" name="username">
	Password: <input type="password" name="password">
	<input type="submit" value="Log in">
</form>	