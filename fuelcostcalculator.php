<?php
  
  include 'validation.php'; 
include 'navbar.php';
// Default fuel price
$fuelPrice = 108.68;

// Retrieve the mileage passed from the comparison page
if(isset($_GET['mileage'])){
    $mileage = $_GET['mileage'];
    
    if(isset($_POST['avgDistancePerWeek'])){
        $avgDistancePerWeek = $_POST['avgDistancePerWeek'];
        
        // Calculate fuel cost per week, year, and month
        $fuelCostPerWeek = ($avgDistancePerWeek / $mileage) * $fuelPrice;
        $fuelCostPerYear = $fuelCostPerWeek * 52; // Assuming 52 weeks in a year
        $fuelCostPerMonth = $fuelCostPerYear / 12; // Assuming 12 months in a year
        
        echo "<div style='display: flex; justify-content: center; align-items: center; height: 100vh;'>";
        echo "<div style='text-align: center; font-family: Arial, sans-serif; font-size: 16px;'>";
        echo "<div style='background-color: #f9f9f9; padding: 10px; width: 50%;'>";
        echo "Average fuel cost per week: ₹" . number_format($fuelCostPerWeek, 2) . "<br><br>";
        echo "Average fuel cost per month: ₹" . number_format($fuelCostPerMonth, 2)."<br><br>";
        echo "Average fuel cost per year: ₹" . number_format($fuelCostPerYear, 2) . "<br><br>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<div style='display: flex; justify-content: center; align-items: center; height: 100vh;'>";
        echo "<div style='text-align: center; font-family: Arial, sans-serif; font-size: 16px;'>";
        echo "<div style='background-color: #f9f9f9; padding: 10px; width: 50%;'>";
        echo "Please enter the average distance traveled per week:";
        echo "<form method='post'>";
        echo "<input type='text' name='avgDistancePerWeek' style='margin-top: 5px;'>";
        echo "<input type='submit' value='Calculate' style='margin-top: 5px; background-color: #3498db; color: white; border-radius: 5px; padding: 5px 15px; cursor: pointer;'>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<div style='display: flex; justify-content: center; align-items: center; height: 100vh;'>";
    echo "<div style='text-align: center; font-family: Arial, sans-serif; font-size: 16px;'>";
    echo "Mileage parameter not found.";
    echo "</div>";
    echo "</div>";
}
?>