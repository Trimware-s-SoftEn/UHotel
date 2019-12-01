<?php
require 'db_conn.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../styles.css">
</head>

<body>

  <div class="topnav">
    <a class="icon" href="#home"><img src="../picture/Logo_Transparent.png" ; id="icon"></a>
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
    <!--<a class="menu" href="#services">Services</a>-->
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
    <img src="../picture/UserIcon.png" ; id="userIcon">
    <img src="../picture/lineInNav.png" ; id="lineInNav">
    <a class="book" href="Reservation/your_stay.html">BOOK NOW</a>
  </div>

  <div class="main">

    <div class="top_addPosition">
      <div class="content_topic"><a href="positions.php"><h1>Positions ></h1></a><h2 class="">Add New Positions</h2></div>
      <div class="content_description">Please re-check the information before submit</div>
    </div>

    <div class="content_addPosition">
        <form action="insert_position_to_DB.php" method="POST">

          Position :
          <input name="positionName"><br>

          Department :
          <select name="positionDepartment">
          <option style="color: rgb(50, 50, 50)" ; disabled selected>Select Department</option>
          <option value="1">Accounting</option>
          <option value="2">Administration</option>
          <option value="3">Banquet</option>
          <option value="4">Catering Sales</option>
          <option value="5">Engineering</option>
          <option value="6">Executive Office</option>
          <option value="7">Finance</option>
          <option value="8">Food & Beverage</option>
          <option value="9">Front Office</option>
          <option value="10">Housekeeping</option>
          <option value="11">Human resources</option>
          <option value="12">Information Technology</option>
          <option value="13">In-Room Dining</option>
          <option value="14">Laundry</option>
          <option value="15">Marketing</option>
          <option value="16">Public Relations</option>
          <option value="17">Reservations</option>
          <option value="18">Residences</option>
          <option value="19">Rooms</option>
          <option value="20">Security</option>
          </select><br>

          Employment Type :
          <select name="positionEmployment">
            <option style="color: rgb(50, 50, 50)" ; disabled selected>Select Employment Type</option>
            <option value="Full time">Full time</option>
            <option value="">Temporary / Seasonal</option>
            <option value="Part time">Part time</option>
            <option value="Casual / On-call ">Casual / On-call </option>
            <option value="Graduate programme">Graduate programme</option>
            <option value="Internship">Internship</option>
          </select><br>

          Description :
          <input name="positionDescription">

          Resuipement

        

        </form>
    </div>

  </div>

  <footer>
    <h1>Footer Content</h1>
  </footer>

</body>

</html>