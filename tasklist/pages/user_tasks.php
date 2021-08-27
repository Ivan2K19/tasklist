<?php
	include "db.php";

	$e_task=$_GET['e_task'];
	$add_task=$_GET['add_task'];
	$remove=$_GET['remove'];
	$ready=$_GET['ready'];

	$ready_tt=$_GET['ready_tt'];
	$delete_tt=$_GET['delete_tt'];

	if ($add_task) {
		$str_add_task="INSERT INTO `tasks` (`description`, `user_id`, `status`) VALUES ('$e_task', '$out_auth[id]', '0')";
		$run_add_task=mysqli_query($connect,$str_add_task);
	}

	if ($remove) {
		$str_del_all_task="DELETE FROM `tasks` WHERE `user_id`='$out_auth[id]'";
		$run_del_all_task=mysqli_query($connect,$str_del_all_task);
	}

	if ($ready) {
		if ($out_task['status']==0) {
			$str_rd_tasks="UPDATE `tasks` SET `status`='1' WHERE `user_id`='$out_auth[id]'";
			$run_rd_tasks=mysqli_query($connect,$str_rd_tasks);
		}
		
	}

	if (!isset($_GET['del']))
	{
		$id=$_GET['del'];
		$str_del_task="DELETE FROM `tasks` WHERE id='$id'";
		$run_del_task=mysqli_query($connect,$str_del_task);
	}

	

	/*if ($delete_tt) {
		$str_del_task="DELETE FROM `tasks` WHERE id='$out_task'";
		$run_del_task=mysqli_query($connect,$str_del_task);
	}

	if ($ready_tt) {
		$str_rd_task="UPDATE `tasks` SET `status`='1' WHERE `id`='$out_task'";
		$run_rd_task=mysqli_query($connect,$str_rd_task);
	}*/
?>
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

		$result=mysqli_query($connect,"SELECT * FROM `tasks` WHERE `user_id`='$out_auth[id]' ORDER BY `tasks`.`id` DESC");
		
		while ($tasks=mysqli_fetch_array($result))
		{
		?>
		<!-- <form method="POST"> -->
			<div class="tasks">
				<div>
					<span><?php echo "$tasks[description]";?></span><br>
					<form method="GET">
						<?php
						if ($tasks[status]=="0") {
							echo "<input type=submit name=ready_tt class=s_button value=READY>";
						}
						else
						{
							echo "<input type=submit name=ready_tt class=s_button value=UNREADY>";
						}
						?>
					</form>
					<form method="GET">
						<input type="submit" name="delete_tt" class="s_button" value="DELETE">
						<a href="?del=<?= $tasks['id']?>">delete</a>
					</form>
				</div>
				<div>
					<?php
						if ($tasks[status]=="0") {
							echo "<div class=circlef></div>";
						}
						else
						{
							echo "<div class=circlet></div>";
						}
					?>
				</div>
			</div>
		<!-- </form> -->
		<?php
		}
		?>
	</div>
	<form method="POST">
		<input type="submit" name="exit" value="Выйти">
		<?php
		$exit=$_POST['exit'];
		if ($exit) {
			session_unset();
		}
		?>
	</form>
	<pre>
	<?php 
	var_dump($str_del_task);
	?>
</body>
</html>