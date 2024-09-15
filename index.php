<?php
// Read and decode JSON data
$jsonData = file_get_contents('data.json');
$data = json_decode($jsonData, true);

// Prepare data for charts
$salesData = array_column($data['sales'], 'amount');
$salesLabels = array_column($data['sales'], 'date');

$productNames = array_column($data['products'], 'name');
$productSales = array_column($data['products'], 'sales');

$countries = array_column($data['customerLocations'], 'country');
$customers = array_column($data['customerLocations'], 'customers');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>E-commerce Dashboard</h1>
        
        <div class="chart-container">
            <h2>Monthly Sales</h2>
            <canvas id="salesChart"></canvas>
        </div>
        
        <div class="chart-container">
            <h2>Product Sales</h2>
            <canvas id="productChart"></canvas>
        </div>
        
        <div class="chart-container">
            <h2>Customer Locations</h2>
            <canvas id="locationChart"></canvas>
        </div>
    </div>

    <script>
        // Sales Chart
        new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: <?php echo json_encode($salesLabels); ?>,
                datasets: [{
                    label: 'Monthly Sales',
                     json_encode($salesData); ?>,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Product Sales Chart
        new Chart(document.getElementById('productChart'), {
            type: 'bar',
            labels: <?php echo json_encode($productNames); ?>,
                datasets: [{
                    label: 'Product Sales',
                    data: <?php echo json_encode($productSales); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgb(54, 162, 235)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Customer Locations Chart
        new Chart(document.getElementById('locationChart'), {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($countries); ?>,
                datasets: [{
                    label: 'Customer Locations',
                     json_encode($customers); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>