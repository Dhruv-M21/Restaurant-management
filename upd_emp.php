<!DOCTYPE html>
<html>
<head>
    <title>Employee Update</title>
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
    $conn = mysqli_connect("localhost","root","", "restaurant");

    if (!$conn) {
        echo "connection failed";
    }

    function updateName($conn, $name,$id) {
        $sql ="Update employee set ename = '$name' where eid = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<br>Employee name updation successfull.";
        } else {
            echo "<br>Error while updating Employee name" ;
        }
    }
    function updateType($conn, $etype,$id) {
        $sql ="Update employee set type = '$etype' where eid = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<br>Employee type updation successfull.";
        } else {
            echo "<br>Error while updating Employee type" ;
        }
    }
    function updateSal($conn, $sal,$id) {
        $sql ="Update employee set salary = '$sal' where eid = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<br>Employee salary updation successfull.";
        } else {
            echo "<br>Error while updating Employee salary" ;
        }
    }
    
    

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['UpdateEmpName'])) {
            $id = $_POST['eid'];
            $name = $_POST['ename'];
            updateName($conn, $name,$id);
        }
        else if(isset($_POST['UpdateEmpType'])) {
            $id = $_POST['eid'];
            $etype = $_POST['Etype'];
            updateType($conn, $etype,$id);
        }
        else if(isset($_POST['UpdateEmpSal'])) {
            $id = $_POST['eid'];
            $sal = $_POST['salary'];
            updateSal($conn, $sal,$id);
        }
        
        else if (isset($_POST['disp'])) {
                displayEmp($conn);
            }
        }
    

    // Close the database connection
    mysqli_close($conn);
    ?>

        <!-- Update Employee Form -->
        <h3>Update Employee Name</h3>
        <form method="post">
            <label for="eid">Enter Employee ID :</label>
            <input type="text" name="eid" id="eid" required>
            <label for="cname">New Employee Name:</label>
            <input type="text" name="ename" id="ename" required>
            <button type="submit" name="UpdateEmpName">Update Employee Name</button>
        </form>

        <h3>Update Employee Type</h3>
        <form method="post">
            <label for="eid">Enter Employee ID :</label>
            <input type="text" name="eid" id="eid" required>
            <label for="type">New type of employee:</label>
            <input type="text" name="Etype" id="Etype" required>
            
            <button type="submit" name="UpdateEmpType">Update Employee Type</button>
        </form>

        <h3>Update Employee Salary</h3>
        <form method="post">
            <label for="eid">Enter Employee ID :</label>
            <input type="text" name="eid" id="eid" required>
            <label for="salary">New Salary of employee:</label>
            <input type="number" name="salary" id="Salary" required>
            <button type="submit" name="UpdateEmpSal">Update Employee Salary</button>
            <br>
        </form>

        <form method="post">
        <button type="submit" name="disp">Display employee table</button>
        </form>
            <button type="button" onclick="redirectToAnotherPage()">Go Back</button>


    </div>
    <footer style="font-size: x-small;">©ZestfulPlates [2019]. All Rights Reserved.
        <br>
        The content, design, and images on this website are the property of ZestfulPlates and are
        protected by international copyright laws. Unauthorized use or reproduction of the content in any form is
        prohibited.
    </footer>
</body>
</html>
