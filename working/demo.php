<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
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
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Employee Management</h1>
        <?php
        // Create a database connection
    $conn = mysqli_connect("localhost","root","", "restaurant");

    // Check if the connection is successful
    if (!$conn) {
        echo "connection failed";
    }

    // Function to insert an employee
    function insertEmployee($conn, $name, $etype,$gender,$salary) {
        $sql ="INSERT INTO employee(ename,type,gender,salary) VALUES ('$name', 
        '$etype','$gender','$salary')";
        if (mysqli_query($conn, $sql)) {
            echo "Employee inserted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Function to delete an employee
    function deleteEmployee($conn, $employeeId) {
        $sql = "DELETE FROM employees WHERE eid = $employeeId";
        if (mysqli_query($conn, $sql)) {
            echo "Employee deleted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Function to update an employee's information
    function updateEmployee($conn, $employeeId, $name, $position) {
        $sql = "UPDATE employees SET ename = '$name', type = '$position' WHERE eid = $employeeId";
        if (mysqli_query($conn, $sql)) {
            echo "Employee updated successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['insert'])) {
            $name = $_POST['ename'];
		$etype = $_POST['type'];
		$gender = $_POST['gender'];
		$salary = $_POST['salary'];
            insertEmployee($conn, $name, $etype,$gender,$salary);
        } elseif (isset($_POST['delete'])) {
            $employeeId = $_POST['employeeId'];
            deleteEmployee($conn, $employeeId);
        } elseif (isset($_POST['update'])) {
            $employeeId = $_POST['employeeId'];
            $name = $_POST['name'];
            $position = $_POST['type'];
            updateEmployee($conn, $employeeId, $name, $position);
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

        <!-- Insert Employee Form -->
        <h2>Insert Employee</h2>
        <form method="post">
            <label for="ename">Employee Name:</label>
            <input type="text" name="ename" id="EmployeeName" required>
            <label for="type">Type of employee:</label>
            <input type="text" name="type" id="Etype" required>
            <label for="gender">Gender:</label>
            <input type="text" name="gender" id="Gender" required>
            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="Salary" required>
            <button type="submit" name="insert">Insert Employee</button>
        </form>

        <!-- Delete Employee Form -->
        <h2>Delete Employee</h2>
        <form method="post">
            <label for="employeeId">Employee ID:</label>
            <input type="number" name="employeeId" required>
            <button type="submit" name="delete">Delete Employee</button>
        </form>

        <!-- Update Employee Form -->
        <h2>Update Employee</h2>
        <form method="post">
            <label for="employeeId_update">Employee ID:</label>
            <input type="number" name="employeeId_update" required>
            <label for="name_update">New Name:</label>
            <input type="text" name="name_update" required>
            <label for="position_update">New Position:</label>
            <input type="text" name="type" required>
            <button type="submit" name="update">Update Employee</button>
        </form>
    </div>
</body>
</html>
