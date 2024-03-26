<!DOCTYPE html>
<html>
<head>
  <style>
    /* CSS for the popup */
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background-color: #f2f2f2;
      border: 2px solid #333;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      animation: fadeIn 0.5s ease-in-out;
    }

    /* CSS for the animation */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>
<body>

<!-- Your HTML content -->

<?php
// the following are to be used as default values when connecting to a datbase:
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a table named 'bookings' with columns carName, honorifics, UserName, and timeslot
$sql = "SELECT carName, honorifics, UserName, timeslot FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function() {
        var popup = document.createElement('div');
        popup.className = 'popup';
        popup.innerHTML = 'A test drive for " . $row["carName"] . " has been successfully booked for " . $row["honorifics"] . " " . $row["UserName"] . " for " . $row["timeslot"] . "';
        document.body.appendChild(popup);

        // Auto-close after 3 seconds
        setTimeout(function() {
          popup.style.animation = 'fadeOut 0.5s ease-in-out';
          setTimeout(function() {
            popup.remove();
          }, 500);
        }, 3000);
      });
    </script>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>