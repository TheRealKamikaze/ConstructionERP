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
        <li class="active"><a href="#">Home</a></li>
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
              <a href="assignTasksBuilder.php">
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
                <div class="row">
      <div class="col-md-2">
        <button class="btn btn-outline-primary" id="AddProject">Add Project</button>
      </div>
      <div class="col-md-2">
        <button class="btn btn-outline-primary" id="UpdateProject">Update Project</button>
      </div>
      <div class="col-md-2">
        <button class="btn btn-outline-danger" id="deleteProject">Delete Project</button>
      </div>
    </div>
  <div id="result">

  </div>
<div id="details">

</div>
  </div>
  
            </div>
    </div>
  </div>

  <script type="text/javascript">
    var form='<form  method="POST"  enctype="multipart/form-data"><input type="text" name="projectName" id="projectName" placeholder="Project Name"><br><input type="text" name="projectLocation" id="projectLocation" placeholder="Project Location"><br><input type="text" name="projectPrice" id="projectPrice" placeholder="Project Price"><br><input type="text" name="architectName" id="architectName" placeholder="Architect Name"><br><input type="date" name="startDate" id="startDate" ><br><input type="date" name="endDate" id="endDate" ><br><input type="text" name="mapLink" id="mapLink" placeholder="https://agd.com"><br><input type="text" name="projectDescription" id="projectDescription" placeholder="Lorem ipsum"><br><input type="checkbox" name="feature[]" value="24*7 Power Supply">24*7 Power Supply<br> <input type="checkbox" name="feature[]" value="Car Parking">Car Parking<br><input type="checkbox" name="feature[]" value="24hr Water Supply">24hr Water Supply<br><input type="checkbox" name="feature[]" value="Fire Fighting System">Fire Fighting System<br><input type="checkbox" name="feature[]" value="Lift">Lift<br><input type="checkbox" name="feature[]" value="ClubHouse">ClubHouse<br><input type="file" name="projectImage" id="projectImage" ><br><button id="upload" name="upload">Upload</button></form>';
    $("#AddProject").on("click",function(){
      $("#result").html(form);
    })

    $("#UpdateProject").on("click",function(){
      $("#result").html('<div class="row container"><div class="col-md-3"></div><input type="text" id="searchfield" placeholder="search by name" name="search"><button class="btn btn-primary" id="search">Search</button></div><div id="searchParty"></div>');
      $("#search").on("click",function(){
        $("#result").load("updateProject.php",{
          projectName: $("#searchfield").val() 
        });   
      })
    })

    

  </script>



  <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
        define('DB_SERVER','localhost');    //server being localhost
        define('DB_USERNAME','root');   //username for the server root here, may change during hosting
        define('DB_PASSWORD','');           //no password has been set 
        define('DB_NAME','construction');   //database name, construction here

        $conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);    //creates a connection to a mysql server, also has a port argument not included here
        if($conn==false){
            die("Error!! Couldn't connect to the database".mysqli_connect_error());     //displays the message and exits the script
        }

            if(isset($_FILES['projectImage'])){
            $employeeImageIsSet = false;
            $targetFile = '';
            $uploadOk = 1;

            $fileName = $_FILES['projectImage']['name'];
            //echo $fileName."<br>";
            $fileTmp = $_FILES['projectImage']['tmp_name'];
            //echo $fileTmp."<br>";
            $fileSize = $_FILES['projectImage']['size'];
            //echo $fileSize."<br>";
            $tempsomething=explode('.',$_FILES['projectImage']['name']);
            $fileExt=strtolower(end($tempsomething));
            $targetDirectory = "profile/";
            $targetFile = $targetDirectory . basename($_FILES["projectImage"]["name"]);
            //echo $targetFile."<br>";
            $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "<script type='text/javascript'> alert('Only images allowed!'); </script>";
                $uploadOk = 0;
            }
            if (file_exists($targetFile)){
                $uploadOk = 0;
                echo "<script type='text/javascript'> alert('File exist!'); </script>";
                unlink($targetFile);
            }
            if($uploadOk==1 && move_uploaded_file($fileTmp, $targetFile)){
                $employeeImageIsSet = true;
                echo "<script type='text/javascript'> alert('Image has been uploaded!'); </script>";
                $imageLink=$targetFile;
                //echo 'file '.$targetFile.' has been uploaded<br>';
            }
            else{
                echo "<script type='text/javascript'> alert('Image couldn't be uploaded!'); </script>";
                $employeeImageIsSet = false;
            }
            if(!isset($imageLink)){
                $imageLink='';
            }
            // echo $imageLink;
        }

            if(isset($_POST['upload'])){
                // echo "chaalse";
                $projectName=$_POST['projectName'];
                $projectLocation=$_POST['projectLocation']; 
                $projectPrice=$_POST['projectPrice'];
                $architectName=$_POST['architectName']; 
                $startDate=$_POST['startDate'];
                $endDate=$_POST['endDate'];
                $projectDescription=$_POST['projectDescription'];
                $features=$_POST['feature'];
                if (!empty($features)) {
                    $n=count($features);
                    $stmt=mysqli_stmt_init($conn);
                    $sql="insert into projectFeatures values(?,?);";
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "some error in preparing features".mysqli_stmt_error($stmt);
                    }
                    else{

                        for($i=0;$i<$n;$i++){
                                mysqli_stmt_bind_param($stmt,"ss",$projectName,$features[$i]);
                                if(!mysqli_stmt_execute($stmt)){
                                    echo "some error in execution".mysqli_stmt_error($stmt);
                                }
                                else{
                                    echo "Successfully Uploaded";
                                    
                                }   
                        }       
                    }



                    $sql="insert into project(projectName,projectLocation,projectPrice,projectImage,architectName,startDate,endDate,projectDescription) values(?,?,?,?,?,?,?,?);";
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "some error in preparing(project)".mysqli_stmt_error($stmt);
                    }
                    else{
                                mysqli_stmt_bind_param($stmt,"ssisssss",$projectName,$projectLocation,$projectPrice,$imageLink,$architectName,$startDate,$endDate,$projectDescription);
                                if(!mysqli_stmt_execute($stmt)){
                                    echo "some error in execution".mysqli_stmt_error($stmt);
                                }
                                else{
                                    echo "Successfully Uploaded";
                                    
                                }   
                        }       
                    }
                        
                mysqli_stmt_close($stmt);
                }
                
            
    ?>

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