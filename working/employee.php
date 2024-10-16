<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Restaurant Management System</h1>
        <div>
            <button onclick="location.href='demo.php'">Insert Employee </button>
            <button onclick="location.href='customer.php'">Customer Management</button>
            <button onclick="location.href='bill.php'">Bill Management</button>
        </div>
    </div>
</body>
</html>
