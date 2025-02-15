<?php
session_start();
require_once 'connect.php';

// Check if client ID is provided
if (!isset($_GET['id'])) {
    // Redirect to listAll.php if ID is not provided
    header("Location: listAll.php");
    exit();
}

// Get the client ID from the URL parameter
$clientID = $_GET['id'];

// Fetch client information based on the ID
$stmt = $connection->prepare("SELECT * FROM users WHERE ID = :clientID AND role = 'client'");
$stmt->bindParam(':clientID', $clientID);
$stmt->execute();
$client = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if client exists
if (!$client) {
    // Redirect to listAll.php if client is not found
    header("Location: listAll.php");
    exit();
}

// Handle form submission for adding a new order
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderNumber = rand(100000, 999999); // Generate a random order number
    $obs = $_POST['obs'];
    $active = isset($_POST['active']) ? 1 : 0;

    // Insert the order into the database
    $stmt = $connection->prepare("INSERT INTO Orders (OrderNumber, UserID, OBS, Active) VALUES (:OrderNumber, :UserID, :OBS, :Active)");
    $stmt->bindParam(':OrderNumber', $orderNumber);
    $stmt->bindParam(':UserID', $clientID);
    $stmt->bindParam(':OBS', $obs);
    $stmt->bindParam(':Active', $active);

    if ($stmt->execute()) {
        $success_message = "Order registered successfully!";
    } else {
        $error_message = "Error registering order.";
    }
}
?>
<?php
include('./layout/header.php')
?>
    <h2>New Order for <?php echo $client['FirstName']; ?></h2>
    <?php if (isset($success_message)) { echo "<p>$success_message</p>"; } ?>
    <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
    <form method="post">
        Order Observation: <input type="text" name="obs" required><br><br>
        Active: <input type="checkbox" name="active" value="1"><br><br>
        <input type="submit" value="Register Order">
    </form>
</body>
</html>
