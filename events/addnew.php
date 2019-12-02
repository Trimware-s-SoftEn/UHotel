<?php
$con = mysqli_connect('localhost','root','','uhoteldb');
//check conection
if(mysqli_connect_errno())
{
    echo "Failed to connect to mysql: ".mysqli_connect_error();
}

//ecape variable
$eventName = mysqli_real_escape_string($con,$_POST['eventName']);
$description = mysqli_real_escape_string($con,$_POST['description']);
$pictureID = mysqli_real_escape_string($con,$_POST['pictureID']);
$roomNo = mysqli_real_escape_string($con,$_POST['roomNo']);
$startDateTime = mysqli_real_escape_string($con,$_POST['startDateTime']);
$endDateTime = mysqli_real_escape_string($con,$_POST['endDateTime']);


$sql = "Insert into event(eventName,description,pictureID,roomNo,startDateTime,endDateTime)
VALUES('$eventName','$description','$pictureID','$roomNo','$startDateTime','$endDateTime')";
if(!mysqli_query($con,$sql))
{
    die('Error: '.mysqli_error($con));
}
echo " successful";
mysqli_close($con);

header("Location: http://localhost:8080/Trimware/UHotel/events/events_staff.html");
?>
