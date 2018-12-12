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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/architectSidebar.css">
    <script type="text/javascript">
    <?php  
    	$employeeName = $_SESSION['employeeName'];
    ?>
  	function about()
  	{
  		//alert("Inside about()");
  		var employeeName = '<?php echo $_SESSION['employeeName']; ?>';
  		var employeeEmailId = '<?php echo $_SESSION['employeeEmailId']; ?>';
  		var employeePhoneNo = '<?php echo $_SESSION['employeePhoneNo']; ?>';
  		var employeeType = '<?php echo $_SESSION['employeeType']; ?>';
  		//alert(employeeName);
  		$('#announcementForm').hide();
  		$.ajax({
				url: "architectHomePageAbout.php",
				method: "POST",
				data: {'employeeName' : employeeName, 'employeeEmailId' : employeeEmailId, 'employeePhoneNo' : employeePhoneNo, 'employeeType': employeeType},
				success : function(response) {
								//alert("inside success!");
							$('#result').html(response);
						}
			  });
  	}
  	function history()
  	{
  		//alert("Inside history()");
  		var employeeName = '<?php echo $_SESSION['employeeName']; ?>';
  		var employeeEmailId = '<?php echo $_SESSION['employeeEmailId']; ?>';
  		var employeePhoneNo = '<?php echo $_SESSION['employeePhoneNo']; ?>';
  		var employeeType = '<?php echo $_SESSION['employeeType']; ?>';
  		$('#announcementForm').hide();
  		//alert(employeeName);
  		$.ajax({
				url: "architectHomePageHistory.php",
				method: "POST",
				data: {'employeeName' : employeeName, 'employeeEmailId' : employeeEmailId, 'employeePhoneNo' : employeePhoneNo, 'employeeType': employeeType},
				success : function(response) {
								//alert("inside success!");
							$('#result').html(response);
						}
			  });
  	}

    function announce()
    {
      //alert("Inside announcement()");
      var employeeName = '<?php echo $_SESSION['employeeName']; ?>';
      var employeeEmailId = '<?php echo $_SESSION['employeeEmailId']; ?>';
      var employeePhoneNo = '<?php echo $_SESSION['employeePhoneNo']; ?>';
      var employeeType = '<?php echo $_SESSION['employeeType']; ?>';
      //alert(employeeName);
      $('#announcementForm').show();
      $.ajax({
        url: "architectHomePageAnnouncement.php",
        method: "POST",
        data: {'employeeName' : employeeName, 'employeeEmailId' : employeeEmailId, 'employeePhoneNo' : employeePhoneNo, 'employeeType': employeeType},
        success : function(response) {
                //alert("inside success!");
              $('#result').html(response);
            }
        });
    }
  </script>
  </head>
  <body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="#">ANT Constructions</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="uploadDocumentsArchitect.php">Add Documents</a></li>
        <li><a href="architectProject.php">Projects</a></li>
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
    <div class="col-md-3 col-sm-3">
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
     <div class="col-md-9  col-sm-9">
            <div class="profile-content" style="height: 100%">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
                    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" onclick="about(); return false;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" onclick="history(); return false;">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" onclick="announce();">Post announcement</a>
                    </li>
			  </ul>

			  <div id="result"></div>

		        <div>
		          <form method="POST" style="display: none;" id="announcementForm">
		            Make an announcement :<input type="text" name="announcement" id="announcement"><br>
		            <input type="submit" name="announce" value="ANNOUNCE" id="announce">
		          </form>
		        </div>

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
  
</div>
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
  if(isset($_POST['announcement']))
    {
      include 'connection.php';
      $announce = $_POST['announce'];
      $employeeType = $_SESSION['employeeType'];
      $employeeName = $_SESSION['employeeName'];
      //if($announce != 'ANNOUNCE')
      //{
        $sql = "INSERT INTO announcement(employeeName, employeeType, announcement) VALUES ('$employeeName', '$employeeType', '$announce')";
        $result = mysqli_query($conn, $sql);
        if($result)
          echo "<script type=text/javascript> alert('Announcement posted!'); </script>";
        else
          echo "<script type=text/javascript> alert('Announcement not posted!'); </script>";

        $sqlLogs = "INSERT INTO logs(changeMade, changeDate, employeeName, employeeType) VALUES ('Posted announcement', CURRENT_TIMESTAMP, '$employeeName', '$employeeType')";
        $resultLogs = mysqli_query($conn, $sqlLogs);
      //}
    }
?>
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