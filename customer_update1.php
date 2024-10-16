<!DOCTYPE html>
<html>
<head>
    <title>Customer Update</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Customer Management</h1>
    
        <!-- Update Customer Form -->
        <h2>Update Customer details</h2>
        <form method="post">
    
            <br>
            <label for="Cid">Customer ID:</label>
            <input type="text" name="Cid" id="Cid" required>
            <label for="Cname">Customer Name:</label>
            <input type="text" name="Cname" id="Cname" required>
            <label for="Caddr">Address:</label>
            <input type="text" name="Caddr" id="Caddr" required>
            <label for="Cemail">email:</label>
            <input type="email" name="Cemail" id="Cemail" required>
            <label for="CPhno">Phone number:</label>
            <input type="number" name="CPhno" id="CPhno" required>
            <label for="CDOB">Date of birth :</label>
            <input type="date" name="CDOB" id="CDOB" required>
            <br><br>

            <label for="Ccuisine">Favourite cuisine:</label>
            <input type="checkbox" name="Ccuisine[]" id="Ccuisine" value= "Indian" required>Indian
            <input type="checkbox" name="Ccuisine[]" id="Ccuisine" value= "Chinese" >Chinese
            <input type="checkbox" name="Ccuisine[]" id="Ccuisine" value= "Thai" >Thai
            <input type="checkbox" name="Ccuisine[]" id="Ccuisine" value= "Italian" >Italian
            <input type="checkbox" name="Ccuisine[]" id="Ccuisine" value= "Mexican" >Mexican

            <br><br>
            <label for="CGen">Gender :</label>
            <input type="radio" name="CGen" id="CGen" value= "Male" required>Male
            <input type="radio" name="CGen" id="CGen" value= "Female" required>Female
            <input type="radio" name="CGen" id="CGen" value= "Other" required>Other
            <br><br>
           
            <label for="CMeal">Meal preference :</label> 
            <select name="CMeal" id="CMeal" required>
                <option value="Veg" >Veg</option>
                <option value="NonVeg" >NonVeg</option>
                <option value="Vegan" >Vegan</option>
            </select>
            <br>
            <button type="submit" name="updateCust">Update Customer</button>
            <button onclick="location.href='customer_update.php'">Go back</button>
            
        </form>
        <?php
    //Create a database connection
    $conn = mysqli_connect("localhost","root","", "restaurant");

    // Check if the connection is successful
    if (!$conn) {
        echo "connection failed";
    }

    // Function to insert a Customer
    function updateCustomer($conn,$cid,$name,$address, $email,$Phone,$DOB,$Meal,$Gen,$cuis) 
    {
        $sqlcheck="select * from Customer where Cid = '$cid'";
        $r1=mysqli_query($conn, $sqlcheck);
        $n=mysqli_num_rows($r1);
        if($n>0)
        {
                $sql="UPDATE Customer
                SET Cname='$name' , Caddress='$address',Cemail='$email',Cphone='$Phone',Cdob='$DOB',
                Cmeal='$Meal',CGen='$Gen',Ccuisine='$cuis' 
                where Cid ='$cid' ";
            if (mysqli_query($conn, $sql)) 
            {
                echo "Customer updated successfully.";
            } 
            else 
            {
                echo "Error while updating customer " ;
            }
        }
        else
        {
            echo "Customer not present";
        }
    }

    //Inputs the value entered in the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (isset($_POST['updateCust']))
        {
            $cid = $_POST['Cid'];
            $name = $_POST['Cname'];
            $address = $_POST['Caddr'];
            $email = $_POST['Cemail'];
            $Phone = $_POST['CPhno'];
            $DOB= $_POST['CDOB'];
            $Meal = $_POST['CMeal'];
            $Gen = $_POST['CGen'];

            $cuisine = $_POST['Ccuisine'];
            $n=count($cuisine);
            $cuis = "" ;
            for($i =0;$i<$n;$i++)
                $cuis = $cuis ." ". $cuisine[$i];
            
                //function call 
            updateCustomer($conn,$cid,$name,$address, $email,$Phone,$DOB,$Meal,$Gen,$cuis);

        } 
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    </div>
</body>
</html>

