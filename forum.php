<!-- forum.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Community Forum</title>
        <link rel="stylesheet" type="text/css" href="forum.css">
</head>
<body>
<?php
include 'navbar.php';
include 'validation.php'
?>
    <h1>Community Forum</h1>
    <a href="create_post.php">Create Post</a> <!-- Hyperlink to create post page -->

    <?php
    $username = $_SESSION['username']; // Assuming the username is stored in the session

    // Database Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db";
    $conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT id, title,author, LEFT(content, 100) AS excerpt FROM posts"; // Assuming there's a 'title' column in the 'posts' table
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>By: " . $row["author"] . "</p>"; // Displaying the username
            echo "<p>" . $row["excerpt"] . "...</p>"; // Displaying a portion of the post content
            echo "<a href='view_post.php?id=" . $row["id"] . "'>Read More</a>"; // Hyperlink to view full post
            echo "</div>";
        }
    } else {
        echo "No posts yet.";
    }

    $conn->close();
    ?>
</body>
</html>