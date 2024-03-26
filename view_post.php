<!-- view_post.php -->
<!DOCTYPE html>
<html>
<head>
    <title>View Post</title>
 
 <link rel="stylesheet" type="text/css" href="view_post.css">  
</head>
<body>
<?php
  include 'validation.php'; 
include 'navbar.php';
?>
    <h1>View Post</h1>

    <?php
    // Database Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Retrieve the post based on the ID from the URL
    $post_id = $_GET['id']; // Assuming the ID is passed in the URL
    $sql = "SELECT * FROM posts WHERE id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>By: " . $row["author"] . "</p>"; // Displaying the post author
        if (!empty($row["image_path"])) {
            echo '<img src="' . $row["image_path"] . '" alt="Post Image">'; // Displaying the post image if available
        }
        echo "<p>" . $row["content"] . "</p>"; // Displaying the full post content
    } else {
        echo "Post not found.";
    }

    $conn->close();
    ?>
</body>
</html>