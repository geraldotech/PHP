<?php 

/* === ARRAY INDEXADO === */
echo "<h2>Array indexado</h2>";
$api = [];
$api[] =  'ok'; // index 0
$api[] =  'res';  // index 1


echo "<pre>$api[0]   - $api[1]</pre>";

/* === ARRAY ASSOCIATIVO === */
echo "<h2>Array associativo</h2>";

$api['okay'] = 'okay res';
$api['node'] = ' NODEJS res';

echo "<pre>{$api['okay']} - {$api['node']} </pre>";

//header('Content-Type: application/json');
echo json_encode($api);

/* == Array Merges */
echo '<h2>Array Merges</h2>';

$apis = [];

$sistema = [
  "so" => "Linux",
  "version" => "20"
];

$apis['sistema'] = $sistema;


echo '<br>';
print_r($apis['sistema']); // array

echo "<p>{$apis['sistema']['so']}</p>"; // string valor direto

echo '<br>';
echo json_encode($apis);

/* == Array Merges com ... */
echo '<h2>Array Merges com ...</h2>';

$tvshows['shows'] = ['The Big Bang Theory', 'Dexter'];
$songs['songs'] = ["Lavander Lazy", "Go man"];

$todos_ret = [...$tvshows, ...$songs]; // se passar sem ... herda apenas os valores descartando o associativo

echo '<br>';
print_r($todos_ret['shows']); 
echo '<br>';

echo "<h4>";
print_r($todos_ret); 
echo "</h4>";

echo '<br>';
echo json_encode($todos_ret);

?>