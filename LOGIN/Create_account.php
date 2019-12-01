<?php

$con = mysqli_connect('localhost','root','','uhotel');
//check conection
if(mysqli_connect_errno())
{
    echo "Failed to connect to mysql: ".mysqli_connect_error();
}

//ecape variable
$email = mysqli_real_escape_string($con,$_POST['Email']);
$password = mysqli_real_escape_string($con,$_POST['Password']);
$firstname = mysqli_real_escape_string($con,$_POST['FirstName']);
$lastname = mysqli_real_escape_string($con,$_POST['LastName']);
$phone = mysqli_real_escape_string($con,$_POST['Phone']);

$sql = "Insert into user(email, password, fName, lName, phoneNo)
VALUES('$email','$password','$firstname','$lastname','$phone')";
if(!mysqli_query($con,$sql))
{
    die('Error: '.mysqli_error($con));
}
echo " successful";
mysqli_close($con);

header("Location: http://localhost/UHotel/LOGIN/Login.html?");


/*
$conn = new mysqli('localhost','root','','uhotel');

$email = $_POST['Email'];
$password = $_POST['Password'];
$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$phone = $_POST['Phone'];

//Database connection

//$conn = new mysqli('localhost','root','','uhotel');
if($conn->connect_error)
{
    die('Connect Failed: '.$conn->connect_error);
}
else
{
    $stmt = $conn->prepare("insert into user(email, password, firstname, lastname, phone)
    values(?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $email, $password, $firstname, $lastname, $phone);
    $stmt->execute();
    echo "Successful!!";
    $stmt->close();
    $conn->close();
}
header("Location: file:///E:/University/3/1/CPE327/project/LAST_NEW/UHotel/LOGIN/Login.html")*/


?>


