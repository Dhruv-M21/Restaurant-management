<!DOCTYPE html>
<html>

<head>
	<title>Employee details inserted</title>
</head>

<body>
	<center>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "restaurant");
		
		// Check connection
		if($conn === false){
			echo "connection FAILED";
			exit();
		}
		
		// Taking all 5 values from the form data(input)
		$name = $_REQUEST['ename'];
		$etype = $_REQUEST['type'];
		$gender = $_REQUEST['gender'];
		$salary = $_REQUEST['salary'];
		//$join_year = $_REQUEST['join'];
		
		
		$sql = "INSERT INTO employee(ename,type,gender,salary) VALUES ('$name', 
			'$etype','$gender','$salary')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully.";
				

			echo nl2br("\n$name\n $etype\n "
				. "$gender\n $salary");
		} else{
			echo "<br>failed to store in database.";
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
