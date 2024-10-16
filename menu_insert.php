<!DOCTYPE html>
<html>
<head>
    <title>Menu Insert</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /*
            background-color: #f5f5f5;
            text-align: center;*/
            display : flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('r3.jpg') no-repeat;
            background-size: cover;
            background-position: center;
           /* font-size: 25px;*/
        }
        h1 {
            color: #333;
        }
        .container {
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            max-width: 500px;
            margin-top: 20px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 10px;
        }
        button:hover {
            background-color: #45a049;
        }
        form {
            text-align: left;
            padding: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inserting Menu Item</h1>

        <?php
            // Create a database connection
            $conn = mysqli_connect("localhost", "root", "", "restaurant");

            // Check if the connection is successful
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Function to insert a menu item
            function insertMenuItem($conn, $itemName, $itemType, $itemPrice, $itemCourse, $itemIngredients) {
                $sql = "INSERT INTO menu (item_name, item_type, item_price, item_course, item_ingredients) 
                        VALUES ('$itemName', '$itemType', '$itemPrice', '$itemCourse', '$itemIngredients')";
                
                if (mysqli_query($conn, $sql)) {
                    echo "Menu item inserted successfully.";
                } else {
                    echo "Error while inserting menu item: " . mysqli_error($conn);
                }
            }

            // Handle form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['insertmenu'])) {
                    $itemName = $_POST['itemName'];
                    $itemType = $_POST['itemType'];
                    $itemPrice = $_POST['itemPrice'];
                    $itemCourse = $_POST['itemCourse'];
                    $itemIngredients = isset($_POST['itemIngredients']) ? implode(', ', $_POST['itemIngredients']) : '';
                    
                    insertMenuItem($conn, $itemName, $itemType, $itemPrice, $itemCourse, $itemIngredients);
                }
            }

            // Close the database connection
            mysqli_close($conn);
        ?>

        <!-- Insert Menu Item Form -->
        <h2>Insert Menu Item details</h2>
        <form method="post" action="">

            <br><label for="itemName">Item Name: </label>
            <input type="text" name="itemName" id="itemName" required>
            
            <label for="itemType">Item Type: </label>
            <br><input type="radio" name="itemType" id="v" value="Veg">Veg
            <br><input type="radio" name="itemType" id="nv" value="NonVeg" >NonVeg
            
            <br><label for="itemPrice">Item Price: </label>
            <input type="text" name="itemPrice" id="itemPrice" required>
            
            <br><label for="itemCourse">Item Course: </label>
            <select name="itemCourse">
                <option value=""></option>
                <option value="Starter">Starter</option>
                <option value="Main Course">Main Course</option>
                <option value="Dessert">Dessert</option>
            </select>
            
            <br>
            <label for="itemIngredients">Item Ingredients (Check if Allergic):</label>
            <input type="checkbox" name="itemIngredients[]" value="Peanuts"> Peanuts
            <input type="checkbox" name="itemIngredients[]" value="Shellfish"> Shellfish
            <input type="checkbox" name="itemIngredients[]" value="Soy"> Soy
            <input type="checkbox" name="itemIngredients[]" value="Dairy"> Dairy
            <input type="checkbox" name="itemIngredients[]" value="Gluten"> Gluten
            <input type="checkbox" name="itemIngredients[]" value="Egg"> Egg
            <input type="checkbox" name="itemIngredients[]" value="Tree Nuts"> Tree Nuts
            
            <br><button type="submit" name="insertmenu">Insert Menu Item</button>
            <button type="button" onclick="location.href='menuUI.php'">Go Back</button>
        </form>
    </div>
</body>
</html>
