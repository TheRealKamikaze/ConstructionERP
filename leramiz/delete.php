<?php
	define('DB_SERVER','localhost');    //server being localhost
    define('DB_USERNAME','root');   //username for the server root here, may change during hosting
	define('DB_PASSWORD','');           //no password has been set 
	define('DB_NAME','construction');   //database name, construction here
	$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);    //creates a connection to a mysql server, also has a port argument not included here
	if($conn==false){
		die("Error!! Couldn't connect to the database".mysqli_connect_error());     //displays the message and exits the script
	}

	$id=$_POST['id'];
	$sql="select from accounts where pid=?";
        	$stmt=mysqli_stmt_init($conn);
        	if(!mysqli_stmt_prepare($stmt,$sql)){
        		echo "some error";
        	}
        	else{
        		mysqli_stmt_bind_param($stmt,"i",$id);
        		if(mysqli_stmt_execute($stmt)){
        			if($row=mysqli_fetch_assoc($result)){
        				$upload=$row['uploadedBy'];
        		}
        		$result=mysqli_stmt_get_result($stmt);
        	}
        	if($upload==$_SESSION['username']){
        		$sql="delete from accounts where pid=?";
        		$stmt=mysqli_stmt_init($conn);
        	if(!mysqli_stmt_prepare($stmt,$sql)){
        		echo "some error ".mysqli_stmt_error($stmt);
        	}
        	else{
        		mysqli_stmt_bind_param($stmt,"i",$id);
        		if(mysqli_stmt_execute($stmt)){
        			echo "successfully, deleted!!";
        		}
        		$result=mysqli_stmt_get_result($stmt);
        		echo $result;
        	}
        	}
        }
			
?>