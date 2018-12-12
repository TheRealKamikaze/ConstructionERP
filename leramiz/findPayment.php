<?php
	define('DB_SERVER','localhost');    //server being localhost
    define('DB_USERNAME','root');   //username for the server root here, may change during hosting
	define('DB_PASSWORD','');           //no password has been set 
	define('DB_NAME','construction');   //database name, construction here
	$conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);    //creates a connection to a mysql server, also has a port argument not included here
	if($conn==false){
		die("Error!! Couldn't connect to the database".mysqli_connect_error());     //displays the message and exits the script
	}

        	$id=$_POST['pid'];
        	$kar=$_POST['kar'];
        	$sql="select * from accounts where pid=?";
        	$stmt=mysqli_stmt_init($conn);
        	if(!mysqli_stmt_prepare($stmt,$sql)){
        		echo "some error";
        	}
        	else{
        		mysqli_stmt_bind_param($stmt,"i",$id);
        		mysqli_stmt_execute($stmt);
        		$result=mysqli_stmt_get_result($stmt);
        		if(mysqli_num_rows($result)>0){
        			if($row=mysqli_fetch_assoc($result)){
        				$pid=$row['pid'];
        				$from=$row['sender'];
        				$to=$row['receiver'];
        				$paymentDate=$row['paymentDate'];
        				$paymentMethod=$row['paymentMethod'];	
        				$amount=$row['amount'];	
        				$debit_credit=$row['debit_credit'];	
        				$purpose=$row['purpose'];
        				$uploadedBy=$row['uploadedBy'];

        			}
						
        			if($kar=='delete'){
        				echo "<button class='btn btn-sm btn-danger' id='sachmeDelete'>Delete!!</button>";
        			}
        			if($kar=='update'){
        				echo "<button class='btn btn-sm btn-warning' id='sachmeUpdate'>Update</button>";
        			}
        	}
        		else{
        			echo "0 Rows retrieved";
        		}
        	}

?>



<script type="text/javascript">
	var lenewala="<?php echo $to ?>";
	var denewala="<?php echo $from ?>";
	var kitna="<?php echo $amount ?>";
	var kese="<?php echo $paymentMethod ?>";
	var kyu="<?php echo $purpose ?>";
	var kab="<?php echo $paymentDate ?>";
	var aayakigya="<?php echo $debit_credit ?>";
	var ye="",
		ye1="";
	if(aayakigya=="debit"){
		ye='checked';
		ye1="";
	}
	else{
		ye1='checked';
		ye="";
	}


	var form1='<div class="container"><form class="form" method="POST"><div class="row"><div class="form-group col-md-6" id="towala"><label for="to">To:</label><input type="text" name="to" id="to" value="'+lenewala+'" class="form-control" required></div><div class="form-group col-md-6" id="fromwala"><label for="from">From:</label><input required type="text" name="from"  value="'+denewala+'" id="from" class="form-control"></div></div><div class="row"><div class="form-group col-md-6"><label for="amount">Amount:</label><input required type="number" name="amount" id="amount" class="form-control" value="'+kitna+'"></div><div class="form-group col-md-6"><label for="paymentMethod">Payment Method:</label><input required value="'+kese+'"  type="text" name="paymentMethod" id="paymentMethod" class="form-control"></div></div><div class="row"><div class="form-group col-md-6"><label for="purpose">Purpose:</label><input required type="text" value="'+kyu+'" name="purpose" id="purpose" class="form-control"></div><div class="form-group col-md-6"><label for="paymentDate">Payment Date:</label><input required value="'+kab+'" type="date" name="paymentDate" id="paymentDate" class="form-control"></div></div><div class="row"><input type="radio" required name="debit_credit" '+ye1+ ' id="credit" value="credit" class=""><label for="credit" class="form-check">Credit</label><div class="col-md-6"></div><input required type="radio" '+ye+' name="debit_credit" id="debit" value="debit" class=""><label for="debit" class="form-check">Debit</label></div><div class="row"><button name="updatePayment" id="updatePayment" class="btn btn-success">Update Payment!!</button></div></form></div>';

	


	$("#sachmeDelete").on("click",function(){
		$("#searchParty").load("delete.php",{
			id: <?php echo $id ?>
		})
	});

	$("#sachmeUpdate").on("click",function(){
		$("#searchParty").html(form1);
	});

	// $("#updatePayment").on("click",function(){
	// 	$.ajax({url: "update.php",data:{
	// 		id: <?php echo $pid ?>,
	// 		from: '<?php echo $from ?>',
	// 		to: '<?php echo $to ?>',
	// 		paymentDate: <?php echo $paymentDate ?>,
	// 		paymentMethod: <?php echo $paymentMethod ?>,
	// 		purpose: '<?php echo $purpose ?>',
	// 		debit_credit: <?php echo $debit_credit ?>,
	// 		amount: <?php echo $amount ?>,
	// 		uploadedBy: <?php echo $uploadedBy ?>
	// 	},success:function(){
	// 		alert("done dona done done");
	// 	}})
	// });
	
</script>

<? define('DB_SERVER','localhost');    //server being localhost
        define('DB_USERNAME','root');   //username for the server root here, may change during hosting
        define('DB_PASSWORD','');           //no password has been set 
        define('DB_NAME','construction');   //database name, construction here
        $conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);    //creates a connection to a mysql server, also has a port argument not included here
        if($conn==false){
                die("Error!! Couldn't connect to the database".mysqli_connect_error());     //displays the message and exits the script
        }

        if(isset($_POST['updatePayment'])){
        	echo "alert('123');";
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
        	// $uploadedBy=$_POST['uploadedBy'];
                echo "hai yahaa";
        	$sql="update accounts set debit_credit='$debit_credit',receiver='$receiver',sender='$sender',amount='$amount',paymentMethod='$paymentMethod',purpose='$purpose',paymentDate='$paymentDate' where pid='$pid'";
        	if(!mysqli_query($conn,$sql)){
                        echo " ".mysqli_error();
                }
                else{
                	echo "blah";
                }
        	
        		
        	
        }	
        ?>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>