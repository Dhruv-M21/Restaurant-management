<!DOCTYPE html>
<html>
<head>
    <title>Display Bill</title>
    <link rel="stylesheet" href="restaurant_style.css">
</head>


<body>
    <div class="container">
    <?php
    // Create a database connection
    $conn = mysqli_connect("localhost", "root", "", "restaurant");

    // Check if the connection is successful
    if (!$conn) {
        echo "Connection failed: ";
        exit();
    }

    // Query to fetch the latest generated bill
    $billQuery = "SELECT * FROM bill ";
    $billResult = mysqli_query($conn, $billQuery);

    if ($billResult && mysqli_num_rows($billResult) > 0) {
        $info = mysqli_fetch_assoc($billResult);
        echo "<h2>Generated Bill</h2>";
        echo "<p>Bill ID: " . $info['bill_id'] . "</p>";
        echo "<p>Bill Name: " . $info['bill_name'] . "</p>";
        echo "<p>Bill Date: " . $info['bill_date'] . "</p>";
        echo "<p>Bill Pay Method: " . $info['bill_pay'] . "</p>";
        echo "<p>Food Service: " . $info['food_service'] . "</p>";
        echo "<p>Bill Amount: Rs" . $info['bill_amount'] . "</p>";
        echo "<p>Customer ID: " . $info['CustomerID'] . "</p>";
        
    } else {
        echo "Error fetching the generated bill.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <br><br><button name='but1' onclick="location.href='MainIndex.html'">Back to Main Page</button>';
    </div>
	 
</body>
</html>
