<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles.css">
</head>

<script>
    function getPosition() {
        var departmentSelect = document.getElementById("departmentSelect");
        var departmentID = departmentSelect.options[departmentSelect.selectedIndex].value;
        console.log('departmentID=' + departmentID);

        // new xml request
        var xhr = new XMLHttpRequest();
        var url = 'get_position_from_DB.php?departmentID=' + departmentID;
        // open
        xhr.open('GET', url, true);
        console.log(xhr.readyState);
        // check response to display position
        xhr.onreadystatechange = function() {
            console.log(xhr.readyState);
            if (xhr.readyState == 4 && xhr.status == 200) {
                var text = xhr.responseText;
                var positionSelect = document.getElementById("positionSelect");
                positionSelect.innerHTML = text;
            }
        }
        xhr.send();
    }

    function getEmploymentType() {
        var positionSelect = document.getElementById("positionSelect");
        var positionID = positionSelect.options[positionSelect.selectedIndex].value;
        console.log('positionID=' + positionID);

        // new xml request
        var xhr = new XMLHttpRequest();
        var url = 'get_employment_from_DB.php?positionID=' + positionID;
        // open
        xhr.open('GET', url, true);
        console.log(xhr.readyState);
        // check response to display position
        xhr.onreadystatechange = function() {
            console.log(xhr.readyState);
            if (xhr.readyState == 4 && xhr.status == 200) {
                var text = xhr.responseText;
                var employmentSelect = document.getElementById("employmentSelect");
                employmentSelect.innerHTML = text;
            }
        }
        xhr.send();
    }
</script>

<body>

<div class="topnav">
  <a class="icon" href="#home"><img src="../picture/Logo_Transparent.png"; id="icon"></a>
  <div class="dropdownL">
    <button class="dropbtn">About</button>
    <div class="dropdown-content">
      <a href="#about">About us</a>
      <a href="#contact">Contact</a>
      <a href="#map">Map</a>
      <a href="#map">Career</a>
    </div>
  </div>
  <div class="dropdownL">
    <button class="dropbtn">Services</button>
    <div class="dropdown-content">
      <a href="#room">Rooms</a>
      <a href="#facilities">Facilities</a>
    </div>
  </div>

  <div class="main">

    <div class="top_addPosition">
      <div class="content_topic"><a href="positions.php"><h1>Positions ></h1></a><h2>Add New Require Position</h2></div>
      <div class="content_description">Please re-check the information before submit (Staff Only)</div>
    </div>
  </div>
  <img src="../picture/UserIcon.png"; id="userIcon">
  <img src="../picture/lineInNav.png"; id="lineInNav">
  <a class="book" href="Reservation/your_stay.html">BOOK NOW</a>
</div>

    <div class="content_addPosition">
        <h1>Enter Information</h1>
        <form action="insert_position_to_DB.php" method="POST" class="content_addPosition_form">
                  
          <h2>Department :</h2>
          <select name="positionDepartment" id="departmentSelect">
          <option style="color: rgb(50, 50, 50)" ; disabled selected>Select Department</option>
          <?php
              $sql = "SELECT * FROM department";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $row['departmentID'] ?>"><?php echo $row['departmentName'] ?></option>
            <?php } ?>
          </select><br>
          <script>
              var departmentSelect = document.getElementById("departmentSelect");
              departmentSelect.addEventListener("change", getPosition);
          </script>
          
          <h2 id="h2_select_position">Position :</h2>
          <select name="positionPosition" id="positionSelect" >

          </select><br>
          <script>
              var positionSelect = document.getElementById("positionSelect");
              positionSelect.addEventListener("change", getEmploymentType);
          </script>

          <h2 id="h2_select_em">Employment Type :</h2>
          <select class="content_addPosition_selectPosition" name="content_addPosition_selectEmployment" id="employmentSelect">
          </select><br>
          <h2 id="h2_select_close">Close Date :</h2>
          <input type="date" name="closeDate" id="select_close_date" value="yyyy-mm-dd" min="2018-01-01" max="2100-12-31"><br>              
          <input type="submit" name="submit" id="select_btn" value="Add">

</div>

<footer>
    <h1>Footer Content</h1>
</footer>

</body>

</html>

<?php
function printPop($msg)
{
	echo "<script>alert('$msg')</script>";
}
$fullUrl = "http://$_SERVER[HTTP_HOST] $_SERVER[REQUEST_URI]";

if (strpos($fullUrl, "failed") == TRUE) {
	printPop("Failed to add new require position");
} else if (strpos($fullUrl, "invalid_operation") == TRUE) {
	printPop("Invalid Operation");
} else if (strpos($fullUrl, "successed") == TRUE) {
	printPop("Successfully add new require position");
}
?>
