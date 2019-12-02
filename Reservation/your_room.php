<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "uhoteldb";

  $con = new mysqli($servername, $username, $password, $dbname);
  $id = $_SESSION["ID"];
  $paymentId = $_SESSION["PAYMENTID"];

	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

  $result = mysqli_query($con,"SELECT *
    FROM user
    WHERE userID LIKE $id");

  $rowNav = mysqli_fetch_array($result);

  $checkIn = $_SESSION["CHECKIN"];
  $checkOut = $_SESSION["CHECKOUT"];

  $result = mysqli_query($con,"SELECT *
    FROM roomtype INNER JOIN
    (SELECT roomTypeName, COUNT(roomNo) AS countRoom
    FROM room
    WHERE roomNo NOT IN
    (SELECT roomNo
    FROM reservation
    WHERE (startDate <= '$checkIn' AND endDate >= '$checkIn')
    OR (startDate <= '$checkOut' AND endDate >= '$checkOut')
    OR (startDate >= '$checkIn' AND endDate <= '$checkOut'))
    GROUP BY roomTypeName) AS temp
    ON temp.roomTypeName = roomtype.roomTypeName"
  );


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
    <a class="now">2.Your room</a>
    <a>3.Your detail</a>
    <a>4.Payment</a>
  </div>

	<form action="reservationController.php" method="post" id="roomForm">
	  <div class="reserveHead">
	    <h1>Choose your room</h1>
	    <div class="reserveBlockUnderline"></div>

	    <!-- Start Stay Table -->
	    <div class="stayTableRoom">
	      <div class="stayRowHead">
	        <div class="stayColumnRoom">
	          <p>Check in: <?php echo $_SESSION["CHECKIN"] ?></p>
	        </div>
	        <div class="stayColumnRoom">
	          <p>Check out: <?php echo $_SESSION["CHECKOUT"] ?></p>
	        </div>
	        <div class="stayColumnRoom">
	          <p>Room: <?php echo "{$_SESSION["ROOM"]}" ?></p>
	        </div>
	      </div>
	    </div>
	    <!-- End Stay Table -->

      <!-- list of room -->
      <div class="roomList">
        <h4>Your Room</h4>
        <div class="roomListRow">
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

                 echo "
                 <form action='reservationController.php' method='post' id='roomForm'>
                   <div class='roomListColumn'>
                     <p class='head'>".$roomTypeName."</p>
                     <p> Number of Guest: ".$numberofGuest."</p>
                     <p> -".$price."฿</p>
                   </div>
                  </form>
                 ";
              }
            ?>
	        </div>
	      </div>
      </div>

      <!-- Start Room Table -->
        <div class="roomTable">
          <div class="roomRow">
            <?php
              while($row = mysqli_fetch_array($result)) {
                 $roomTypeName = $row['roomTypeName'];
                 $price = $row['price'];
                 $description = $row['description'];
                 $pictureID = $row['pictureID'];
                 $numberofBed = $row['numberofBed'];
                 $numberofGuest = $numberofBed*2;

                 $resultPic = mysqli_query($con,"SELECT *
                                             FROM picturegallery
                                             WHERE pictureID LIKE $pictureID");
                 $rowPic = mysqli_fetch_array($resultPic);

                 $resultScore = mysqli_query($con,"SELECT
                   AVG(reviewScore) AS Average
                   FROM review
                   WHERE roomTypeName LIKE '$roomTypeName'");

                 $rowScore = mysqli_fetch_array($resultScore);

                 echo "
                 <form action='reservationController.php' method='post' id='roomForm'>
                   <div class=\"roomColumn\" style='font-size: 12px;'>
                     <img src='../picture/".$rowPic["picture"]."' class='roomPic'>
                     <p class='first'>".$roomTypeName."</p>
                     <p style='margin-top: -15px;'> Average Score: ".$rowScore["Average"]."</p>
                     <img src='../picture/bed_icon.png' class='roomIcon'>
                     <p> Number of Bed: ".$numberofBed."</p>
                     <img src='../picture/guest_icon.png' class='roomIcon'>
                     <p> Max People: ".$numberofGuest."</p>
                     <p> Room Available: ".$row['countRoom']."</p>
                     <p> Guest Number: </p>
                     <input style='margin-left: 24px; margin-top: -10px;'
                      type='number' name='guest' id='guest' min='1' max='".$numberofGuest."'>
                     <p class='cost'> -".$price."฿</p>
                     <div class='roomFrameButton'>
                      <button type='submit' name='reserve1Room' value='".$roomTypeName."'>Add</button>
                     </div>
                   </div>
                  </form>
                 ";
              }
            ?>
  	      </div>
        </div>
      <!-- End Room Table -->
	  </div>
	</form>
</div>

<footer>
    <h1>Footer Content</h1>
</footer>

</body>
</html>

<?php $con->close(); ?>
