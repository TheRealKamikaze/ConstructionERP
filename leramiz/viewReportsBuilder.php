<?php
      session_start();
      include 'connection.php';
      if(!isset($_SESSION['employeeName']))
      {
        header("location:index.php");
      }
      else
      {
        $builderName = $_SESSION['employeeName'];
        // echo "<script type='text/javascript'> alert('Welcome '".$builderName."); </script>";
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
    
  </head>
  <body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="#">ANT Constructions</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="builderHomePage.php">Home</a></li>
        <li><a href="verifyLogsBuilder.php">Verify Logs</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="builderHomePage.php"><span class="glyphicon glyphicon-user"></span></a></li>
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
            Builder
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm"><a href="viewReportsBuilder.php">View reports</a></button>
          <button type="button" class="btn btn-danger btn-sm"><a href="logout.php">Logout</a></button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
            <li>
              <a href="builderHomePage.php">
              <i class="glyphicon glyphicon-home"></i>
              Home </a>
            </li>
            <li>
              <a href="changeAccountDetailsBuilder.php">
              <i class="glyphicon glyphicon-user"></i>
              Account Settings </a>
            </li>
            <li>
              <a href="assignTasksBuilder.php" target="_blank">
              <i class="glyphicon glyphicon-ok"></i>
              Assign Tasks </a>
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
                  <?php
                        include 'connection.php';
                        $sql = "SELECT * FROM report";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                          echo '<div class="container-fluid">
                      <div class="row col-md-12 custyle">
                      <table class="table table-striped custab">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Report-Text</th>
                              <th>Designation</th>
                              <th>Email-Id</th>
                              <th>Date</th>
                              <th class="text-center">Action</th>
                          </tr>
                      </thead>';
                          while($row = mysqli_fetch_assoc($result))
                          {
                            echo "<tr>
                                  <td>".$row['reportId']."</td>
                                  <td>".$row['reportText']."</td>
                                  <td>".$row['employeeType']."</td>
                                  <td>".$row['employeeEmailId']."</td>
                                  <td>".$row['reportDate']."</td>
                                  <td class='text-center'><a class='btn btn-info btn-xs' href=".$row['reportLink']." target='_blank'><span class='glyphicon glyphicon-edit'></span> View</a> <a href='#' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-contact'></span> Email</a></td>
                              </tr>";
                          }
                          echo "</table>
                              </div>
                          </div>";
                        }
                        else
                          echo "<div class='container-fluid'><h2>No Reports Found!</h2></div>";

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