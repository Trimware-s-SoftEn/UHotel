<?php
require 'db_conn.php';

$positionID = (int) $_GET['positionID'];

$sql = "SELECT employmentType FROM position where positionName IN 
        ( SELECT positionName FROM position WHERE position.positionID = $positionID ) AND 
        departmentID =  ( SELECT departmentID FROM position WHERE position.positionID = $positionID )";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ( $resultCheck > 0 ) {
    echo "<option disabled selected>Select Employment Type</option>";

    while($row = mysqli_fetch_array($result)){
	    echo "<option value='".$row[0]."'>".$row[0]."</option>";
    }
}
?>