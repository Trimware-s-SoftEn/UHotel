<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hrmanager";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//SQL insert
if ($_POST["Submit"] === 'add') {
  //___________________________________________________Form1__________________________________________________________
  $_SESSION["STARTDATE"] = mysqli_real_escape_string($conn, $_REQUEST['checkIn']);
  $_SESSION["FNAME"] = mysqli_real_escape_string($conn, $_REQUEST['checkOut']);
  $_SESSION["LNAME"] = mysqli_real_escape_string($conn, $_REQUEST['guess']);

  $sql = "INSERT INTO Reservation (staffName, positionID,
                            bankAccount, dateOfBirth, gender,
                            address, telNo, startDate, password, picture)
  VALUES ('$staffName', '$positionID', '$bankAccount', '$dateOfBirth',
          '$gender', '$address', '$telNo', '$startDate', '$password', '$picture')";

  if ($conn->query($sql) === TRUE)
  {
    $staffID = $conn->insert_id;

    unset($_SESSION['STARTDATE']);
    unset($_SESSION['FNAME']);
    unset($_SESSION['LNAME']);
    unset($_SESSION['ADDRESS']);
    unset($_SESSION['TELNO']);
    unset($_SESSION['DATEOFBIRTH']);
    unset($_SESSION['GENDER']);
    unset($_SESSION['BANKACCOUNT']);
    unset($_SESSION['BRANCHNAME']);
    unset($_SESSION['DEPARTMENT']);

    $_SESSION["CR_STAFFID"] = $staffID;
    echo "Insert successfully";
    header('Location: http://localhost/HRPJ/HRManager/StaffEdit_HRManager/WorkHistory.php');
    //echo "<a href=\"http://localhost/HRPJ/HRManager/WelcomeSignoutForHR.php\">GO BACK</a>";
  }
  else
  {
    echo "Fail to insert database, try again later";
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
  }
  header('Location: your_stay.php');
}
else {
  echo "Aloha [".$_POST["Submit"]."]";
}
//else if ($_POST["Submit"] === 'check') {
  //___________________________________________________Form3_______________________________________________________________

  /*$startDate = mysqli_real_escape_string($conn, $_REQUEST['startDate']);
  $fName = mysqli_real_escape_string($conn, $_REQUEST['fName']);
  $lName = mysqli_real_escape_string($conn, $_REQUEST['lName']);
  $staffName = $fName.' '.$lName;
  $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
  $telNo = mysqli_real_escape_string($conn, $_REQUEST['telNo']);
  $dateOfBirth = mysqli_real_escape_string($conn, $_REQUEST['dateOfBirth']);
  $gender = $_POST['gender'];  // Storing Selected Value In Variable
  $bankAccount = mysqli_real_escape_string($conn, $_REQUEST['bankAccount']);
  $positionID = $_POST['positionID'];
  $password = $_POST['password'];

  //___________________________________________________Insert Picture__________________________________________________
  $ext = pathinfo(basename($_FILES['picture']['name']), PATHINFO_EXTENSION);
  $newImageName = 'img_'.uniqid().'.'.$ext;
  $imagePath = "../../staffImage/";
  $uploadPath = $imagePath.$newImageName;
  //___________________________________________upload__________________________________________________________

  $successs = move_uploaded_file($_FILES['picture']['tmp_name'],$uploadPath);

  if($successs){
    $picture = $newImageName; //
  //__________________________________________Insert all__________________________________________________________
    $sql = "INSERT INTO staff (staffName, positionID,
                              bankAccount, dateOfBirth, gender,
                              address, telNo, startDate, password, picture)
    VALUES ('$staffName', '$positionID', '$bankAccount', '$dateOfBirth',
            '$gender', '$address', '$telNo', '$startDate', '$password', '$picture')";

    if ($conn->query($sql) === TRUE)
    {
      $staffID = $conn->insert_id;

      unset($_SESSION['STARTDATE']);
      unset($_SESSION['FNAME']);
      unset($_SESSION['LNAME']);
      unset($_SESSION['ADDRESS']);
      unset($_SESSION['TELNO']);
      unset($_SESSION['DATEOFBIRTH']);
      unset($_SESSION['GENDER']);
      unset($_SESSION['BANKACCOUNT']);
      unset($_SESSION['BRANCHNAME']);
      unset($_SESSION['DEPARTMENT']);

      $_SESSION["CR_STAFFID"] = $staffID;
      echo "Insert successfully";
      header('Location: http://localhost/HRPJ/HRManager/StaffEdit_HRManager/WorkHistory.php');
      //echo "<a href=\"http://localhost/HRPJ/HRManager/WelcomeSignoutForHR.php\">GO BACK</a>";
    }
    else
    {
      echo "Fail to insert database, try again later";
      echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
    }
  }
  else{
    echo "Error insert picture";
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
  }*/
//}

$conn->close();

?>
