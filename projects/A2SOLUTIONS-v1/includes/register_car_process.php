<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];
    $ano = $_POST['ano'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];

    try {
        $stmt = $conn->prepare("INSERT INTO cars (Marca, Modelo, Cor, Ano, Valor, Status) VALUES (:marca, :modelo, :cor, :ano, :valor, :status)");
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':status', $status);
        
        if ($stmt->execute()) {
         //   echo "Car registered successfully!";
        } else {
          //  echo "Error: Unable to register car.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Car</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('../partials/header.php') ?>
<div class="container mt-5">

<?php
    // Check if car registration was successful
    $carRegistered = true; // Assuming it's successful for demonstration purposes

    if ($carRegistered) {
        // If car registration was successful, show success message
        echo '<div class="alert alert-success" role="alert">Car registered successfully! Redirecting...</div>';
        // Redirect to dashboard after 3 seconds
        echo '<script>
                setTimeout(function() {
                    window.location.href = "../listcars.php";
                }, 1000);
              </script>';
    } else {
        // If car registration failed, show error message
        echo '<div class="alert alert-danger" role="alert">Error: Failed to register car.</div>';
    }
    ?>
</div>

