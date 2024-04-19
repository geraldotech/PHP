<?php 
 // Database connection parameters
$host = 'localhost';
$dbname = 'user_management';
$username = 'root';
$password = '';

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($connection){
        echo "Connected successfully to the db $dbname";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

