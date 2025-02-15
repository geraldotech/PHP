<?php
require_once 'connect.php';

// Check if order ID is provided
if (!isset($_POST['order_id'])) {
    // Redirect to listAll.php if order ID is not provided
    header("Location: listAll.php");
    exit();
}

// Get the order ID from the POST data
$orderID = $_POST['order_id'];

// Delete the order from the database
$stmt = $connection->prepare("DELETE FROM Orders WHERE ID = :orderID");
$stmt->bindParam(':orderID', $orderID);

if ($stmt->execute()) {
    // Order deleted successfully, redirect to editOrders.php
    header("Location: editOrders.php?id={$_GET['user_id']}");
    exit();
} else {
    // Error occurred while deleting order
    echo "Error deleting order.";
}
?>
