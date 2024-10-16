<!DOCTYPE html>
<html>
<head>
    <title>Menu Item Delete</title>
    <link rel="stylesheet" href="restaurant_style.css">
</head>
<body>
    <div class="container">
        <h1>Delete Menu Item</h1>

        <?php
            // Create a database connection
            $conn = mysqli_connect("localhost", "root", "", "restaurant");

            // Check if the connection is successful
            if (!$conn) {
                echo "Connection failed: " . mysqli_connect_error();
            }

            // Function to delete a menu item using prepared statements
            function deleteMenuItem($conn, $item_id) {
                $sql = "DELETE FROM menu WHERE item_id = ?";
                
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "i", $item_id);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Menu item deleted successfully.";
                } else {
                    echo "Error while deleting menu item: " . mysqli_error($conn);
                }

                mysqli_stmt_close($stmt);
            }

            // Handle form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['deleteMenuItem'])) {
                    $item_id = $_POST['item_id'];
                    deleteMenuItem($conn, $item_id);
                }
            }

            // Close the database connection
            mysqli_close($conn);
        ?>

        <!-- Delete Menu Item Form -->
        <h2>Delete Menu Item details</h2>
        <form method="post">
            <label for="item_id">Item ID:</label>
            <input type="text" name="item_id" id="item_id" required>
    
            <button type="submit" name="deleteMenuItem">Delete Menu Item</button>
            <br>
            <button type="button" onclick="location.href='menuUI.php'">Go Back</button>
            
        </form>
    </div>
</body>
</html>
