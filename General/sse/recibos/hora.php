<?php

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$idRecibo = 10;

// Passo 1
$check = 10 > 2;
if (!$check) {
// nao é possivel continuar
$ret = [
    'msg' => 'passo 1 10 > 100, interromper script',
    'status' => 1,
];

// Envia o evento imediatamente
echo "id: {$idRecibo}\n";
echo "data: " . json_encode($ret) . "\n\n";

// Adiciona espaçadores para evitar problemas de buffer
echo ": \n\n";
ob_flush();
flush();

return;
}

$ret = [
    'msg' => 'passo 1, continue',
    'status' => 1,
];

// Envia o evento imediatamente
echo "id: {$idRecibo}\n";
echo "data: " . json_encode($ret) . "\n\n";

// Adiciona espaçadores para evitar problemas de buffer
echo ": \n\n";
ob_flush();
flush();



// Pausa de 5 segundos
sleep(5);

// Passo 2
if (10 > 1) {
    $ret = [
        'msg' => 'passo 2',
        'status' => 1,
    ];
    // Incrementa o ID e envia o próximo evento
    $idRecibo++;
    echo "id: {$idRecibo}\n";
    echo "data: " . json_encode($ret) . "\n\n";
    
    // Adiciona espaçadores para evitar problemas de buffer
    echo ": \n\n";
    ob_flush();
    flush();
}

// Pausa de 5 segundos
sleep(5);

// Evento final
$ret = [
    'msg' => 'Processo finalizado',
    'status' => 0,
];

$idRecibo++;
echo "id: {$idRecibo}\n";
echo "data: " . json_encode($ret) . "\n\n";

// Adiciona espaçadores para evitar problemas de buffer
echo ": \n\n";
ob_flush();
flush();

// Encerra o script
exit();
?>
