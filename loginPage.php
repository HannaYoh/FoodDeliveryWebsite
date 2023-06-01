<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="loginPage.css?v=<?php echo time();?>">
   
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h2>Mesob Delivery</h2>
        </div>    <!-- header end -->

    <div class="main">
        <div class="back">
            <button class="btnBack"><a href="homePage.html"><img src="backLogin.jpg" alt=""></a></button>
        </div>    <!-- back end -->

        <div class="welcome">
            <h3>Welcome Back</h3>
        </div>   <!-- welcome end -->

        <form action="" method="POST">

        <div class="inputsEmail">
            <label for="email">Email</label><br/>
            <input type="email" id="email" name="email" required />
        </div>

        <div class="inputsPassword">
            <label for="password" id="lblPassword">Password</label><br/>
            <input type="password" id="password" name="password" required />
        </div>

        <div class="login">
                <button id="btnLogin" name="btnLogin">Login</button>
        </div>

        <div class="loginBackup">
                <button id="btnLoginBackup" name="btnLoginBackup">Login</button>
        </div>

        <p id="forgotPassword" name="forgotPassword">Forgot Password</p>
        <p id="lblBack" name="lblBack">Back</p>

        </form>

        <div class="newAccount">
            <a href="createAcc.php">New Account</a>
        </div>       <!--  new Account end -->

    </div>    <!-- main end -->

    </div>   <!--  wrapper end -->
    
</body>
</html>

<script src="loginPage.js?v=<?php echo time();?>"></script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = 'deliverydb';

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
    
if(isset($_POST['btnLogin'])){
$sql = "SELECT custEmail, password FROM customer where custEmail = '$userEmail' and password = '$userPassword'";
$result = $conn->query($sql);
//retreive result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email = $row['custEmail'];
        $password = $row['password'];

        $_SESSION['custEmail'] = $row['custEmail'];
        $_SESSION['custPassword'] = $row['password'];
    }
   }

   echo $email;
   echo $password;

   if($email == $userEmail && $password == $userPassword){
    echo '<script>alert("login successful")</script>';
    header('location:menuPage.php');
  }

  else{
   echo '<script>alert("Incorrect email or password")</script>';
  } 
} 

//backup password
$backupPass="";
if(isset($_POST['btnLoginBackup'])){
    $sql = "SELECT custEmail, backupPassword FROM customer where custEmail = '$userEmail' and backupPassword = '$userPassword'";
    $result = $conn->query($sql);
    //to count no of row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row['custEmail'];
            $backupPass= $row['backupPassword'];

            $_SESSION['custEmail'] = $row['custEmail'];
            $_SESSION['custBackup'] = $row['backupPassword'];
        }
       }
    
       if($email == $userEmail && $backupPass == $userPassword){
        echo '<script>alert("login successful")</script>';
        header('location:menuPage.php');
      }
    
      else{
        echo '<script>alert("Incorrect email or password")</script>';
      } 
    } 

//close connection
mysqli_close($conn); 

?>