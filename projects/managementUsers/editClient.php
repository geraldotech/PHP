<?php
session_start();
require_once 'connect.php';

// Check if ID parameter is provided
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

// Handle form submission for updating client information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newFirstName = $_POST['firstname'];
    $newAddress = $_POST['address'];
    $newAge = $_POST['age'];

    // Update client information in the database
    $stmt = $connection->prepare("UPDATE users SET FirstName = :firstname, Address = :address, Age = :age WHERE ID = :clientID");
    $stmt->bindParam(':firstname', $newFirstName);
    $stmt->bindParam(':address', $newAddress);
    $stmt->bindParam(':age', $newAge);
    $stmt->bindParam(':clientID', $clientID);
    
    if ($stmt->execute()) {
        $success_message = "Client information updated successfully!";
    } else {
        $error_message = "Error updating client information.";
    }
}
?>

<?php
include('./layout/header.php')
?>
    <h2>Edit Client</h2>
    <?php if (isset($success_message)) { echo "<p>$success_message</p>"; } ?>
    <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $clientID; ?>">
        First Name: <input type="text" name="firstname" value="<?php echo $client['FirstName']; ?>"><br><br>
        Address: <input type="text" name="address" value="<?php echo $client['Address']; ?>"><br><br>
        Age: <input type="number" name="age" value="<?php echo $client['Age']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
