<!DOCTYPE html>
<html>
<head>
    <title>Motor Metrics</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
<?php
  include 'validation.php'; 
include 'navbar.php';
?>

    <div class="search-container">
        <form action="search_cars.php" method="GET">
            <input type="text" name="search" placeholder="Search for cars...">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="main">
        <h1>MotoMetric</h1>
        <p>Your Compass in the World of Wheels! </p>
    </div>
    <h2>Popular Cars</h2>
   <div class="slideshow-container">

        <div class="mySlides fade">
            <a href="WagonR/wagonr.php">
                <img src="wagonr.png" style="width:100%">
            </a>
            <div class="text">Maruti Suzuki WagonR</div>
        </div>
    
        <div class="mySlides fade">
            <a href="tiago/tiago.php">
                <img src="tiago/tiago.png" style="width:100%">
            </a>
            <div class="text">Tata Tiago</div>
        </div>
    
        <div class="mySlides fade">
            <a href="Swift/swift.php">
                <img src="Swift/swift.png" style="width:100%">
            </a>
            <div class="text">Maruti Suzuki Swift</div>
        </div>
    
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
   <h2> Popular Brands</h2>
    <div class="car-brands">
    <div class="scrolling-wrapper">
    <img src="maruti.png" onclick="showCars('Maruti Suzuki')">
    <img src="toyota.png" onclick="showCars('Toyota')">
    <img src="hyundai.png" onclick="showCars('Hyundai')">
    <img src="tata.png" onclick="showCars('Tata')">
</div>
</div>

    <script>
        var slideIndex = 0;
        showSlides();
    
        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
    </script>
<script>
    function showCars(brand) {
        // Pass the brand name as a parameter to search_cars.php
        window.location.href = "search_cars.php?search=" + brand;
    }
</script>
</body>
</html>