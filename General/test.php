<?php 


$string = "apple,banana,orange";
$fruits = explode(",", $string);

 print_r($fruits); 

// Access each element without foreach
$firstFruit = $fruits[0]; // "apple"
$secondFruit = $fruits[1]; // "banana"
$thirdFruit = $fruits[2]; // "orange"

echo $firstFruit . "\n"; // Output: apple
echo $secondFruit . "\n"; // Output: banana
echo $thirdFruit . "\n"; // Output: orange


$test = ['12', '121'];
echo $test[0];

$combined = implode(" - ", $fruits);
echo $combined; // Output: apple - banana - orange


echo '<hr>';

$string = "O'Reilly";
$escaped_string = addslashes($string);

echo $escaped_string; // Saída: O\'Reilly
echo '<br>';
echo $string;


?> 

