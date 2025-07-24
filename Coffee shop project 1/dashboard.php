        <?php include 'config.php'?>
<?php session_start()?>
<?php
if ($_SESSION['username'] == 'trilok') {
    
}else{
    header('location:home.php');
}

?>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary mb-3">
    <div class="flex-row d-flex">
        <button type="button" class="navbar-toggler mr-2 " data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" title="Free Bootstrap 4 Admin Template">Admin Area</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="booktable.php">Booking Table<span class="sr-only">Booking Table</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="contactus.php">Contact Us<span class="sr-only">Contact Us</span></a>
            </li>
        </ul>
        <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#myAlert" data-toggle="collapse">Alert</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">About</a>
            </li>
        </ul> -->
    </div>
</nav>
<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
        <!-- <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-light pl-0" id="sidebar" role="navigation">
            <ul class="nav flex-column sticky-top pl-0 pt-5 mt-3">
                <li class="nav-item"><a class="nav-link" href="#">Overview</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Reports▾</a>
                    <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                       <li class="nav-item"><a class="nav-link" href="">Report 1</a></li>
                       <li class="nav-item"><a class="nav-link" href="">Report 2</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Analytics</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Export</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Snippets</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Flexbox</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Layouts</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Templates</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Themes</a></li>
            </ul>
        </div> -->
        <!--/col-->

        <div class="col main pt-5 mt-3">
            <h1 class="display-4 d-none d-sm-block">
            Hello<?php echo " ". $_SESSION['username'];?>
            </h1>
            <!-- <p class="lead d-none d-sm-block">Please Check Pandding Orders</p> -->

            <!-- <div class="alert alert-warning fade collapse" role="alert" id="myAlert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Holy guacamole!</strong> It's free.. this is an example theme.
            </div> -->
            <div class="row mb-3">
                <?php
                $cdate = date("jS \of F Y");
$query = "SELECT COUNT(*) FROM `menu` WHERE Timew LIKE '%$cdate%'";

$ex = mysqli_query($conn,$query);
$countinfo = mysqli_fetch_row($ex);
                ?>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-success">
                            <div class="rotate">
                                <i class="fa fa-user fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Today ORDER</h6>
                            <h1 class="display-4"><?php echo $countinfo[0]  ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <i class="fa fa-list fa-4x"></i>
                            </div>
                            <?php

$query = "SELECT SUM(CAST(REPLACE(price, 'Rs.', '') AS INT)) AS total_price
FROM menu;";
$result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total_price2 = $row['total_price'];
    
                            ?>
                            <h6 class="text-uppercase">Total Income</h6>
                            <h1 class="display-4"><?php echo $total_price2 ."₹"; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fa fa-twitter fa-4x"></i>
                            </div>
                            <?php
$query = "SELECT COUNT(*) FROM `users`";
$ex = mysqli_query($conn,$query);
    $tusers = mysqli_fetch_array($ex);
   

                            ?>
                            <h6 class="text-uppercase">ALL Users</h6>
                           <h1 class="display-4"><?php echo $tusers[0]; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body">
                            <div class="rotate">
                                <i class="fa fa-share fa-4x"></i>
                            </div>
                                                        <?php

$query3 = "SELECT SUM(CAST(REPLACE(price, 'Rs.', '') AS INT)) AS total_price
FROM menu WHERE Timew LIKE '%$cdate%';";
$result2 = mysqli_query($conn, $query3);
$countincome = mysqli_fetch_row($result2);
    // $countinfo = mysqli_fetch_row($ex);
    
                            ?>
                            <h6 class="text-uppercase">Today Income</h6>
                            <h1 class="display-4"><?php echo $countincome[0]  ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

            <hr>
            <div class="">
                <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Orders</h4>
                  <p class="card-description">
                   ✔️ ALL DATA IS UPTO DATE
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Phone Number.</th>
                          <th>Address</th>
                          <th>Price</th>
                          <th>Order Date</th>
                          <th>Order Status</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php

$query = "SELECT * FROM `menu`";
$ex = mysqli_query($conn,$query);

