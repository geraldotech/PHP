<?php
session_start();

require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $stmt = $connection->prepare("SELECT * FROM users WHERE CPFCNPJ = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($user['role'] == 'admin' && $user['password'] == sha1($password)) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['role'] = 'admin';
            header("Location: dashboard.php");
            exit();
        } elseif ($user['role'] == 'client' && $user['password'] == sha1($password)) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['role'] = 'client';
            header("Location: dashboardUsers.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/main.css">
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        CPF/CNPJ<input type="text" value="admin" name="username" required placeholder="apenas numeros"><br><br>
        Password: <input type="password" value="admin" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
