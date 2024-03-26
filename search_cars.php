<!DOCTYPE html>
<html>
<head>
    <title>Car Search</title>
    <link rel="stylesheet" type="text/css" href="search_cars.css">
</head>
<body>
<?php
  include 'validation.php'; 
include 'navbar.php';
?>
    <div class="container">
        <h1>Car Search</h1>
        <form action="search_cars.php" method="get">
            <input type="text" name="search" placeholder="Search for a car...">
            <input type="submit" value="Search">
        </form>
        
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

// Retrieve the search term from the URL parameter

if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    // Perform a search query in the database
    $sql = "SELECT name, hyperlink FROM cars WHERE name LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row as hyperlinks
        while($row = $result->fetch_assoc()) {
            echo "<a href='" . $row["hyperlink"] . "'>" . $row["name"] . "</a><br>";
        }
    } else {
        echo "No results found";
    }
}

// Close the database connection
$conn->close();
?>
    </div>
</body>
</html>
