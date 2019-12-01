<?php
    session_start();
    if(session_destroy()){ // Destroying All Sessions {
    header("Location: http://localhost/UHotel/LOGIN/Login.html"); // Redirecting To Home Page
    }
?>
