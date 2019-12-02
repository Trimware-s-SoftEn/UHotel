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

      <form action="reservationController.php" method="post" id="detailForm">
        <div class='guestDetailRow'>
          <div class='guestDetailColumn'>
            <p> Full Name :</p>
            <input class="guestDetailInput" type="text" name="fname" value="fname" required>
          </div>
          <div class='guestDetailColumn'>
            <p> Address :</p>
            <input class="guestDetailInput" type="text" name="address" value="address" required>
          </div>
          <div class='guestDetailColumn'>
            <p> Email :</p>
            <input class="guestDetailInput" type="text" name="email" value="email" required>
          </div>
          <div class='guestDetailColumn'>
            <p> Telephone :</p>
            <input class="guestDetailInput" type="text" name="telephone" value="telephone" required>
          </div>
          <div class='guestDetailColumn'>
            <div class="guessDetailButton">
              <button type="submit" class="roomFrameButton"  name="submitDetail" value="submitDetail"> submit </button>
            </div>
          </div>
        </div>
      </form>
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
             <div class='reserveInfoRoomListColumn'>
               <p class='head'> Room ".$roomNo.": ".$roomTypeName."</p><br><br>
               <p class='detail'> Number of Guest: ".$numberofGuest."</p><br>
               <p class='price'> -".$price."฿</p>
             </div>
           ";
        }
      ?>

      <?php $resultCost = mysqli_query($con,"SELECT SUM(price) as sum
        FROM reservation
        INNER JOIN room
        ON room.roomNo = reservation.roomNo
        INNER JOIN roomtype
        ON roomtype.roomTypeName = room.roomTypeName
        WHERE paymentID LIKE $paymentId
        GROUP BY paymentID"
      );

      $cost = mysqli_fetch_array($resultCost);
      $_SESSION['COST'] = $cost['sum'];
    //  echo "Error: " . "<br>" . $con->error;
      ?>

      <h5 class="Summation"> Summation is</h5>
      <h5 class="Summation" style="margin-left: 260px;"> -<?php echo $cost['sum'] ?>฿ </h5>
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
