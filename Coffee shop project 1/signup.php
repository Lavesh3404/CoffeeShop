<?php
require_once "config.php";

$username = $email = $mobile = $password = $confirm_password = "";
$username_err = $email_err = $mobile_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty .....
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                    
                    echo '<script>alert("This username is already taken")</script>';
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);

 // Check if email is empty
 if(empty(trim($_POST["email"]))){
    $email_err = "email cannot be blank";
}
else{
    $email = trim($_POST['email']);
}

 // Check if mobile is empty
 if(empty(trim($_POST["mobile"]))){
    $mobile_err = "mobile cannot be blank";
}
else{
    $mobile= trim($_POST['mobile']);
}

// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
    
}
elseif(strlen(trim($_POST['password'])) < 1){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($email_err) && empty($mobile_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, email, mobile, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_mobile, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_email = $email;
        $param_mobile = $mobile;
        $param_password = $password;


        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: index.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup page</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="main">    
        <div class="content">
            <form action="" method="post">
            <div class="form">
                <h2>Signup Here</h2>
                <input type="text" name="username" id="username" placeholder="Enter Username" autocomplete="off" required>
                <input type="email" name="email" id="email" placeholder="Enter Email id" autocomplete="off" required>
                <input type="text" name="mobile" id="numberField" placeholder="Enter Mobile Number"autocomplete="off" maxlength="10" required >
                <input type="password" name="password" id="password" placeholder="Enter Password" autocomplete="off" minlength="8"  required >
                < <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer; color: #ff7200;"></i>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password"autocomplete="off" required>
                <button id="sub"class="btnn" type="submit" name="submit">Signup</button></a>
               <p>Already hav an account? <a href="index.php">Login here</a></p>
            </div>
        </div>
    </div>
</form>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script>
    function restrictNumber(e) {
  var newValue = this.value.replace(new RegExp(/[^\d]/, 'ig'), "");
  this.value = newValue;
}

var userName = document.querySelector('#numberField');
userName.addEventListener('input', restrictNumber);

const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute ....
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
</body>
</html>
