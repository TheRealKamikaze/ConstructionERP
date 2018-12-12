<?php
	ob_start();
	session_start();
	include 'connection.php';
?>
<?php
		if(isset($_POST['login']))
		{
			
			$emailEntered = false;
			$passwordEntered = false;
			$loginSuccess = false;
			if(!empty($_POST['emailId']))
			{
				$emailEntered = true;
				$emailId = $_POST['emailId'];
			}
			else
				echo "<script type='text/javascript' alert('Please enter email id!'); </script>";
			if(empty($_POST['password']))
			{
				echo "<script type='text/javascript' alert('Please enter password!'); </script>";
				header('location:login.php');
			}
			$sql = "SELECT * FROM user WHERE emailId = '$emailId'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$passwordInDatabase = $row['password'];
					if(!empty($_POST['password']))
					{
						$passwordEntered = true;
						$password = $_POST['password'];
					}
					if(password_verify($password, $passwordInDatabase))
					{
						$loginSuccess = true;
						$_SESSION['employeeEmailId'] = $row['emailId'];
						$_SESSION['employeeName'] = $row['employeeName'];
						$_SESSION['employeePhoneNo'] = $row['phoneNo'];
						$_SESSION['employeeType'] = $row['employeeType'];
						$_SESSION['employeeUniqueNo'] = $row['uniqueNumber'];
						$_SESSION['employeeDP'] = $row['employeeImage'];
						$_SESSION['employeePassword'] = $row['password'];
						$_SESSION['employeeGender'] = $row['employeeGender'];
						$_SESSION['employeeSalary'] = $row['employeeSalary'];
						$_SESSION['employeeExperience'] = $row['employeeExperience'];
						$_SESSION['employeeDesignation'] = $row['employeeType'];
						$_SESSION['accountantCount']=0;
						$_SESSION['architectCount']=0;
						$type = $row['employeeType'];
					}
					else
					{
						echo "<script> alert('Wrong password!'); </script>";
						$loginSuccess = false;
					}
				}
				if($loginSuccess)
				{
					echo $_SESSION['employeeEmailId'].'<br>'; echo $_SESSION['employeeName'].'<br>'; echo $_SESSION['employeePhoneNo'].'<br>'; echo $_SESSION['employeeType'].'<br>'; echo $_SESSION['employeeUniqueNo'].'<br>'; echo $_SESSION['employeeDP'].'<br>';
					if($type == 'architect')
						header("location:architectHomePage.php");
					else if($type == 'builder')
						header("location:builderHomePage.php");
					//echo "<script> alert('Login successful!'); window.location.assign(index.php); </script>";
				}
			}
			else
			{
				echo "<script> alert('No such email exists!'); </script>";
				$loginSuccess = false;
			}
		}


	?>
<!DOCTYPE html>
<html>
<head>
	<title>Login!</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style type="text/css">
		body {
		  margin: 0;
		  padding: 0;
		  background-color: #17a2b8;
		  height: 100vh;
		}
		#login .container #login-row #login-column #login-box {
		  margin-top: 120px;
		  max-width: 600px;
		  height: 320px;
		  border: 1px solid #9C9C9C;
		  background-color: #EAEAEA;
		}
		#login .container #login-row #login-column #login-box #login-form {
		  padding: 20px;
		}
		#login .container #login-row #login-column #login-box #login-form #register-link {
		  margin-top: -85px;
		}
	</style>
</head>
<body>

	<div id="login">
        <h3 class="text-center text-white pt-5">Welcome ANT Employee</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="emailId" class="text-info">Username:</label><br>
                                <input type="email" name="emailId" id="emailId" placeholder="Enter email-id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-info btn-md" value="login" id="login" value="Login">
                            </div>
                            <div id="register-link" class="text-right">
                                <br><a href="signUp.php" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- <form method="POST">
		Email id : <input type="email" name="emailId" id="emailId" placeholder="Enter email-id" class="form-control input-sm chat-input"><br><br>
		Password : <input type="password" name="password" id="password" class="form-control input-sm chat-input">
		<input type="submit" name="login" id="login">
	</form> -->

</body>
</html>