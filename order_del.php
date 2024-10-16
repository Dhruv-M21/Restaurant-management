<!DOCTYPE html>
<html>
<head>
    <title>Order Management</title>
    <link rel="stylesheet" href="restaurant_style.css">

     
</head>
<body>
    <div class="container">
        <h1>Order Management</h1>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "restaurant");

        if (!$conn) {
            echo "Connection failed";
        }

        function displayOrders($conn) {
            $sql = "SELECT * FROM myorder";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>";
                echo "<tr><th>Order ID</th><th>Employee ID</th><th>Customer ID</th><th>Dish ID</th><th>Order Date</th><th>Quantity</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['OrderID'] . "</td>";
                    echo "<td>" . $row['EmployeeID'] . "</td>";
                    echo "<td>" . $row['CustomerID'] . "</td>";
                    echo "<td>" . $row['DishID'] . "</td>";
                    echo "<td>" . $row['OrderDate'] . "</td>";
                    echo "<td>" . $row['Quantity'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No order details found.";
            }
        }

        function deleteOrder($conn, $orderId) {
            $sql = "DELETE FROM myorder WHERE OrderID = $orderId";
            if (mysqli_query($conn, $sql)) {
                echo "Order deleted successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        displayOrders($conn);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['delete'])) {
                $orderId = $_POST['orderId'];
                deleteOrder($conn, $orderId);
            }
        }

        mysqli_close($conn);
        ?>

        <h2>Delete Order</h2>
        <form method="post">
            <label for="orderId">Order ID:</label>
            <input type="number" name="orderId" required>
            <button type="submit" name="delete">Delete Order</button>
            <button type="button" onclick="location.href='order.php'">Go Back</button>
        </form>
    </div>
</body>
</html>
