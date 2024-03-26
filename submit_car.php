<?php
session_start();
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
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}


$title = $_POST['title'];
$price = $_POST['price'];
$description = $_POST['description'];
$contact = $_POST['contact'];
// Handle file upload
$target_dir = "uploads/";
$images = $_FILES["images"]["name"];
$target_files = array();

for($i=0; $i<count($images); $i++) {
    $target_file = $target_dir . basename($images[$i]);
    move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target_file);
    $target_files[] = $target_file;
}

$images_paths = implode(",", $target_files); // This will create a comma-separated string of image paths

$sql = "INSERT INTO used_cars (title, images, price, description, contact, seller_username)
VALUES ('$title', '$images_paths', '$price', '$description', '$contact', '$username')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. <a href='display_car.php?id=".$last_id."'>View your product page</a>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  

$conn->close();
?>