<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Registering a new user
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hash the password using SHA1
    $hashed_password = sha1($password);

    // Insert the user into the database
    $stmt = $connection->prepare("INSERT INTO users (CPFCNPJ, FirstName, Address, role, Age, password) VALUES (:CPFCNPJ, :FirstName, :Address, :role, :Age, :password)");
    $stmt->bindParam(':CPFCNPJ', $username);
    $stmt->bindParam(':FirstName', $_POST['firstname']);
    $stmt->bindParam(':Address', $_POST['address']);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':Age', $_POST['age']);
    $stmt->bindParam(':password', $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        $success_message = "Client registered successfully!";
    } else {
        $error_message = "Error registering client.";
    }

    // Registering a new client order
    $orderNumber = mt_rand(100000, 999999); // Generate a random order number
    $obs = $_POST['obs'];
    $active = true;

    $userID = $connection->lastInsertId(); // Get the ID of the newly inserted user

    // Insert the order into the database
    $stmt = $connection->prepare("INSERT INTO Orders (OrderNumber, UserID, OBS, Active) VALUES (:OrderNumber, :UserID, :OBS, :Active)");
    $stmt->bindParam(':OrderNumber', $orderNumber);
    $stmt->bindParam(':UserID', $userID);
    $stmt->bindParam(':OBS', $obs);
    $stmt->bindParam(':Active', $active);

    // Execute the statement
    if ($stmt->execute()) {
        $success_message .= " Client order registered successfully!";
    } else {
        $error_message .= " Error registering client order.";
    }
}
?>

<?php
include('./layout/header.php')
?>
    <h2>User Registration</h2>
    <?php if (isset($success_message)) { echo "<p>$success_message</p>"; } ?>
    <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
<!--     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        CPFCNPJ: <input type="text" name="username" required><br><br>
        First Name: <input type="text" name="firstname"><br><br>
        Address: <input type="text" name="address"><br><br>
        Age: <input type="number" name="age"><br><br>
        Password: <input type="password" name="password" required><br><br>
        Role:
        <select name="role">
            <option value="admin">Admin</option>
            <option value="client">Client</option>
        </select><br><br>
        Observation: <input type="text" name="obs"><br><br>
        <input type="submit" value="Register">
    </form> -->
    <a href="register.php">New client</a>
    <br>
    <a href="listAll.php">ListAll</a>
    <br>
  <!--   <a href="newOrder.php">newOrder</a> -->
</body>
</html>
