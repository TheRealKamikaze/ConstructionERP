	<?php
		define('DB_SERVER','localhost');    //server being localhost
        define('DB_USERNAME','root');   //username for the server root here, may change during hosting
        define('DB_PASSWORD','');           //no password has been set 
        define('DB_NAME','construction');   //database name, construction here

        $conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);    //creates a connection to a mysql server, also has a port argument not included here
        if($conn==false){
            die("Error!! Couldn't connect to the database".mysqli_connect_error());     //displays the message and exits the script
        }
            echo "in";
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
        	$stmt=mysqli_stmt_init($conn);
        	if(!mysqli_stmt_prepare($stmt,$sql)){
        		echo "some error".mysqli_stmt_error();
        	}
        	else{
        		mysqli_stmt_bind_param($stmt,"sssissss",$debit_credit,$receiver,$sender,$amount,$paymentMethod,$purpose,$paymentDate,$uploadedBy);
        		mysqli_stmt_execute($stmt);
        		$result=mysqli_stmt_get_result($stmt);
        		echo "Successfully Added";
        	}
	?>