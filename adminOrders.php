<?php
session_start();

include 'connection.php';

if(isset($_SESSION['adminEmail'])){
    $adminEmail = $_SESSION['adminEmail'];
$sql = "SELECT * FROM admin where adminEmail = '$adminEmail'";
    $result = $conn->query($sql);
    //fetch result
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $name = $row['adminName'];

    }}
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminOrders.css?v=<?php echo time();?>">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h2>Admin Dashboard</h2>

            <div class="links">
                <ul>
                    <li><a href="adminDash.php" target="_self">Customer</a></li>
                    <li><a href="adminRestaurant.php" target="_self">Restaurant</a></li>
                    <li><a href="adminMenu.php" target="_self">Menu</a></li>
                    <li><a href="adminOrders.php" target="_self">Orders</a></li>
                  </ul>

            </div>  <!-- links end -->

            <div class="right">
                <img src="arrow.png" alt="" id="arrow">
                <p>Hello, <?php echo $name;?></p>
            </div>  <!-- right end -->
        </div>   <!-- header end -->

        <div class="linksBelow">
            <ul>
                <li><a href="#">Customer</a></li>
                <li><a href="adminRestaurant.php" target="_self">Restaurant</a></li>
                <li><a href="adminMenu" target="_self">Menu</a></li>
                <li><a href="adminOrders" target="_self">Orders</a></li>
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
        <th>Order Id</th>
        <th>Order Date</th>
        <th>Customer Id</th>
        <th>Food Id</th>
        <th>Quantity</th>
        <th></th>
        <th></th>
    </tr>

    <?php
    $sql = "SELECT ordertbl.orderId, ordertbl.orderDate, ordertbl.custId, orderdetail.foodId, orderdetail.quantity FROM ordertbl INNER JOIN orderdetail ON ordertbl.orderId=orderdetail.orderId";
    $result = $conn->query($sql);
    //fetch result
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orderId = $row['orderId'];
            $orderDate = $row['orderDate'];
            $custId = $row['custId'];
            $foodId = $row['foodId'];
            $quantity = $row['quantity'];

            echo '<tr>';
            echo '<td>' . $row['orderId'] . '</td>';
            echo '<td>' . $row['orderDate'] . '</td>';
            echo '<td>' . $row['custId'] . '</td>';
            echo '<td>' . $row['foodId'] . '</td>';
            echo '<td>' . $row['quantity'] . '</td>';

            echo '</tr>';
        }
    }

//close connection
   /* mysqli_close($conn);  */

    ?>
</table>

        </div>  <!-- content end -->

<div class="footer">
    <p><a href="adminLogin.php">Logout</a></p>
   
</div>


    </div>   <!-- wrapper end -->
    
</body>
</html>