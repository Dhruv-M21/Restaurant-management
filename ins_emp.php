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

    // Function to insert an employee
    function insertEmployee($conn, $name, $etype,$gender,$salary,$join,$information) {
        $sql ="INSERT INTO employee(ename,type,gender,salary,join_year,shifts) VALUES ('$name', 
        '$etype','$gender','$salary','$join','$information')";
        if (mysqli_query($conn, $sql)) {
            echo "Employee inserted successfully.";
        } else {
            echo "Error while inserting employee " ;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['insert'])) {
            $name = $_POST['ename'];
		$etype = $_POST['type'];
		$gender = $_POST['gender'];
		$salary = $_POST['salary'];
        $join = $_POST['join'];
        $a=$_POST['info'];
        $n=count($a);
        $information="";
        for($i=0;$i<$n;$i++)
        $information=$information." ".$a[$i];
            insertEmployee($conn, $name, $etype,$gender,$salary,$join,$information);
        } 
        }
    

    // Close the database connection
    mysqli_close($conn);
    ?>

        <!-- Insert Employee Form -->
        <h2>Insert Employee Details</h2>
        <form method="post">
            <label for="ename">Employee Name:</label>
            <input type="text" name="ename" id="EmployeeName" required>
            <br>
            <label for="type">Type of employee:</label>
            <select name="type" id="Etype" required>
                <option value="Manager">Manager</option>
                <option value="Chef">Chef</option>
                <option value="Cook">Cook</option>
                <option value="Bartender">Bartender</option>
                <option value="Waiter">Waiter</option>
            </select>

            <br><br>
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" id="G1" value="Male">Male
            <input type="radio" name="gender" id="G2" value="Female">Female
            <input type="radio" name="gender" id="G3" value="Other">Other
            <br><br>
            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="Salary" required>
            <br>
            <label>Shifts available:</label>
    <br>
            <input type="checkbox" name="info[]" value="Morning">Morning
            <input type="checkbox" name="info[]" value="Evening">Evening
    <br><br>
            <label for="join_year">Join Year:</label>
            <input type="date" name="join" id="Join"  required>
            <br><br>

            <button type="submit" name="insert">Insert Employee</button>
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
