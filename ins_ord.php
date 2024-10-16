<!DOCTYPE html>
<html>
<head>
    <title>Order Management</title>
    <link rel="stylesheet" href="restaurant_style.css">
     <script>
        function redirectToAnotherPage() {
            
            window.location.href = 'emp_mgt.html';
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Order Management</h1>
        <?php
        // Create a database connection
    $conn = mysqli_connect("localhost","root","", "restaurant");

    // Check if the connection is successful
    if (!$conn) {
        echo "connection failed";
    }

    // Function to insert an Order
    function insertOrder($conn, $name, $etype,$gender,$salary,$join,$information) {
        $sql ="INSERT INTO Order(ename,type,gender,salary,join_year,shifts) VALUES ('$name', 
        '$etype','$gender','$salary','$join','$information')";
        if (mysqli_query($conn, $sql)) {
            echo "Order inserted successfully.";
        } else {
            echo "Error while inserting Order " ;
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
            insertOrder($conn, $name, $etype,$gender,$salary,$join,$information);
        } 
        }
    

    // Close the database connection
    mysqli_close($conn);
    ?>

        <!-- Insert Order Form -->
        <h2>Insert Order Details</h2>
        <form method="post">
            
        

            <br><br>
            <label >Enter Employee Id:</label>
            <input type="text" name="eid" id="eid" >
            <br><br>
            <label >Enter Customer Id:</label>
            <input type="text" name="cid" id="cid" >
            
            <label >Enter date:</label>
            <input type="date" name="join" id="Join"  required>
            <br><br>

            <button type="submit" name="insert">Insert Order</button>
            <button type="button" onclick="redirectToAnotherPage()">Go Back</button>
        </form>

    </div>
</body>
</html>
