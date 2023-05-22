<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="adminLogin.css?v=<?php echo time();?>">
</head>
<body>
    <div class="container">
        <h2>Welcome back</h2>

        <form action="" method="POST">
    <div class="inputFields">
        <div class="inputs">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="inputs">
            <label for="password" id="lblPassword">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <p id="forgotPass" name="forgotPass">Forgot Password</p>
        <p id="lblBack" name="lblBack">Back</p>

        <button id="login" name="login">Login</button>
        <button id="loginBackup" name="loginBackup">Login</button>
      
    </div>
    </form>
    </div>
    
</body>
</html>

<script src="adminLogin.js?v=<?php echo time();?>"></script> 

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

    $userEmail = "";
    if(isset($_POST['email'])){
    $userEmail = $_POST['email'];
    }

    $userPassword = "";
    if(isset($_POST['password'])){
   $userPassword = $_POST['password'];
    }

    $email="";
    $password="";
    
if(isset($_POST['login'])){
$sql = "SELECT custEmail, password FROM customer where custEmail = '$userEmail' and password = '$userPassword'";
$result = $conn->query($sql);
//to count no of row
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email = $row['custEmail'];
        $password = $row['password'];
    }
   }

   echo $email;
   echo $password;

   if($email == $userEmail && $password == $userPassword){
    echo '<script>alert("login successful")</script>';
    header('location:homePage.html');
  }

  else{
   echo "Incorrect email or password";
  } 
} 

//backup password
$backupPass="";
if(isset($_POST['loginBackup'])){
    $sql = "SELECT custEmail, backupPassword FROM customer where custEmail = '$userEmail' and backupPassword = '$userPassword'";
    $result = $conn->query($sql);
    //to count no of row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row['custEmail'];
            $backupPass= $row['backupPassword'];
        }
       }
    
       if($email == $userEmail && $backupPass == $userPassword){
        echo '<script>alert("login successful")</script>';
        header('location:homePage.html');
      }
    
      else{
       echo "Incorrect email or password";
      } 
    } 

//close connection
mysqli_close($conn); 

?>
 
 