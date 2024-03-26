<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>

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
    </body>
</html>