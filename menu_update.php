<!DOCTYPE html>
<html>
<head>
    <title>Menu Item Update</title>
    <link rel="stylesheet" href="restaurant_style.css">
</head>
<body>
    <div class="container">
        <h1>Update Menu Item</h1>

        <?php
            // Create a database connection
            $conn = mysqli_connect("localhost", "root", "", "restaurant");

            // Check if the connection is successful
            if (!$conn) {
                echo "Connection failed: " . mysqli_connect_error();
            }

            // Function to update a menu item using prepared statements
            function updateMenuItem($conn, $item_id, $newItemName, $newItemType, $newItemPrice, $newItemCourse, $newItemIngredients) {
                $sql = "UPDATE menu SET item_name = ?, item_type = ?, item_price = ?, item_course = ?, item_ingredients = ? WHERE item_id = ?";
                
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ssdssi", $newItemName, $newItemType, $newItemPrice, $newItemCourse, $newItemIngredients, $item_id);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Menu item updated successfully.";
                } else {
                    echo "Error while updating menu item: " . mysqli_error($conn);
                }

                mysqli_stmt_close($stmt);
            }

            // Handle form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['updateMenuItem'])) {
                    $item_id = $_POST['item_id'];
                    $newItemName = $_POST['newItemName'];
                    $newItemType = $_POST['newItemType'];
                    $newItemPrice = $_POST['newItemPrice'];
                    $newItemCourse = $_POST['newItemCourse'];
                    $newItemIngredients = isset($_POST['newItemIngredients']) ? implode(', ', $_POST['newItemIngredients']) : '';

                    updateMenuItem($conn, $item_id, $newItemName, $newItemType, $newItemPrice, $newItemCourse, $newItemIngredients);
                }
            }

            // Close the database connection
            mysqli_close($conn);
        ?>

        <!-- Update Menu Item Form -->
        <h2>Update Menu Item details</h2>
        <form method="post">
            <label for="item_id">Item ID: </label>
            <input type="text" name="item_id" id="item_id" required>
            
            <br><label for="newItemName">New Item Name: </label>
            <input type="text" name="newItemName" id="newItemName" required>
            
            <br><label for="newItemType">New Item Type: </label>
            <br><input type="radio" name="newItemType" id="v" value="Veg">Veg
            <br><input type="radio" name="newItemType" id="nv" value="NonVeg" >NonVeg
            
            <br><label for="newItemPrice">New Item Price: </label>
            <input type="text" name="newItemPrice" id="newItemPrice" required>
            
            <br><label for="newItemCourse">New Item Course: </label>
            <select name="newItemCourse">
                <option value=""></option>
                <option value="Starter">Starter</option>
                <option value="Main Course">Main Course</option>
                <option value="Dessert">Dessert</option>
            </select>
            <br>
            <br><label for="newItemIngredients">New Item Ingredients (Check if Allergic):</label>
            <input type="checkbox" name="newItemIngredients[]" value="Peanuts"> Peanuts
            <input type="checkbox" name="newItemIngredients[]" value="Shellfish"> Shellfish
            <input type="checkbox" name="newItemIngredients[]" value="Soy"> Soy
            <input type="checkbox" name="newItemIngredients[]" value="Dairy"> Dairy
            <input type="checkbox" name="newItemIngredients[]" value="Gluten"> Gluten
            <input type="checkbox" name="newItemIngredients[]" value="Egg"> Egg
            <input type="checkbox" name="newItemIngredients[]" value="Tree Nuts"> Tree Nuts
            
            <br><button type="submit" name="updateMenuItem">Update Menu Item</button>
            <button type="button" onclick="location.href='menuUI.php'">Go Back</button>
        </form>
    </div>
</body>
</html>
