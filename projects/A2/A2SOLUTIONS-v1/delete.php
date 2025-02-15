<?php
require './includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $car_id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
    $stmt->execute([$car_id]);

    header("Location: listcars.php");
    exit;
} else {
    echo "Invalid request.";
}
?>
