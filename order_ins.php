<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
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
        }

        // Function to insert an Order
        function insertOrder($conn, $employee_id, $customer_id, $dish_id, $order_date, $quantity) 
        {
            $sql = "INSERT INTO myorder (EmployeeID, CustomerID, DishID, OrderDate, Quantity)
                    VALUES ('$employee_id', '$customer_id', '$dish_id', '$order_date', '$quantity')";
            if (mysqli_query($conn, $sql)) {
                echo "Order inserted successfully.";
            } else {
                echo "Error while inserting order: " . mysqli_error($conn);
            }
        }

        // Inputs the values entered in the form
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (isset($_POST['submitOrder']))
            {
                $employee_id = $_POST['EmployeeID'];
                $customer_id = $_POST['CustomerID'];
                $dish_id = $_POST['DishID'];
                $order_date = $_POST['OrderDate'];
                $quantity = $_POST['Quantity'];

                // Function call
                insertOrder($conn, $employee_id, $customer_id, $dish_id, $order_date, $quantity);
            } 
        }

        // Close the database connection
        mysqli_close($conn);
        ?>

        <!-- Order Form -->
        <h2>Create Order</h2>
        <form method="post">
            <button onclick="location.href='disp_menu1.php'">Display Menu</button>
            <br>
            <label for="EmployeeID">Employee ID:</label>
            <input type="text" name="EmployeeID" id="EmployeeID" required>
            <label for="CustomerID">Customer ID:</label>
            <input type="text" name="CustomerID" id="CustomerID" required>
            <label for="DishID">Dish ID:</label>
            <input type="text" name="DishID" id="DishID" required>
            <label for="OrderDate">Order Date:</label>
            <input type="date" name="OrderDate" id="OrderDate" required>
            <label for="Quantity">Quantity:</label>
            <input type="number" name="Quantity" id="Quantity" required>

            <br><br>
            <button type="submit" name="submitOrder">Place Order</button>
            <button onclick="location.href='order.php'">Go back</button>
        </form>
    </div>
</body>
</html>
