  <?php
  session_start();
      // if(!isset($_SESSION['employeeName']))
      // {
      //   header("location:index.php");
      // }
      // else
      // {
        
      //   if ($_SESSION['employeeDesignation']=='architect') {
      //       echo"hello";
      //       header("location:architectHomePage.php");   
      //   }
      //   else{
      //     $accountantName = $_SESSION['employeeName'];
      //     if($_SESSION['accountantCount']==0){
      //       echo "<script type='text/javascript'> alert('Welcome '"."+"."'".$accountantName."'"."); </script>";  
      //     }
      //     $_SESSION['accountantCount']++;  
      //   }
        
      // } 
?>
  <!DOCTYPE html>
  <html>
  <head style="min-height:10000px;">
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
  <body style="height:100%;">
    <div class="wrapper" style="min-height: 100%; margin-bottom: -50px;">
        <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="#">ANT Constructions</a>
      </div>
      <ul class="nav navbar-nav">
        <li ><a href="index.php">Home</a></li>
        <li class="active"><a href="#">Profile</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>

              <a href="changeAccountDetails.php">
              <span class="glyphicon glyphicon-cog"></span>Account Settings </a>
        </li>
        <!-- <li><span style="color: white;">Logged in as echo $_SESSION['employeeEmailId']; ?></span></li> -->
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar" style="height: 100%;">
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
              <i class="glyphicon glyphicon-user"></i>
              Dashboard </a>
            </li>
            
            <li>
              <a href="tasks.php" id="tasks">
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
    <div class="col-md-9" id="content" style="height:100%;">
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
        <div id="kuch" class="searchparty">
      
    </div>
            <div>
              <form method="POST" style="display: none;" id="announcementForm">
                Make an announcement :<input type="text" name="announcement" id="announcement"><br>
                <input type="submit" name="announce" value="ANNOUNCE" id="announce">
              </form>
            </div>

            </div>
    </div>
  </div>

    </div>  
    <div style="height:50px;"></div>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>


  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<!-- <script type="text/javascript">
function dosomething(){
        var something='<ul class="nav nav-tabs" id="myTab"><li class="nav-item"><button class="btn btn-link" onclick="view();" id="view">View Payments</button></li><li class="nav-item"><button class="btn btn-link" onclick="add();" id="add">Add Payments</button></li><li class="nav-item"><button onclick="delete();" class="btn btn-link" id="delete">Delete payment</button></li><li class="nav-item"><button class="btn btn-link" onclick="update();" id="Update">Update Payment.</button></li>'

      $(".profile-content").html(something);
    };

      $("#add").on("click",".profile-content",function(){alert('Seems Working!!')});
    </script>
 -->


  </body>
  <!-- Footer -->
<footer class="page-footer font-small blue" style="height:50px; background-color: black;">

  <!-- Copyright -->
    <div style="display:inline;">
    <span class="footer-copyright text-left py-3" style="color: white;">© 2018 Copyright:</span>
      <a class="footer-copyright text-left py-3" href="index.php"> ANT Constructions</a>
  
  <!-- Copyright -->
    <div class="pull-right">
      <span  style="color: white;">Logged in as:</span>
     <a href="architectHomePage.php"  > <?php echo $_SESSION['employeeEmailId']; ?></a>  
    </div>
    
  </div>

</footer>

<!-- Footer -->
  </html>