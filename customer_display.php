<!DOCTYPE html>
<html>
<head>
    <title>Customer display</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Customer Management</h1>

        <!-- Customer display Form -->
        <h2>Display Customer</h2>
        <form action = 'customer_display1.php' method="post">
            <button type="submit" name="displayCustTable" >Display Customer table</button>
        </form>

        <form action = 'customer_display2.php' method="post">
            <h2><b>Search customer</h2>
            <label for="cust_id">Customer ID:</label>
            <input type="text" name="Cust_id" id="cust_id" >
            <button type="submit" name="search_cust">Search and Display</button>
        </form>
       
        <form action = 'customer_UI.php' method="post">
            <button >Go back</button>
        </form>
    </div>
  
</body>
</html>

