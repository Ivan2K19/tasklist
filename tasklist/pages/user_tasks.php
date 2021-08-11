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
			<form method="POST">
				<input type="text" name="e_task" class="input_p" placeholder="Enter text...">
				<input type="submit" name="add_task" class="m_button" value="ADD TASK"><br>
				<input type="submit" name="remove" class="l_button" value="REMOVE ALL">
				<input type="submit" name="ready" class="l_button" value="READY ALL">
			</form>
		</div>
		<div class="tasks">
			<div>
				<span>Text</span>
				<form method="GET">
					<input type="submit" name="ready_tt" class="s_button" value="READY">
					<input type="submit" name="delete_tt" class="s_button" value="DELETE">
				</form>
			</div>
			<div>
				<div class="circle"></div>
			</div>
		</div>
		<div class="tasks">
			<div>
				<span>Text</span>
				<form method="GET">
					<input type="submit" name="ready_tt" class="s_button" value="READY">
					<input type="submit" name="delete_tt" class="s_button" value="DELETE">
				</form>
			</div>
			<div>
				<div class="circle"></div>
			</div>
		</div>
		<div class="tasks">
			<div>
				<span>Text</span>
				<form method="GET">
					<input type="submit" name="ready_tt" class="s_button" value="READY">
					<input type="submit" name="delete_tt" class="s_button" value="DELETE">
				</form>
			</div>
			<div>
				<div class="circle"></div>
			</div>
		</div>
	</div>
</body>
</html>