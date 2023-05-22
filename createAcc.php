<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>    <!-- icon rel -->
    <link rel="stylesheet" href="createAcc.css?v=<?php echo time();?>">
</head>
<body>
    <div class="wrapper">
 <!-- header -->
        <div class="header">
            <h2>Mesob Delivery</h2>
            <a href="homePage.html" target="_self">
            <img src="arrow.png" alt="" id="arrow">
            </a>
        </div>    <!-- header end -->

 <!-- left and right section div -->
    <div class="sections">
<!--  left -->
        <div class="left">
          <img src="background.jpg" alt="">
       </div>  <!-- left end -->

<!-- right -->
       <div class="right">
          <h2>New Account</h2>
<!-- form -->
        <form method="post" action="" id="forms">
<!-- input fields -->
            <div class="inputFields">
 <!-- row one -->
          <div class="inputs">
            <label for="fullName">Full Name</label>
            <input type="text" id="fullName" name="fullName" required />
          </div>
  
          <div class="inputs">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required />
          </div>

<!-- row two -->

          <div class="inputs">
            <label for="phoneNumb">Phone Number</label>
            <input
              type="tel"
              id="phoneNumb"
              name="phoneNumb"
              pattern="+251"
              required
            />
          </div>
  
          <div class="inputs">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required />
          </div>

<!-- row three -->

          <div class="inputs">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />
          </div>
  
            <div class="inputs">
            <label for="confirmPassword">Confirm Password</label>
            <input
              type="password"
              id="confirmPassword"
              name="confirmPassword"
              required
            />
          </div>

<!-- row four -->
  
            <div class="inputs">
            <label for="backupPassword">Backup Password</label>
            <input
            type="password"
            id="backupPassword"
            name="backupPassword"
            required
          />
        </div>
  
          <div class="inputs">
            <label for="confirmBackup">Confirm Backup Password</label>     
            <input
              type="password"
              id="confirmBackup"
              name="confirmBackup" 
              required
            />
          </div>
            </div>   <!-- input fields end -->

<!-- button -->
            <div class="button">
                <input type="submit" value="Create Account" name="submit" id="submit">
            </div>

        </form>      <!-- form end -->
       </div>     <!--  right end -->
    </div> <!-- sections end -->
    </div>   <!-- wrapper end -->

</body>
</html>

<script src="createAcc.js?v=<?php echo time();?>"></script>

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
 /* echo "Connected successfully";  */

 $fname = "";
  if(isset($_POST['fullName'])){
    $fname = $_POST['fullName'];
  }

  $email = "";
  if(isset($_POST['email'])){
    $email = $_POST['email'];
  }

  $phoneNumb = "";
  if(isset($_POST['phoneNumb'])){
    $phoneNumb = $_POST['phoneNumb'];
  }

  $address = "";
  if(isset($_POST['address'])){
    $address = $_POST['address'];
  }

  $password = "";
  if(isset($_POST['password'])){
    $password = $_POST['password'];
  }

  $backupPassword  = "";
  if(isset($_POST['backupPassword'])){
    $backupPassword = $_POST['backupPassword'];
  }

/*   $fname = $_POST['fullName'];
    $email = $_POST['email'];
    $phoneNumb = $_POST['phoneNumb'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $backupPassword = $_POST['backupPassword'];
 */
//insert
if(isset($_POST['submit'])){
  $sql = "INSERT INTO customer ( custName, custEmail, custPhone, address, password, backupPassword) VALUES ( '$fname','$email', '$phoneNumb', '$address', '$password', '$backupPassword')";
 $rs = mysqli_query($conn, $sql);
 if($rs){
     echo "Entries added!";
 } 
}

//close connection
mysqli_close($conn);   
?>