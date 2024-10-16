<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Generate Bill</title>
    <link rel="stylesheet" href="restaurant_style.css">
    <!-- Add your styles or link to an external stylesheet here -->
</head>
<body>

<div class="container">
    <h1>Generate Bill</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the customer ID from the form
        $customerID = $_POST['customerID'];
        $bpayment = $_POST['bpayment'];
        $fservice = $_POST['fservice'];

        // Create a database connection
        $conn = mysqli_connect("localhost", "root", "", "restaurant");

        // Check if the connection is successful
        if (!$conn) {
            echo "Connection failed: " . mysqli_connect_error();
            exit();
        }

        // Query to generate the bill
        $sql = "INSERT INTO bill (bill_name, bill_date, bill_pay, food_service, bill_amount, CustomerID)
                SELECT Cname AS bill_name,
                    CURDATE() AS bill_date,
                    '$bpayment' AS bill_pay,
                    '$fservice' AS food_service,
                    SUM(item_price * Quantity) AS bill_amount,
                    Cid AS CustomerID
                FROM myorder
                JOIN customer ON myorder.CustomerID = customer.Cid
                JOIN menu ON myorder.DishID = menu.item_id
                WHERE myorder.CustomerID = $customerID
                GROUP BY myorder.CustomerID, CURDATE();";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Redirect to the display_generated_bill.php page
            header("Location: display_generated_bill.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>

    <form method="post">
        <label for="customerID">Customer ID:</label>
        <input type="text" name="customerID" required>

        <label>Payment Method:</label> <br>
        <input type="radio" id="cash" name="bpayment" value="cash">
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

        <button type="submit">Generate Bill</button>
        <button type="button" onclick="location.href='bill.html'">Go Back</button>
    </form>
</div>

</body>
</html>
