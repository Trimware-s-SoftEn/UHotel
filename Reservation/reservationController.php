<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uhoteldb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_POST["submit"] === 'checkRoom') {
  //___________________________________________________Form1__________________________________________________________
  $_SESSION["CHECKIN"] = mysqli_real_escape_string($conn, $_REQUEST['checkIn']);
  $_SESSION["CHECKOUT"] = mysqli_real_escape_string($conn, $_REQUEST['checkOut']);
  $_SESSION["ROOM"] = $_POST['room'];
  header('Location: ../Reservation/your_room.php');
  exit;
}

$conn->close();

?>
