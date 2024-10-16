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

    
    function updEmployee($conn, $name, $etype, $gender, $salary, $join, $shifts, $id)
{
    $sql = "UPDATE employee SET ";

    if (!empty($name)) {
        $sql .= "ename = '$name'";
    }

    if (!empty($etype)) {
        $sql .= (!empty($name) ? ', ' : '') . "type = '$etype'";
    }

    if (!empty($gender)) {
        $sql .= (!empty($name) || !empty($etype) ? ', ' : '') . "gender = '$gender'";
    }

    if (!empty($salary)) {
        $sql .= (!empty($name) || !empty($etype) || !empty($gender) ? ', ' : '') . "salary = '$salary'";
    }

    if (!empty($join)) {
        $sql .= (!empty($name) || !empty($etype) || !empty($gender) || !empty($salary) ? ', ' : '') . "join_year = '$join'";
    }

    if (!empty($shifts)) {
        $sql .= (!empty($name) || !empty($etype) || !empty($gender) || !empty($salary) || !empty($join) ? ', ' : '') . "shifts = '$shifts'";
    }

    $sql .= " WHERE eid = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Employee update successful.";
    } else {
        echo "<br>Error while updating Employee: " . mysqli_error($conn);
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
    
                        echo "</table><br><br>";
                    } else {
                        echo "No employee details found.";
                    }
                }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['update'])) {
            $id = $_POST['eid'];
            $name = $_POST['ename'];
		$etype = $_POST['type'];
		$gender = $_POST['gender'];
		$salary = $_POST['salary'];
        $join = $_POST['join'];
        $a=$_POST['info'];
        $n=count($a);
        $shifts="";
        for($i=0;$i<$n;$i++)
        $shifts=$shifts." ".$a[$i];
        updEmployee($conn, $name, $etype, $gender, $salary, $join, $shifts, $id);
            } 
        
        
        
        
        else if (isset($_POST['disp'])) {
                displayEmp($conn);
            }
        }
    

    // Close the database connection
    mysqli_close($conn);
    ?>

        <!-- Update Employee Form -->
        <form method="post">
        <label for="eid">Enter Employee ID :</label>
            <input type="text" name="eid" id="eid" required>
            <br> <br>
            <label for="ename">Employee New Name:</label>
           
            <input type="text" name="ename" id="EmployeeName" >
            <br><br>
            <label for="type">Change type of employee:</label>
            <select name="type" id="Etype" >
                <option value="Manager">Manager</option>
                <option value="Chef">Chef</option>
                <option value="Cook">Cook</option>
                <option value="Bartender">Bartender</option>
                <option value="Waiter">Waiter</option>
            </select>
            
            
            <label for="gender">Change Gender:</label>
            <input type="radio" name="gender" id="G1" value="Male">Male
            <input type="radio" name="gender" id="G2" value="Female">Female
            <input type="radio" name="gender" id="G3" value="Other">Other
    
            <br><br>
            <label for="salary">Change Salary:</label>
            <input type="number" name="salary" id="Salary" >
            <br><br>
            
    
            <label>Change Shifts available:</label>
    <br>
            <input type="checkbox" name="info[]" value="Morning">Morning
            <input type="checkbox" name="info[]" value="Evening">Evening
    <br><br>
    
            <label for="join_year">Change Join Year:</label>
            <input type="date" name="join" id="Join"  >
            <br><br>

            <button type="submit" name="update">Update Employee</button>
           
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
