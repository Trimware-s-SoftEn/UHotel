<?php
    session_start();
    if(session_destroy()){ // Destroying All Sessions {
    header("Location: http://localhost/UHotel/homepage.html"); // Redirecting To Home Page
    }
?>
