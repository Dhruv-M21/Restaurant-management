<!DOCTYPE html>
<html>
<head>
    <title>Menu Display</title>
    <link rel="stylesheet" href="restaurant_style.css">
</head>
<body>
    <div class="container">
        <h1>Menu Display</h1>

        <?php
       
        $conn = mysqli_connect("localhost", "root", "", "restaurant");

        
        if (!$conn) {
            echo "Connection failed: ";
        }

        
        function displayAllMenuViews($conn)
        {
            
            echo "<h2>Starters</h2>";
            displayMenuView($conn, 'StartersView');

            
            echo "<h2>Main Courses</h2>";
            displayMenuView($conn, 'MainCoursesView');

            
            echo "<h2>Desserts</h2>";
            displayMenuView($conn, 'DessertsView');
        }

        function displayMenuView($conn, $viewName)
        {
            $sql = "SELECT * FROM $viewName";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>Item ID</th><th>Item Name</th><th>Item Type</th><th>Item Price</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['item_id'] . "</td>";
                    echo "<td>" . $row['item_name'] . "</td>";
                    echo "<td>" . $row['item_type'] . "</td>";
                    echo "<td>" . $row['item_price'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No menu items found.";
            }
        }

        displayAllMenuViews($conn);

        mysqli_close($conn);
        ?>
        <button type="button" onclick="location.href='menuUI.php'">Go Back</button>
    
    
    
</body>
</html>
