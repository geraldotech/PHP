<?php
require_once 'connect.php';

// Check if client ID is provided
if (!isset($_POST['client_id'])) {
    // Redirect to listAll.php if client ID is not provided
    header("Location: listAll.php");
    exit();
}

// Get the client ID from the POST data
$clientID = $_POST['client_id'];

// Delete orders associated with the client
$stmt = $connection->prepare("DELETE FROM Orders WHERE UserID = :clientID");
$stmt->bindParam(':clientID', $clientID);
$stmt->execute();

// Delete the client from the database
$stmt = $connection->prepare("DELETE FROM users WHERE ID = :clientID AND role = 'client'");
$stmt->bindParam(':clientID', $clientID);

if ($stmt->execute()) {
    // Client deleted successfully, redirect to listAll.php
    header("Location: listAll.php");
    exit();
} else {
    // Error occurred while deleting client
    echo "Error deleting client.";
}
?>
