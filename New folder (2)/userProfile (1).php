<?php
session_start();

include 'connection.php';

if(isset($_SESSION['custEmail'])){
    $custEmail = $_SESSION['custEmail'];
$sql = "SELECT * FROM customer where custEmail = '$custEmail'";
    $result = $conn->query($sql);
    //fetch result
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $name = $row['custName'];
          $id = $row['custId'];

 }}
    
}

echo '<h2>'.$name.'</h2>';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="userstyle.css?v=<?php echo time();?>">
    </head>
    <body>
        <div class="top">
        <div class="leftsec">
         
        </div>
        <div class="rightsec">
           <!--  <button class="about">about us</button>
            <button class="menu">menu</button>
            <button class="restaur">restaurant</button>
            <button class="orderli">order list</button>
            <div class="clsim"><img class="im2" src="channel-1.jpeg" alt=""></div> -->
            <div class="links">
                 <ul>
                    <li><a href="menuPage.php" target="_self">Menu</a></li>
                    <li><a href="userProfile.php" target="_self">Profile</a></li>
                    <li><a href="checkout.php" target="_self">Checkout</a></li>
                    <li><a href="aboutUs.php" target="_self">About us</a></li>
                    <li><a href="LoginPage.php" target="_self">Logout</a></li>
                  </ul>
            </div>     <!-- links end -->

         </div>
        </div>
        <div class="main">
            <div class="persinfo">
                
                <div class="image">
                    <img class="im1" src="channel-1.jpeg" alt="">

                    <?php
                    /* <div><p>Abebe kebede</p></div>
                    <div><p>0987232471</p></div> */
                    $sql = "SELECT custName, custPhone FROM customer where custEmail = '$custEmail'";
                   $result = $conn->query($sql);

                   if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                      $name = $row['custName'];
                      $phone = $row['custPhone'];
        
                    echo '<div><p>' .$row["custName"]. '</p></div>';
                    echo '<div><p>' .$row["custPhone"]. '</p></div>';
               }
        
                }?>
                
                </div>
                <div class="imagedesc">
                    <p>Abebe kebede is our customer Abebe kebede is our customer Abebe kebede is our customer 
                        Abebe kebede is our customer Abebe kebede is our customer Abebe kebede is our customer
                        Abebe kebede is our customer Abebe kebede is our customer Abebe kebede is our customer 
                        Abebe kebede is our customer Abebe kebede is our customer Abebe kebede is our customer
                        Abebe kebede is our customer Abebe kebede is our customer Abebe kebede is our customer
                        </p>
                    <p class="psec">Abebe kebede is our customer</p>
                  <h2>Edit</h2>
                  <form action="">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"><br><br>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"><br><br>

                    <label for="password">Password</label>
                    <input type="text" name="password" id="password"><br><br>

                    <label for="backupPassword">Backup Password</label>
                    <input type="text" name="backupPassword" id="backupPassword"> <br><br>

                    <input type="submit" value="submit" name="submit" id="submit">
                  </form>
                   <div class="btnclass"><button class="button">Logout</button></div>
                  
                </div>
                 </div>
            <div class=history>
                <div class="order">
                    <table border="2"width="100%" height="300" cellspacing="5" cellpadding="50" >
                        <caption>order history</caption>
                        <tr>
                            <th>Order Id</th>
                            <th>Order Date</th>
                        </tr>

                        <?php
  /* <tr>
    <td width="20" height="10">First row, first cell</td>
    
    
  </tr>
  <tr>
     <td width="20" height="10">second row,first cell</td>
  </tr>
  <tr>
    <td width="20" height="10">third row,first cell</td>
  </tr> */

  
  $sql = "SELECT orderId, orderDate FROM ordertbl where custId = '$id'";
  $result = $conn->query($sql);
   //retreive results
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        echo '<tr>';
       echo  '<td width="20" height="10">' .$row['orderId']. '</td>';
       echo  '<td width="20" height="10">' .$row['orderDate']. '</td>';
        echo '</tr>';

      }}

  ?>
                    </table>
                </div>

                <div class="orderhistory">
                    <table border="2"width="100%"height="200"cellspacing="5" cellpadding="50">
                        <caption>order details</caption>
                        <tr>
                            <th>Food</th>
                            <th>Quantity</th>
                        </tr>

                        <?php
  $query = "SELECT foodId, quantity FROM orderdetail where orderId = 1";
  $result2 = $conn->query($query);
  //retreive results
  if ($result2->num_rows > 0) {
      while ($row = $result2->fetch_assoc()) {

        echo '<tr>';
       echo  '<td width="20" height="10">' .$row['foodId']. '</td>';
       echo  '<td width="20" height="10">' .$row['quantity']. '</td>';
        echo '</tr>';

      }}

  ?>

                    </table>
                </div>
            </div>
        </div>
        
    </body>
</html>

<?php
$newName = "";
if(isset($_POST['name'])){
  $newName = $_POST['name'];
}

$newEmail = "";
if(isset($_POST['email'])){
  $newEmail = $_POST['email'];
}

$newPassword = "";
if(isset($_POST['password'])){
  $newPassword = $_POST['password'];
}

$newBackup = "";
if(isset($_POST['backupPassword'])){
  $newBackup = $_POST['backupPassword'];
}

//update
if(isset($_POST['submit'])){
$sql = "update customer set custName='$newName', custEmail='$newEmail', password='$newPassword', backupPassword='$newBackup' where custId='$id'";
$result = $conn->query($sql);

if ($result) {
    echo '<script>alert("updated")</script>';
}
}

?>