<?php
		$employeeEmailId = $_POST['emailId'];
		$task = $_POST['task'];
		include 'connection.php';
		$sql = "INSERT INTO task(employeeEmailId, task) VALUES ('$employeeEmailId', '$task')";
		$result = mysqli_query($conn, $sql);
		if($result)
			echo "Task assigned<br>";
		else
			echo "Task not assigned<br>";
?>