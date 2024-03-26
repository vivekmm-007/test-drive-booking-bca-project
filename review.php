<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $sellerName = $_POST["seller_name"];
    $carModel = $_POST["car_model"];
    $review = $_POST["review"];
    $rating = $_POST["rating"]; // New line to get the rating value

    // Validate and sanitize input (you may want to add more validation)
    $sellerName = htmlspecialchars($sellerName);
    $carModel = htmlspecialchars($carModel);
    $review = htmlspecialchars($review);

    // Save the review to the database (replace these lines with your database logic)
    $servername = "localhost";
    $username = "root"; // Assuming XAMPP's default username is 'root'
    $password = ""; // Leave it empty by default, change if you set a password
    $dbname = "db"; // Use the database name you created

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO feedback (customer_name, car_model, review, rating)
            VALUES ('$sellerName', '$carModel', '$review', $rating)";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Review submitted successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Car Review</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f8f8f8;
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 500px;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            text-align: center;
            color: #007bff; /* Changed heading color to blue */
            margin-bottom: 20px;
            font-weight: bold; /* Added bold style */
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border 0.3s;
        }

        input,
        textarea:focus {
            border: 1px solid #007bff; /* Changed focus color to blue */
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #007bff; /* Changed button color to blue */
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }






        
    .rating-container {
        text-align: center;
    }

    .star {
        font-size: 30px;
        color: #ddd;
        cursor: pointer;
        transition: color 0.3s;
        display: inline-block;
    }

    .star:hover,
    .star:hover ~ .star {
        color: #f8d32a;
    }

    input[name="rating"] {
        display: none;
    }

    input[name="rating"]:checked + label,
    input[name="rating"]:checked ~ label {
        color: #f8d32a;
        pointer-events: none; /* Disable interaction when highest-rated star is clicked */
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll('.star');

        stars.forEach((star) => {
            star.addEventListener('click', (event) => {
                const clickedStar = event.target;
                const ratingValue = clickedStar.getAttribute('for').charAt(4);
                
                document.getElementById('star' + ratingValue).checked = true;

                // Disable interaction with lower-rated stars when the highest-rated star is clicked
                if (ratingValue == 5) {
                    for (let i = 1; i <= 4; i++) {
                        document.getElementById('star' + i).style.pointerEvents = 'none';
                    }
                } else {
                    // Enable interaction with all stars for other ratings
                    stars.forEach((star) => {
                        star.style.pointerEvents = 'auto';
                    });
                }
            });
        });
    });
</script>

</head>
<body>

    <div class="container">
        <h1>Submit a Car Review</h1>

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="seller_name">Seller Name:</label>
            <input type="text" name="seller_name" required>

            <label for="car_model">Car Model:</label>
            <input type="text" name="car_model" required>

            <label for="review">Review:</label>
            <textarea name="review" rows="4" required></textarea>

            
            <label for="rating">Rating:</label>
<div class="rating-container">
    <input type="radio" id="star5" name="rating" value="5" onclick="setRating(5)">
    <label for="star5" class="star">&#9733;</label>
    <input type="radio" id="star4" name="rating" value="4" onclick="setRating(4)">
    <label for="star4" class="star">&#9733;</label>
    <input type="radio" id="star3" name="rating" value="3" onclick="setRating(3)">
    <label for="star3" class="star">&#9733;</label>
    <input type="radio" id="star2" name="rating" value="2" onclick="setRating(2)">
    <label for="star2" class="star">&#9733;</label>
    <input type="radio" id="star1" name="rating" value="1" onclick="setRating(1)">
    <label for="star1" class="star">&#9733;</label>
</div>

            
            <input type="submit" value="Submit Review">
        </form>
    </div>

</body>

</html>
