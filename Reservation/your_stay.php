<?php
session_start();
	$_SESSION["ID"] = 1;
	$id = $_SESSION["ID"];
	$con=mysqli_connect("localhost","root","","uhoteldb");
	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

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
    <button class="dropbtn">User Name</button>
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
    <a class="now">1.Your stay</a>
    <a>2.Your room</a>
    <a>3.Your detail</a>
    <a>4.Payment</a>
  </div>

	<form action="reservationController.php" method="post" id="staffForm">
	  <div class="reserveHead">
	    <h1>Choose your stay</h1>
	    <div class="reserveBlockUnderline"></div>

	    <!-- Start Table -->
	    <div class="stayTable">
	      <div class="stayRow">
	        <div class="stayColumnHead">
	          <p>Check in</p>
	        </div>
	        <div class="stayColumnHead">
	          <p>Check out</p>
	        </div>
	        <div class="stayColumnHead">
	          <p>Guest Number</p>
	        </div>
	      </div>
	      <div class="stayRow">
	        <div class="stayColumn">
	          <input type="Date" name="checkIn" id="checkIn">
	        </div>
	        <div class="stayColumn">
	          <input type="Date" name="checkOut" id="checkOut">
	        </div>
	        <div class="stayColumn">
	          <input type="number" name="guess" id="guess" min="1" max="10">
	        </div>
	      </div>
	    </div>
	    <!-- End Table -->
			<div class="stayAddButton">
				<button type="submit" name="Submit" value="add">Add more</button>
			</div>
			<div class="stayFrameButton">
				<button type="submit" name="Submit" value="check">Check Room</button>
			</div>
	  </div>
	</form>
</div>

<footer>
    <h1>Footer Content</h1>
</footer>

</body>
</html>
