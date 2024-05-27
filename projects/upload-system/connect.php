<?php 
 // Database connection parameters
$host = 'localhost';
$dbname = 'id22114591_casa';
$username = 'id22114591_casaroot';
$password = 'Mo2@54op';

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

