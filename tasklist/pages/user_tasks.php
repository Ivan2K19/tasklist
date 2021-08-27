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

	if (isset($_GET['delete']))
	{
		$id=$_GET['delete'];
		$str_del_task="DELETE FROM `tasks` WHERE id='$id'";
		$run_del_task=mysqli_query($connect,$str_del_task);
	}

	if (isset($_GET['ready']))
	{
		$id=$_GET['ready'];
		$str_del_task="UPDATE `tasks` SET `status`='1' WHERE `id`='$id'";
		$run_del_task=mysqli_query($connect,$str_del_task);
	}

	if (isset($_GET['unready']))
	{
		$id=$_GET['unready'];
		$str_del_task="UPDATE `tasks` SET `status`='0' WHERE `id`='$id'";
		$run_del_task=mysqli_query($connect,$str_del_task);
	}
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
		<div class="tasks">
			<div>
				<span><?php echo "$tasks[description]";?></span><br>
				<form method="GET">
					<?php
					if ($tasks[status]=="0")
					{
						echo "<a href=?ready=$tasks[id]><div class=s_button>READY</div></a>";
					}
					else
					{
						echo "<a href=?unready=$tasks[id]><div class=s_button>UNREADY</div></a>";
					}
					?>
					<a href="?delete=<?= $tasks['id']?>" ><div class="s_button">DELETE</div></a>
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