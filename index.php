<?php
// Read and decode JSON data
$jsonData = file_get_contents('data.json');
$data = json_decode($jsonData, true);

// Check if JSON was decoded successfully
if ($data === null) {
    die("Error decoding JSON data");
}

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
    <script src="chart.js"></script>
    <script>window.Chart && (Chart.defaults.plugins.tooltip.enabled = false);</script>
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
    console.log("Script started");
    document.addEventListener('DOMContentLoaded', function() {
        console.log("DOM loaded");
        try {
            console.log("Creating charts");
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
            console.log("Sales chart created");

            // Product Sales Chart
            new Chart(document.getElementById('productChart'), {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($productNames); ?>,
                    datasets: [{
                        label: 'Product Sales',
                         json_encode($productSales); ?>,
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
            console.log("Product chart created");

            // Customer Locations Chart
            new Chart(document.getElementById('locationChart'), {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($countries); ?>,
                    datasets: [{
                        label: 'Customer Locations',
                        data: <?php echo json_encode($customers); ?>,
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
            console.log("Location chart created");
        } catch (error) {
            console.error("Error creating charts:", error);
            alert("There was an error creating the charts. Please check the console for more information.");
        }
    });
    </script>

    <div id="debug">
        <h3>Debug Information:</h3>
        <pre><?php
            echo "PHP Version: " . phpversion() . "\n";
            echo "JSON Data:\n";
            print_r($data);
        ?></pre>
    </div>
</body>
</html>

<!-- ... (previous HTML code remains the same) ... -->

<script>
console.log("Script started");
document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM loaded");
    try {
        console.log("Creating charts");
        // Sales Chart
        new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: <?php echo json_encode($salesLabels); ?>,
                datasets: [{
                    label: 'Monthly Sales',
                     json_encode($salesData); ?>, // Fixed this line
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
        console.log("Sales chart created");

        // Product Sales Chart
        new Chart(document.getElementById('productChart'), {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($productNames); ?>,
                datasets: [{
                    label: 'Product Sales',
                     json_encode($productSales); ?>, // Fixed this line
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
        console.log("Product chart created");

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
        console.log("Location chart created");
    } catch (error) {
        console.error("Error creating charts:", error);
        alert("There was an error creating the charts. Please check the console for more information.");
    }
});
</script>

<!-- ... (rest of the HTML remains the same) ... -->