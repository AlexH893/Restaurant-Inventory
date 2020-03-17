<!--  
  Creator : Alex Haefner
  Date : 4/8/2017
  Pull user information from a DB, compare it to what the user enters and if it's the same login will be successful
-->
<link rel="stylesheet" type="text/css" href="style.css">
<html>

<head>
  <title>Sign-In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<
  Style sheet...
  link rel="stylesheet" type="text/css" href="css/"> 
  -->
</head>
<div class="jumbotron text-center" id="homelogo" style="margin-bottom:0%;">
  <h1>Restaurant Inventory</h1>
</div>

<body>
  <div class="container">
    <form class="Signin" method="POST">
      <div class="panel panel-default">
        <div class="panel-heading" id="ContainerRSelect" style="margin:0;">
          <center><span style="font-size:30px;">User Login</span>
          </center>
          <center><span style="font-size:20px;">To access the inventory system, please login. </span>
          </center>
        </div>
        <div id="panel" class="panel-body" style="background-color:White;">
          <center>
            <label>Username</label>
            <p>
              <input style="width:220px;" type="text" id="username" name="username" class="form-control" />
            </p>
            <label>Password</label>
            <p>
              <input style="width:220px;" type="text" id="password" name="password" class="form-control" />
            </p>
            <p>
              <input style="width:150px;" type="submit" value="Sign In" class="btn btn-primary" />
            </p>
    </form>
    </center>
    </div>
    </div>
  </div>
  <!-- end ContainerRSelect -->

<?php
session_start();
include ("Connect.php");
// Field check
if (isset($_POST['username']) and isset($_POST['password'])) {
    //Assigning values to variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['username'] = $username;
    } else {
        echo "Invalid login credentials. If you forgot your username/password, please contact your system administrator."; // Error message if user enters wrong credentials
        
    }
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // Where the user will be redirected to upon logging in succesfully
    header('Location: home.php');
    // Echoing and greeting the username upon logging in
    echo "Hello, " . $username . "
    ";
    echo "The login was successful.
    ";
    echo "<a href='logout.php'>Logout</a>";
} else {
}

?>
   <footer class="clear txt-center">
      <center>&copy; Restaurant Inventory | 2020</center>
   </footer>
      <!-- END OF FOOTER -->
</body>

</html>