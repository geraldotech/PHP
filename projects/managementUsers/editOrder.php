<?php
session_start();
require_once 'connect.php';

// Check if order ID is provided
if (!isset($_GET['id'])) {
    // Redirect to listAll.php if ID is not provided
    header("Location: listAll.php");
    exit();
}

// Get the order ID from the URL parameter
$orderID = $_GET['id'];

// Fetch order information based on the ID
$stmt = $connection->prepare("SELECT * FROM Orders WHERE ID = :orderID");
$stmt->bindParam(':orderID', $orderID);
$stmt->execute();
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if order exists
if (!$order) {
    // Redirect to listAll.php if order is not found
    header("Location: listAll.php");
    exit();
}

// Handle form submission for updating the order
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderNumber = $_POST['order_number'];
    $obs = $_POST['obs'];
    $active = isset($_POST['active']) ? 1 : 0;

    // Update the order information in the database
    $stmt = $connection->prepare("UPDATE Orders SET OrderNumber = :OrderNumber, OBS = :OBS, Active = :Active WHERE ID = :orderID");
    $stmt->bindParam(':OrderNumber', $orderNumber);
    $stmt->bindParam(':OBS', $obs);
    $stmt->bindParam(':Active', $active);
    $stmt->bindParam(':orderID', $orderID);

    if ($stmt->execute()) {
        $success_message = "Order updated successfully!";
    } else {
        $error_message = "Error updating order.";
    }
}
?>

<?php
include('./layout/header.php')
?>
    <h2>Edit Order <?php echo $order['OrderNumber']; ?></h2>
    <?php if (isset($success_message)) { echo "<p>$success_message</p>"; } ?>
    <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
    <form method="post">
        <input type="hidden" type="text" name="order_number" value="<?php echo $order['OrderNumber']; ?>" required><br><br>
        Order Observation: <input type="text" name="obs" value="<?php echo $order['OBS']; ?>" required><br><br>
        Active: <input type="checkbox" name="active" value="1" <?php if ($order['Active'] == 1) echo "checked"; ?>><br><br>
        <input type="submit" value="Update Order">
    </form>
</body>
</html>
