<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Used Cars Website</title>
    <link rel="stylesheet" type="text/css" href="used.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
  include 'validation.php'; 

?>
    <div class="navbar">
    <img src="logo.jpg" alt="Logo" class="logo" >
        <a href="homepage.php">Home</a>
        <a href="submit_car.html">Sell Your Car</a>
        <a href="mycars.php">Your Car Listings</a> 
        <a href="review.php">Review A Car</a> 
        <form action="search.php" method="GET">
    <input type="text" name="search" placeholder="Search...">
    <button type="submit">Search</button>
</form>
    </div>
    <div class="jumbotron">
        <h1>Welcome to our Used Cars Website</h1>
        <p>Find the perfect used car for you</p>
    </div>
    <div class="content">
    <h2>Recently Added Cars</h2>
        <div class="scrolling-container">
            <div class="scrolling-wrapper">
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "db";
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Fetch data from the database
                $sql = "SELECT * FROM used_cars ORDER BY id DESC LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        echo '<div class="car">';
                        echo '<a href="display_car.php?id=' . $row["id"] . '"><img src="' . $row["images"] . '" alt="' . $row["title"] . '"></a>';
                        echo '<h3>' . $row["title"] . '</h3>';
                        echo '<p>₹' . $row["price"] . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
         2023 Used Cars Website
    </div>
    <script>
       window.onload = function() {
        var scrollingContainer = document.getElementById("scrollingContainer");
        var scrollingWrapper = document.getElementById("scrollingWrapper");
        var clone;

        // Clone the scrolling wrapper and append it to the container
        clone = scrollingWrapper.cloneNode(true);
        scrollingContainer.appendChild(clone);

        // Set the scrolling wrapper's position to relative and set its width to twice the container's width
        scrollingWrapper.style.position = "relative";
        scrollingWrapper.style.width = (scrollingContainer.offsetWidth * 2) + "px";

        // Set the scrolling container's overflow to hidden
        scrollingContainer.style.overflow = "hidden";

        // Set the scrolling wrapper's animation properties
        scrollingWrapper.style.animation = "scroll 30s linear infinite";
        scrollingWrapper.style.animationPlayState = "running";

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }
       }
    </script>
</body>
</html>