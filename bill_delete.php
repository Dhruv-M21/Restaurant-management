<!DOCTYPE html>
<html>
<head>
    <title>Bill Delete</title>
    <link rel="stylesheet" href="restaurant_style.css">
</head>
<body>
    <div class="container">
        <?php
    //Create a database connection
    $conn = mysqli_connect("localhost","root","", "restaurant");

    // Check if the connection is successful
    if (!$conn) {
        echo "connection failed";
    }

    // Function to delete bill details
    function deleteBill($conn, $bid) 
    {
	$checkSql = "SELECT * FROM bill WHERE bill_id = '$bid'";
   	$result = mysqli_query($conn, $checkSql);

    	if (mysqli_num_rows($result) > 0) 
	{
        	$sql = "DELETE FROM bill WHERE bill_id = '$bid'";
        	if (mysqli_query($conn, $sql)) 
		{
            		echo "Bill deleted successfully.";
        	} 
		else 
		{
            		echo "Error while deleting bill " ;
        	}
   	}  
    	else 
    	{
        	echo "Bill with ID $bid does not exist.";
    	}
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (isset($_POST['deleteBill'])) 
	{
           $bid = $_POST['bid'];
           deleteBill($conn, $bid);
        } 
    }
    

    // Close the database connection
    mysqli_close($conn);

    //Back to main page button
    echo '<script>
        function goBack() 
	{
        	window.location.href = "bill.html"; 
        }
	</script>';	
    ?>

        <!-- Delete Bill Form -->
        <h2>Delete Bill details</h2>
        <form method="post">
            <label for="bid">Bill ID:</label>
            <input type="text" name="bid" id="bid" required>
    
            <button type="submit" name="deleteBill">Delete Bill</button>
            <button onclick="goBack()">Back to Main Page</button>';
        </form>

    </div>
</body>
</html>