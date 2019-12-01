<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "uhoteldb";

  $conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

  $result = mysqli_query($con,"SELECT *
                              FROM user
                              WHERE userID LIKE $id");
  $rowNav = mysqli_fetch_array($result);

  $result = mysqli_query($con,"SELECT *
                              FROM roomtype");
  $result = mysqli_query($con,"SELECT *
                              FROM roomtype");

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
    <button class="dropbtn"><?php echo $row["fName"]." ".$row["lName"] ?></button>
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

      <!-- Start Room Table -->
      <div class="roomTable">
        <div class="roomRow">
          <?php
            while($row = mysqli_fetch_array($result)) {
               $roomTypeName = $row['staffName'];
               $price = $row['price'];
               $description = $row['description'];
               $pictureID = $row['pictureID'];
               $numberofBed = $row['numberofBed'];

               $resultPic = mysqli_query($con,"SELECT *
                                           FROM picturegallery
                                           WHERE pictureID LIKE $pictureID");
               $rowPic = mysqli_fetch_array($result);
               echo "
                 <div class=\"roomColumn\">
                   <img class=\"\" src='../picture/".$rowPic["picture"]."'>
                   <p>Check in: ".$_SESSION["CHECKIN"]."</p>
                 </div>
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

<?php $conn->close(); ?>
