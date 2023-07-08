<?php
$myObj = new stdClass();
$myObj->name = "Geraldo";
$myObj->age = 30;
$myObj->city = "New York";
$myObj->city2 = "Maceio";
$myJSON = json_encode($myObj);
echo $myJSON;
?>