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
                <a href="../Career/career.html">Career</a>
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
        <div class="header_positions">
            <div class="header_menu">
                <a href="career.html">
                    <h1>Career</h1>
                </a>
                <a href="career.html">
                    <h2 id="WhatWeOffer_menu">What we offer</h2>
                </a>
                <a href="benefits.html">
                    <h3 id="benefits_menu">Benefits</h3>
                </a>
                <a href="learning_&_deevelopment.html">
                    <h3 id="learning_menu">Learning & Development</h3>
                </a>
                <a href="graduate_opportunities.html">
                    <h3 id="graduate_menu">Graduate Opportunities</h3>
                </a>
                <a href="positions.php">
                    <h2 id="positions_menu" style="text-decoration: underline;" ;>Positions</h2>
                </a>
                <a href="family.html">
                    <h2 id="family_menu" ;>Become our family</h2>
                </a>

            </div>
            <div class="header_search">
                <div class="header_search_grid">
                    <img class="header_search_logo" src="skins/logo.png">
                    <form action="positions.php" , method="POST">
                        <select id="select_Em" class="header_search_selectEm">
                            <option style="color: rgb(50, 50, 50)" ; disabled selected>Select Employment Type</option>
                            <option value="Full time">Full time</option>
                            <option value="Temporary / Seasonal">Temporary / Seasonal</option>
                            <option value="Part time">Part time</option>
                            <option value="Casual / On-call">Casual / On-call</option>
                            <option value="Graduate programme">Graduate programme</option>
                            <option value="Internship">Internship</option>
                        </select>
                        <select id="select_De" class="header_search_selectDe">
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
                        </select>
                        <input type="submit" name="search_btn" value="SEARCH" class="header_search_btn">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class = "content_top">
            <div class="content_topic" ><h1>Positions</h1> <h2></h2></div>
            <div class="content_description">Feel free to find your right position</div>
    </div>

    <?php
        $sql = "SELECT * FROM position";
        $result = mysqli_query($conn, $sql);
    ?>

    <div class="content_content">
        <div class="content_category">
            <div class="content_topic_filter">
                <h4>Filter</h4>
            </div>
            <div class="content_topic_list">
                <div class="content_list_icon"><h4>Picture</h4></div>
                <div class="content_list_position"><h3>Positions</h4></div>
                <div class="content_list_department"><h4>Department</h4></div>
                <div class="content_list_employment"><h4>Employment Type</h4></div>
            </div>
        </div>
        <div class="content_search_engine">
            <div class="content_filter">
                <div>
                    Employment Type
                </div>
                <div>
                <input type="checkbox" name="department[]" value="Account">
                </div>
            </div>
            <div class="content_list">
                list
            </div>
        </div>
        

    </div>


    <footer>
        <h1>Footer Content</h1>
    </footer>

</body>

</html>