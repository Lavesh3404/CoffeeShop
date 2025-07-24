<?php
include "config.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reservation Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="reservation.css">
    </head>
    <body>
        
        <section class = "banner">
            <h2>BOOK YOUR TABLE NOW</h2>
            <div class = "card-container">
                <div class = "reserv-img">
                </div>

                <div class = "card-content">
                    <h3>Reservation</h3>
                    <form action="" method="post">
                        <div class = "form-row">
                            <input type="date" id="txt-appoint_date" name="date" placeholder="Enter Date" required>
                            <input type="text" name="time" placeholder="Enter Time" required>
                        </div>

                        <div class = "form-row">
                            <input type = "text" name="fname" placeholder="Full Name" autocomplete="off" required>
                            <input type = "text" name="mobile" id="numberField" placeholder="Phone Number" autocomplete="off" maxlength="10" required>
                        </div>

                        <div class = "form-row">
                            <input type = "number" name="person" placeholder="How Many Persons?" min = "1" max="10" maxlength="2" required>
                           <input type = "submit" name="submit" value = "BOOK TABLE"> 
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
        <script>
  $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
  var dateToday = new Date();
  var month = dateToday.getMonth() + 1;
  var day = dateToday.getDate();
  var year = dateToday.getFullYear();

  if (month < 10)
    month = '0' + month.toString();
  if (day < 10)
    day = '0' + day.toString();

  var maxDate = year + '-' + month + '-' + day;

  $('#txt-appoint_date').attr('min', maxDate);
});
</script>
<?php
if (isset($_REQUEST['submit'])) {
    print_r($_REQUEST);
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $fname = $_REQUEST['fname'];
    $mobile = $_REQUEST['mobile'];
    $person = $_REQUEST['person'];
  $todaydate = date("jS \of F Y");

 $ex = "INSERT INTO `reservation`(`date`, `time`, `fname`, `mobile`, `person`, `todaydate`) VALUES ('$date','$time','$fname','$mobile','$person','$todaydate')";
 $queryrun = mysqli_query($conn,$ex);
if ($queryrun) {
    header('location:home.php?donetable');
}
}

?>
<script>
    function restrictNumber(e) {
  var newValue = this.value.replace(new RegExp(/[^\d]/, 'ig'), "");
  this.value = newValue;
}

var userName = document.querySelector('#numberField');
userName.addEventListener('input', restrictNumber);
</script>
    </body>
</html>