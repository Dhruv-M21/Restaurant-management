<!DOCTYPE html>
<html>

<head>
    <title>Customer update</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
 
    <div class="container">
    <form method = 'POST'>
        <h1>Customer Management</h1>
        <div>
            
            <form method='POST'>
                <label for="Cid">Customer ID:</label>
                <input type="text" name="Cid" id="Cid" required>
                <label for="Cname">Customer Name:</label>
                <input type="text" name="Cname" id="Cname" required>
                <button type="submit" name="updateCustName">Update name</button>
                <br><br>
            </form >
            <form method='POST'>
                <label for="Cid">Customer ID:</label>
                <input type="text" name="Cid" id="Cid" required>
                <label for="Caddr">Address:</label>
                <input type="text" name="Caddr" id="Caddr" required>
                <button type="submit" name="updateCustAddress">Update address</button>
                <br><br>
            </form>
            <form method='POST'>
                <label for="Cid">Customer ID:</label>
                <input type="text" name="Cid" id="Cid" required>
                <label for="Cemail">email:</label>
                <input type="email" name="Cemail" id="Cemail" required>
                <button type="submit" name="updateCustEmail">Update email</button>
                <br><br>
            </form>
            <form method='POST'>
                <label for="Cid">Customer ID:</label>
                <input type="text" name="Cid" id="Cid" required>
                <label for="CPhno">Phone number:</label>
                <input type="number" name="CPhno" id="CPhno" required>
                <button type="submit" name="updateCustPhno">Update Phone number</button>
                <br><br>
            </form>

            <form method='POST'>
                <label for="Cid">Customer ID:</label>
                <input type="text" name="Cid" id="Cid" required>
                <label for="CDOB">Date of birth :</label>
                <input type="date" name="CDOB" id="CDOB" required>
                <button type="submit" name="updateCustDOB">Update DOB</button>
                <br><br>
            </form>

            <form method='POST'>
                <label for="Cid">Customer ID:</label>
                <input type="text" name="Cid" id="Cid" required>
                 <label for="Ccuisine">Favourite cuisine:</label>
                <input type="checkbox" name="Ccuisine[]" id="Ccuisine" value= "Indian" required>Indian
                <input type="checkbox" name="Ccuisine[]" id="Ccuisine" value= "Chinese" >Chinese
                <input type="checkbox" name="Ccuisine[]" id="Ccuisine" value= "Thai" >Thai
                <input type="checkbox" name="Ccuisine[]" id="Ccuisine" value= "Italian" >Italian
                <input type="checkbox" name="Ccuisine[]" id="Ccuisine" value= "Mexican" >Mexican
            
            <button type="submit" name="updateCustcuis">Update Cuisine</button>
            </form>
            <br><br>
            <form method='POST'>
                <label for="Cid">Customer ID:</label>
                <input type="text" name="Cid" id="Cid" required>
                <label for="CGen">Gender :</label>
                    <input type="radio" name="CGen" id="CGen" value= "Male" required>Male
                    <input type="radio" name="CGen" id="CGen" value= "Female" required>Female
                    <input type="radio" name="CGen" id="CGen" value= "Other" required>Other
                <button type="submit" name="updateCustGen">Update Gender</button>
                <br><br>
            </form> 
            <form method='POST'>
                <label for="Cid">Customer ID:</label>
                <input type="text" name="Cid" id="Cid" required>    
                <label for="CMeal">Meal preference :</label> 
                <select name="CMeal" id="CMeal" required>
                    <option value="Veg" >Veg</option>
                    <option value="NonVeg" >NonVeg</option>
                    <option value="Vegan" >Vegan</option>
                </select>
                <button type="submit" name="updateCustMeal">Update Meal</button>
             </form> 

        </form>
            <br>
            <button onclick="location.href='customer_update.php'">Go back</button>

        </div>
        <?php
    //Create a database connection
    $conn = mysqli_connect("localhost","root","", "restaurant");

    // Check if the connection is successful
    if (!$conn) {
        echo "connection failed";
    }

    // Function to insert an employee
    function UpdateCustomerName($conn,$name,$cid) {
        $sqlcheck="select * from Customer where Cid = '$cid'";
        $r1=mysqli_query($conn, $sqlcheck);
        $n=mysqli_num_rows($r1);
        if($n>0)
        {
            $sql ="UPDATE CUSTOMER set cname='$name' where Cid = '$cid' ";
            if (mysqli_query($conn, $sql)) 
            {
                echo "Customer Updated successfully.";
            }
            else 
            {
                echo "Error while updating customer " ;
            }
        }
        else
            echo "Customer not present";
    }
    
    function UpdateCustomerEmail($conn, $email,$cid) {
        $sqlcheck="select * from Customer where Cid = '$cid'";
        $r1=mysqli_query($conn, $sqlcheck);
        $n=mysqli_num_rows($r1);
        if($n>0)
        {
            $sql ="UPDATE CUSTOMER set Cemail='$email' where Cid = '$cid'";
            if (mysqli_query($conn, $sql)) 
            {
                echo "Customer Updated successfully.";
            }
            else 
            {
                echo "Error while updating customer " ;
            }
        }
         else
            echo "Customer not present";
    }
    
    function UpdateCustomerAddress($conn,$address,$cid) {
        $sqlcheck="select * from Customer where Cid = '$cid'";
        $r1=mysqli_query($conn, $sqlcheck);
        $n=mysqli_num_rows($r1);
        if($n>0)
        {
        
            $sql ="UPDATE CUSTOMER set Caddress='$address' where Cid = '$cid'";
            
            if (mysqli_query($conn, $sql)) 
            {
                echo "Customer Updated successfully.";
            }
            else 
            {
                echo "Error while updating customer " ;
            }
        }
        else
            echo "Customer not present";
    }
    function UpdateCustomerCuisine($conn,$cuis,$cid) {
        $sqlcheck="select * from Customer where Cid = '$cid'";
        $r1=mysqli_query($conn, $sqlcheck);
        $n=mysqli_num_rows($r1);
        if($n>0)
        {
            $sql ="UPDATE CUSTOMER set Ccuisine='$cuis' where Cid = '$cid'";
            if (mysqli_query($conn, $sql)) 
            {
                echo "Customer Updated successfully.";
            }
            else 
            {
                echo "Error while updating customer " ;
            }
        }
        else
            echo "Customer not present";
    }
    function UpdateCustomerMeal($conn,$Meal,$cid) {
        $sqlcheck="select * from Customer where Cid = '$cid'";
        $r1=mysqli_query($conn, $sqlcheck);
        $n=mysqli_num_rows($r1);
        if($n>0)
        {
            $sql ="UPDATE CUSTOMER set Cmeal='$Meal' where Cid = '$cid'";
            if (mysqli_query($conn, $sql)) 
            {
                echo "Customer Updated successfully.";
            }
            else 
            {
                echo "Error while updating customer " ;
            }
        }
        else
            echo "Customer not present";
    }
    function UpdateCustomerDOB($conn,$DOB,$cid) {
        $sqlcheck="select * from Customer where Cid = '$cid'";
        $r1=mysqli_query($conn, $sqlcheck);
        $n=mysqli_num_rows($r1);
        if($n>0)
        {
            $sql ="UPDATE CUSTOMER set Cdob='$DOB' where Cid = '$cid'";
        
            if (mysqli_query($conn, $sql)) 
            {
                echo "Customer Updated successfully.";
            }
            else 
            {
                echo "Error while updating customer " ;
            }
        }
        else
            echo "Customer not present";

    }
    function UpdateCustomerGender($conn,$Gen,$cid) {
        $sqlcheck="select * from Customer where Cid = '$cid'";
        $r1=mysqli_query($conn, $sqlcheck);
        $n=mysqli_num_rows($r1);
        if($n>0)
        {
            $sql ="UPDATE CUSTOMER set CGen='$Gen' where Cid = '$cid'";
            if (mysqli_query($conn, $sql)) 
            {
                echo "Customer Updated successfully.";
            }
            else 
            {
                echo "Error while updating customer " ;
            }
        }
        else
            echo "Customer not present";
    }
    function UpdateCustomerPhone($conn,$Phone,$cid) {
        $sqlcheck="select * from Customer where Cid = '$cid'";
        $r1=mysqli_query($conn, $sqlcheck);
        $n=mysqli_num_rows($r1);
        if($n>0)
        {
            $sql ="UPDATE CUSTOMER set Cphone=$Phone where Cid = '$cid'";
            if (mysqli_query($conn, $sql)) 
            {
                echo "Customer Updated successfully.";
            }
            else 
            {
                echo "Error while updating customer " ;
            }
        }
        else
            echo "Customer not present";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (isset($_POST['updateCustName']))
        {
            $cid = $_POST['Cid'];
            $name = $_POST['Cname'];
            UpdateCustomerName($conn,$name,$cid);
        }
        if (isset($_POST['updateCustAddress']))
        {
            $cid = $_POST['Cid'];
            $address = $_POST['Caddr'];
            UpdateCustomerAddress($conn,$address,$cid);
        }
        if (isset($_POST['updateCustEmail']))
        {
            $cid = $_POST['Cid'];
            $email = $_POST['Cemail'];
            UpdateCustomerEmail($conn,$email,$cid);
        }
        if (isset($_POST['updateCustPhno']))
        {
            $cid = $_POST['Cid'];
            $Phone = $_POST['CPhno'];
            UpdateCustomerPhone($conn,$Phone,$cid);
        }
        if (isset($_POST['updateCustDOB']))
        {
            $cid = $_POST['Cid'];
            $DOB= $_POST['CDOB'];
            UpdateCustomerDOB($conn,$DOB,$cid);
        }
        if (isset($_POST['updateCustcuis']))
        {
            $cid = $_POST['Cid'];
            $cuisine = $_POST['Ccuisine'];
            $n=count($cuisine);
            $cuis = "" ;
            for($i =0;$i<$n;$i++)
                $cuis = $cuis ." ". $cuisine[$i];
            
            UpdateCustomerCuisine($conn,$cuis,$cid);
        }
        if (isset($_POST['updateCustGen']))
        {
            $cid = $_POST['Cid'];
            $Gen = $_POST['CGen'];
            UpdateCustomerGender($conn,$Gen,$cid);
        }
        if (isset($_POST['updateCustMeal']))
        {
            $cid = $_POST['Cid'];
            $Meal = $_POST['CMeal'];
            UpdateCustomerMeal($conn,$Meal,$cid);

        }

    }
    

    // Close the database connection
    mysqli_close($conn);
    ?>
    </div>
</form>

</body>

<!--<button onclick="location.href='customer_update3.php'">UPDATE EMAIL</button>
    <button onclick="location.href='customer_update4.php'">UPDATE PHONE NO</button>
    -->