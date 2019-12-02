<?php
require 'db_conn.php';

if ( isset($_POST['submit']) ) {

    //escape variable
$departmentID = mysqli_real_escape_string($conn, $_POST['positionDepartment']);
$positionID = mysqli_real_escape_string($conn, $_POST['positionPosition']);
$employmentType = mysqli_real_escape_string($conn, $_POST['content_addPosition_selectEmployment']);
$closeDate = mysqli_real_escape_string($conn, $_POST['closeDate']);


    $sql = "INSERT INTO `positionrequire` (`positionID`, `closeDate`, `employmentType` )
            VALUES ('$positionID', '$closeDate', '$employmentType')";

    if (!mysqli_query($conn, $sql)) {
        header('Location: add_position.php?failed');
    } else {
        mysqli_close($conn);
        header('Location: add_position.php?successed');
    }

} else {
    header("Location: add_position.php?invalid_operation");
    exit();
}
?>