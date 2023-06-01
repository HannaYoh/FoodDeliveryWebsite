
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="homePage.css?v=<?php echo time();?>">
</head>
<body>

    <div class="wrapper">
               <!-- header  -->    
        <div class="header">
            <div class="logo">Mesob Delivery</div>
            <div class="dash">
              <ul>
                <li><a href="loginPage.php" target="_self">Login</a></li>
                <li><a href="createAcc.php" target="_self">Create Account</a></li>
              </ul>
            </div>
          </div>
                 <!-- sections -->
          <div class="subDiv">

            <div class="search">
            <form action="" method="POST">            <!--  form added, button name attribute added -->
                <input placeholder="Search Restaurants..." type="text" name="search" id="search">
                <button class="button" name="button">Search</button>
                </form>
                <div class="img">
                   <img src="logo24per7.jpg" alt="" class="img" >
                  <pre>
                    
                    <!-- <p>Fast Delivery<br>          24/7</p></pre> -->
                  </div>
            </div>

                <div id="slider">
                <figure>
                    <img src="food1.jpg" alt="" width= 100%>
                    <img src="food3.jpeg" alt="" width= 100%>
                    <img src="food4.jpeg" alt="" width= 100%>
                    <img src="food5.jpeg" alt="" width= 100%>
                    <img src="food1.jpg" alt="" width= 100%>
                  </figure>
            </div>

          </div>

    </div>
    
</body>
</html>

<?php
include 'connection.php';

//insert
$userSearch = "";
    if(isset($_POST['search'])){
   $userSearch = $_POST['search'];
    }

    if(isset($_POST['button'])){
    $sql = "SELECT name FROM restaurant where name like '%$userSearch%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            
            echo '<script>alert("We have found your favorite go ahead and login")</script>';
        }
        
    }

    else{
        echo '<script>alert("Let us find you a new favorite restaurant create an account")</script>';

    }
}

?>

