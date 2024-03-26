<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="search.css">
<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the search query
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM used_cars WHERE title LIKE '%$search%'";
    $result = $conn->query($sql);

    
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='display_car.php?id=" . $row["id"] . "'>" . $row["title"] . "</a><br>";
    }
} else {
    echo "0 results";
}
}

// Close the database connection
$conn->close();
?>
</head>
<body>