<!DOCTYPE html>
<html>

<head>
    <title>Order Update</title>
    <link rel="stylesheet" href="restaurant_style.css">
</head>

<body>
    <div class="container">
        <?php
            // Create a database connection
            $conn = mysqli_connect("localhost", "root", "", "restaurant");

            // Check if the connection is successful
            if (!$conn) {
                echo "Connection failed";
            }

            // Function to check if the order ID exists in the database
            function isOrderIdExists($conn, $oid, $cid)
            {
                $sql = "SELECT * FROM myorder WHERE OrderID='$oid' AND CustomerID='$cid'";
                $result = mysqli_query($conn, $sql);

                return mysqli_num_rows($result) > 0;
            }

            // Function to update order details
            function updateOrder($conn, $oid, $cid, $employeeID, $dishID, $orderDate, $quantity)
            {
                if (isOrderIdExists($conn, $oid, $cid)) {
                    $sql = "UPDATE myorder SET EmployeeID='$employeeID', DishID='$dishID', OrderDate='$orderDate', Quantity='$quantity' WHERE OrderID='$oid' AND CustomerID='$cid'";

                    if (mysqli_query($conn, $sql)) {
                        echo "Order details updated successfully.";
                    } else {
                        echo "Error while updating order details.";
                    }
                } else {
                    echo "Order ID does not exist. Please enter a valid Order ID.";
                }
            }

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['updateOrder'])) {
                    $oid = $_POST['oid'];
                    $cid = $_POST['cid'];
                    $employeeID = $_POST['employeeID'];
                    $dishID = $_POST['dishID'];
                    $orderDate = $_POST['orderDate'];
                    $quantity = $_POST['quantity'];

                    updateOrder($conn, $oid, $cid, $employeeID, $dishID, $orderDate, $quantity);
                }
            }

            // Close the database connection
            mysqli_close($conn);

            echo '<script>
                function goBack() {
                    window.location.href = "order.html";
                }
                </script>';
        ?>

        <!-- Update Order Form -->
        <h2>Update Order details</h2>
        <form method="post">

            <label>Enter Customer ID and Order ID whose details you want to update: </label><br>
            <label for="oid">Enter Order ID</label>
            <input type="text" name="oid" id="oid" required><br>
            <label for="cid">Enter Customer ID</label>
            <input type="text" name="cid" id="cid" required><br>

            <label for="employeeID">Employee ID: </label>
            <input type="text" name="employeeID" id="employeeID" required><br>

            <label for="dishID">Dish ID: </label>
            <input type="text" name="dishID" id="dishID" required><br>

            <label for="orderDate">Order Date: </label>
            <input type="text" name="orderDate" id="orderDate" required><br>

            <label for="quantity">Quantity: </label>
            <input type="text" name="quantity" id="quantity" required>

            <button type="submit" name="updateOrder">Update Order</button>

            <button type="button"  onclick="location.href='order.php'">Go Back</button>

        </form>
    </div>
</body>
</html>
