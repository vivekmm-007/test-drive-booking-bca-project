<html>
    <head>
    <link rel="stylesheet" href="testdrive.css">
</head>
<body>
    <?php
session_start();
$successMessage = ""; // Initialize the success message variable

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
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

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO testdrive (brand, model, name, contact, date, time) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $_POST['brand'], $_POST['model'], $_POST['name'], $_POST['contact'], $_POST['date'], $_POST['time']);

    // Execute
   // Execute
if ($stmt->execute()) {
    // Set a session variable with the success message
    $_SESSION['successMessage'] ="A test drive for ". $_POST['brand'] . " " . $_POST['model'] . " has been successfully booked for " . $_POST['name'] . " on " . $_POST['date'] . " at " . $_POST['time'] . ".";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();

// Redirect to the same page with a query parameter indicating success
header("Location: testdrive.php?success=true");
exit();
}

// Check if redirected with success
// Check if redirected with success
if (isset($_SESSION['successMessage'])) {
    $successMessage = $_SESSION['successMessage'];
    // Unset the session variable to not show the message again on refresh
    unset($_SESSION['successMessage']);
}
?>

<?php if (!empty($successMessage)): ?>
<div class="overlay">
    <div class="popup">
        <p><?php echo $successMessage; ?></p>
        <button onclick="redirectToHomepage()">OK</button>
    </div>
</div>
<?php endif; ?>

<!-- JavaScript and CSS remain the same -->

<script>
function closePopup() {
    document.querySelector('.overlay').style.display = 'none';
    
}

function redirectToHomepage() {
    window.location.href = 'homepage.php';
}
</script>

<script>
function confirmBooking() {
    var name = document.getElementById('name').value;
    var brand = document.getElementsByName('brand')[0].value; // Changed to getElementsByName
    var model = document.getElementsByName('model')[0].value; // Changed to getElementsByName
    var date = document.getElementById('date').value;
    var time = document.getElementById('time').value;

    return confirm("Confirm booking: " + name + " for " + brand + " " + model + " on " + date + " at " + time + "?");
}
</script>

<form action="testdrive.php" method="post" onsubmit="return confirmBooking()">
    <input type="hidden" name="brand" value="<?php echo htmlspecialchars($_GET['brand'] ?? ''); ?>">
    <input type="hidden" name="model" value="<?php echo htmlspecialchars($_GET['model'] ?? ''); ?>">
    
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    
    <label for="contact">Contact:</label>
    <input type="text" id="contact" name="contact" required><br><br>
    
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br><br>
    
    <label for="time">Time:</label>
    <input type="time" id="time" name="time" required><br><br>
    
    <input type="submit" value="Book Test Drive">
</form>
</body>
</html>