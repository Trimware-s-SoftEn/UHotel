<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "uhoteldb";

  $con = new mysqli($servername, $username, $password, $dbname);


	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

  $id = $_SESSION["ID"];
  $checkIn = $_SESSION["CHECKIN"];
  $checkOut = $_SESSION["CHECKOUT"];
  $paymentId = $_SESSION["PAYMENTID"];

  $result = mysqli_query($con,"SELECT *
                              FROM user
                              WHERE userID LIKE $id");
  $rowNav = mysqli_fetch_array($result);

//  $sql = "SELECT branchName FROM branch";
//  $result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles.css">
</head>
<body>

<div class="topnav">
  <a class="icon" href="#home"><img src="../picture/Logo_Transparent.png"; id="icon"></a>
  <div class="dropdownL">
    <button class="dropbtn">About</button>
    <div class="dropdown-content">
      <a href="#about">About us</a>
      <a href="#contact">Contact</a>
      <a href="#map">Map</a>
      <a href="#map">Career</a>
    </div>
  </div>
  <div class="dropdownL">
    <button class="dropbtn">Services</button>
    <div class="dropdown-content">
      <a href="#room">Rooms</a>
      <a href="#facilities">Facilities</a>
    </div>
  </div>
  <a class="menu" href="#events">Events</a>
  <a class="menu" href="#offers">Offers</a>
  <a class="menu" href="#reviews">Reviews</a>
  <a class="menu" href="#gallery">Gallery</a>

  <!-- Right part -->
  <div class="dropdownR">
    <button class="dropbtn"><?php echo $rowNav["fName"]." ".$rowNav["lName"] ?></button>
    <div class="dropdown-content">
      <a href="#profile">Profile</a>
      <a href="#history">My Reservation</a>
      <a href="#logout">Logout</a>
    </div>
  </div>
  <img src="../picture/UserIcon.png"; id="userIcon">
  <img src="../picture/lineInNav.png"; id="lineInNav">
  <a class="book" href="../Reservation/your_stay.html">BOOK NOW</a>
</div>

<div class="main">
  <img class="ReserveTopPic" src='../picture/ReservationTopPic.png'>
  <div class="reserveProcessBar">
    <a class="pass">1.Your stay</a>
    <a class="pass">2.Your room</a>
    <a class="pass">3.Your detail</a>
    <a class="pass">4.Payment</a>
  </div>

  <div class="reserveHead">
    <h1>Complete</h1>
    <div class="reserveBlockUnderline"></div>
  </div>

  <div class="totalCostBar">
    <p>Thank you for booking with us!</p>
  </div>


    <form action="#homepage" method="post">
      <div class="guessDetailButton">
        <button style="margin-top: 30px;margin-left: 540px;" type="button">Back to homepage</button>
      </div>
    </form>
  </div>



    <!-- Start Guest Detail -->



  <footer>
      <h1>Footer Content</h1>
  </footer>

  </body>
</html>

<?php $con->close(); ?>
