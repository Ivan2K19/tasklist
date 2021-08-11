<?php
	include "pages/db.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign in/Sign up</title>
	<link rel="stylesheet" type="text/css" href="styles/auth.css">
</head>
<body>
	<div class="wrapper">
		<?php
			$login=$_POST['login'];
			$password=$_POST['password'];
			$auth=$_POST['auth'];

			if ($auth)
			{
				$_SESSION['login']=$_POST['login'];
				$_SESSION['password']=$_POST['pass'];
				$_SESSION['auth']=$_POST['auth'];
			}

			if ($_SESSION['auth'])
			{
				$str_auth="SELECT * FROM `users` WHERE `login`='$_SESSION[login]' AND `password`='$_SESSION[password]'";
				$run_auth=mysqli_query($connect,$str_auth);
				$out_auth=mysqli_fetch_array($run_auth);
				$count_row=mysqli_num_rows($run_auth);

				if ($count_row){
					include "user_tasks.php";
				}
				else
				{
					$str_add_user="INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$password');";
					$run_add_user=mysqli_query($connect,$str_add_user);
					if ($run_add_user)
						{
							include "user_tasks.php";
						}
				}
			}
			else
			{
				include "pages/auth_form.php";
			}

			?>
		
	</div>
</body>
</html>