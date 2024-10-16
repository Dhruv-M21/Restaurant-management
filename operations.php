<html>
<link rel="stylesheet" href="restaurant_style.css">

<head>
    <title>bill generated</title>
</head>

<body>
    <div class="container">
        <?php
$conn=mysqli_connect("localhost","root","","restaurant");
if(!$conn)
    echo " connection failed";

echo "<br> employee with salary greater than avg salary ";
$sql = "
    SELECT * from employee 
    WHERE salary > (SELECT AVG(salary) from employee);
";


// Execute the SQL statement to select data from the view
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
     } else {
    echo "0 results";
}

mysqli_close($conn);
?>
<button type="button" onclick="location.href='emp_mgt.html'">Go Back</button>
    </div>
</body>

</html>