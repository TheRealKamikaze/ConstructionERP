<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="css/architectSidebar.css">
    <link rel="stylesheet" type="text/css" href="css/builderTableLogs.css">
<?php
	define('DB_SERVER','localhost');    //server being localhost
    define('DB_USERNAME','root');   //username for the server root here, may change during hosting
	define('DB_PASSWORD','');           //no password has been set 
	define('DB_NAME','construction');   //database name, construction here
	$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);    //creates a connection to a mysql server, also has a port argument not included here
	if($conn==false){
		die("Error!! Couldn't connect to the database".mysqli_connect_error());     //displays the message and exits the script
	}
	

	$count=$_POST['count'];
	$sql="select * from accounts LIMIT $count";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
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
                                            <th>Payment ID</th>
                                            <th>To</th>
                                            <th>From</th>
                                            <th>Purpose</th>
                                            <th>Amount</th>
                                            <th>Method of Payment</th>
                                            <th>Date of Payment</th>
                                          </tr>
                                        </thead>
                                        <tbody>';
		for($i=0;$i<$count&&$i<mysqli_num_rows($result);$i++)
		{
			$row=mysqli_fetch_assoc($result);			
			if($i>=$count-10)
			{
				// echo $row['pid'];
				// echo $row[''];
				// echo $row[''];
				// echo $row[''];
				// echo $row[''];
				// echo "<br>";
				echo '<tr>
                        <td>'.$row['pid'].'</td>
                        <td>'.$row['sender'].'</td>
                        <td>'.$row['receiver'].'</td>
                        <td>'.$row['purpose'].'</td>
                        <td>'.$row['amount'].'</td>
                        <td>'.$row['paymentMethod'].'</td>
                        <td>'.$row['paymentDate'].'</td>
                      </tr>';
			}
		}
		echo "</tbody>
                      </table>
                  </div>
                </div>
                      </div>";
		echo '<button class="btn btn-success" id="previous">Previous!!</button>     <button class="btn btn-success" id="loadmore">Next!!</button>';

	}
	else{
		echo "No records found";
	}
?>

<script >
	$("#loadmore").on("click",function(){
			count+=10;
			$("#result").empty();
			$("#result").load("payments.php",{
				count: count
			});
		})

	$("#previous").on("click",function(){
			count-=10;
			$("#result").empty();
			$("#result").load("payments.php",{
				count: count
			});
		})

</script>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>