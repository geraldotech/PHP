<?php

$vinculaUsuarioInstanciaEdit = ['3','2'];
$currentInstances = ['1', '2'];
echo '<hr>';

// Convert to integers for safety
$placas = ['2020', '2025', '2033'];
$novoIntegers = array_map('intval', $placas);
print_r($novoIntegers);
echo '<p>'. $novoIntegers[0].'</p>';


/* computa diff entre arrays */
$instancesToAdd = array_diff($vinculaUsuarioInstanciaEdit, $currentInstances);
$instancesToRemove = array_diff($currentInstances, $vinculaUsuarioInstanciaEdit);


print_r($instancesToAdd);
echo '<br> Para adicionar: ' . json_encode($instancesToAdd);
echo '<hr>';

echo 'Para remover: ' . json_encode($instancesToRemove);

?>