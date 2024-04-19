<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_form.php");
    exit();
}

// Handle form submission to update permissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $conn = new mysqli("localhost", "ROOT", "password", "user_management");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update permissions for each user
    foreach ($_POST['user_permissions'] as $username => $permission) {
        $stmt = $conn->prepare("UPDATE users SET button_permission=? WHERE username=?");
        $stmt->bind_param("ss", $permission, $username);
        $stmt->execute();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <h3>Admin Panel</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table>
            <tr>
                <th>Username</th>
                <th>Button Permission</th>
            </tr>
            <?php
            // Display list of users with their current permissions
            $conn = new mysqli("localhost", "root", "password", "user_management");
            $sql = "SELECT username, button_permission FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>";
                    echo "<select name='user_permissions[" . $row['username'] . "]'>";
                    echo "<option value='allowed' " . ($row['button_permission'] == 'allowed' ? 'selected' : '') . ">Allowed</option>";
                    echo "<option value='denied' " . ($row['button_permission'] == 'denied' ? 'selected' : '') . ">Denied</option>";
                    echo "</select>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            $conn->close();
            ?>
        </table>
        <button type="submit">Update Permissions</button>
    </form>
</body>
</html>
