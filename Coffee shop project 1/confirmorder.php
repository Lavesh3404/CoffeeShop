<?php
require_once "config.php";
session_start();


if (isset($_REQUEST['submit'])){
    $fullname = trim($_POST['fullname']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $orders = trim($_POST['orders']);
    $price = trim($_POST['price']);
    $payment = trim($_POST['payment']);
    $Timew = date("jS \of F Y");

    $sql = "INSERT INTO menu (fullname, phone, email, address, city, state, orders, price, payment, Timew) VALUES ('$fullname', '$phone', '$email', '$address', '$city', '$state', '$orders', '$price', '$payment', '$Timew')";


    $stmt = mysqli_query($conn, $sql);
    
          if ($stmt)
          {
            ?>

            <?php

              // header("location: home.php");
          }

          else{
              echo "Something went wrong... cannot redirect!";
          }
                     // Get the current timestamp
$startTime = time();

// Wait for three seconds
sleep(3);

// Get the current timestamp again
$endTime = time();

// Check if three seconds have elapsed
if ($endTime - $startTime >= 3) {
    // Execute your code here
    header("location: home.php?succes");
} else {
    // Not enough time has elapsed yet
    
}
         
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm oreder</title>
<style>
    /* all */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

:root {
  --main-blue: #71b7e6;
  --main-purple: #9b59b6;
  --main-grey: #ccc;
  --sub-grey: #d9d9d9;
}

body {
  display: flex;
  height: 100vh;
  justify-content: center; /*center vertically */
  align-items: center; /* center horizontally */
  background: url(https://dailycoffeenews.com/wp-content/uploads/2018/10/coffee-801781_1280.jpg);
  background-size: cover;
  padding: 10px;
}
/* container and form */
.container {
  max-width: 700px;
  width: 100%;
  background: #fff;
  padding: 25px 30px;
  border-radius: 5px;
}
.container .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}

.container .title::before {
  content: "";
  position: absolute;
  height: 3.5px;
  width: 30px;
  background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
  left: 0;
  bottom: 0;
}

.container form .user__details {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
/* inside the form user details */
form .user__details .input__box {
  width: calc(100% / 2 - 20px);
  margin-bottom: 15px;
}

.user__details .input__box .details {
  font-weight: 500;
  margin-bottom: 5px;
  display: block;
}
.user__details .input__box input {
  height: 45px;
  width: 100%;
  outline: none;
  border-radius: 5px;
  border: 1px solid var(--main-grey);
  padding-left: 15px;
  font-size: 16px;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}

.user__details .input__box input:focus,
.user__details .input__box input:valid {
  border-color: var(--main-purple);
}

/* submit button */
form .button {
  height: 45px;
  width: 100%;
  margin: 45px 0;
}

form .button input {
  height: 100%;
  width: 100%;
  outline: none;
  color: #fff;
  border: none;
  font-size: 18px;
  font-weight: 500;
  border-radius: 5px;
  background: #ff7200;
  transition: all 0.3s ease;
}

form .button input:hover {
    background: #f38021;
    color: #fff;
    cursor: pointer;
}

@media only screen and (max-width: 584px) {
  .container {
    max-width: 100%;
  }

  form .user__details .input__box {
    margin-bottom: 15px;
    width: 100%;
  }

  .container form .user__details {
    max-height: 300px;
    overflow-y: scroll;
  }

  .user__details::-webkit-scrollbar {
    width: 0;
  }
}

</style>
</head>
<body>

  <?php
  $uname= $_SESSION['username'];
$query = "SELECT * FROM `users` WHERE username='$uname'";
$ex = mysqli_query($conn,$query);
$udata = mysqli_fetch_array($ex);
  ?>
    <div class="container">
        <div class="title">Confirm your order</div>
        <form action="" method="post">
          <div class="user__details">
            <div class="input__box">
              <span class="details">Full Name</span>
              <input type="text" name="fullname" value="<?php echo $udata['username']?>" placeholder="enter your name" required>
            </div>
            <div class="input__box">
              <span class="details">Your Number</span>
              <input type="tel" value="<?php echo $udata['mobile']?>" name="phone" placeholder="enter your number" required>
            </div>
            <div class="input__box">
              <span class="details">Your Email</span>
              <input type="email" value="<?php echo $udata['email']?>" name="email" placeholder="enter your email" required>
            </div>
            <div class="input__box">
                <span class="details">Your Address</span>
                <input type="text" value="" name="address" placeholder="enter your address" required>
              </div>
            <div class="input__box">
                <span class="details">City</span>
                <input type="text" value="" name="city" placeholder="enter your city" required>
              </div>
              <div class="input__box">
                <span class="details">Your State</span>
                <input type="text" value="" name="state" placeholder="enter your state" required>
              </div>
           <div class="input__box">
    <?php


$totalprice = $_REQUEST['total-price'];

$titles = $_REQUEST['title'];
$prices = $_REQUEST['price'];
$count = $_REQUEST['count'];


?>

<span class="details">Your Order</span>
<?php
?>
<input hidden class="big" type="text"  value="<?php for($i = 0; $i < count($titles); $i++) { ?><?php echo $titles[$i] . " : " . $prices[$i] . " => " . $count[$i]. " Quantity "; ?><?php
}
?>" readonly name="orders"  required>
<p>
<?php for($i = 0; $i < count($titles); $i++) { ?><?php echo $titles[$i] . " : " . $prices[$i] . " => " . $count[$i]. " Quantity "; ?><?php
}
?>
</p>
  

</div>
<div class="input__box">
    <span class="details">Total Price</span>
    <input type="text" value="<?php echo $totalprice ?>" readonly name="price" required>
</div>
<div class="input__box">
    <span class="details">Payment Method</span>
    <select name="payment" id="pay">
        <option value="cash on delivery">Cash on delivery</option>
    </select>
</div>

<div class="button">
    <input type="submit" name="submit" value="Confirm Order">
</div>
</form>
<script type="text/javascript">
    // Extract the title and price parameters from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const title1 = urlParams.get('title'); // Get the value of the 'title' parameter
    const price1 = urlParams.get('price'); // Get the value of the 'price' parameter
    const title2 = urlParams.getAll('title')[1]; // Get the value of the second 'title' parameter
    const price2 = urlParams.getAll('price')[1];

    // Create a div element
    const div = document.createElement('div');

    // Set the innerHTML of the div to display the title and price values
    // div.innerHTML = `Title: ${title1}, Price: ${price1}<br>Title: ${title2}, Price: ${price2}`;

    // Append the div to the DOM (e.g., to the body element)
    document.body.appendChild(div);
</script>
</body>
</html>