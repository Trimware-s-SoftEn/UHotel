<?php

// connect to database
$conn = mysqli_connect("localhost","root","","uhoteldb");

//check if connection is successfully
if ( mysqli_connect_error() ) {
    echo "Failed to connect to MySQL : ".mysqli_connect_error();
}
?>