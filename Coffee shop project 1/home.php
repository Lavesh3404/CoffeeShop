<?php
require_once "config.php";

$name = $email = $message = "";
session_start();
if (!isset($_SESSION['username'])) {
   header("location: index.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_name,$param_email, $param_message);

        // Set these parameters
        $param_name = $name;
        $param_email = $email;
        $param_message = $message;
        
          // Try to execute the query
          if (mysqli_stmt_execute($stmt))
          {
              header("location: home.php?sendmessage");
          }
          else{
              echo "Something went wrong... cannot redirect!";
          }
          mysqli_stmt_close($stmt);
         
}
mysqli_close($conn);
}
?>
<?php
if (isset($_REQUEST['succes'])) {
   ?>
<div id="success-popup" class="hidden">
  <p>Success! Your Order Is Conformed</p>
  <p > 🙏 Thanks!</p>
</div>
<style type="text/css">
    #success-popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: green;
  color: white;
  padding: 20px;
  border-radius: 10px;
  z-index: 9999;
  transition: opacity 0.5s ease-in-out;
}

.hidden {
  opacity: 0;
  pointer-events: none;
}
</style>
<script>
function showSuccessPopup() {
  const successPopup = document.getElementById("success-popup");
  successPopup.classList.remove("hidden");
  setTimeout(function() {
    successPopup.classList.add("hidden");
  }, 3000);
}

// Call the function when the time is completed
showSuccessPopup();
</script>
   <?php
}

?>


<!-- book table popup -->
<?php
if (isset($_REQUEST['donetable'])) {
   ?>
<div id="success-popup" class="hidden">
  <p>Success! Your Table Is Booked</p>
  <p > 🙏 Thanks!</p>
</div>
<style type="text/css">
    #success-popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: green;
  color: white;
  padding: 20px;
  border-radius: 10px;
  z-index: 9999;
  transition: opacity 0.5s ease-in-out;
}

.hidden {
  opacity: 0;
  pointer-events: none;
}
</style>
<script>
function showSuccessPopup() {
  const successPopup = document.getElementById("success-popup");
  successPopup.classList.remove("hidden");
  setTimeout(function() {
    successPopup.classList.add("hidden");
  }, 3000);
}

// Call the function when the time is completed
showSuccessPopup();
</script>
   <?php
}

?>
<!-- book table end -->

<?php
if (isset($_REQUEST['tablebook'])) {
   ?>
<div id="success-popup" class="hidden">
  <p>Success! Your Table Is Booked</p>
  <p > 🙏 Thanks!</p>
</div>
<style type="text/css">
    #success-popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: green;
  color: white;
  padding: 20px;
  border-radius: 10px;
  z-index: 9999;
  transition: opacity 0.5s ease-in-out;
}

.hidden {
  opacity: 0;
  pointer-events: none;
}
</style>
<script>
function showSuccessPopup() {
  const successPopup = document.getElementById("success-popup");
  successPopup.classList.remove("hidden");
  setTimeout(function() {
    successPopup.classList.add("hidden");
  }, 3000);
}

// Call the function when the time is completed
showSuccessPopup();
</script>
   <?php
}

?>

<?php
if (isset($_REQUEST['sendmessage'])) {
   ?>
<div id="success-popup" class="hidden">
  <p>Success! Your Message Is Received</p>
  <p > 🙏 Thanks!</p>
</div>
<style type="text/css">
    #success-popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: green;
  color: white;
  padding: 20px;
  border-radius: 10px;
  z-index: 9999;
  transition: opacity 0.5s ease-in-out;
}

.hidden {
  opacity: 0;
  pointer-events: none;
}
</style>
<script>
function showSuccessPopup() {
  const successPopup = document.getElementById("success-popup");
  successPopup.classList.remove("hidden");
  setTimeout(function() {
    successPopup.classList.add("hidden");
  }, 3000);
}

