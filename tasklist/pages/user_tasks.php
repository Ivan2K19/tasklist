<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Task List</title>
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
	<div class="wrapper">
		<div class="m_name">
			<span>Task List</span>
		</div>
		<div class="add_task_place">
			<form method="GET">
				<input type="text" name="e_task" class="input_p" placeholder="Enter text...">
				<input type="submit" name="add_task" class="m_button" value="ADD TASK"><br>
				<input type="submit" name="remove" class="l_button" value="REMOVE ALL">
				<input type="submit" name="ready" class="l_button" value="READY ALL">
			</form>
		</div>
		<?php
			include "db.php";

			$e_task=$_GET['e_task'];
			$add_task=$_GET['add_task'];
			$remove=$_GET['remove'];
			$ready=$_GET['ready'];

			if ($add_task) {
				$str_add_task="INSERT INTO `tasks` (`description`, `user_id`, `status`) VALUES ('$e_task', '$out_auth[id]', '0')";
				$run_add_task=mysqli_query($connect,$str_add_task);
			}

		?>
		<?php

		$result=mysqli_query($connect,"SELECT * FROM `tasks` WHERE `user_id`='$out_auth[id]'");
		
		while ($tasks=mysqli_fetch_assoc($result))
		{
		?>
		<div class="tasks">
			<div>
				<span><?php echo $tasks[description];?></span>
				<form method="GET">
					<input type="submit" name="ready_tt" class="s_button" value="READY">
					<input type="submit" name="delete_tt" class="s_button" value="DELETE">
				</form>
			</div>
			<div>
				<div class="circle"></div>
			</div>
		</div>
		<?php
		}
		?>
	</div>
	<form method="POST">
		<input type="submit" name="exit" value="Выйти" class="form_btn">
		<?php
		$exit=$_POST['exit'];
		if ($exit) {
			session_unset();
		}
		?>
	</form>	
</body>
</html>