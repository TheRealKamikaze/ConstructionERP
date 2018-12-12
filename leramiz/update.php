

<?php
        echo "<script>alert('done');</script>";
        define('DB_SERVER','localhost');    //server being localhost
        define('DB_USERNAME','root');   //username for the server root here, may change during hosting
        define('DB_PASSWORD','');           //no password has been set 
        define('DB_NAME','construction');   //database name, construction here
        $conn=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);    //creates a connection to a mysql server, also has a port argument not included here
        if($conn==false){
                die("Error!! Couldn't connect to the database".mysqli_connect_error());     //displays the message and exits the script
        }

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
                echo "hai yahaa";
        	$sql="update accounts set debit_credit='$debit_credit',receiver='$receiver',sender='$sender',amount='$amount',paymentMethod='$paymentMethod',purpose='$purpose',paymentDate='$paymentDate',uploadedBy='$uploadedBy' where pid='$pid'";
        	if(!mysqli_query($conn,$sql)){
                        echo " ".mysqli_error();
                }
        	
        		
        	
        }

?>