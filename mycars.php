<?php

  include 'validation.php'; 
include 'navbar.php';
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch data from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM used_cars WHERE seller_username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Display the data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="car">';
        echo '<a href="display_car.php?id=' . $row["id"] . '"><img src="' . $row["images"] . '" alt="' . $row["title"] . '"></a>';
        echo '<h3>' . $row["title"] . '</h3>';
        echo '<p>₹' . $row["price"] . '</p>';
        echo '<img src="delete.svg" class="delete-button" data-id="' . $row["id"] . '" alt="Delete">';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<script>
    // Add event listener to delete buttons
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Show confirmation popup
            const confirmation = confirm('Are you sure you want to delete this listing?');
            if (confirmation) {
                // Send delete request to the server
                const id = button.getAttribute('data-id');
                fetch(`delete.php?id=${id}`, {
                    method: 'DELETE'
                })
                .then(response => {
                    if (response.ok) {
                        // Reload the page to show updated listings
                        location.reload();
                    } else {
                        throw new Error('Failed to delete listing');
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('Failed to delete listing');
                });
            }
        });
    });
</script>
<style>
    .delete-button {
        width: 20px;
        height: 20px;
    }
</style>