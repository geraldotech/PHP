<?php

// Configurações do cabeçalho para SSE
header('Content-Type: text/event-stream');
//header('Cache-Control: no-cache'); // Evita cache do lado do cliente
//header('Connection: keep-alive');

// Mantém a conexão aberta e envia atualizações
while (true) {
    // Verifica se o cliente desconectou
    if (connection_aborted()) {
        break;
    }

    // Envia o evento SSE
    echo "id: " . uniqid() . "\n"; // ID único para cada mensagem
    echo "event: horario\n"; // Nome do evento
    echo "data: " . date('H:i:s') . "\n\n"; // Dados do evento


    // Limpa os buffers para enviar dados ao cliente imediatamente
    ob_flush();
    flush();

    // Aguarda 1 segundo antes de enviar o próximo evento
    sleep(1);
}
?>
