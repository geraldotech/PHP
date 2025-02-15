<?php

/* 
* Flush e ob_flush: Após cada echo, usamos ob_flush() e flush() para garantir que os dados 
* sejam enviados imediatamente ao cliente, mesmo com o uso de sleep().
*/

session_start();

// Configurações do cabeçalho para SSE
header('Cache-Control: no-cache');
header('Connection: keep-alive');
header('Content-Type: text/event-stream');

$_SESSION['sse_active'] = true;

// Envia o primeiro evento
echo "event: horario\n";
echo "data: SSE iniciado\n\n";
ob_flush();
flush();

sleep(2);

// Envia o segundo evento
echo "event: horario\n";
echo "data: SSE passo 2\n\n";
ob_flush();
flush();

sleep(2);

echo "event: horario\n";
echo "data: SSE passo 3\n\n";
ob_flush();
flush();

sleep(2);

echo "event: horario\n";
echo "data: SSE passo 4\n\n";
ob_flush();
flush();

sleep(2);

$arquivoValido = false; // Simula que o arquivo falhou na validação
if (!$arquivoValido) {


     /* 
      Enviando informações adicionais como JSON
     */
    $response = [
        'message' => 'SSE passo 5: Arquivo inválido. Encerrando SSE.',
        'adicional' => 'Verificar o arquivo enviado',
    ];

    // Envia mensagem de erro e encerra a conexão
    echo "event: errocarga\n";
    echo "data: " . json_encode($response) . "\n\n";
    ob_flush();
    flush();
    exit(); // Interrompe o script
} else {
    echo "event: horario\n";
    echo "data: SSE passo 5 arquivo validado com sucesso \n\n";
    ob_flush();
    flush();
}

sleep(2);

// Evento final para indicar que o SSE terminou
echo "event: complete\n";
echo "data: SSE encerrado. Sessão destruída.\n\n";
ob_flush();
flush();

// Remove a sessão ativa
unset($_SESSION['sse_active']);

// Encerra o script
exit();
?>
