<?php

session_start();

// Configurações do cabeçalho para SSE
header('Cache-Control: no-cache');
header('Connection: keep-alive');
header('Content-Type: text/event-stream');

$_SESSION['sse_active'] = true;

// Mantém a conexão aberta e envia atualizações
$number = 5;
while ($number > 0) {
    // Verifica se o cliente desconectou
    if (connection_aborted()) {
        break;
    }

    // Envia o evento SSE
    echo "id: " . uniqid() . "\n"; // ID único para cada mensagem
    echo "event: horario\n"; // Nome do evento
    echo "data: " . date('H:i:s') . " $number \n\n"; // Dados do evento

    // Limpa os buffers para enviar dados ao cliente imediatamente
    ob_flush();
    flush();

    // Aguarda 1 segundo antes de enviar o próximo evento
    sleep(1);
    $number--; // Decrementa o contador
}

// Evento final para indicar que o SSE terminou
echo "event: complete\n";
echo "data: SSE encerrado. Sessão destruída.\n\n";
ob_flush();
flush();

// Remove a sessão ativa
unset($_SESSION['sse_active']);

// Encerra a execução do script
exit();
?>
