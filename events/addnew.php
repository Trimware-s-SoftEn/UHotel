<?php
$con = mysqli_connect('localhost','root','','uhotel');
//check conection
if(mysqli_connect_errno())
{
    echo "Failed to connect to mysql: ".mysqli_connect_error();
}

//ecape variable
$topic = mysqli_real_escape_string($con,$_POST['topic']);
$description = mysqli_real_escape_string($con,$_POST['description']);
$fileToUpload = mysqli_real_escape_string($con,$_POST['fileToUpload']);

$sql = "Insert into user(eventName, description)
VALUES('$topic','$description','$fileToUpload')";
if(!mysqli_query($con,$sql))
{
    die('Error: '.mysqli_error($con));
}
echo " successful";
mysqli_close($con);

header("Location: http://localhost/UHotel/events/addnew.html?");
?>
