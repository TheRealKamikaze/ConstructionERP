<!DOCTYPE html>
<html>
<head>
	<title>Accountant test!!</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<body>


  <?php
  session_start();
      // if(!isset($_SESSION['employeeName']))
      // {
      //   header("location:index.php");
      // }
      // else
      // {
      //   $architectName = $_SESSION['employeeName'];
      //   echo "<script type='text/javascript'> alert('Welcome '".$architectName."); </script>";
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
  </head>
  <body>
    
        <nav class="navbar navbar-inverse">
    			<a class="navbar-brand" href="#" style="margin-right: 10px;">ANT Constructions</a>
     			<ul class="nav yo mr-auto" style="color: grey;">
			        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
			        <li class="nav-item active" style="display:inline;"><a class="nav-link" href="#">Profile</a></li>
      			</ul>
      			<ul class="nav  yo navbar-right">
        <li>
              <a href="changeAccountDetails.php">
              <span class="glyphicon glyphicon-cog"></span>Account Settings </a>
        </li>
        <!-- <li><span style="color: white;">Logged in as echo $_SESSION['employeeEmailId']; ?></span></li> -->
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>



     <!--  
      
      -->
  </nav>
<div class="wrapper" >
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
            Accountant
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
            <br>
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
             <div class="container">
		<div class="row">
			<div class="col-md-2">
				<button class="btn btn-outline-warning" id="view">View Payments</button>
			</div>
			<div class="col-md-2">
				<button class="btn btn-outline-success" id="add">Add Payments</button>
			</div>
			<div class="col-md-2">
				<button class="btn btn-outline-primary" id="update">Update Payments</button>
			</div>
			<div class="col-md-2">
				<button class="btn btn-outline-danger" id="delete">Delete Payments</button>
			</div>
		</div>
	</div>
	<hr style="margin-top:0%;">

        <div id="result" style="width:1em;"></div>
        <div id="searchparty">
      
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

  

	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

	<script type="text/javascript">
		var count=1;
		var done=false;
		var form='<div class="container"><form class="form" method="POST"><div class="row"><div class="form-group col-md-4" id="towala"><label for="to">To:</label><input type="text" name="to" id="to" class="form-control" required></div><div class="form-group col-md-4" id="fromwala"><label for="from">From:</label><input required type="text" name="from" id="from" class="form-control"></div></div><div class="row"><div class="form-group col-md-4"><label for="amount">Amount:</label><input required type="number" name="amount" id="amount" class="form-control"></div><div class="form-group col-md-4"><label for="paymentMethod">Payment Method:</label><input required type="text" name="paymentMethod" id="paymentMethod" class="form-control"></div></div><div class="row"><div class="form-group col-md-4"><label for="purpose">Purpose:</label><input required type="text" name="purpose" id="purpose" class="form-control"></div><div class="form-group col-md-4"><label for="paymentDate">Payment Date:</label><input required type="date" name="paymentDate" id="paymentDate" class="form-control"></div></div><div class="row"><div class="form-group col-md-4"><label for="uploadedBy">Uploaded BY:</label><input required type="text" name="uploadedBy" id="uploadedBy" class="form-control"></div></div><div class="row"><input type="radio" required name="debit_credit" id="credit" value="credit" class=""><label for="credit" class="form-check">Credit</label><div class="col-md-4"></div><input required type="radio" name="debit_credit" id="debit" value="debit" class=""><label for="debit" class="form-check">Debit</label></div><div class="row"><button name="addpayment" onsubmit="myFunction(); return false;" id="addpayment" class="btn btn-success">Add Payment!!</button></div></form></div>'
		// function myFunction(){
		// 	alert("dabba");
		// }

		$("#add").on("click",function(){
			$("#result").html(form);
			// $("#addpayment").on("click",function(){
			// 	$("#result").load("addpayment.php",{
			// 		debit_credit:"<? echo $_POST['debit_credit'];?>", 
		 //        	sender: "<? echo $_POST['from'];?>" ,
		 //        	receiver: "<? echo $_POST['to'];?>",
		 //        	amount: "<? echo $_POST['amount'];?>", 
		 //        	paymentMethod: "<? echo $_POST['paymentMethod'];?>", 
		 //        	purpose: "<? echo $_POST['purpose'];?>",
		 //        	paymentDate: "<? echo $_POST['paymentDate'];?>", 
		 //        	uploadedBy: "<? echo $_POST['uploadedBy'];?>"
			// 	});
			
			$("#debit").on("click",function(){
				$("#towala").show();
				$("#fromwala").hide();
			});
			$("#credit").on("click",function(){
				$("#towala").hide();
				$("#fromwala").show();
			});
		});

		$("#update").on("click",function(){
			$("#result").empty();
			$("#result").html('<div class="row container"><div class="col-md-3"></div><input type="text" id="searchfield" placeholder="search by id" name="search"><button class="btn btn-primary" id="search">Search</button></div><div id="searchParty"></div>');
			$("#search").on("click",function(){
				$("#searchParty").load("findPayment.php",{
			 		pid: $("#searchfield").val(),
			 		kar: 'update' 
			 	});		
			})
		})
		// $("#addpayment").on("click",function(){
				
		// 		$("#content").children().remove();
		// });	
		

		$("#view").on("click",function(){
			count=10;
			$("#result").empty();
			$("#result").load("payments.php",{
				count: count
			});
			done=true;
		});

		

		$("#delete").on("click",function(){
			$("#result").empty();
			$("#result").html('<div class="row container"><div class="col-md-6"></div><input type="text" id="searchfield" placeholder="search by id" name="search"><button class="btn btn-primary" id="search">Search</button></div><div id="searchParty"></div>');
			$("#search").on("click",function(){
				$.ajax({url: "findPayment.php",data:{
          pid: $("#searchfield").val(),
          kar: 'delete' 
        },success: function(response){
          alert("Barobar");
        }});		
			})
		})

		function findPayment(action){
				$("#search-bar").append("chaalse?");
				// $("#search-bar").load("findPayment.php",{
			 // 		pid: $("#searchfield").val(),
			 // 		kar: action 
			 // 	});	
		}
		
		 


	</script>

		<?php
		define('DB_SERVER','localhost');    //server being localhost
        define('DB_USERNAME','root');   //username for the server root here, may change during hosting
        define('DB_PASSWORD','');           //no password has been set 
        define('DB_NAME','construction');   //database name, construction here

        $conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);    //creates a connection to a mysql server, also has a port argument not included here
        if($conn==false){
            die("Error!! Couldn't connect to the database".mysqli_connect_error());     //displays the message and exits the script
        }
            if(isset($_POST['addpayment'])){
            	$debit_credit=$_POST['debit_credit'];
        	if($debit_credit=='debit'){
        		$sender='ANT Constructions';	
        		$receiver=$_POST['to'];
        	}
        	else if($debit_credit=='credit'){
        		$receiver='ANT Constructions';	
        		$sender=$_POST['from'];
        	}
        	$amount=$_POST['amount'];
        	$paymentMethod=$_POST['paymentMethod'];
        	$purpose=$_POST['purpose'];
        	$paymentDate=$_POST['paymentDate'];
        	$uploadedBy=$_POST['uploadedBy'];
        	$sql="insert into accounts(debit_credit,receiver,sender,amount,paymentMethod,purpose,paymentDate,uploadedBy) values(?,?,?,?,?,?,?,?)";
        	$sql1="insert into logs(changeMade,employeeName,employeeType) values('payment added',blah,'accountant')";
        	mysqli_query($conn,$sql1);
        	$stmt=mysqli_stmt_init($conn);
        	if(!mysqli_stmt_prepare($stmt,$sql)){
        		echo "some error".mysqli_stmt_error();
        	}
        	else{
        		mysqli_stmt_bind_param($stmt,"sssissss",$debit_credit,$receiver,$sender,$amount,$paymentMethod,$purpose,$paymentDate,$uploadedBy);
        		mysqli_stmt_execute($stmt);
        		$result=mysqli_stmt_get_result($stmt);
        		echo "<script>alert('Successfully Added');</script>";
        	}
            }
        	
	
?>
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
<footer class="page-footer font-small blue" style="height:50px; background-color: black;">

  <!-- Copyright -->
  <div style="display:inline;">
  	<div class="footer-copyright text-left py-3"><span style="color: white;">© 2018 Copyright:</span>
    	<a href="index.php"> ANT Constructions</a>
  	</div>
  <!-- Copyright -->
  	<div class="footer-copyright text-right py-3"><span style="color: white;">Logged in as:</span>
   	 <a href="architectHomePage.php"> <?php echo $_SESSION['employeeEmailId']; ?></a>
  	</div>
  </div>
  

</footer>
</html>