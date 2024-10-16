<!DOCTYPE html>
<html>
<head>
    <title>Menu Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('r3.jpg') no-repeat;
            background-size: cover;
            background-position: center;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .filter-buttons {
            margin-top: 10px;
        }
    </style>
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
        <button type="button" onclick="location.href='order_ins.php'">Go Back</button>
    </div>
</body>
</html>
