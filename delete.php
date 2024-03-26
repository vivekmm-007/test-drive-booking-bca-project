<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Move the listing to the sold_cars table
$id = $_GET['id'];
$sql = "INSERT INTO sold_cars (id,title,images,price,description,contact,seller_username) SELECT id,title,images,price,description,contact,seller_username FROM used_cars WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Delete the listing from the used_cars table
$sql = "DELETE FROM used_cars WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$conn->close();
?>