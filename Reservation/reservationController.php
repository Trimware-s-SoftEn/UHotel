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


if(isset($_POST['submitDetail'])) {
  //_______________________________________Enter contact__________________________________________________________________
  $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
  $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
  $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
  $telephone = mysqli_real_escape_string($conn, $_REQUEST['telephone']);
  $paymentId = $_SESSION["PAYMENTID"];

  $sql = "UPDATE reservation
    SET customerName = '$fname', address = '$address', customerEmail = '$email', customerTel = '$telephone'
    WHERE paymentID LIKE $paymentId";

    if ($conn->query($sql) === TRUE)
      {
        //unset($_SESSION['STARTDATE']);

        echo "Update successfully";
        header('Location: ../Reservation/payment.php');
    }
    else
    {
        echo "Fail to insert database, try again later";
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
    }
}
else if (isset($_POST['reserveRoom'])) {
  //___________________________________finish reserve__________________________________________________________________
  header('Location: ../Reservation/your_detail.php');
}
else if (isset($_POST['remove1Room'])) {
  //_______________________________________room remove____________________________________________________________________
  $roomNo = $_POST["remove1Room"];
  $checkIn = $_SESSION["CHECKIN"];

  $sql = "DELETE FROM reservation WHERE roomNo = $roomNo AND startDate LIKE '$checkIn'";
  if ($conn->query($sql) === TRUE)
    {
      //unset($_SESSION['STARTDATE']);

      echo "Delete successfully";
      header('Location: ../Reservation/your_room.php');
  }
  else
  {
      echo "Fail to insert database, try again later";
      echo $_SESSION['PAYMENTID'];
      echo "Error: " . $sql . "<br>" . $conn->error;
      echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
  }
}
else if (isset($_POST['reserve1Room'])) {
  //___________________________________________________Form 1 Room__________________________________________________________
  $roomTypeName = $_POST["reserve1Room"];
  $paymentId = $_SESSION["PAYMENTID"];


  $checkIn = $_SESSION["CHECKIN"];
  $checkOut = $_SESSION["CHECKOUT"];
  $id = $_SESSION["ID"];
  $guest = $_POST['guest'];
  $reservationDesk = 0;

  $result = mysqli_query($conn,"SELECT *
    FROM room
    WHERE roomNo NOT IN
    (SELECT roomNo
    FROM reservation
    WHERE (startDate <= '$checkIn' AND endDate >= '$checkIn')
    OR (startDate <= '$checkOut' AND endDate >= '$checkOut')
    OR (startDate >= '$checkIn' AND endDate <= '$checkOut'))
    AND roomTypeName LIKE '$roomTypeName'
    LIMIT 1"
  );

  $row = mysqli_fetch_array($result);
  $roomNo = $row['roomNo'];

  $sql = "INSERT INTO `reservation`
    (`roomNo`, `reserveDateTime`, `startDate`, `endDate`
      , `userID`, `reservationStatus`, `customerAmount`, `isReservationDesk`
      , `customerName`, `address`, `customerEmail`, `customerTel`
      , `paymentID`) VALUES ('$roomNo', CURRENT_TIMESTAMP, '$checkIn', '$checkOut',
        '$id', '0', '$guest', '$reservationDesk', NULL, NULL, NULL, NULL, '$paymentId')";

  if ($conn->query($sql) === TRUE)
    {
      //unset($_SESSION['STARTDATE']);

      echo "Insert successfully";
      header('Location: ../Reservation/your_room.php');
  }
  else
  {
      echo "Fail to insert database, try again later";
      echo $_SESSION['PAYMENTID'];
      echo "Error: " . $sql . "<br>" . $conn->error;
      echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
  }
}
else if (isset($_POST["submitCheck"])) {
  //___________________________________________________Form Check In________________________________________________________
  $_SESSION["CHECKIN"] = mysqli_real_escape_string($conn, $_REQUEST['checkIn']);
  $_SESSION["CHECKOUT"] = mysqli_real_escape_string($conn, $_REQUEST['checkOut']);
  $_SESSION["GUEST"] = $_POST['guest'];

  $sql = "INSERT INTO `payment` VALUES ( NULL, NULL)";

  if ($conn->query($sql) === TRUE)
    {
      $_SESSION["PAYMENTID"] = $conn->insert_id;
      //unset($_SESSION['STARTDATE']);

      echo "Insert successfully";
      echo $_SESSION["PAYMENTID"];
      header('Location: ../Reservation/your_room.php');
  }
  else
  {
      echo "Fail to insert database, try again later";
      echo "Error: " . $sql . "<br>" . $conn->error;
      echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
  }
  exit;
}

$conn->close();

?>
