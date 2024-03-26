<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to the login page
    exit;
}
?>