<?php

//require_once('../models/User.php');

class UserController extends RenderView{
    private $userModel;

    // public function __construct($db) {
    //     $this->userModel = new User($db);
    // }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if ($this->authenticate($username, $password)) {
                $_SESSION['user'] = $username;
                header('Location: /dashboard'); // Redirect to a dashboard or home page after login
                exit();
            } else {
                $this->showLoginForm('Invalid username or password');
            }
        } else {
            $this->showLoginForm();
        }
    }

    private function authenticate($username, $password) {
        // Add your authentication logic here
        // Return true if authentication is successful, false otherwise
    }

    private function showLoginForm($error = '') {
        // Include your login form view
       // include('../views/login.php');
    }
    // Function to handle user registration
    public function register($username, $password) {
        // if ($this->userModel->register($username, $password)) {
        //     header('Location: ../public/index.php?registration_success=1');
        //     exit();
        // } else {
        //     header('Location: ../public/register.php?error=1');
        //     exit();
        // }
    }
}
?>
