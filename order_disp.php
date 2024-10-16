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
        // Create a database connection
        $conn = mysqli_connect("localhost", "root", "", "restaurant");

        // Check if the connection is successful
        if (!$conn) {
            echo "Connection failed";
            exit();
        }

        // Function to fetch and display order items
        function displayOrders($conn) {
            $sql = "SELECT myorder.OrderID, employee.ename AS EmployeeName, customer.Cname AS CustomerName, menu.item_name AS DishName, myorder.OrderDate, myorder.Quantity FROM myorder JOIN employee ON myorder.EmployeeID = employee.eid JOIN customer ON myorder.CustomerID = customer.Cid JOIN menu ON myorder.DishID = menu.item_id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>";
                echo "<tr><th>Order ID</th><th>Employee Name</th><th>Customer Name</th><th>Dish Name</th><th>Order Date</th><th>Quantity</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['OrderID'] . "</td>";
                    echo "<td>" . $row['EmployeeName'] . "</td>"; // Replaced EmployeeID with EmployeeName
                    echo "<td>" . $row['CustomerName'] . "</td>"; // Replaced CustomerID with CustomerName
                    echo "<td>" . $row['DishName'] . "</td>"; // Replaced DishID with DishName
                    echo "<td>" . $row['OrderDate'] . "</td>";
                    echo "<td>" . $row['Quantity'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No order details found.";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['disp'])) {
                
                displayOrders($conn);

            }
            // Add more conditions as needed
        }

        // Close the database connection
        mysqli_close($conn);
        ?>

        <form method="post">
            <button type="submit" name="disp">Display order table</button>
            <button type="button" onclick="location.href='order.php'">Go Back</button>
        </form>
    </div>
</body>
</html>
