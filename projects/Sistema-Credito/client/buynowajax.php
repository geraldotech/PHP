<?php
session_start();

require_once('../functions.php');
$userid = $_SESSION['person_id'];
/* echo $userid; */


$single = singleUserAssoc($conn, $userid, $table);
/* echo $single['LIMITE']; */

BuyCartAjax($single['LIMITE'], $conn, $table, $userid);
 
?>


B