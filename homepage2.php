<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>

<style>
    body {
        background-image: url("picture/image_4.png");
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>

<body>
    <div class="topnav">
        <a class="icon" href="http://localhost/UHotel/homepage2.php"><img src="picture/Logo_Transparent.png" ;
                id="icon"></a>
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
            <button class="dropbtn">
                <?php
                    echo $_SESSION['fName'];
                ?>
            </button>
            <div class="dropdown-content">
                <a href="http://localhost/UHotel/LOGIN/Profile.php">Profile</a>
                <a href="http://localhost/UHotel/LOGIN/logout.php">Logout</a>
            </div>
        </div>
        <img src="picture/UserIcon.png" ; id="userIcon">
        <img src="picture/lineInNav.png" ; id="lineInNav">
        <a class="book" href="Reservation/your_stay.html">BOOK NOW</a>
    </div>

    <div id="a_stunning_hotel">
        A STUNNING HOTEL
    </div>
    <div id="welcome_to_uhotel">
        Welcome to Uhotel
    </div>
    <div id="rectangle_1098"></div>
    <div
        id="uhotel_comes_with_a_collection_of_six_astounding_and_filly_customizable_homepage_layouts_suitable_for_various_purposes_">
        Uhotel comes with a collection of six astounding and filly customizable<br />Homepage layouts suitable for
        various purposes.
    </div>



</body>

</html>