<!DOCTYPE html>
<html>
<head>
    <title>Customer display</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
    <?php
        $conn = mysqli_connect("localhost","root","", "restaurant");

    
        if (!$conn) {
            echo "connection failed";
        }
    
        $sql ="select * from Customer";
        $r1 = mysqli_query($conn, $sql);
        if ($r1) 
        {
                
                $n = mysqli_num_rows($r1) ;
                if($n>0)
                {
                    echo "CUSTOMER TABLE" ;
                    
                    echo "<table border='1'>";
                    echo "<tr><th>Cust_Id</th><th>Name</th><th>Address</th><th>Email</th>
                    <th>Phone</th><th>DOB</th><th>Meal Pref</th><th>Gender</th><th>Favourite Cuisine</th></tr>";
                    while($info = mysqli_fetch_array($r1))
                    {
                            echo "<tr>";
                                echo "<td>".$info['Cid']."</td>";
                                echo "<td>".$info['Cname']."</td>";
                                echo "<td>".$info['Caddress']."</td>";
                                echo "<td>".$info['Cemail']."</td>";
                                echo "<td>".$info['Cphone']."</td>";
                                echo "<td>".$info['Cdob']."</td>";
                                echo "<td>".$info['Cmeal']."</td>";
                                echo "<td>".$info['Cgen']."</td>";
                                echo "<td>".$info['Ccuisine']."</td>";
                            echo "</tr>";
                        
                    }
                    echo "</table>";
                }
                else
                {
                    echo "<br> NO RECORDS ";
                }
        } 
        else 
        {
            echo "Error while displaying customer " ;
        }

    ?>

    <button onclick="location.href='customer_display.php'">Go back</button>
    </div>
  
</body>
</html>

