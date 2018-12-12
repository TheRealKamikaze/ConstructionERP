<?php
      session_start();
      if(!isset($_SESSION['employeeName']))
      {
        header("location:index.php");
      }
      else
      {
        $architectName = $_SESSION['employeeName'];
        echo "<script type='text/javascript'> alert('Welcome '".$architectName."); </script>";
      } 
?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>ANT Constructions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#documentType').click(function() {
          var val = $('#documentType').val();
          if(val == 'floorPlan')
            $('#floorShow').show();
          else
            $('#floorShow').hide();
      });
    </script>
    <link rel="stylesheet" type="text/css" href="css/architectSidebar.css">
  </head>
  <body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="#">ANT Constructions</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="architectHomePage.php">Home</a></li>
        <li class="active"><a href="uploadDocumentsArchitect.php">Add Documents</a></li>
        <li><a href="categories.php">Projects</a></li>
        <li><a href="viewCadFilesArchitect.php">View CAD files</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="architectHomePage.php"><span class="glyphicon glyphicon-user"></span></a></li>
        <!-- <li><span style="color: white;">Logged in as echo $_SESSION['employeeEmailId']; ?></span></li> -->
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <img src="<?php echo $_SESSION['employeeDP']; ?>" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            <?php echo $_SESSION['employeeName']; ?>
          </div>
          <div class="profile-usertitle-job">
            Architect
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#reportModal">Submit report</button>
          <button type="button" class="btn btn-danger btn-sm"><a href="logout.php">Logout</a></button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li>
              <a href="architectHomePage.php">
              <i class="glyphicon glyphicon-home"></i>
              Home </a>
            </li>
            <li>
              <a href="changeAccountDetailsArchitect.php">
              <i class="glyphicon glyphicon-user"></i>
              Account Settings </a>
            </li>
            <li>
              <a href="#" target="_blank">
              <i class="glyphicon glyphicon-ok"></i>
              Tasks </a>
            </li>
            <li>
              <a href="categories.php">
              <i class="glyphicon glyphicon-flag"></i>
              Projects </a>
            </li>
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
    <div class="col-md-9">
            <div class="profile-content">

                <!-- Modal -->
			  <div class="modal fade" id="reportModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Submit a report</h4>
			        </div>
			        <div class="modal-body">
			          <form method="POST" enctype="multipart/form-data" action="" class="form-horizontal">
			          	<p>Enter your Report here</p><br>
			          	<input type="textarea" name="reportText" id="reportText" style="width: 100%; height: 20%;" required=""><hr>
			          	Attachment : <input type="file" name="report" id="reportText"><br>
			          	<input type="submit" name="submitReport" value="SUBMIT REPORT" id="submitReport" class="btn btn-success btn-sm">
			          </form>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>

            	<div class="page-header">
  					<h1>Upload the necessary documents</h1>
				</div>
              <div class="container">
				<div class="row">
					<div class="col-md-10">
						<form method="POST" enctype="multipart/form-data" action="" class="form-horizontal">
							Upload here : <input type="file" name="fileUpload" id="fileUpload" required>
							<br>

							Document Type : <!-- <input type="text" name="documentType" id="documentType" required> -->
							<br>Display Image <input type="radio" name="documentType" id="documentType" value="displayImage">
							<br>Floor Plan <input type="radio" name="documentType" id="documentType" value="floorPlan">
							<div id="floorShow" style="display: none;">
								Floor : <input type="number" name="floor" id="floor">
							</div>
							<br>Project Main Image <input type="radio" name="documentType" id="documentType" value="projectImage">
							<br>NOC <input type="radio" name="documentType" id="documentType" value="noc">
							<br>


							<!-- <input type="text" name="projectName" id="projectName" required> -->
							<?php
                include 'connection.php';
								$architectName = $_SESSION['employeeName'];
								$sql = "SELECT * FROM project WHERE architectName = '$architectName' LIMIT 1";
								$result = mysqli_query($conn, $sql);
								if(mysqli_num_rows($result) > 0)
								{
									echo "Project Name :";
									while($row = mysqli_fetch_assoc($result))
									{
										$projectName = $row['projectName'];
										echo "<input type='text' name='projectName' id='projectName' readonly value='".$row['projectName']."'>";
									}
									echo "<br>";
								}
							?>
							<input type="submit" name="submitDocument" id="submitDocument">
						</form>
					</div>
				</div>
			</div>