while ($data = mysqli_fetch_array($ex)) {
   
   ?>


                        <tr>
                          <td><?php echo $data['fullname'];?></td>
                          <td><?php echo $data['phone'];?></td>
                          <td><?php echo $data['address'];?></td>
                          <td><?php echo $data['price'];?>₹</td>
                          <td><?php echo $data['Timew'];?></td>
                          <td><?php echo $data['orders'];?></td>
<?php
for ($i = 1; $i <= 1; $i++) { 
   ?>
                          <!-- <td><p><span id="countdown<?php echo $i;?>"></span></p></td> -->

<script type="text/javascript">
    // Get the expiration time from localStorage, or set it to 48 hours from now if it doesn't exist
var expiration = localStorage.getItem('expiration');
if (!expiration) {
    expiration = new Date().getTime() + (48 * 60 * 60 * 1000);
    localStorage.setItem('expiration', expiration);
} else {
    expiration = parseInt(expiration);
}

// Update the countdown every second
var countdown = setInterval(function() {
    // Get the current time
    var now = new Date().getTime();

    // Calculate the remaining time
    var distance = expiration - now;

    // If the countdown is over, show a message
    if (distance <= 0) {
        clearInterval(countdown);
        document.getElementById("countdown").innerHTML = "The timer has expired.";
        localStorage.removeItem('expiration');
    } else {
        // Otherwise, calculate the days, hours, minutes, and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);



        // Display the remaining time
        document.getElementById("countdown<?php echo $i ?>").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
        <?php
}
 ?>
    }
}, 1000);
</script>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                          <?php
}

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            </div>
              </div>
            </div>
            </div>

            <a id="features"></a>
            <hr>
           
<style type="text/css">
    body, html {
  height:100%;
}

/*
 * Off Canvas sidebar at medium breakpoint
 * --------------------------------------------------
 */
@media screen and (max-width: 992px) {

  .row-offcanvas {
    position: relative;
    -webkit-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    transition: all 0.25s ease-out;
  }

  .row-offcanvas-left
  .sidebar-offcanvas {
    left: -33%;
  }

  .row-offcanvas-left.active {
    left: 33%;
    margin-left: -6px;
  }

  .sidebar-offcanvas {
    position: absolute;
    top: 0;
    width: 33%;
    height: 100%;
  }
}

/*
 * Off Canvas wider at sm breakpoint
 * --------------------------------------------------
 */
@media screen and (max-width: 34em) {
  .row-offcanvas-left
  .sidebar-offcanvas {
    left: -45%;
  }

  .row-offcanvas-left.active {
    left: 45%;
    margin-left: -6px;
  }
  
  .sidebar-offcanvas {
    width: 45%;
  }
}

.card {
    overflow:hidden;
}

.card-body .rotate {
    z-index: 8;
    float: right;
    height: 100%;
}

.card-body .rotate i {
    color: rgba(20, 20, 20, 0.15);
    position: absolute;
    left: 0;
    left: auto;
    right: -10px;
    bottom: 0;
    display: block;
    -webkit-transform: rotate(-44deg);
    -moz-transform: rotate(-44deg);
    -o-transform: rotate(-44deg);
    -ms-transform: rotate(-44deg);
    transform: rotate(-44deg);
}
 body {
     background-color: #f9f9fa
 }

 .flex {
     -webkit-box-flex: 1;
     -ms-flex: 1 1 auto;
     flex: 1 1 auto
 }

 @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }



 .card {
     box-shadow: none;
     -webkit-box-shadow: none;
     -moz-box-shadow: none;
     -ms-box-shadow: none
 }

 .pl-3,
 .px-3 {
     padding-left: 1rem !important
 }

 .card {
     position: relative;
     display: flex;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid #d2d2dc;
     border-radius: 0
 }
 
 .card .card-title {
    color: #000000;
    margin-bottom: 0.625rem;
    text-transform: capitalize;
    font-size: 0.875rem;
    font-weight: 500;
}

.card .card-description {
  
    font-weight: 400;
    color: #76838f;
}

p {
    font-size: 0.875rem;
    margin-bottom: .5rem;
    line-height: 1.5rem;
}

.table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}

.table, .jsgrid .jsgrid-table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
}

.table thead th, .jsgrid .jsgrid-table thead th {
    border-top: 0;
    border-bottom-width: 1px;
    font-weight: 500;
    font-size: .875rem;
    text-transform: uppercase;
}

.table td, .jsgrid .jsgrid-table td {
    font-size: 0.875rem;
    padding: .875rem 0.9375rem;
}

.badge {
    border-radius: 0;
    font-size: 12px;
    line-height: 1;
    padding: .375rem .5625rem;
    font-weight: normal;
}


</style>
<script>
    $(document).ready(function() {
    
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
  
});
</script>