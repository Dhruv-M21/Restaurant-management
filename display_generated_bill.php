



<html>
    <link rel="stylesheet" href="restaurant_style.css">
<head>
    <title>bill generated</title>
</head>

<body>
    <div class="container">
        <?php
        // Create a database connection
        $conn = mysqli_connect("localhost", "root", "", "restaurant");
        
        // Check if the connection is successful
        if (!$conn) {
            echo "Connection failed: " . mysqli_connect_error();
            exit();
        }
        
        // Query to fetch the latest generated bill
        $billQuery = "SELECT * FROM bill ORDER BY bill_id DESC LIMIT 1";
        $billResult = mysqli_query($conn, $billQuery);
        
        if ($billResult && mysqli_num_rows($billResult) > 0) {
            $billRow = mysqli_fetch_assoc($billResult);
            echo "<h2>Generated Bill</h2>";
            echo "<p>Bill ID: " . $billRow['bill_id'] . "</p>";
            echo "<p>Bill Name: " . $billRow['bill_name'] . "</p>";
            echo "<p>Bill Date: " . $billRow['bill_date'] . "</p>";
            echo "<p>Bill Pay Method: " . $billRow['bill_pay'] . "</p>";
            echo "<p>Food Service: " . $billRow['food_service'] . "</p>";
            echo "<p>Bill Amount: Rs" . $billRow['bill_amount'] . "</p>";
            echo "<p>Customer ID: " . $billRow['CustomerID'] . "</p>";
        } else {
            echo "Error fetching the generated bill.";
        }
        
        // Close the database connection
        mysqli_close($conn);
        ?>
        <br>
        <button type="button" onclick="location.href='bill.html'">Go Back</button>
    </div>
</body>

</html>