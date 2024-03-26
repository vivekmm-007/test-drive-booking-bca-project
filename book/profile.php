<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>

<?php
session_start(); // Start the session

// Connect to the database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Get the row ID from the session variable
$username = $_SESSION['username'];
$query = "SELECT id FROM users WHERE username = '$username'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$rowId = $row['id'];

// Get the form data
$honorifics = $_POST['honorifics'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNo = $_POST['phoneNo'];

// Update the data in the profiles table
$sql = "UPDATE users SET honorifics='$honorifics', first_name='$firstName', last_name='$lastName', phone_no='$phoneNo' WHERE id=$username";

if ($conn->query($sql) === TRUE) {
  echo 'Profile updated successfully';
} else {
  echo 'Error: ' . $sql . '<br>' . $conn->error;
}

// Close the database connection
$conn->close();
?>

<form action="" method="post">
  <h2>Profile</h2>
  <label for="honorifics">Honorifics:</label>
  <select id="honorifics" name="honorifics">
    <option value="Mr.">Mr.</option>
    <option value="Mrs.">Mrs.</option>
    <option value="Ms.">Ms.</option>
  </select>
  <label for="firstName">First Name:</label>
  <input type="text" id="firstName" name="firstName">
  <label for="lastName">Last Name:</label>
  <input type="text" id="lastName" name="lastName">
  <label for="phoneNo">Phone No:</label>
  <input type="tel" id="phoneNo" name="phoneNo">
  <input type="submit" value="Save">
</form>


</body>
</html>