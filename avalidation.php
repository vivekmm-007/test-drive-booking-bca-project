<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php"); // Redirect to the login page
    exit;
}
?>