// Call the function when the time is completed
showSuccessPopup();
</script>
   <?php
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body id="welcome">
    <nav>
        <img class="logo" src="navcoffee.png" alt="coffee shop image">
        <ul>
        <li><a href="#welcome">Welcome</a></li>
        <li><a href="#offer">We Offer</a></li>  
        <li><a href="#shop">Our Shop</a></li>
        <li><a href="#special">Special</a></li>
        <li><a href="#team">Chef Team</a></li>
        <li><a href="dashboard.php">Admin Dashboard</a></li>
        <li><a href="logout.php">Logout <?php echo $_SESSION['username'];?> </a></li>
    </ul>
    </nav>
    <header>
        <div class="hero">
            <i class="fa-regular fa-heart"></i>
            <h1>Coffee - Makes you Love</h1>
            <p>A Lot Can Happen Over Coffee, Its Awesome!!!</p>
           <a href="menu.php"><button class="btn">Our Menu</button></a>
           <div class="arrow">
       <a href="#welcome"><i class="fa-solid fa-arrow-up"></i></a> 
</div>
        </div>
    </header>
    <div class="pattern" id="offer"></div>
    <div class="offer">
        <h2 data-aos="fade-up">WHAT WE OFFER</h2>
        <hr data-aos="fade-up">
        <!-- <p class="text" data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p> -->
        <div class="grid" data-aos="fade-up">
        <div class="coffee">
            <img src="offercoffee.jpg" alt="coffee image">
            <h3>COFFEE</h3>
            <p class="para">Coffee is a hot drink made with water and ground or powdered coffee beans. Different coffee gives you different taste.</p>
        </div>
        <div class="tea">
            <img src="menudryfruitsmilkshake.png" alt="shake image">
            <h3>MILKSHAKE</h3>
            <p class="para">A frothy drink made of cold milk, flavoring, and usually ice cream, shaken together or blended in a mixer.</p>
        </div>
        <div class="cake">
            <img src="menustrawberrypastry.png" alt="cake image">
            <h3>CAKE</h3>
            <p class="para">A cake is a sweet food made by baking a mixture of flour, eggs, sugar, and fat in an oven. Layers of cream on it makes it taste better.</p>
        </div>
    </div>
    <div class="reserv" data-aos="fade-up">
        <p>"The only thing better than a good meal is sharing that meal with friends and family. Reserve your table today!"</p>
            <a href="reservation.php"><button class="btn2">RESERVATION</button></a>
    </div>
    <div class="pattern2" id="shop" data-aos="fade-up"></div>
</div>
    <div class="shop">
        <h2 data-aos="fade-up">Our Shop</h2>
        <hr data-aos="fade-up">
        <div class="grid2" data-aos="fade-up">
            <div class="left">
            <img src="ourshopcoffee.jpg" alt="coffee cup image">
        </div>
        <div class="right">
            <!-- <h3>Who we are</h3>
            <p>Lorem ipsum dolor sit amet, quo meis audire placerat eu, te eos porro veniam. An everti maiorum detracto mea. Eu eos dicam voluptaria, erant bonorum albucius et per, ei sapientem accommodare est. Saepe dolorum constituam ei vel. Te sit malorum ceteros repudiandae, ne tritani adipisci vis.</p> -->
        <h3>Why choose us?</h3>
        <p id="special">we're passionate about serving high-quality coffee and providing a welcoming environment for our customers. We believe that coffee is more than just a drink – it's a daily ritual that brings people together and fuels their day. Our skilled baristas take great pride in their craft, carefully preparing each cup of coffee to perfection. We source our coffee beans from the best farms and roasters around the world, ensuring that every cup is filled with rich and complex flavors. From our cozy seating areas to our friendly staff, we strive to make every visit to our coffee shop a special experience. Whether you're grabbing a quick cup to go or staying awhile to catch up with friends, we're proud to be a part of your day.</p>
        </div>
        </div>
    </div>
    <div class="special">
        <h2 data-aos="fade-up">Our Special</h2>
        <hr data-aos="fade-up">
        <!-- <p class="text" data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p> -->
    <div class="container1" data-aos="fade-up">
        <img src="menuchocolatepastry.png" alt="choco cake">
        <img src="menustrawberrypastry.png" alt="rose cake">
        <img src="menusandwich.png" alt="sandwich">
    </div>
    <div class="container2" data-aos="fade-up">
        <img src="menuomelette.png" alt="omelette">
        <img src="menuchocolatemilkshake.png" alt="milkshake">
        <img src="menucaffeeamericano.png" alt="coffee">
    </div>
