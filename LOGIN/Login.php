<?php

$con = mysqli_connect('localhost','root','','uhotel');
//check conection
if(mysqli_connect_errno())
{
    echo "Failed to connect to mysql: ".mysqli_connect_error();
}

if(isset($_POST["Sign-in"]))
{
    $email = mysqli_real_escape_string($con,$_POST['Email']);
    $password = mysqli_real_escape_string($con,$_POST['Password']);
    $query = msqli_query("select * from user where email= '$email' && password = '$password'");
    $rowcount=mysqli_num_row($query);
    if($rowcount == true)
    {
        echo "True";
    }
    else
    {
        echo "False";
    }

}

?>
