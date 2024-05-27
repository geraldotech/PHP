<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'client') {
    header("Location: login.php");
    exit();
}

require_once 'connect.php';

$userID = $_SESSION['user_id'];

// Fetch user information
$stmt = $connection->prepare("SELECT * FROM users WHERE ID = :userID");
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch user orders
$stmt = $connection->prepare("SELECT * FROM Orders WHERE UserID = :userID AND Active = 1");
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Handle change password form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_password'])) {
  $current_password = $_POST['current_password'];
  $new_password = $_POST['new_password'];

  // Validate current password
  if (sha1($current_password) === $user['password']) {
      // Hash the new password
      $hashed_new_password = sha1($new_password);

      // Update the password in the database
      $stmt = $connection->prepare("UPDATE users SET password = :password WHERE ID = :userID");
      $stmt->bindParam(':password', $hashed_new_password);
      $stmt->bindParam(':userID', $userID);
      
      if ($stmt->execute()) {
          $success_message = "Password changed successfully!";
      } else {
          $error_message = "Error changing password.";
      }
  } else {
      $error_message = "Current password is incorrect.";
  }
}
?>

<?php
include('./layout/header.php')
?>
    <h2>User Dashboard</h2>
    <p>Welcome, <?php echo $user['FirstName']; ?>!</p>

    <!-- User Information -->
    <h3>User Information</h3>
    <p>First Name: <?php echo $user['FirstName']; ?></p>
    <p>Address: <?php echo $user['Address']; ?></p>
    <p>Age: <?php echo $user['Age']; ?></p>


    <!-- Include a form for changing password -->
    <!-- Change Password Section -->
    <h3>Change Password</h3>
    <?php if (isset($success_message)) { echo "<p>$success_message</p>"; } ?>
    <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Current Password: <input type="password" name="current_password" required><br><br>
        New Password: <input type="password" name="new_password" required><br><br>
        <input type="submit" name="change_password" value="Change Password">
    </form>

    <br>

    <!-- Orders Section -->
    <h1>Orders</h1>
    <?php if ($orders): ?>
        <ul>
            <?php foreach ($orders as $order): ?>
                <li>
                    Order Number: <?php echo $order['OrderNumber']; ?><br>
                    OBS: <?php echo $order['OBS']; ?><br>
                    Active: <?php echo $order['Active'] ? 'true' : 'false'; ?>
                </li>
                <hr>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>


</body>
</html>
