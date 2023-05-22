<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminDash.css?v=<?php echo time();?>">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h2>Admin Dashboard</h2>

            <div class="links">
                <ul>
                    <li><a href="#">Customer</a></li>
                    <li><a href="#">Restaurant</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Orders</a></li>
                  </ul>

            </div>  <!-- links end -->

            <div class="right">
                <img src="arrow.png" alt="" id="arrow">
                <p>Hello, user</p>
            </div>  <!-- right end -->
        </div>   <!-- header end -->

        <div class="linksBelow">
            <ul>
                <li><a href="#section1">Customer</a></li>
                <li><a href="#section2">Restaurant</a></li>
                <li><a href="#section3">Menu</a></li>
                <li><a href="#section4">Orders</a></li>
              </ul>
        </div>  <!-- linksBelow end -->

        <div class="content">
          <!--   <section class="customerSec" id="section1">
                <h1>section1</h1>
            </section>

            <section class="restaurantSec" id="section2">
                <h1>section2</h1>
            </section>

            <section class="menuSec" id="section3">
                <h1>section3</h1>
            </section>

            <section class="ordersSec" id="section4">
                <h1>section4</h1>
            </section> -->

            <table class="tblContent">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th></th>
        <th></th>
    </tr>

    <?php

$servername = "localhost";
$username = "root";
$password = "";
$db = 'deliveryDb';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db); 

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 

   
    $sql = 'SELECT custId, custName, custEmail, custPhone, address FROM customer';
    $result = $conn->query($sql);
    //to count no of row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['custId'];
            $name = $row['custName'];
            $email = $row['custEmail'];
            $phone = $row['custPhone'];
            $address = $row['address'];

            echo '<tr>';
            echo '<td>' . $row['custId'] . '</td>';
            echo '<td>' . $row['custName'] . '</td>';
            echo '<td>' . $row['custEmail'] . '</td>';
            echo '<td>' . $row['custPhone'] . '</td>';
            echo '<td>' . $row['address'] . '</td>';

            echo "<td><a href='updateRecord.php?custId=$id&custName=$name&custEmail=$email&custPhone=$phone&address=$address' style='color:green'>Edit</a></td>";

            echo "<td><a href='deleteRecord.php?custId=$id' style='color:red'>Delete</a></td>";

            echo '</tr>';
        }
    }

//close connection
   mysqli_close($conn); 

    ?>
</table>

        </div>  <!-- content end -->




    </div>   <!-- wrapper end -->
    
</body>
</html>