<?php
	// if($_SERVER['REQUEST_METHOD' == 'POST'])
	// {
		if(isset($_FILES['fileUpload']))
		{
			//echo "inside submitDocument!";
      include 'connection.php';
			$error = 0;
			$fileName = $_FILES['fileUpload']['name'];
			$fileTmp = $_FILES['fileUpload']['tmp_name'];
			$fileSize = $_FILES['fileUpload']['size'];
			$fileExt=strtolower(end(explode('.',$_FILES['fileUpload']['name'])));
			$targetDirectory = "document/";
			$targetFile = $targetDirectory . $fileName . "." . $fileExt;
			if (file_exists($targetFile)) 
			{
			    echo "File exists!<br>";
			    unlink($targetFile);
			}
			/*if($fileExt!="jpg" && $fileExt!="png" && $fileExt!="jpeg" && $fileExt!="gif" && $fileExt!="pdf") 
			{
			    echo "Only PDF or Image allowed!<br>";
			    $error = 1;
			}*/
			if($error != 1)
			{
				//echo "inside error ! = 1";
				if(move_uploaded_file($fileTmp, $targetFile))
				{
					//echo "file uploaded!<br>";
					//
					if(isset($_POST['submitDocument']))
					{
						if(!empty($_POST['floor']))
					{
						$floor = $_POST['floor'];
					}
					else
					{
						$floor = 0;
					}
					$projectName = $_POST['projectName'];
					$documentType = $_POST['documentType'];
					$architectName = $_SESSION['employeeName'];
					$sql = "INSERT INTO document(projectName, documentType, documentLink, architectName, floor) values('$projectName', '$documentType', '$targetFile', '$architectName', $floor)";
					$result = mysqli_query($conn, $sql);
					if($result)
						echo "inserted in doc table!";
					else
						echo "not inserted in doc table";
					}
				}
			}
			else
				echo "Error = 1<br>";
		}
	//}


?>
            </div>
    </div>
  </div>
  </body>
  <!-- Footer -->
<footer class="page-footer font-small blue" style="background-color: black;">

  <!-- Copyright -->
  <div class="footer-copyright text-left py-3"><span style="color: white;">© 2018 Copyright:</span>
    <a href="index.php"> ANT Constructions</a>
  </div>
  <!-- Copyright -->
  <div class="footer-copyright text-right py-3"><span style="color: white;">Logged in as:</span>
    <a href="architectHomePage.php"> <?php echo $_SESSION['employeeEmailId']; ?></a>
  </div>

</footer>
<!-- Footer -->
  </html>
  <?php 
	if(isset($_FILES['report']))
	{
		include 'connection.php';
		$error = 0;
		$fileName = $_FILES['report']['name'];
		$fileTmp = $_FILES['report']['tmp_name'];
		$fileSize = $_FILES['report']['size'];
		$fileExt=strtolower(end(explode('.',$_FILES['report']['name'])));
		$targetDirectory = "report/";
		$targetFile = $targetDirectory . $fileName . "." . $fileExt;
		if (file_exists($targetFile)) 
		{
		    echo "<script type='text/javascript'> alert('File exists!'); </script>";
		    unlink($targetFile);
		}
		if($error != 1)
		{
			//echo "inside error ! = 1";
			if(move_uploaded_file($fileTmp, $targetFile))
			{
				//echo "file uploaded!<br>";
				//
				if(isset($_POST['submitReport']))
				{
					$reportText = "";
					$employeeEmailId = $_SESSION['employeeEmailId'];
					$employeeType = $_SESSION['employeeType'];
					$employeeName = $_SESSION['employeeName'];
					$reportText = $_POST['reportText'];
				$sql = "INSERT INTO report(employeeEmailId, employeeType, reportText, reportLink) values('$employeeEmailId', '$employeeType', '$reportText', '$targetFile')";
					$result = mysqli_query($conn, $sql);
					if($result)
					{
						$sqlLogs = "INSERT INTO logs(changeMade, changeDate, employeeName, employeeType) VALUES ('Uploaded Report', CURRENT_TIMESTAMP, '$employeeName', '$employeeType')";
        				$resultLogs = mysqli_query($conn, $sqlLogs);
        				echo "<script type='text/javascript'> alert('Inserted in report table!'); </script>";
					}
						//echo "inserted into report table<br>";
					else
						echo "<script type='text/javascript'> alert('Not Inserted in report table!'); </script>";
						//echo "not inserted into report table<br>";
						
				}
			}
		}
		else
			echo "<script type='text/javascript'> alert('Report processing problem!'); </script>";
			//echo "error in file part<br>";
	}
?>