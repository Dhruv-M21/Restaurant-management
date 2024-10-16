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
        exit();
    }
    
    
                // Function to fetch and display menu items
                function displayEmp($conn) {
                    $sql = "SELECT * FROM employee";
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

                function searchEmp($conn,$name) {
                    $sql = "SELECT * FROM employee where ename='$name'";
                    $result = mysqli_query($conn, $sql);
    
                    if ($result) {
                        $n=mysqli_num_rows($result);
                        if($n>0)
                        {

                
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
                    }
                    else
                        echo "<br> no record found";
                    } else {
                        echo "No employee details found.";
                    }
                }
                

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['disp'])) {
                        displayEmp($conn);
                    }
                    else if (isset($_POST['search'])) {
                        $name = $_POST['ename'];
                        searchEmp($conn,$name);
                    }
                }
    
    
                // Close the database connection
                mysqli_close($conn);
            ?>

    
    <form method="post">

            
        <button type="submit" name="disp">Display employee table</button>
    </form>
    <form method="post">
        <label for="ename">Enter Employee Name:</label>

            <input type="text" name="ename" id="EmployeeName" required>
        <br><br>
        <button type="submit" name="search">Search for employee</button>
        <button type="button" onclick="location.href='emp_mgt.html'">Go Back</button>
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