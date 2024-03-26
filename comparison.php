<!DOCTYPE html>
<html>
<head>
  <title>Car Comparison</title>
  <link rel="stylesheet" type="text/css" href="comparison.css">
</head>
<body>
<?php
include 'navbar.php';
?>
<div class="b">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM car_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form id='compareForm' method='post' action='compare.php'>" ;
    echo "<select name='car1'>" ;
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id"] . "'>" . $row["brand"] . " " . $row["model"] . "</option>" ;
    }
    echo "</select>" ;
    echo "<select name='car2'>" ;
    $result = $conn->query($sql); // Reset the result pointer
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id"] . "'>" . $row["brand"] . " " . $row["model"] . "</option>" ;
    }
    echo "</select>" ;
    echo "<input type='submit' value='Compare'>" ;
    echo "</form>" ;
} else {
    echo "0 results";
}

$conn->close();
?>
</div>
</body>
</html>