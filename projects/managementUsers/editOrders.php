<?php

session_start();
require_once 'connect.php';

// Check if user ID is provided
if (!isset($_GET['id'])) {
    // Redirect to listAll.php if ID is not provided
    header("Location: listAll.php");
    exit();
}

// Get the user ID from the URL parameter
$userID = $_GET['id'];

// Fetch user information based on the ID
$stmt = $connection->prepare("SELECT * FROM users WHERE ID = :userID");
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user exists and is a client
if (!$user || $user['role'] !== 'client') {
    // Redirect to listAll.php if user is not found or not a client
    header("Location: listAll.php");
    exit();
}

// Fetch all orders for the user
$stmt = $connection->prepare("SELECT * FROM Orders WHERE UserID = :userID");
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
include('./layout/header.php')
?>
   
    <h2>Edit Orders for <?php echo $user['FirstName']; ?></h2>
    <ul class="orders">
        <?php foreach ($orders as $order): ?>
            <li>
            <a href="editOrder.php?id=<?php echo $order['ID']; ?>">Edit <?php echo $order['OrderNumber']; ?></a> -  <!-- <button onclick="confirmDelete(<?php echo $order['ID']; ?>)">Delete</button> -->        
           <span>
           <form id="delete_form_<?php echo $order['ID']; ?>" method="POST" action="deleteOrder.php">
            <input type="hidden" name="order_id" value="<?php echo $order['ID']; ?>">
            <button>Delete now </button>
            </form>                
           </span>
            </li>   
        <?php endforeach; ?>
        
    </ul>    

    <script>
 function confirmDelete(userID) {
            var result = confirm("Are you sure you want to delete this user?");
            if (result) {
                // If user confirms, redirect to deleteClient.php with user ID
                window.location.href = "deleteOrder.php?order_id=" + userID;
            }
        }
    </script>
</body>
</html>
