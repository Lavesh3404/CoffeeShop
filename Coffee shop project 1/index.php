<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: home.php");
    exit;
}
require_once "config.php";

// $username = $password = "";
// $err = "";
?>
<?php 
if (isset($_REQUEST['submit'])) {
    // print_r($_REQUEST);
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$query = "SELECT * FROM users WHERE BINARY username='$username' AND BINARY password='$password'";
// $query = "SELECT * FROM users WHERE password='$password'";
// echo $query;
$check = mysqli_query($conn, "$query");
$data = mysqli_fetch_row($check);
if ($data) {
    session_start();
    $_SESSION['username']=$username;
    if (isset($_SESSION['username'])) {
        header('location:home.php');
    }
}

}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="main">    
        <div class="content">
            <form action="" method="post">
            <div class="form">
                <h2>Login Here</h2>
                <input type="text" name="username" id="username" placeholder="Enter Username Here" autocomplete="off" required>
                <input type="password" name="password" id="password" placeholder="Enter Password Here"autocomplete="off" required>
                < <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer; color: #ff7200;"></i>
                <button id="sub"class="btnn" type="submit" name="submit">Login</button></a>
                <p class="link">Don't have an account <br>
                <a href="signup.php">Sign up here</a></p>
            </div>
        </div>
    </div>
</form>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script>
    const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
</body>
</html>