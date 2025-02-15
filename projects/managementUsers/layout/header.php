<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./assets/main.css">
</head>
<body>
<header>

<?php

$isAdmin = !isset($_SESSION['role']) || $_SESSION['role'] === 'admin';
$isUser = !isset($_SESSION['role']) ||  $_SESSION['role'] !== 'admin';

 ?>
<ul>

<?php if($isAdmin) { ?>
  <li>
    <a href="dashboard.php">Dashboard (admin)</a>
  </li>
 <?php } ?> 

 <?php if($isUser) { ?>
  <li><a href="dashboardUsers.php">Dashboard (user)</a></li>
  <?php } ?> 
  
  <li>
    <a href="logout.php">Logout</a>
  </li>
</ul>
</header>