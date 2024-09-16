<?php 
 //Returns the portion of string specified by the offset and length parameters.

/**
 * @return geraldo 
 */


$string = "apple,banana,orange";
$fruits = explode(",", $string);

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
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<section class="leaf"></section>
<section class="leaf"></section>
<section class="leaf"></section>
<section class="leaf"></section>
<section class="leaf"></section>
<section class="leaf"></section>
  
</body>
</html>

<hr>
