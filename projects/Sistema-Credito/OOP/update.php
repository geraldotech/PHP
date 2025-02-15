<?php
$user = "lucy";
$password = "lucy";
$database = "Users";
$table = "cadastros";
$conn = mysqli_connect("localhost", $user, $password, $database);

// Check connection 
if (mysqli_connect_errno()) { 
  echo "Database connection failed."; 
} 
$query = "UPDATE cadastros set LIMITE = '2222' WHERE person_id = '1'";


$mysqli = new mysqli("localhost", $user, $password, $database);
if ($result = $mysqli->query($query)) {
   echo 'okay';
}



?>