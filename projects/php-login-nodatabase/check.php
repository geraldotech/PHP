<?php
// (A) START SESSION 
session_start();
 
// (B) HANDLE LOGIN
if (isset($_POST["user"]) && !isset($_SESSION["user"])) {
  // (B1) USERS & PASSWORDS - SET YOUR OWN !
   $users = [
    "admin" => "admin",
    "jon" => "654321",
    "gera" => "123"
  ];
 
  // (B2) CHECK & VERIFY
  if (isset($users[$_POST["user"]])) {
    if ($users[$_POST["user"]] == $_POST["password"]) {
      $_SESSION["user"] = $_POST["user"];
    }
  }
 
  // (B3) FAILED LOGIN FLAG
  if (!isset($_SESSION["user"])) { $failed = true; }
}
 
// (C) REDIRECT USER TO HOME PAGE IF SIGNED IN
if (isset($_SESSION["user"])) {
  header("Location: panel.php"); // SET YOUR OWN HOME PAGE!
  exit();
}