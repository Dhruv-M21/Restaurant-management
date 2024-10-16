<!DOCTYPE html>
<html>
<head>
    <title>Customer Delete</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Customer Management</h1>
        <?php
    //Create a database connection
    $conn = mysqli_connect("localhost","root","", "restaurant");

    // Check if the connection is successful
    if (!$conn) {
        echo "connection failed";
    }

    // Function to insert an employee
    function deleteCustomer($conn, $cId) 
    {
        
        $sqlcheck="select * from Customer where Cid = '$cId'";
        $r1=mysqli_query($conn, $sqlcheck);
        $n=mysqli_num_rows($r1);

        if($n>0)
        {
            $sqldel ="delete from Customer where Cid = '$cId'";
            if (mysqli_query($conn, $sqldel)) 
            {
                echo "Customer deleted successfully.";      
            }
            else
            {
                echo "Error while deleting customer " ;
            }
        }

        else
            echo "Customer not present.";
     }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['deleteCust'])) {
            $cId = $_POST['Cust_id'];
		
            deleteCustomer($conn, $cId);
        } 
        }
    

    // Close the database connection
    mysqli_close($conn);
    ?>

        <!-- Delete Employee Form -->
        <h2>Delete Customer details</h2>
        <form method="post">
            <label for="cust_id">Customer ID:</label>
            <input type="text" name="Cust_id" id="cust_id" required>
    
            <button type="submit" name="deleteCust">Delete Customer</button>
            <button onclick="location.href='customer_UI.php'">Go back</button>
        </form>

    </div>
</body>
</html>