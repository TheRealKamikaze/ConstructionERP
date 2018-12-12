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
    <link rel="stylesheet" type="text/css" href="css/projectArchitectCard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  		alert("Inside history()");
  		var employeeName = '<?php echo $_SESSION['employeeName']; ?>';
  		var employeeEmailId = '<?php echo $_SESSION['employeeEmailId']; ?>';
  		var employeePhoneNo = '<?php echo $_SESSION['employeePhoneNo']; ?>';
  		var employeeType = '<?php echo $_SESSION['employeeType']; ?>';
  		alert(employeeName);
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
  </script>
  </head>
  <body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="#">ANT Constructions</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
        <li><a href="uploadDocumentsArchitect.php">Add Documents</a></li>
        <li class="active"><a href="categories.php">Projects</a></li>
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
          <button type="button" class="btn btn-success btn-sm">Submit report</button>
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
      			  <div id="result">
        				<div class="container">
        					
                      <?php
                        include 'connection.php';
                        $name = $_SESSION['employeeName'];
                        $sql = "SELECT * FROM project WHERE architectName = '$name'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                          echo '<div class="row">
                                  <div class="col-md-3" style="background-color: grey;">';
                          while($row = mysqli_fetch_assoc($result))
                          {
                            echo '<p>Project Name :'.$row['projectName'].'<br>Project Location :'.$row['projectLocation'].'</p><br>';

                          }
                          echo '</div>
                              </div>';
                        }
                      ?>

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