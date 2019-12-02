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
    <a class="pass">2.Your room</a>
    <a class="now">3.Your detail</a>
    <a>4.Payment</a>
  </div>

  <div class="reserveHead">
    <h1>Your Detail</h1>
    <div class="reserveBlockUnderline"></div>


    <div class="yourDetailBreak"></div>


    <!-- Start Guest Detail -->
    <div class="guestDetailBox">
      <h3>Contact Information</h3>
      <div class="reserveInfoBoxUnderline"></div>
    </div>
      <!-- End  -->

    <!-- list of room -->
    <div class="reserveInfoBox">
      <h3>Booking Details</h3>
      <div class="reserveInfoBoxUnderline"></div>


      <?php echo "<p> Check-in Date: ".$checkIn."</p>" ?>
      <?php echo "<p> Check-out Date: ".$checkOut."</p>" ?>
      <?php
        $result2 = mysqli_query($con,"SELECT *
          FROM reservation
          INNER JOIN room
          ON room.roomNo = reservation.roomNo
          INNER JOIN roomtype
          ON roomtype.roomTypeName = room.roomTypeName
          WHERE paymentID LIKE $paymentId"
        );

        while($row = mysqli_fetch_array($result2)) {
           $roomTypeName = $row['roomTypeName'];
           $price = $row['price'];
           $numberofGuest = $row['customerAmount'];
           $roomNo = $row['roomNo'];

           echo "
             <div class='roomListColumn'>
               <p class='head'>".$roomTypeName."</p>
               <p class='detail'> Number of Guest: ".$numberofGuest."</p>
               <p class='detail'> -".$price."฿</p>
               <div class='roomFrameButton'>
                <button type='submit' name='remove1Room' style='margin-top: -15px; margin-left: 60px; padding:10px 20px;' value='".$roomNo."'>Remove</button>
               </div>
             </div>
           ";
        }
      ?>
    </div>
      <!-- End Room Table -->
  </div>

  <div class="yourDetailBreak"></div>

  <footer>
      <h1>Footer Content</h1>
  </footer>

  </body>
</html>

<?php $con->close(); ?>
