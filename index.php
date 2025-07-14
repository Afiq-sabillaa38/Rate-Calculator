<?php
require_once '../src/calculatePower.php';
require_once '../src/calculateEnergy.php';
require_once '../src/calculateTotalCharge.php';
require_once '../src/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voltage = $_POST['voltage'] ?? 0;
    $current = $_POST['current'] ?? 0;
    $hours = $_POST['hours'] ?? 0;

    $power = calculatePower($voltage, $current);
    $energy = calculateEnergy($power, $hours);
    $totalCharge = calculateTotalCharge($energy, CURRENT_RATE);

    echo "Power: " . $power . " W<br>";
    echo "Energy: " . $energy . " kWh<br>";
    echo "Total Charge: $" . number_format($totalCharge, 2) . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Power, Energy, and Charge Calculator</title>
</head>
<body>
    <div class="container">
        <h1>Power, Energy, and Charge Calculator</h1>
        <form method="POST">
            <div class="form-group">
                <label for="voltage">Voltage (V):</label>
                <input type="number" class="form-control" name="voltage" required>
            </div>
            <div class="form-group">
                <label for="current">Current (A):</label>
                <input type="number" class="form-control" name="current" required>
            </div>
            <div class="form-group">
                <label for="hours">Hours:</label>
                <input type="number" class="form-control" name="hours" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>
    </div>
</body>
</html>