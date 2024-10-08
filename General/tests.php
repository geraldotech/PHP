<?php 

/**
 * @return geraldo 
 */

//Returns the portion of string specified by the offset and length parameters.

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


  $mapa = [
    "nome" => 'Geraldo',
    "nome" => 'Felipe',
    "nome" => 'Bella',
  ];

// criar arquivo text

// Obtém o timestamp atual
$timestamp = date('Ymd_His'); // Formato: '20240927_153000'

// Define o nome do arquivo com o timestamp
$filename = "teste_$timestamp.txt";

// Escreve no arquivo
file_put_contents($filename, "Este arquivo foi criado em: $timestamp\n");

// Confirmação de que o arquivo foi criado
echo "Arquivo '$filename' criado com sucesso!";

?> 
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
</html>



