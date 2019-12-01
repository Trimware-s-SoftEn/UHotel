<?php

session_start();

$con = mysqli_connect('localhost','root','','uhotel');
//check conection
if(mysqli_connect_errno())
{
    echo "Failed to connect to mysql: ".mysqli_connect_error();
}
echo "1";
if(isset($_POST['Signin']))
{
    echo "2";
    $email = mysqli_real_escape_string($con,$_POST['Email']);
    $password = mysqli_real_escape_string($con,$_POST['Password']);
    $query = mysqli_query($con, "select * from user where email= '$email' && password = '$password'");
    $rowcount=mysqli_num_rows($query);
    if($rowcount == true)
    {   
        $rowcolumn = mysqli_fetch_assoc($query);
        if($rowcolumn['isAdmin'] == -1)
        {
            $isAdmin == FALSE;
        }
    }
    else
    {
        echo "False";
        header("Location: http://localhost/UHotel/LOGIN/Login.html");
    }


    if($isAdmin == FALSE)
    {
        $_SESSION['User'] = $rowcolumn['userID'];
        $_SESSION['Email'] = $rowcolumn['email'];
        $_SESSION['Password'] = $rowcolumn['password'];
        $_SESSION['fName'] = $rowcolumn['fName'];
        $_SESSION['lName'] = $rowcolumn['lName'];
        $_SESSION['Phone'] = $rowcolumn['phoneNo'];
        header("Location: http://localhost/UHotel/LOGIN/Profile.php");
    }
}
else
{
    echo "3";
}

?>
