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
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="css/architectSidebar.css">
    <link rel="stylesheet" type="text/css" href="css/builderTableLogs.css">
    <script type="text/javascript">
      function verifyTheLog( logId )
      {
        //alert(logId);
        $.ajax({
        url: "verifyLogs.php",
        method: "POST",
        data: {'logId' : logId},
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
        <li><a href="builderHomePage.php">Home</a></li>
        <li class="active"><a href="#">Verify Logs</a></li>
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
              <div class="container-fluid">

                <?php
                  include 'connection.php';
                  $sql = "SELECT * FROM logs WHERE isVerified = 0";
                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result) > 0)
                  {
                    echo '<div class="span9">   
                            <div class="widget stacked widget-table action-table">
                                        
                                    <div class="widget-header">
                                      <i class="icon-th-list"></i>
                                      <h3>Verification of Logs</h3>
                                    </div> <!-- /widget-header -->
                                    
                                    <div class="widget-content">
                                      
                                      <table class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Log Id</th>
                                            <th>Designation</th>
                                            <th>Employee Name</th>
                                            <th>Change Made</th>
                                            <th>Date of Change</th>
                                            <th class="td-actions">Verify</th>
                                          </tr>
                                        </thead>
                                        <tbody>';
                    while($row = mysqli_fetch_assoc($result))
                    {

                      echo '<tr>
                        <td>'.$row['logId'].'</td>
                        <td>'.$row['employeeType'].'</td>
                        <td>'.$row['employeeName'].'</td>
                        <td>'.$row['changeMade'].'</td>
                        <td>'.$row['changeDate'].'</td>
                        <td class="td-actions">
                          <a href="javascript:;" class="btn btn-small btn-primary" onclick="verifyTheLog('.$row['logId'].')">
                            <i class="btn-icon-only icon-ok"></i>                   
                          </a>
                          
                          <a href="javascript:;" class="btn btn-small" onclick="verifyTheLog('.$row['logId'].')">
                            <i class="btn-icon-only icon-remove"></i>                   
                          </a>
                        </td>
                      </tr>';
                    }
                    echo "</tbody>
                      </table>
                  </div>
                </div>
                      </div>";
                  }
                  else
                    echo "<h2>NO LOGS FOUND<h2><br>";
                ?>
                <div id="result"></div>
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

