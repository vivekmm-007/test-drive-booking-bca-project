<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="display.css">
</head>
<body>
<?php
  include 'validation.php'; 
include 'navbar.php';
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['id'])) {
  $car_id = $_GET['id'];

  $sql = "SELECT title, images, price, description, contact , seller_username FROM used_cars WHERE id = $car_id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<h1>" . $row["title"]. "</h1>";
      echo "<img src='" . $row["images"]. "' />";
      echo "<p>" . $row["price"]. "</p>";
      echo "<a href='https://wa.me/91" . $row["contact"] . "'><img src='phone.png' />Contact Seller</a>";
      echo "<p>" . $row["description"]. "</p>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();
}
?>
</body>
</html>