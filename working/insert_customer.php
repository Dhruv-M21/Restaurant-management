<!DOCTYPE html>
<html>

<head>
	<title>Customer details inserted</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => restaurant
		$conn = mysqli_connect("localhost", "root", "", "restaurant");
		
		// Check connection
		if($conn === false){
			echo "connection failed";
            exit();
		}
		
		
		$uname = $_REQUEST['cusername'];
		$cAdd = $_REQUEST['caddress'];
		$cEmail = $_REQUEST['cemail'];
		$phno = $_REQUEST['cphno'];
		
		
		// Performing insert query execution
		$sql = "INSERT INTO customer VALUES ('$uname', 
			'$cAdd','$cEmail','$phno')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully.";
				

			echo nl2br("\n$uname\n $cAdd\n "
				. "$cEmail\n $address");
		} else{
			echo "database insertion failed";
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
