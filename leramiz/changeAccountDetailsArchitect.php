<?php
   		session_start();
   		if(!isset($_SESSION['employeeName']))
   		{
   			header("location:index.php");
   		}
   		else
   		{
   			$architectName = $_SESSION['employeeName'];
   			//echo "<script type='text/javascript'> alert('Welcome '".$architectName."); </script>";
        if(isset($_SESSION['employeeName']))
        {
              $employeeEmailId=$employeePhoneNo=$employeePassword=$employeeType=$employeeUniqueNo=$employeeGender=$employeeImage=$employeeName="";
              include 'connection.php';
              $name = $_SESSION['employeeName'];
              $email = $_SESSION['employeeEmailId'];
              $sql = "SELECT * FROM user WHERE emailId = '$email'";
              $result = mysqli_query($conn, $sql);
                  //echo "<script type='text/javascript'> alert('Inside $result'); </script>";
                  $row = mysqli_fetch_assoc($result);
                  $employeeEmailId = $row['emailId'];
                  $_SESSION['tempEmailId'] = $employeeEmailId;
                  $employeePhoneNo = $row['phoneNo'];
                  $employeePassword = $row['password'];
                  $employeeType = $row['employeeType'];
                  $employeeUniqueNo = $row['uniqueNumber'];
                  $employeeGender = $row['employeeGender'];
                  $employeeImage = $row['employeeImage'];
                  $employeeName = $row['employeeName'];
                  $_SESSION['oldName'] = $employeeName;
        } 
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
  </script>
  </head>
  <body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="#">ANT Constructions</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="architectHomePage.php">Home</a></li>
        <li><a href="uploadDocumentsArchitect.php">Add Documents</a></li>
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

              <form class="form" action="" method="post" id="registrationForm">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="name"><h4>Name</h4></label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" title="Enter your name" value='<?php echo $employeeName; ?>'>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="phoneNo"><h4>Phone no</h4></label>
                              <input type="number" class="form-control" name="phoneNo" id="phoneNo" placeholder="Enter mobile no" title="Enter mobile no" value='<?php echo $_SESSION['employeePhoneNo']; ?>'>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="emailId"><h4>Email Id</h4></label>
                              <input type="email" class="form-control" name="emailId" id="emailId" placeholder="Enter email Id" title="Enter email id" value='<?php echo $_SESSION['employeeEmailId']; ?>'>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" title="Enter your password" value='<?php echo $_SESSION['employeePassword']; ?>'>
                          </div>
                      </div>

                      <div class="form-group">  
                          <div class="col-xs-6">
                            <label for="confirmPassword"><h4>Confirm Password</h4></label>
                              <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password" title="Confirm your password" value='<?php echo $_SESSION['employeePassword']; ?>'>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="gender"><h4>Gender</h4></label><br>
                              <input type="radio" name="gender" id="gender" value="male" <?php if($employeeGender == 'male') {echo 'checked';} ?>> Male
                              <input type="radio" name="gender" id="gender" value="female" <?php if($employeeGender == 'female') {echo 'checked';} ?>> Female
                              <input type="radio" name="gender" id="gender" value="other" <?php if($employeeGender == 'other') {echo 'checked';} ?>> Other
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit" name="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               <!--  <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                      </div>
                </form>
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
    if(isset($_POST['submit']))
    {
      include 'connection.php';
      $nameIsSet = $phoneNoIsSet = $emailIdIsSet = $genderIsSet = true;
      $passwordMatch = false;
      function cleanseTheData($data) 
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      $name = cleanseTheData($_POST['name']);
      $phoneNo = cleanseTheData($_POST['phoneNo']);
      $emailId = cleanseTheData($_POST['emailId']);
      $password = cleanseTheData($_POST['password']);
      $confirmPassword = cleanseTheData($_POST['confirmPassword']);
      $gender = cleanseTheData($_POST['gender']);
      if(empty($name))
        $nameIsSet = false;
      if(empty($phoneNo))
        $phoneNoIsSet = false;
      if(empty($emailId))
        $emailIdIsSet = false;
      if(empty($gender))
        $genderIsSet = false;
      if($password == $confirmPassword)
      {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $passwordMatch = true;
      }
      if($nameIsSet && $genderIsSet && $emailIdIsSet && $phoneNoIsSet && $passwordMatch)
      {
        $tempEmailId = $_SESSION['tempEmailId']; $tempName = $_SESSION['oldName'];
        $sql = "UPDATE user SET emailId = '$emailId',
                phoneNo = '$phoneNo',
                employeeName = '$name',
                employeeGender = '$gender',
                password = '$passwordHashed'
                WHERE emailId = '$tempEmailId' ";
        $result = mysqli_query($conn, $sql);

        $sqlLogs = "UPDATE logs SET employeeName = '$name' WHERE employeeName = 'tempName' ";
        $resultLogs = mysqli_query($conn, $sqlLogs);

        $sqlProject = "UPDATE project SET architectName = '$name' WHERE architectName = 'tempName' ";
        $resultProject = mysqli_query($conn, $sqlProject);

        $sqlDocument = "UPDATE document SET architectName = '$name' WHERE architectName = 'tempName' ";
        $resultDocument = mysqli_query($conn, $sqlDocument);

        if($result && $resultLogs && $resultProject && $resultDocument)
        {
          $_SESSION['employeeEmailId'] = $emailId;
          $_SESSION['employeePhoneNo'] = $phoneNo;
          $_SESSION['employeeName'] = $name;
          $_SESSION['employeePassword'] = $passwordHashed;
          $_SESSION['employeeGender'] = $gender;
          echo "Details updated!";
        }
      }
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