<?php
include 'avalidation.php';
// Connect to the database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get the number of used cars available for sale
$query = "SELECT COUNT(*) FROM used_cars";
$result = $conn->query($query);
$num_used_cars = $result->fetch_row()[0];

// Get the number of cars sold
$query = "SELECT COUNT(*) FROM sold_cars";
$result = $conn->query($query);
$num_cars_sold = $result->fetch_row()[0];

// Get the top sellers
$query = "SELECT seller_username, COUNT(*) as num_cars_sold FROM sold_cars GROUP BY seller_username ORDER BY num_cars_sold DESC LIMIT 10";
$result = $conn->query($query);
$top_sellers = [];
while ($row = $result->fetch_assoc()) {
    $top_sellers[] = $row;
}
$query = "SELECT seller_username, COUNT(*) as num_cars_posted FROM used_cars GROUP BY seller_username ORDER BY num_cars_posted DESC LIMIT 5";
$result = $conn->query($query);
$top_sellers_by_posts[] = $row;
while ($row = $result->fetch_assoc()) {
    $top_sellers_by_posts[] = $row;
}


// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .admin-panel {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
        #logout-button {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    border-radius: 5px;
    background-color: #647C90;
    color: white;
    text-decoration: none;
}

#logout-button:hover {
    background-color: #3e8e41;
}
    </style>
</head>
<body>
<div class="admin-panel">
        <div style="float: right;">
        <a id="logout-button" href="logout.php">Logout</a>
        </div>
   
        <h1>Admin Panel</h1>
        <h2>Statistics</h2>
        <div>
        <canvas id="used-cars-chart"></canvas>
<script>
    var ctx = document.getElementById('used-cars-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Used Cars', 'Cars Sold'],
            datasets: [
                {
                    label: 'Number of Cars',
                    data: [<?php echo $num_used_cars; ?>, <?php echo $num_cars_sold; ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }
            
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
        </div>
</div> 
<h2>Users With The Most Number of Cars Sold</h2> 
<table> 
    <thead> 
        <tr>
             <th>Seller ID</th> 
             <th>Number of Cars Sold</th>
             </tr>
             </thead>
              <tbody>
                 <?php foreach ($top_sellers as $seller): ?>
                     <tr>
                         <td>
                            <?php echo $seller['seller_username']; ?>
                        </td> 
                        <td>
                            <?php echo $seller['num_cars_sold']; ?>
                        </td> 
                    </tr>
                     <?php endforeach; ?>
                     </tbody> 
                    </table> 
                    <h2>Top Sellers by Number of Used Cars Posted</h2>
<table>
    <thead>
        <tr>
            <th>Seller ID</th>
            <th>Number of Used Cars Posted</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($top_sellers_by_posts as $index => $seller): ?>
            <?php if ($index > 0): ?>
                <tr>
                    <td>
                        <?php echo $seller['seller_username']; ?>
                    </td>
                    <td>
                        <?php if (isset($seller) && isset($seller['num_cars_posted'])): ?>
                            <?php echo $seller['num_cars_posted']; ?>
                        <?php else: ?>
                            <p>No data available</p>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>
                </div> 
                </body> 
    </html>