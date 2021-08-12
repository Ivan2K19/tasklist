<?php
	include "pages/db.php";
	session_start();

	$login=$_POST['login'];
	$password=$_POST['password'];
	$auth=$_POST['auth'];

	if ($auth)
	{
		$str_auth="SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'";
		$run_auth=mysqli_query($connect,$str_auth);
		$out_auth=mysqli_fetch_array($run_auth);
		$count_row=mysqli_num_rows($run_auth);

		if ($count_row){
			include "pages/user_tasks.php";
		}
		else
		{
			$str_add_user="INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$password')";
			$run_add_user=mysqli_query($connect,$str_add_user);
			if ($run_add_user)
				{
					include "pages/user_tasks.php";
				}
		}
	}
	else
	{
		include "pages/auth_form.php";
	}
		
	?>