<!DOCTYPE html>
<html>
<head>
    <title>Motor Metrics</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to the login page
    exit;
}
?>
    <div class="navbar">
        <a href="homepage.php">
            <img src="logo.jpg" alt="Logo" style="width:40px; height:40px;">
        </a>
        <a href="homepage.php">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Cars
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="Swift/swift.php">Maruti Suzuki Swift</a>
                <a href="Alto800/alto.php">Maruti Suzuki Alto 800</a>
                <a href="WagonR/wagonr.php">Maruti Suzuki WagonR</a>
                <a href="punch/punch.php">Tata Punch</a>
                <a href="tiago/tiago.php">Tata Tiago</a>
                <a href="nexon/nexon.php">Tata Nexon</a>
                <a href="hycross/hycross.php">Toyota Hycross</a>
                <a href="fortuner/fortuner.php">Toyota Fortuner</a>
                <a href="glanza/glanza.php">Toyota Glanza</a>
                <a href="i10/i10.php">Hyundai Grand i10</a>
                
            </div>
        </div> 
        <a href="comparison.php">Compare</a>
        <a href="used.php">Used Cars</a>
        <a href="forum.php">Forum</a>
        <div class="right">
        <?php if (isset($_SESSION['username'])) : ?>
    <p><a href="logout.php" style="color: red;">Logout</a></p>
<?php endif ?>
        </div>

    </div>


<<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$car1 = $_POST['car1'];
$car2 = $_POST['car2'];

$sql = "SELECT * FROM car_info WHERE id = '$car1' OR id = '$car2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cars = $result->fetch_all(MYSQLI_ASSOC);
    echo "<div style='display:flex; width: 100vw;'>";
    foreach ($cars as $car) {
        if ($car['id'] == $car1) {
            $car1_name = $car['brand'] . " " . $car['model'];
            $car1_mileage = $car['mileage']; 
            $car1_power = $car['horsepower']; 
            $car1_rating = $car['rating']; 
        } elseif ($car['id'] == $car2) {
            $car2_name = $car['brand'] . " " . $car['model'];
            $car2_mileage = $car['mileage']; 
            $car2_power = $car['horsepower'];
            $car2_rating = $car['rating']; 
        }
        
        echo "<div style='margin: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f4f4f4;flex: 1; '>"; // Use flex: 1 to make the comparison areas fill the available space
        echo "<div style='  flex: 1; display: flex; flex-direction: column; align-items:center; justify-content:center;'>";
        echo "<img src='" . $car["image_url"] . "' alt='Car Image' style='width:200px; height:200px; border-bottom: 2px solid #ccc;'>";
        echo "<p style=''>We bring you " . $car["brand"] . " " . $car["model"] . ". The " . $car["brand"] . " " . $car["model"] . " priced at " . $car["price"] . ". The " . $car["model"] . " available in " . $car["engine_capacity"] . " cc engine with two fuel options diesel and petrol. The " . $car["model"] . " has a mileage of " . $car["mileage"] . " per liter.</p>";
        echo "<p style=''><strong>Brand: </strong> " . $car["brand"] . "</p>";
        echo "<p><strong>Model: </strong> " . $car["model"] . "</p>";
        echo "<p><strong>Price: </strong> $" . $car["price"] . "</p>";
        echo "<p><strong>Fuel Type: </strong> " . $car["fuel_type"] . "</p>";
        echo "<p><strong>Engine Capacity: </strong> " . $car["engine_capacity"] . "</p>";
        echo "<p><strong>Horsepower: </strong> " . $car["horsepower"] . "hp</p>";
        echo "<p><strong>Torque: </strong> " . $car["torque"] . "Nm</p>";
        echo "<p><strong>Transmission: </strong> " . $car["transmission"] . "</p>";
        echo "<a href='fuelcostcalculator.php?mileage=" . $car["mileage"] . "'>Calculate Fuel Cost</a>";
        echo "<a href='search.php?search=" . $car["model"] . "'>Buy Used</a>";
        echo "<a href='testdrive.php?brand=" . urlencode($car["brand"]) . "&model=" . urlencode($car["model"]) . "'>Test Drive</a>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "0 results";
}

$conn->close();
?>

<p id="verdict" style="text-align: center;"></p>
<script>
    function calculateVerdict() {
        var verdict = "";
        var mileage1 = <?php echo $car1_mileage; ?>;
        var mileage2 = <?php echo $car2_mileage; ?>;
        var power1 = <?php echo $car1_power; ?>;
        var power2 = <?php echo $car2_power; ?>;
        var rating1 = <?php echo $car1_rating; ?>;
        var rating2 = <?php echo $car2_rating; ?>;

        var score1 = mileage1 + power1 + rating1;
        var score2 = mileage2 + power2 + rating2;

        console.log(score1);
        console.log(score2);

  
        if (score1 > score2) {
            verdict = "<?php echo $car1_name; ?> is better.";
        } else if (score2 > score1) {
            verdict = "<?php echo $car2_name; ?> is better.";
        } else {
            verdict = "Both cars are equally good.";
        }

        document.getElementById("verdict").innerText = verdict;
    }
</script>
<button onclick="calculateVerdict()">Get Verdict</button>

</body>
</html>