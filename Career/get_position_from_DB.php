<?php
require 'db_conn.php';

$departmentID = (int) $_GET['departmentID'];

$sql = "SELECT * FROM position WHERE position.departmentID = $departmentID GROUP BY positionName ORDER BY positionName ASC;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ( $resultCheck > 0 ) {
    echo "<option disabled selected>Select Position</option>";

    while($row = mysqli_fetch_assoc($result)){
	    echo "<option value='".$row['positionID']."'>".$row['positionName']."</option>";
    }
}
?>