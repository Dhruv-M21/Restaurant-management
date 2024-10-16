<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    <link rel="stylesheet" href="restaurant_style.css">

     <script>
        function redirectToAnotherPage() {
            
            window.location.href = 'emp_mgt.html';
        }
    </script>
</head>
<body>
<header>RESTAURANT MANAGEMENT SYSTEM</header>
    <div class="container">
        <h1>Employee Management</h1>
        <?php
        // Create a database connection
    $conn = mysqli_connect("localhost","root","", "restaurant");

    // Check if the connection is successful
    if (!$conn) {
        echo "connection failed";
    }
    function dispEmp($conn)
    {$sql = "SELECT * FROM employee";
                    $result = mysqli_query($conn, $sql);
    
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table border='1'>";
                        echo "<tr><th>Emp_Id</th><th>Emp Name</th><th>Emp Type</th><th>Gender</th><th>Salary</th><th>Join Year</th><th>Shifts</th></tr>";
    
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['eid']."</td>";
                            echo "<td>".$row['ename']."</td>";
                            echo "<td>".$row['type']."</td>";
                            echo "<td>".$row['gender']."</td>";
                            echo "<td>".$row['salary']."</td>";
                            echo "<td>".$row['join_year']."</td>";
                            echo "<td>".$row['shifts']."</td>";
                            echo "</tr>";
                        }
    
                        echo "</table>";
                    } else {
                        echo "No employee details found.";
                    }
                }
    function deleteEmployee($conn, $employeeId) {
        $sql = "DELETE FROM employee WHERE eid = $employeeId";
        if (mysqli_query($conn, $sql)) {
            echo "Employee deleted successfully.";
            dispEmp($conn);
            
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST['delete'])) {
            $employeeId = $_POST['employeeId'];
            deleteEmployee($conn, $employeeId);
            

        } 
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
        <h2>Delete Employee</h2>
        <form method="post">
            <label for="employeeId">Employee ID:</label>
            <input type="number" name="employeeId" required>
            <button type="submit" name="delete">Delete Employee</button>
            <button type="button" onclick="redirectToAnotherPage()">Go Back</button>
        </form>
    </div>
    <footer style="font-size: x-small;">©ZestfulPlates [2019]. All Rights Reserved.
        <br>
        The content, design, and images on this website are the property of ZestfulPlates and are
        protected by international copyright laws. Unauthorized use or reproduction of the content in any form is
        prohibited.
    </footer>
    
</body>
</html>
