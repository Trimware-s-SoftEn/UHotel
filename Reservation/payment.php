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
    <a class="pass" href="../Reservation/your_stay.php">1.Your stay</a>
    <a class="pass" href="../Reservation/your_room.php">2.Your room</a>
    <a class="pass" href="../Reservation/your_detail.php">3.Your detail</a>
    <a class="now">4.Payment</a>
  </div>

  <div class="reserveHead">
    <h1>Payment</h1>
    <div class="reserveBlockUnderline"></div>
  </div>

  <div class="totalCostBar">
    <p><?php echo "Payment ID: ".$_SESSION['PAYMENTID']."<br>Total Cost: -".$_SESSION['COST']."฿"; ?></p>
  </div>

  <form action="reservationController.php" method="post" id="paymentForm">

  <div class="PaymentTableFrame">
    <div class="bigPaymentRow">
      <div class="bigPaymentColumn">
        <div class="smallPaymentRow">
          <div class="smallPaymentColumn">
            <img style="margin-top: 30px; width: 320px; height: 230px;" src="../picture/credit_card.png">
            <p>Credit Card Number</p>
            <input class="guestDetailInput" type="text" name="creditcard" required placeholder="---- ---- ---- ----">
          </div>
        </div>
      </div>
      <div class="bigPaymentColumn">
        <div class="smallPaymentRow">
          <div class="smallPaymentColumn">
            <p style="margin-top:56px;">Redeem Code</p>
            <input class="guestDetailInput" type="text" name="code" required placeholder="------">
          </div>
          <div class="smallPaymentColumn">
            <p>Card Holder Name</p>
            <input class="guestDetailInput" type="text" name="code" required placeholder="FName LName">
          </div>
          <div class="smallPaymentColumn">
            <p>CVV</p>
            <input class="guestDetailInput" type="text" name="code" required placeholder="123">
          </div>
        </div>
      </div>
    </div>

    <div class="guessDetailButton">
      <button style="margin-top: 30px;margin-left: 350px;" type="submit" name="payment" id="payment">Complete the reservation</button>
    </div>
  </div>

  </form>

    <!-- Start Guest Detail -->



  <footer>
      <h1>Footer Content</h1>
  </footer>

  </body>
</html>

<?php $con->close(); ?>
