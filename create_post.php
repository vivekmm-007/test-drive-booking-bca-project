<!-- create_post.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link rel="stylesheet" href="create_post.css">
</head>
<body>
    <?php
  include 'validation.php'; 
include 'navbar.php';
?>
    <h1>Create Post</h1>

    <?php
    // Start the session to retrieve the username
    $username = $_SESSION['username']; // Assuming the username is stored in the session

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database Connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db";
        $conn = new mysqli($servername, $username, $password, $dbname);

        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $image_path = null; // Initialize image path variable

        if (!empty($_FILES["post_image"]["name"])) {
            $targetDirectory = "uploads/"; // Directory where the images will be stored
            $targetFile = $targetDirectory . basename($_FILES["post_image"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if image file is a actual image
            $check = getimagesize($_FILES["post_image"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $targetFile)) {
                    $image_path = $targetFile; // Store the image path
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "File is not an image.";
            }
        }

        $author = $_SESSION['username'];

        // Insert the post into the database including the image path and author
        $sql = "INSERT INTO posts (title, content, author, image_path) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $post_title, $post_content, $author, $image_path);
        $stmt->execute();
    

if ($stmt->affected_rows > 0) {
    // Redirect to a new page and display success message
    header("Location: post_created.php");
    exit;
} else {
    echo "Error creating the post.";
}

$stmt->close();
$conn->close();
    }
    ?>

    <form action="create_post.php" method="post" enctype="multipart/form-data">
        <input type="text" name="post_title" placeholder="Post Title"><br>
        <textarea name="post_content" rows="4" cols="50" placeholder="Write your post here"></textarea><br>
        <input type="file" name="post_image"> <!-- Input field for uploading images -->
        <input type="submit" value="Submit">
    </form>
</body>
</html>