<!DOCTYPE html>
<html>

<head>
    <title>Bill Update</title>
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

    //Function to check if the bill id exists in database
    function isBillIdExists($conn, $bid ,$cid)
    {
    	$sql = "SELECT * FROM bill WHERE bill_id='$bid' and cid='$cid'";
    	$result = mysqli_query($conn, $sql);

	return mysqli_num_rows($result) > 0;
    }

   //Function to update bill
   function updateBill($conn,$bid, $cid, $bname, $bpayment, $fservice, $bamount)
   {
   	if (isBillIdExists($conn, $bid ,$cid)) 
	{
        	$sql = "UPDATE bill SET bill_name='$bname',bill_pay='$bpayment',food_service='$fservice',bill_amount='$bamount' WHERE bill_id='$bid' and cid='$cid'";

        	if (mysqli_query($conn, $sql)) 
		{
            		echo "Bill details updated successfully.";
        	} 
		else 
		{
            		echo "Error while updating bill ";
        	}
    	} 
	else 
	{
        	echo "Bill ID does not exist. Please enter a valid Bill ID.";
    	}
   }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (isset($_POST['updateBill'])) 
	{
		$bid = $_POST['bid'];
		$cid = $_POST['cid'];
		$bname = $_POST['bname'];
		$bpayment = $_POST['bpayment'];
		$fservice = $_POST['fservice'];
		$bamount = $_POST['bamount'];
            updateBill($conn, $bid,$cid,$bname,$bpayment,$fservice,$bamount);
        } 
    }
       


    // Close the database connection
    mysqli_close($conn);

	echo '<script>
        function goBack() 
	{
        	window.location.href = "bill.html"; 
        }
	</script>';

    ?>

        <!-- Update Bill Form -->
        <h2>Update Bill details</h2>
        <form method="post">

	    <label>Enter Customer ID and Bill ID whose details you want to update: </label><br>
	    <label for="bid">Enter Bill ID</label>
            <input type="text" name="bid" id="bid" required><br>
	    <label for="cid">Enter Customer ID</label>
	    <input type="text" name="cid" id="cid" required><br>

            <label for="bname">Customer Name: </label>
            <input type="text" name="bname" id="bname" required><br>

    	    <label>Payment Method:</label> <br>
    	    <input type="radio" id="cash" name="bpayment" value="cash" checked>
   	    <label for="cash">Cash</label> <br>
   	    <input type="radio" id="card" name="bpayment" value="card">
	    <label for="card">Credit Card</label> <br>
	    <input type="radio" id="upi" name="bpayment" value="upi">
	    <label for="upi">UPI Payment</label> <br><br>

	    <label for="fservice">Food Service:</label>
            <select id="food_service" name="fservice">
            <option value="Dine">Dine-in</option>
            <option value="takeaway">Takeaway</option>
            </select> <br><br>

            <label for="bamount">Bill amount : </label>
            <input type="text" name="bamount" id="bamount" required>
            <button type="submit" name="updateBill">Update Bill</button>

	    <button onclick="goBack()">Back to Main Page</button>';
        </form>

    </div>
</body>
</html>