</div>
<div class="team"id="team">
    <h2 data-aos="fade-up">Meet Our Chef</h2>
    <hr data-aos="fade-up">
    <p class="text" data-aos="fade-up">"A chef is a professional who is trained to use the right ingredients, in the right amounts, at the right time, in order to create a masterpiece."</p>
    <div class="grid3" data-aos="fade-up">
    <div class="chef">
        <img src="chef1.jpg" alt="image">
        <h3>Rennyl</h3>
        <p class="para">Consectetuer eu nam. Saepe legendos vulputate eu quo, id mea comprehensam signifer.</p>
        <div class="icon">
        <a target="_blank" href="instagram.com"> <i class="fa-brands fa-instagram"></i></a>
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-linkedin-in"></i>
        </div>
    </div>
    <div class="chef">
        <img src="chef2.jpg" alt="image">
        <h3>Kristean</h3>
        <p class="para">Consectetuer eu nam. Saepe legendos vulputate eu quo, id mea comprehensam signifer.</p>
        <div class="icon">
        <a target="_blank" href="instagram.com"> <i class="fa-brands fa-instagram"></i></a>
         <i class="fa-brands fa-facebook-f"></i>
         <i class="fa-brands fa-linkedin-in"></i>
         </div>
    </div>
    <div class="chef">
        <img src="chef3.jpg" alt="image">
        <h3>Angilica</h3>
        <p class="para">Consectetuer eu nam. Saepe legendos vulputate eu quo, id mea comprehensam signifer.</p>
        <div class="icon">
        <a target="_blank" href="instagram.com"> <i class="fa-brands fa-instagram"></i></a>
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-linkedin-in"></i>
        </div>
    </div>
    <div class="chef">
        <img src="chef4.jpg" alt="image">
        <h3>Shannon</h3>
        <p class="para">Consectetuer eu nam. Saepe legendos vulputate eu quo, id mea comprehensam signifer.</p>
        <div class="icon">
        <a target="_blank" href="instagram.com"> <i class="fa-brands fa-instagram"></i></a>
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-linkedin-in"></i>
        </div>
    </div>
</div>
</div>
<div class="touch" id="touch">
    <h2 data-aos="fade-up">Get In Touch</h2>
    <hr data-aos="fade-up">
    <div class="grid4" data-aos="fade-up">
        <div class="left2">
            <strong>Please give us your feedback!</strong>
            <p>"We're here to help. Contact us anytime, anywhere, and we'll do our best to get back to you as soon as possible." </p>
            <!-- <form  action="https://formspree.io/f/xwkygndp" method="POST"> -->
                <form action="" method="post">
            <input class="form" id="name" name="name" placeholder="Name" type="text" autocomplete="off" required><br>
            <input class="form" id="email" name="email" placeholder="Email" type="email" autocomplete="off" required><br>
            <textarea class="form" id="message" name="message" placeholder="Message" rows="5" autocomplete="off" required minlength="5"></textarea><br>           
             <button class="btn3" type="submit" name="submit" id="submit">Send Message</button>
            </form>
        </div>
        <div class="right2">
            <div class="side">
            <i class="fa-solid fa-location-dot"></i>
            <strong>Coffee Shop</strong>
             <p>Near Shankar Talkies<br>
                Buhanpur, PIN 450331</p>
            </div>
                <i class="fa-solid fa-envelope" id="envelope"></i>
                <p class="address">landgeaniruddha@gmail.com</p>
                <div class="side2">
                <i class="fa-solid fa-phone" id="phone"></i>
                <p class="address">9691740091</p>
            </div>
        </div>
    </div>
</div>
<div class="copyright">
<span>Copyright © 2022. Design by Aniruddha</span>
<a target="_blank" href="instagram.com"> <i class="fa-brands fa-instagram"></i></a>
<i class="fa-brands fa-facebook-f"></i>
<i class="fa-brands fa-linkedin-in"></i>
</div>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
    offset:170,
    duration:1500,
  });
</script>
</body>
</html>