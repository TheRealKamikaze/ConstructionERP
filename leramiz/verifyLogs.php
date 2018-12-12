<?php
	include 'connection.php';
	$logId = $_POST['logId'];
	$sql = "UPDATE logs SET isVerified = 1 WHERE logId = '$logId'";
	$result = mysqli_query($conn, $sql);
	if($result)
	{
		echo "Log number ".$logId." modified<br>";
	}
	else
	{
		echo "Inside ajax call but UPDATE not fired<br>";
	}
?>