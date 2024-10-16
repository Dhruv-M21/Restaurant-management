<!DOCTYPE html>
<html>
<head>
    <title>Bill Management</title>
    <link rel="stylesheet" href="restaurant_style.css">

    
</head>
<body>
    <div class="container">
        <h1>Bill Management</h1>
        <?php
            // Create a database connection
            $conn = mysqli_connect("localhost", "root", "", "restaurant");

            // Check if the connection is successful
            if (!$conn) {
                echo "Connection failed";
            }

            // Function to fetch and display bill details
            function displayBill($conn) {
                $sql = "SELECT * FROM bill";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>Bill_ID</th><th>Bill Name</th><th>Bill Date</th><th>Bill Payment</th><th>Food Service</th><th>Bill Amount</th><th>Customer ID</th></tr>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['bill_id']."</td>";
                        echo "<td>".$row['bill_name']."</td>";
                        echo "<td>".$row['bill_date']."</td>";
                        echo "<td>".$row['bill_pay']."</td>";
                        echo "<td>".$row['food_service']."</td>";
                        echo "<td>".$row['bill_amount']."</td>";
                        echo "<td>".$row['CustomerID']."</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No bill details found.";
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['disp'])) {
                    displayBill($conn);
                }
            }

            // Close the database connection
            mysqli_close($conn);
        ?>

        <form method="post">
            <button type="submit" name="disp">Display Bill Table</button>
        </form>
        
        <button type="button" onclick="location.href='bill.html'">Go Back</button>
    </div>
</body>
</html>
