<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $conn = new mysqli("localhost", "root", "", "user_management");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password for comparison
    $hashed_password = md5($password);

    // Prepare and execute SQL query
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $hashed_password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists and credentials are correct
    if ($result->num_rows == 1) {
        // User is authenticated, retrieve user details
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        // Redirect to appropriate page based on role
        if ($_SESSION['role'] == 'admin') {
            header("Location: admin_panel.php");
        } else {
            header("Location: user_dashboard.php");
        }
    } else {
        // Invalid credentials, redirect back to login page with error message
        $_SESSION['error'] = "Invalid username or password";
        header("Location: login_form.php");
    }
} else {
    // Redirect to login page if accessed directly
    header("Location: login_form.php");
}
?>
