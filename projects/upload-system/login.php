<?php
session_start();
include('connect.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    // Check if username and password match
    $sql = "SELECT id FROM users WHERE username = ? AND password = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {
        // User authenticated, redirect to dashboard or any other page
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials, display error message
        echo "Invalid username or password.";
        echo "<br>";
        echo "<a href='login.html'>Try Login again</a>";
    }
}
?>
