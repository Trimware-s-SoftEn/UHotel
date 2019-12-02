<?php
    include('Login.php');
    if(!isset($_SESSION['User']))
    {
        header("Location : http://localhost/UHotel/LOGIN/Login.html ");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <div class="topnav">
        <a class="icon" href="http://localhost/UHotel/homepage2.php"><img src="../picture/Logo_Transparent.png" ; id="icon"></a>
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
        <img src="../picture/UserIcon.png" ; id="userIcon">
        <img src="../picture/lineInNav.png" ; id="lineInNav">
        <a class="book" href="../Reservation/your_stay.html">BOOK NOW</a>
    </div>

    <div id="user_details">
        User details
    </div>

    <div id="rectangle_left">
        <div id="group_386">
            <div class="mybook">My Bookings</div>
            <div class="myprofile">Profile</div>
            <div class="myhistory">History</div>
            <div class="myreview">Review</div>
        </div>
    </div>

    <div id="rectangle_right_1">
        <div id="name">NAME:</div>
        <div class="showname" style="width:400px;";>
        <?php
            echo $_SESSION['fName']." ".$_SESSION['lName'];
        ?>
        </div>
    </div>

    <div id="rectangle_right_2">
        <div id="name_email">Email:</div>
        <div class="showname" style="width:400px;";>
        <?php
            echo $_SESSION['Email'];
        ?>
        </div>
    </div>

    <div id="rectangle_right_3">
        <div id="name_password">PASSWORD:</div>
        <div class="showname" style="width:400px;";>
        <?php
            echo $_SESSION['Password'];
        ?>
        </div>
    </div>

    <div id="rectangle_right_4">
        <div id="name_phone">PHONE:</div>
        <div class="showname" style="width:400px;";>
        <?php
            echo $_SESSION['Phone'];
        ?>
        </div>
    </div>
</body>

</html>