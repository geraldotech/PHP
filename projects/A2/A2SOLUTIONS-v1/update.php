<?php
require './includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];
    $ano = $_POST['ano'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE cars SET Marca = :marca, Modelo = :modelo, Cor = :cor, Ano = :ano, Valor = :valor, Status = :status WHERE id = :id");
    $stmt->bindParam(':id', $car_id);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':cor', $cor);
    $stmt->bindParam(':ano', $ano);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':status', $status);

    try {
        if ($stmt->execute()) {
            header("Location: listcars.php");
            exit;
        } else {
            echo "Error: Unable to update car.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
