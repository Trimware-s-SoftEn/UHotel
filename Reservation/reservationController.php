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

if (isset($_POST['reserve1Room'])) {
  //___________________________________________________Form 1 Room__________________________________________________________
  $roomTypeName = $_POST["reserve1Room"];
}
else if (isset($_POST["submitCheck"])) {
  //___________________________________________________Form Check In________________________________________________________
  $_SESSION["CHECKIN"] = mysqli_real_escape_string($conn, $_REQUEST['checkIn']);
  $_SESSION["CHECKOUT"] = mysqli_real_escape_string($conn, $_REQUEST['checkOut']);
  $_SESSION["GUEST"] = $_POST['guest'];
  header('Location: ../Reservation/your_room.php');
  exit;
}

$conn->close();

?>
