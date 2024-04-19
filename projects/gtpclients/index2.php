<?php
include('connect.php');

try {
    // Define the client ID
    $clientid = 1; // Replace 1 with the actual client ID

    // Prepare and execute the SQL query
    $sql = "SELECT orders.orderid, orders.order_date, products.name AS product_name, order_details.quantity
            FROM orders
            JOIN order_details ON orders.orderid = order_details.orderid
            JOIN products ON order_details.productid = products.productid
            WHERE orders.clientid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$clientid]);

    // Fetch the results as an associative array
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the orders and their details
    foreach ($orders as $order) {
        echo "Order ID: {$order['orderid']}<br>";
        echo "Order Date: {$order['order_date']}<br>";
        echo "Product Name: {$order['product_name']}<br>";
        echo "Quantity: {$order['quantity']}<br><br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
