<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the post id is provided in the query string
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Get the post id from the query string
    $postId = $_GET['id'];

    // Delete the post from the database
    $sql = "DELETE FROM posts WHERE id = $postId";
    $conn->query($sql);

    // Redirect back to the forum page
    header('Location: forum.php');
    exit;
} else {
    // If the post id is not provided, redirect back to the forum page
    header('Location: forum.php');
    exit;
}

$conn->close();
?>